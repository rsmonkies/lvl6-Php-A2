<?php

class equipmentController {

    protected $db; // Property to store the database controller object

    // Constructor to initialize the equipmentController with a database controller object
    public function __construct(DatabaseController $db)
    {
        $this->db = $db;
    }

    // Function to create a new equipment entry in the database
    public function create_equipment(array $equipment) 
    {
        // SQL query to insert new equipment data into the equipments table
        $sql = "INSERT INTO equipments(name, description, image)
        VALUES (:name, :description, :image);";
        
        // Execute the SQL query with the provided equipment data
        $this->db->runSQL($sql, $equipment);
        
        // Return the ID of the last inserted equipment
        return $this->db->lastInsertId();
    }

    // Function to retrieve a specific equipment by its ID
    public function get_equipment_by_id(int $id)
    {
        // SQL query to select equipment data by ID
        $sql = "SELECT * FROM equipments WHERE id = :id";
        $args = ['id' => $id];
        
        // Execute the query and return the result
        return $this->db->runSQL($sql, $args)->fetch();
    }

    // Function to retrieve all equipment entries from the database
    public function get_all_equipments()
    {
        // SQL query to select all equipment data
        $sql = "SELECT * FROM equipments";
        
        // Execute the query and return all results
        return $this->db->runSQL($sql)->fetchAll();
    }

    // Function to update an existing equipment entry in the database
    public function update_equipment(array $equipment)
    {
        // SQL query to update equipment data
        $sql = "UPDATE equipments SET name = :name, description = :description, image = :image WHERE id = :id";
        
        // Execute the update query with the provided equipment data
        return $this->db->runSQL($sql, $equipment)->execute();
    }

   // Function to delete a specific equipment entry by its ID
public function delete_equipment(int $id)
{
    try {
        // Start a transaction
        $this->db->beginTransaction();

        // Step 1: Delete entries from inv_category
        $sqlCategory = "DELETE FROM inv_category WHERE inventory_id = :id";
        $argsCategory = ['id' => $id];
        $this->db->runSQL($sqlCategory, $argsCategory)->execute();

        // Step 2: Delete entries from inv_supplier
        $sqlSupplier = "DELETE FROM inv_supplier WHERE inv_id = :id";
        $argsSupplier = ['id' => $id];
        $this->db->runSQL($sqlSupplier, $argsSupplier)->execute();

        // Step 3: Delete the equipment entry
        $sqlEquipment = "DELETE FROM equipments WHERE id = :id";
        $argsEquipment = ['id' => $id];
        $this->db->runSQL($sqlEquipment, $argsEquipment)->execute();

        // Commit the transaction
        $this->db->commit();

        return true; // Return true on success
    } catch (PDOException $e) {
        // Roll back the transaction on failure
        $this->db->rollBack();

        // Log or handle the exception as needed
        return false; // Return false on failure
    }
}

}

?>