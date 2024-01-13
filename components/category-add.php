<?php
// Include the functions file for utility functions
require_once './inc/functions.php';

// Initialize a variable to store any error message from the query string
$message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the submitted form data
    $name = isset($_POST['name']) ? InputProcessor::processString($_POST['name']) : null;
    $image = isset($_POST['image']) ? InputProcessor::processString($_POST['image']) : null;


    // Validate all inputs
    $valid = $name && $image && $name['valid'] && $image['valid'];

    // Set an error message if any input is invalid
    $message = !$valid ? "Please fix the above errors:" : '';

    // If all inputs are valid, proceed with adding Category
    if ($valid) {
        // Prepare the data for adding Category
        $categoryData = [
            'name' => $name['value'],
            'image' => $image['value'],
        ];

        // Call the add_Category function to insert data into the database
        $categoryId = $controllers->category()->add_category($categoryData['name'], $categoryData['image']);

        // Check if the insertion was successful
        if ($categoryId) {
            // Redirect or show a success message
            redirect("./Categories"); // Redirect to the Category page or wherever needed
        } else {
            // Set error message if adding Category fails
            $message = "Failed to add Category. Please try again.";
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

            <!-- HTML form for adding categories -->
            <?php if ($_SESSION['user_type'] === 'admin') {?>
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="col-md-9">
                <!-- Form content -->
                <section class="vh-100">
                    <div class="container py-5 h-75">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                                    <div class="card-body p-5 text-center">

                                        <h3 class="mb-2">Add Category</h3>

                                          <!-- Category name input field -->
                                            <div class="form-outline mb-4">
                                                <input required type="text" id="name" name="name" class="form-control form-control-lg"
                                                    placeholder="Category Name" required value="<?= htmlspecialchars($categoryData['name'] ?? '') ?>" />
                                                <!-- Display error message for category name -->
                                                <span class="text-danger"><?= $categoryData['error'] ?? '' ?></span>
                                            </div>

                                            <!-- image input field -->
                                            <div class="form-outline mb-4">
                                                <input required type="text" id="image" name="image" class="form-control form-control-lg"
                                                    placeholder="Image" required value="<?= htmlspecialchars($categoryData['image'] ?? '') ?>" />
                                                <!-- Display error message for image -->
                                                <span class="text-danger"><?= $categoryData['error'] ?? '' ?></span>
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