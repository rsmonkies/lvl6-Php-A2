<?php

// Class for handling category-related operations
class CategoryController {

    // Protected property to store the database controller instance
    protected $db;

    // Constructor to initialize the CategoryController with a DatabaseController instance
    public function __construct(DatabaseController $db)
    {
        // Assign the provided DatabaseController instance to the db property
        $this->db = $db;
    }

    public function get_all_categories() {
        // SQL query to retrieve all categories
        $sql = "SELECT id, name, image  FROM category";

        // Execute the query
        $result = $this->db->runSQL($sql);

        // Fetch all rows as an associative array
        $categories = $result->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

    public function add_item_to_category($itemId, $categoryId) {
        // SQL query to insert data into inv_category table
        $sql = "INSERT INTO inv_category (inventory_id, category_id) VALUES (:itemId, :categoryId)";
    
        // Prepare the SQL statement
        $stmt = $this->db->prepare($sql);
    
        // Bind parameters
        $stmt->bindValue(':itemId', $itemId, PDO::PARAM_INT);
        $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
    
        // Execute the query
        return $stmt->execute();
    }

 

}

?>