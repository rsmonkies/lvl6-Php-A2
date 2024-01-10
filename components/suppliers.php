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

<!-- Supplier container -->
<div class="col-md-9">
    <div class="container mt-4">
        <h2>Suppliers</h2>

        <?php
        // Retrieve all suppliers
        $suppliers = $controllers->supplier()->get_all_suppliers();
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Supplier Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Stock we get</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display suppliers
                if (!empty($suppliers)) {
                    foreach ($suppliers as $supplier) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($supplier['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($supplier['supName']) . '</td>';
                        echo '<td>' . htmlspecialchars($supplier['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($supplier['phoneNumber']) . '</td>';
                        echo '<td>';
                        echo '<a href="Supplier-Stock-Viewing.php?action=view&id=' . $supplier['id'] . '" class="btn btn-primary btn-sm">View Stock</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No suppliers registered.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
