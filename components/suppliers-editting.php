<?php
// Include necessary files
$message = '';
require_once 'inc/functions.php';
$SupplierController = $controllers->supplier();

// Initialize variable for supplier details
$supplierDetails = null;

// Check if the action is 'edit' and a supplier ID is provided
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $supplierId = intval($_GET['id']);

    // Fetch the supplier details
    $supplierDetails = $SupplierController->get_supplier_by_id($supplierId);

    // Check if the supplier exists
    if (!$supplierDetails) {
        // Redirect to the supplier list with an error message
        redirect('./Suppliers.php?error=Supplier not found.');
    }
}

?>

<!-- Display the supplier details and the form -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Current Supplier Details</h5>
                    <?php if ($supplierDetails !== null): ?>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Name:</strong> <?= htmlspecialchars($supplierDetails['supName']) ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($supplierDetails['email']) ?></li>
                            <li class="list-group-item"><strong>Phone Number:</strong> <?= htmlspecialchars($supplierDetails['phoneNumber']) ?></li>
                        </ul>
                    <?php else: ?>
                        <p>No supplier details available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Supplier</h5>

                    <!-- Display any error messages here -->
                    <?php if ($message): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="Suppliers-Edit.php?action=update">
                        <?php if ($supplierDetails !== null): ?>
                            <input type="hidden" name="id" value="<?= $supplierDetails['id'] ?>">
                            <div class="form-group">
                                <label for="supName">Name:</label>
                                <input type="text" class="form-control" id="supName" name="supName"
                                    value="<?= htmlspecialchars($supplierDetails['supName']) ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= htmlspecialchars($supplierDetails['email']) ?>">
                            </div>

                            <div class="form-group">
                                <label for="phoneNumber">Phone Number:</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                    value="<?= htmlspecialchars($supplierDetails['phoneNumber']) ?>">
                            </div>

                            <button type="submit" class="btn btn-success">Update Supplier</button>
                        <?php else: ?>
                            <p>No supplier selected for editing.</p>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php
        exit(); // Stop further execution to avoid rendering the supplier list
?>