<?php
// Include the functions file for necessary functions and classes
require_once './inc/functions.php';

$CategoryController = $controllers->category();

// Check for the delete action
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    // Retrieve the id of the equipment to be deleted
    $catId = $_GET['id'];

    // Call a function to handle the deletion
    $CategoryController->delete_category($catId);


    header('Location: Categories.php');
    exit;
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
                    <h3>Admin dashboard - Categories</h3>
                    <p>Use these links below for extra features</p>
                    <p class="text-muted">Access will be denied for regular users</p>
                </li>
                <li class="nav-item mb-4">
                        <a href="./Inventory.php" class="btn btn-primary">Back to Inventory</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Categories.php" class="btn btn-primary">Categories</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Category-Edit.php" class="btn btn-primary">Edit Categories</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Category-Add.php" class="btn btn-primary">Add Categories</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Category-Remove.php" class="btn btn-primary">Remove Categories</a>
                    </li>
            </ul>
        </div>
        <?php } ?>

        <!-- Inventory container -->
        <div class="col-md-9">
            <div class="container mt-4">
                <h2>Categories</h2>
                <?php
                // Retrieve all equipment data using the equipment controller
                $category = $controllers->category()->get_all_categories();

                // Display equipment data
                if (!empty($category)) {
                    echo '<table class="table table-striped">';
                    echo '<thead><tr><th>Image</th><th>ID</th><th>Name</th><th>Remove</th></tr></thead>';
                    echo '<tbody>';
                    foreach ($category as $cat) {
                        echo '<tr>';
                        echo '<td><img src="' . htmlspecialchars($cat['image']) . '" alt="Image of ' . htmlspecialchars($cat['name']) . '" style="width: 100px; height: auto;"></td>';
                        echo '<td>' . htmlspecialchars($cat['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($cat['name']) . '</td>';
                        echo '<td><a href="category-remove.php?action=remove&id=' . $cat['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to remove this Category?\')">Remove</a></td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                } else {
                    echo '<p>No inventory available.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
