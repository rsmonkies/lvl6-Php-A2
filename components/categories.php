<?php
// Include the functions file for necessary functions and classes
require_once './inc/functions.php';

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
                    echo '<thead><tr><th>Image</th><th>ID</th><th>Name</th></tr></thead>';
                    echo '<tbody>';
                    foreach ($category as $cat) {
                        echo '<tr>';
                        echo '<td><img src="' . htmlspecialchars($cat['image']) . '" alt="Image of ' . htmlspecialchars($cat['name']) . '" style="width: 100px; height: auto;"></td>';
                        echo '<td>' . htmlspecialchars($cat['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($cat['name']) . '</td>';
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
