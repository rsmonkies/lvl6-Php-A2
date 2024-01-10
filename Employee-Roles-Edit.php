<?php 

session_start();
?>
<?php $title = 'Admin - Employee Roles'; require __DIR__ . "/inc/header.php"; ?>
     
<?php
// Include the functions file for necessary functions and classes
require_once './inc/functions.php';

// Check if the action is 'update'
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    // Process the submitted form data
    $id = intval($_POST['id']);
    $role = intval($_POST['role']); // Assuming 'role' is the name of the dropdown field

    // Validate inputs (you can add validation if necessary)
    $valid = true; // You can add validation logic here

    if ($valid) {
        // Update the user role
        $userData = [
            'id' => $id,
            'role_id' => $role,
        ];

        // Ensure that the 'update_user_role' method returns a boolean value indicating success
        $success = $controllers->members()->update_user_role($userData);

        if ($success) {
            // Redirect or show success message
            redirect('./Employees');
        } else {
            $message = "Failed to update user role. Please try again.";
        }
    } 
}

?>

<!-- HTML for displaying the general content for all logged-in users -->
<style>
    /* Custom styles for the navigation column */
    .nav-column {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        background-color: #f8f9fa;
        height: 100%; /* Set the height to 100% */
    }
</style>
<?php  if ($_SESSION['user_type'] === 'admin') {?>
<div class="container-fluid" style="padding-top: 20px; padding-left: 40px;">
    <div class="row">
        <!-- Navigation column -->
        <div class="col-md-3 nav-column">
            <ul class="nav flex-column mt-4">
                <li>
                    <h3>Admin dashboard - Employees</h3>
                    <p>Use these links below for extra features</p>
                    <p class="text-muted">Access will be denied for regular users</p>
                </li>
                <li class="nav-item mb-4">
                        <a href="./Inventory.php" class="btn btn-primary">Back to Inventory</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Employees.php" class="btn btn-primary">Employee List</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Employee-Roles-Edit.php" class="btn btn-primary">Edit Employee Roles</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Employee-Removal.php" class="btn btn-primary">Remove Employees</a>
                    </li>
            </ul>
        </div>
        <?php } ?>

        <!-- Employee container -->
<div class="col-md-9">
    <div class="container mt-4">
        <h2>Employees</h2>

        <?php
        // Retrieve all members with roles data using the updated method
        $users = $controllers->members()->get_all_members_with_roles();

        // Display members with roles data
        if (!empty($users)) {
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['ID'] ?? '') ?></td>
                        <td><?= htmlspecialchars($user['firstname'] ?? '') ?></td>
                        <td><?= htmlspecialchars($user['lastname']) ?></td>
                        <td><?= htmlspecialchars($user['email'] ?? '') ?></td>
                        
                        <?php
                        // Check if 'role_names' key exists and is not null before accessing it
                        $roleNames = isset($user['role_names']) ? htmlspecialchars($user['role_names']) : '';
                        ?>
                        
                        <td><?= $roleNames ?></td>
                        <td>
                            <a href="Employees-Roles-Editting.php?action=edit&id=<?= $user['ID'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php
        } else {
            echo '<p>No Employees registered.</p>';
        }
        ?>
    </div>
</div>
<?php require __DIR__ . "/inc/footer.php"; ?>