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
    }
</style>
<?php  if ($_SESSION['user_type'] === 'admin') {?>
<div class="container-fluid" style="padding-top: 20px; padding-left: 40px;">
    <div class="row">
        <!-- Navigation column -->
        <div class="col-md-3 nav-column">
            <ul class="nav flex-column mt-4">
                <li>
                    <h3>Admin?</h3>
                    <p>Use these links below for extra features</p>
                    <p class="text-muted">Access will be denied for regular users</p>
                </li>
                    <li class="nav-item mb-4">
                        <a href="./add-inventory.php" class="btn btn-primary">Add Inventory</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./edit-inventory.php" class="btn btn-primary">Edit Current Inventory</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./inventory-removal.php" class="btn btn-primary">Remove Inventory</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="#" class="btn btn-primary">Manage Suppliers</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="#" class="btn btn-primary">Employees</a>
                    </li>
            </ul>
        </div>
        <?php } ?>

        <!-- Inventory container -->
        <div class="col-md-9">
            <div class="container mt-4">
                <h2>Inventory</h2>
                <?php
                // Retrieve all equipment data using the equipment controller
                $equipment = $controllers->equipment()->get_all_equipments();

                // Display equipment data
                if (!empty($equipment)) {
                    echo '<table class="table table-striped">';
                    echo '<thead><tr><th>Image</th><th>Name</th><th>Description</th></tr></thead>';
                    echo '<tbody>';
                    foreach ($equipment as $equip) {
                        echo '<tr>';
                        echo '<td><img src="' . htmlspecialchars($equip['image']) . '" alt="Image of ' . htmlspecialchars($equip['description']) . '" style="width: 100px; height: auto;"></td>';
                        echo '<td>' . htmlspecialchars($equip['name']) . '</td>';
                        echo '<td>' . htmlspecialchars($equip['description']) . '</td>';
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
