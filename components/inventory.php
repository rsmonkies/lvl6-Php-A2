<?php
// Include the functions file for necessary functions and classes
require_once './inc/functions.php';

// Retrieve all equipment data using the equipment controller
$equipment = $controllers->equipment()->get_all_equipments();
?>

<!-- HTML for displaying the equipment inventory -->

<style>
    /* Custom styles for the navigation column */
    .nav-column {
        border: 1px solid #ccc; 
        border-radius: 5px; 
        padding: 20px; 
        background-color: #f8f9fa;
    }
</style>

<div class="container-fluid" style = "padding-top: 20px; padding-left: 40px;">
    <div class="row">
        <!-- Navigation column -->
        <div class="col-md-3 nav-column">
            <ul class="nav flex-column mt-4">
                <li>
                    <h3>Admin?</h3>
                    <p>Use these links below for extra features</p>
                    <p class= "text-muted">Access will be denied for regular users</p>
                </li>
                <li class="nav-item mb-4">
                <a href="#" class="btn btn-primary">Add Inventory</a>
                </li>
                <li class="nav-item mb-4">
                <a href="#" class="btn btn-primary">Remove Inventory</a>
                </li>
                <li class="nav-item mb-4">
                <a href="#" class="btn btn-primary">Manage Suppliers</a>
                </li>
                <li class="nav-item mb-4">
                <a href="#" class="btn btn-primary">Employees</a>
                </li>
            </ul>
        </div>

        <!-- Inventory container -->
        <div class="col-md-9">
            <div class="container mt-4">
                <h2>Inventory</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($equipment as $equip): ?>
                            <tr>
                                <td>
                                    <img src="<?= htmlspecialchars($equip['image']) ?>" 
                                         alt="Image of <?= htmlspecialchars($equip['description']) ?>" 
                                         style="width: 100px; height: auto;">
                                </td>
                                <td><?= htmlspecialchars($equip['name']) ?></td>
                                <td><?= htmlspecialchars($equip['description']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
