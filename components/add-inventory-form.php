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

    // Validate all inputs
    $valid = $name['valid'] && $description['valid'] && $image['valid'];

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
            // Redirect or show a success message
            redirect("./Inventory");
        } else {
            // Set error message if adding equipment fails
            $message = "Failed to add equipment. Please try again.";
        }
    }
}
?>
<!-- HTML form for login -->
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
                <input requiredtype="text" id="name" name="name" class="form-control form-control-lg" placeholder="Item Name" required value="<?= htmlspecialchars($name['value'] ?? '') ?>"/>
                  <!-- Display error message for name -->
                  <span class="text-danger"><?= $email['error'] ?? '' ?></span>
                </div>
  
              <!-- Description input field -->
              <div class="form-outline mb-4">
                <input requiredtype="text" id="description" name="description" class="form-control form-control-lg" placeholder="Description" required value="<?= htmlspecialchars($description['value'] ?? '') ?>"/>
                  <!-- Display error message for description -->
                  <span class="text-danger"><?= $password['error'] ?? '' ?></span>
                </div>
                

                <div class="form-outline mb-4">
                <input requiredtype="text" id="image" name="image" class="form-control form-control-lg" placeholder="Insert image address" required value="<?= htmlspecialchars($image['value'] ?? '') ?>"/>
                  <!-- Display error message for image -->
                  <span class="text-danger"><?= $password['error'] ?? '' ?></span>
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