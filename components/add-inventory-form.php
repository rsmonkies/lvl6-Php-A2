<?php
require_once './inc/functions.php';
$message = '';
$equipmentController = $controllers->equipment();

// Check for the edit action
if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    // Retrieve the id of the equipment to be edited
    $equipmentId = $_GET['id'];

    // Redirect to the edit page with the equipment ID
    header("Location: inventory-editting.php?id=$equipmentId");
    exit;
}

// Check if the action is 'update'
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    // Process the submitted form data
    $id = intval($_POST['id']);
    $name = InputProcessor::processString($_POST['name']);
    $description = InputProcessor::processString($_POST['description']);
    $image = InputProcessor::processString($_POST['image']);

    // Validate inputs
    $valid = $name['valid'] && $description['valid'] && $image['valid'];

    if ($valid) {
        // Update the equipment
        $equipmentData = [
            'id' => $id,
            'name' => $name['value'],
            'description' => $description['value'],
            'image' => $image['value'],
        ];

        // Ensure that the 'update_equipment' method returns a boolean value indicating success
        $success = $equipmentController->update_equipment($equipmentData);

        if ($success) {
            // Redirect or show success message
            redirect('./Inventory');
        } else {
            $message = "Failed to update equipment. Please try again.";
        }
    } else {
        $message = "Please fix the above errors:";
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
<div class="container-fluid" style="padding-top: 20px; padding-left: 40px;">
    <div class="row">
        <!-- Navigation column -->
        <?php if ($_SESSION['user_type'] === 'admin'): ?>
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
        <?php endif; ?>

        <!-- Inventory Form container -->
        <div class="col-md-9">
            <!-- HTML form for adding inventory -->
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
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
                                            <input required type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Item Name" required value="<?= htmlspecialchars($name['value'] ?? '') ?>"/>
                                            <!-- Display error message for name -->
                                            <span class="text-danger"><?= $name['error'] ?? '' ?></span>
                                        </div>
                                        <!-- Description input field -->
                                        <div class="form-outline mb-4">
                                            <input required type="text" id="description" name="description" class="form-control form-control-lg" placeholder="Description" required value="<?= htmlspecialchars($description['value'] ?? '') ?>"/>
                                            <!-- Display error message for description -->
                                            <span class="text-danger"><?= $description['error'] ?? '' ?></span>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input required type="text" id="image" name="image" class="form-control form-control-lg" placeholder="Insert image address" required value="<?= htmlspecialchars($image['value'] ?? '') ?>"/>
                                            <!-- Display error message for image -->
                                            <span class="text-danger"><?= $image['error'] ?? '' ?></span>
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
</div>
