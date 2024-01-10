<?php
// Include necessary files
$message = '';
require_once 'inc/functions.php';
$CategoryController = $controllers->category();

// Initialize variable for category details
$categoryDetails = null;

// Check if the action is 'edit' and a category ID is provided
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $categoryId = intval($_GET['id']);

    // Fetch the category details
    $categoryDetails = $CategoryController->get_category_by_id($categoryId);

    // Check if the category exists
    if (!$categoryDetails) {
        // Redirect to the category list with an error message
        redirect('./Categories.php?error=category not found.');
    }
}

?>

<!-- Display the category details and the form -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Current category Details</h5>
                    <?php if ($categoryDetails !== null): ?>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Name:</strong> <?= htmlspecialchars($categoryDetails['name']) ?></li>
                            <li class="list-group-item"><strong>Image:</strong> <img src="<?= htmlspecialchars($categoryDetails['image']) ?>" alt="Image of <?= htmlspecialchars($categoryDetails['name']) ?>" style="max-width: 100%; height: auto;"></li>
                        </ul>
                    <?php else: ?>
                        <p>No category details available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit category</h5>

                    <!-- Display any error messages here -->
                    <?php if ($message): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="Category-Edit.php?action=update">
                        <?php if ($categoryDetails !== null): ?>
                            <input type="hidden" name="id" value="<?= $categoryDetails['id'] ?>">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?= htmlspecialchars($categoryDetails['name']) ?>">
                            </div>

                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="text" class="form-control" id="image" name="image"
                                    value="<?= htmlspecialchars($categoryDetails['image']) ?>">
                            </div>
                            <button type="submit" class="btn btn-success">Update category</button>
                        <?php else: ?>
                            <p>No category selected for editing.</p>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php
        exit(); // Stop further execution to avoid rendering the category list
?>