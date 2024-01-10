<?php
// Include the functions file for utility functions
require_once './inc/functions.php';

// Initialize a variable to store any error message from the query string
$message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        // Call the add_supplier function to insert data into the database
        $supplierId = $controllers->supplier()->add_supplier($supplierData['supName'], $supplierData['email'], $supplierData['phoneNumber']);

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
                        <a href="./Suppliers-Removal.php" class="btn btn-primary">Remove Suppliers</a>
                    </li>
            </ul>
        </div>
        <?php } ?>

            <!-- HTML form for adding suppliers -->
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="col-md-9">
                <!-- Form content -->
                <section class="vh-100">
                    <div class="container py-5 h-75">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                                    <div class="card-body p-5 text-center">

                                        <h3 class="mb-2">Add Supplier</h3>

                                          <!-- Supplier name input field -->
                                            <div class="form-outline mb-4">
                                                <input required type="text" id="supName" name="supName" class="form-control form-control-lg"
                                                    placeholder="Supplier Name" required value="<?= htmlspecialchars($supplierData['supName'] ?? '') ?>" />
                                                <!-- Display error message for supplierName -->
                                                <span class="text-danger"><?= $supplierData['error'] ?? '' ?></span>
                                            </div>

                                            <!-- Email input field -->
                                            <div class="form-outline mb-4">
                                                <input required type="email" id="email" name="email" class="form-control form-control-lg"
                                                    placeholder="Email" required value="<?= htmlspecialchars($supplierData['email'] ?? '') ?>" />
                                                <!-- Display error message for email -->
                                                <span class="text-danger"><?= $supplierData['error'] ?? '' ?></span>
                                            </div>

                                            <!-- Phone number input field -->
                                            <div class="form-outline mb-4">
                                                <input required type="text" id="phoneNumber" name="phoneNumber" class="form-control form-control-lg"
                                                    placeholder="Phone Number" required value="<?= htmlspecialchars($supplierData['phoneNumber'] ?? '') ?>" />
                                                <!-- Display error message for phoneNumber -->
                                                <span class="text-danger"><?= $supplierData['error'] ?? '' ?></span>
                                            </div>

                                        <!-- Submit button -->
                                        <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Submit</button>

                                        <!-- Display message if set -->
                                        <?php if ($message): ?>
                                            <div class="alert alert-danger mt-4" role="alert">
                                                <?= $message ?? '' ?>
                                            </div>
                                        <?php endif ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
