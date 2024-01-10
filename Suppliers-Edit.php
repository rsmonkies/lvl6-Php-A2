<?php 

session_start();
?>
<?php $title = 'Admin - Supplier'; require __DIR__ . "/inc/header.php"; ?>
     
<?php
// Include the functions file for necessary functions and classes
require_once './inc/functions.php';
// Check if the action is 'update'
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    // Process the submitted form data
    $supName = isset($_POST['supName']) ? InputProcessor::processString($_POST['supName']) : null;
    $email = isset($_POST['email']) ? InputProcessor::processString($_POST['email']) : null;
    $phoneNumber = isset($_POST['phoneNumber']) ? InputProcessor::processString($_POST['phoneNumber']) : null;

    // Validate all inputs
    $valid = $supName && $email && $phoneNumber && $supName['valid'] && $email['valid'] && $phoneNumber['valid'];

    // Set an error message if any input is invalid
    $message = !$valid ? "Please fix the above errors:" : '';

    // If all inputs are valid, proceed with adding supplier
    if ($valid) {
        // Prepare the data for adding supplier
        $supplierData = [
            'supName' => $supName['value'],
            'email' => $email['value'],
            'phoneNumber' => $phoneNumber['value']
        ];

        $supplierId = intval($_POST['id']); 
        $controllers->supplier()->update_supplier($supplierId, $supplierData['supName'], $supplierData['email'], $supplierData['phoneNumber']);

        // Check if the insertion was successful
        if ($supplierId) {
            // Redirect or show a success message
            redirect("./Suppliers"); // Redirect to the supplier page or wherever needed
        } else {
            // Set error message if adding supplier fails
            $message = "Failed to add supplier. Please try again.";
        }
    }
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
                    <h3>Admin dashboard - Suppliers</h3>
                    <p>Use these links below for extra features</p>
                    <p class="text-muted">Access will be denied for regular users</p>
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
                            <th>Edit</th>
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
                                echo '<a href="Supplier-Editting.php?action=edit&id=' . $supplier['id'] . '" class="btn btn-warning btn-sm">Edit</a>';
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

<?php require __DIR__ . "/inc/footer.php"; ?>