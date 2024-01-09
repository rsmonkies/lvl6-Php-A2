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

 

}

?>