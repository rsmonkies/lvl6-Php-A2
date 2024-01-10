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

    public function delete_category(int $catId)
    {
        // Delete entries from inv_category table associated with the category
        $this->db->runSQL("DELETE FROM inv_category WHERE category_id = :catId", [
            'catId' => $catId
        ])->execute();
    
        // Now, delete the Category from the category table
        $sql = "DELETE FROM category WHERE id = :catId";
        $args = ['catId' => $catId];
        
        // Execute the query
        return $this->db->runSQL($sql, $args)->execute();
    }

    public function add_category($name, $image) {
        // SQL query to insert a new category
        $sql = "INSERT INTO category (name, image) VALUES (:name, :image)";
        
        // Bind parameters
        $args = [
            'name' => $name,
            'image' => $image,

        ];
    
        // Execute the query
        $this->db->runSQL($sql, $args)->execute();
        
        // Return the ID of the newly added category
        return $this->db->lastInsertId();
    }

 

}

?>