<?php

// Class for handling member-related operations
class SupplierController {

    // Protected property to store the database controller instance
    protected $db;

    // Constructor to initialize the MemberController with a DatabaseController instance
    public function __construct(DatabaseController $db)
    {
        // Assign the provided DatabaseController instance to the db property
        $this->db = $db;
    }

    public function get_all_suppliers() {
        // SQL query to retrieve all suppliers
        $sql = "SELECT id, supName, email, phoneNumber FROM supplier";

        // Execute the query
        $result = $this->db->runSQL($sql);

        // Fetch all rows as an associative array
        $suppliers = $result->fetchAll(PDO::FETCH_ASSOC);

        return $suppliers;
    }

    public function get_supplier_inventory_stock($supplierId) {
        // SQL query to retrieve equipment details based on supplier ID
        $sql = "SELECT inv_supplier.inv_id as inv_id, equipments.id as equipment_id, supplier.supName, equipments.name as equipment_name, equipments.description as equipment_description, equipments.image 
                FROM inv_supplier 
                JOIN equipments ON inv_supplier.inv_id = equipments.id 
                JOIN supplier ON inv_supplier.sup_id = supplier.id 
                WHERE supplier.id = :supplierId";
    
        // Prepare the SQL statement
        $stmt = $this->db->prepare($sql);
    
        // Bind parameters
        $stmt->bindValue(':supplierId', $supplierId, PDO::PARAM_INT);
    
        // Execute the query
        $stmt->execute();
    
        // Fetch all rows as an associative array
        $inventoryStock = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $inventoryStock;
    }

    public function add_item_to_supplier($itemId, $supplierId) {
        // SQL query to insert data into inv_supplier table
        $sql = "INSERT INTO inv_supplier (inv_id, sup_id) VALUES (:itemId, :supplierId)";
    
        // Prepare the SQL statement
        $stmt = $this->db->prepare($sql);
    
        // Bind parameters
        $stmt->bindValue(':itemId', $itemId, PDO::PARAM_INT);
        $stmt->bindValue(':supplierId', $supplierId, PDO::PARAM_INT);
    
        // Execute the query
        return $stmt->execute();
    }

    public function delete_supplier(int $supplierId)
{
    // Delete entries from inv_supplier table associated with the supplier
    $this->db->runSQL("DELETE FROM inv_supplier WHERE sup_id = :supplierId", [
        'supplierId' => $supplierId
    ])->execute();

    // Now, delete the supplier from the supplier table
    $sql = "DELETE FROM supplier WHERE id = :supplierId";
    $args = ['supplierId' => $supplierId];
    
    // Execute the query
    return $this->db->runSQL($sql, $args)->execute();
}

public function add_supplier($supName, $email, $phoneNumber) {
    // SQL query to insert a new supplier
    $sql = "INSERT INTO supplier (supName, email, phoneNumber) VALUES (:supName, :email, :phoneNumber)";
    
    // Bind parameters
    $args = [
        'supName' => $supName,
        'email' => $email,
        'phoneNumber' => $phoneNumber
    ];

    // Execute the query
    $this->db->runSQL($sql, $args);
    
    // Return the ID of the newly added supplier
    return $this->db->lastInsertId();
}

public function update_supplier($supplierId, $supName, $email, $phoneNumber)
{
    // SQL query to update supplier data
    $sql = "UPDATE supplier SET supName = :supName, email = :email, phoneNumber = :phoneNumber WHERE id = :id";
    
    // Bind parameters
    $args = [
        'id' => $supplierId,
        'supName' => $supName,
        'email' => $email,
        'phoneNumber' => $phoneNumber
    ];

    // Execute the query
    $this->db->runSQL($sql, $args)->execute();
    
    // Return the ID of the updated supplier
    return $supplierId;
}

  // Function to retrieve a specific supplier by its ID
  public function get_supplier_by_id(int $id)
  {
      // SQL query to select supplier data by ID
      $sql = "SELECT * FROM supplier WHERE id = :id";
      $args = ['id' => $id];
      
      // Execute the query and return the result
      return $this->db->runSQL($sql, $args)->fetch();
  }

}

?>