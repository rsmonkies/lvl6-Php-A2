<?php

// Class for handling member-related operations
class MemberController {

    // Protected property to store the database controller instance
    protected $db;

    // Constructor to initialize the MemberController with a DatabaseController instance
    public function __construct(DatabaseController $db)
    {
        // Assign the provided DatabaseController instance to the db property
        $this->db = $db;
    }

    // Method to retrieve a member record by its ID
    public function get_member_by_id($userId)
    {
        // Retrieve user details and roles from the database based on the user ID
        $stmt = $this->db->prepare("
            SELECT users.*, GROUP_CONCAT(roles.name) as role_names
            FROM users
            LEFT JOIN user_roles ON users.ID = user_roles.user_id
            LEFT JOIN roles ON user_roles.role_id = roles.ID
            WHERE users.ID = :userId
            GROUP BY users.ID
        ");
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $userDetails;
    }

    // Method to retrieve a member record by email
    public function get_member_by_email(string $email)
    {
        // SQL query to select a member by email
        $sql = "SELECT * FROM users WHERE email = :email";
        $args = ['email' => $email];
        // Execute the query and return the fetched member record
        return $this->db->runSQL($sql, $args)->fetch();
    }

    // Method to retrieve all member records
    public function get_all_members()
    {
        // SQL query to select all members
        $sql = "SELECT * FROM users";
        // Execute the query and return all fetched records
        return $this->db->runSQL($sql)->fetchAll();
    }

    // Method to update an existing member record
    public function update_member(array $member)
    {
        // SQL query to update a member's information
        $sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email WHERE id = :id";
        // Execute the query with the provided updated data
        return $this->db->runSQL($sql, $member)->execute();
    }

    // Method to delete a member record by its ID
public function delete_member(int $id)
{
    // Retrieve the user roles associated with the user
    $userRoles = $this->getUserRoles($id);

    // Delete user roles first
    foreach ($userRoles as $role) {
        $this->db->runSQL("DELETE FROM user_roles WHERE user_id = :userId AND role_id = :roleId", [
            'userId' => $id,
            'roleId' => $role['role_id']
        ])->execute();
    }

    // Now, delete the user from the users table
    $sql = "DELETE FROM users WHERE id = :id";
    $args = ['id' => $id];
    
    // Execute the query
    return $this->db->runSQL($sql, $args)->execute();
}

    // Method to register a new member
    public function register_member(array $member)
    {
        try {
            // SQL query to insert a new member record
            $sql = "INSERT INTO users(firstname, lastname, email, password) 
                    VALUES (:firstname, :lastname, :email, :password)"; 

            // Execute the query with the provided member data
            $this->db->runSQL($sql, $member);
            return true;

        } catch (PDOException $e) {
            // Handle specific error codes (like duplicate entry)
            if ($e->getCode() == 23000) { // Possible duplicate entry
                return false;
            }
            throw $e;
        }
    }   

    // Method to validate member login
    public function login_member(string $email, string $password)
    {
        // Retrieve the member by email
        $member = $this->get_member_by_email($email);

        // If member exists, verify the password
        if ($member) {
            $auth = password_verify($password,  $member['password']);
            // Return member data if authentication is successful, otherwise return false
            return $auth ? $member : false;
        }
        return false;
    }

    public function getUserRoles($userId)
{
    // Retrieve user roles from the database based on the user ID
    $stmt = $this->db->prepare("SELECT user_roles.role_id FROM user_roles WHERE user_roles.user_id = :userId");
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $roles;
}

    public function get_all_members_with_roles()
{
    // SQL query to select all members and their roles
    $sql = "SELECT users.*, GROUP_CONCAT(roles.name) AS role_names
            FROM users
            LEFT JOIN user_roles ON users.id = user_roles.user_id
            LEFT JOIN roles ON user_roles.role_id = roles.id
            GROUP BY users.id";

    // Execute the query and return all fetched records with roles
    return $this->db->runSQL($sql)->fetchAll();
}




// Method to register a new member and assign the "employee" role
public function register_member_with_role(array $member)
{
    try {
        // SQL query to insert a new member record
        $sql = "INSERT INTO users(firstname, lastname, email, password) 
                VALUES (:firstname, :lastname, :email, :password)";

        // Execute the query with the provided member data
        $this->db->runSQL($sql, $member);

        // Retrieve the ID of the newly registered user
        $userId = $this->db->lastInsertId(); 

        // Assign the "employee" role to the user
        $roleId = 2; // "employee" role has role_id: 2
        $this->assignUserRole($userId, $roleId);

        return true;
    } catch (PDOException $e) {
        // Handle specific error codes (like duplicate entry)
        if ($e->getCode() == 23000) { // Possible duplicate entry
            return false;
        }
        throw $e;
    }
}

// Method to assign a role to a user
public function assignUserRole($userId, $roleId)
{
    // SQL query to insert a new user role record
    $sql = "INSERT INTO user_roles(user_id, role_id) 
            VALUES (:user_id, :role_id)";

    // Execute the query with the provided user ID and role ID
    $args = ['user_id' => $userId, 'role_id' => $roleId];
    $this->db->runSQL($sql, $args);
}

public function update_user_role($userData)
{
    // SQL query to update the user role
    $sql = "UPDATE user_roles 
            SET role_id = :role_id
            WHERE user_id = :user_id";

    // Execute the query with the provided user ID and role ID
    $args = ['user_id' => $userData['id'], 'role_id' => $userData['role_id']];
    return $this->db->runSQL($sql, $args);
}
}
?>
