<?php
// Include the functions file for utility functions
require_once './inc/functions.php';

// Initialize a variable to store any error message from the query string
$message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the submitted form data
    $name = InputProcessor::processString($_POST['name']);
    $description = InputProcessor::processString($_POST['description']);
    $image = InputProcessor::processString($_POST['image']);
    $supplierId = intval($_POST['supplier']);
    $categoryId = intval($_POST['category']);

    // Validate all inputs
    $valid = $name['valid'] && $description['valid'] && $image['valid'] && $supplierId > 0 && $categoryId > 0;

    // Set an error message if any input is invalid
    $message = !$valid ? "Please fix the above errors:" : '';

    // If all inputs are valid, proceed with adding equipment
    if ($valid) {
        // Prepare the data for adding equipment
        $equipmentData = [
            'name' => $name['value'],
            'description' => $description['value'],
            'image' => $image['value'],
        ];

        // Call the create_equipment function to insert data into the database
        $item = $controllers->equipment()->create_equipment($equipmentData);

        // Check if the insertion was successful
        if ($item) {
            // Add the item to inv_supplier table
            $controllers->supplier()->add_item_to_supplier($item, $supplierId);

            // Add the item to inv_category table
            $controllers->category()->add_item_to_category($item, $categoryId);

            // Redirect or show a success message
            redirect("./Inventory");
        } else {
            // Set error message if adding equipment fails
            $message = "Failed to add equipment. Please try again.";
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

<?php if ($_SESSION['user_type'] === 'admin') { ?>
    <div class="container-fluid" style="padding-top: 20px; padding-left: 40px;">
        <div class="row">
            <!-- Navigation column -->
            <div class="col-md-3 nav-column">
                <ul class="nav flex-column mt-4">
                    <li>
                        <h3>Admin dashboard - Inventory</h3>
                        <p>Use these links below for extra features</p>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./edit-inventory.php" class="btn btn-primary">Inventory Management</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./inventory-removal.php" class="btn btn-primary">Remove Inventory</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="add-inventory.php" class="btn btn-primary">Add Inventory</a>
                    </li>
                </ul>
            </div>

            <!-- HTML form for adding inventory -->
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="col-md-9">
                <!-- Form content -->
                <section class="vh-100">
                    <div class="container py-5 h-75">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                                    <div class="card-body p-5 text-center">

                                        <h3 class="mb-2">Add Inventory</h3>

                                        <!-- name input field -->
                                        <div class="form-outline mb-4">
                                            <input required type="text" id="name" name="name" class="form-control form-control-lg"
                                                placeholder="Item Name" required value="<?= htmlspecialchars($name['value'] ?? '') ?>" />
                                            <!-- Display error message for name -->
                                            <span class="text-danger"><?= $name['error'] ?? '' ?></span>
                                        </div>

                                        <!-- Description input field -->
                                        <div class="form-outline mb-4">
                                            <input required type="text" id="description" name="description"
                                                class="form-control form-control-lg" placeholder="Description" required
                                                value="<?= htmlspecialchars($description['value'] ?? '') ?>" />
                                            <!-- Display error message for description -->
                                            <span class="text-danger"><?= $description['error'] ?? '' ?></span>
                                        </div>

                                        <!-- Image input field -->
                                        <div class="form-outline mb-4">
                                            <input required type="text" id="image" name="image"
                                                class="form-control form-control-lg" placeholder="Insert image address"
                                                required value="<?= htmlspecialchars($image['value'] ?? '') ?>" />
                                            <!-- Display error message for image -->
                                            <span class="text-danger"><?= $image['error'] ?? '' ?></span>
                                        </div>

                                        <!-- Supplier dropdown -->
                                        <div class="form-outline mb-4">
                                            <select class="form-control form-control-lg" id="supplier" name="supplier">
                                                <option value="" disabled selected>Select Supplier</option>
                                                <?php
                                                // Fetch all suppliers
                                                $suppliers = $controllers->supplier()->get_all_suppliers();
                                                foreach ($suppliers as $supplier) {
                                                    echo '<option value="' . $supplier['id'] . '">' . htmlspecialchars($supplier['supName']) . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <!-- Display error message for supplier -->
                                            <span class="text-danger"><?= $supplierId['error'] ?? '' ?></span>
                                        </div>

                                        <!-- Category dropdown -->
                                        <div class="form-outline mb-4">
                                            <select class="form-control form-control-lg" id="category" name="category">
                                                <option value="" disabled selected>Select Category</option>
                                                <?php
                                                // Fetch all categories
                                                $categories = $controllers->category()->get_all_categories();
                                                foreach ($categories as $category) {
                                                    echo '<option value="' . $category['id'] . '">' . htmlspecialchars($category['name']) . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <!-- Display error message for category -->
                                            <span class="text-danger"><?= $categoryId['error'] ?? '' ?></span>
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
<?php } ?>