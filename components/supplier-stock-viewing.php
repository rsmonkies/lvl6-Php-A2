<?php
// Include the functions file for necessary functions and classes
require_once './inc/functions.php';
$SupplierController = $controllers->supplier();
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
                    <h3>Admin dashboard - Suppliers</h3>
                    <p>Use these links below for extra features</p>
                    <p class="text-muted">Access will be denied for regular users</p>
                </li>
                <li class="nav-item mb-4">
                        <a href="./Inventory.php" class="btn btn-primary">Back to Inventory</a>
                    </li>
                <li class="nav-item mb-4">
                        <a href="./Suppliers.php" class="btn btn-primary">Suppliers List</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Suppliers-Edit.php" class="btn btn-primary">Edit Suppliers</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Suppliers-Add.php" class="btn btn-primary">Add Suppliers</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Supplier-Removal.php" class="btn btn-primary">Remove Suppliers</a>
                    </li>
            </ul>
        </div>
        <?php } ?>

<!-- Supplier Stock Viewing container -->
<div class="container mt-4">
    <?php
    // Check if the action is 'view' and a supplier ID is provided
    if (isset($_GET['action']) && $_GET['action'] == 'view' && isset($_GET['id'])) {
        $supplierId = intval($_GET['id']);

        // Retrieve equipment stock for the selected supplier
        $equipmentStock = $controllers->supplier()->get_supplier_inventory_stock($supplierId);

        // Display equipment stock
        if (!empty($equipmentStock)) {
            ?>
            <h2>Supplier Stock</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Inventory ID</th>
                        <th>Supplier Name</th>
                        <th>Item Name</th>
                        <th>Item Description</th>
                        <th>Item Image</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($equipmentStock as $item) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($item['inv_id']) . '</td>';
                        echo '<td>' . htmlspecialchars($item['supName']) . '</td>';
                        
                        // Check if the 'name' key exists before accessing it
                        echo '<td>' . (isset($item['equipment_name']) ? htmlspecialchars($item['equipment_name']) : '') . '</td>';
                        
                        // Check if the 'description' key exists before accessing it
                        echo '<td>' . (isset($item['equipment_description']) ? htmlspecialchars($item['equipment_description']) : '') . '</td>';
                        
                        echo '<td>' . '<img src="' . htmlspecialchars($item['image']) . '" alt="Image of ' . (isset($item['equipment_description']) ? htmlspecialchars($item['equipment_description']) : '') . '" style="max-width: 100px; height: auto;">' . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo '<p>No equipment stock available for the selected supplier.</p>';
        }
    } else {
        echo '<p>Invalid request. Please go back to the Suppliers page.</p>';
    }
    ?>
</div>