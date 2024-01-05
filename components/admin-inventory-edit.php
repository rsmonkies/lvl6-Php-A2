<?php

// Include necessary files
$message = '';
require_once 'inc/functions.php';
$equipmentController = $controllers->equipment();

// Check if the action is 'edit' and an equipment ID is provided
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $equipmentId = intval($_GET['id']);

    // Fetch the equipment details
    $equipmentDetails = $equipmentController->get_equipment_by_id($equipmentId);

    // Check if the equipment exists
    if ($equipmentDetails) {
        ?>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Current Equipment Details</h5>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Name:</strong> <?= htmlspecialchars($equipmentDetails['name']) ?></li>
                                <li class="list-group-item"><strong>Description:</strong> <?= htmlspecialchars($equipmentDetails['description']) ?></li>
                                <li class="list-group-item"><strong>Image:</strong> <img src="<?= htmlspecialchars($equipmentDetails['image']) ?>" alt="Image of <?= htmlspecialchars($equipmentDetails['description']) ?>" style="max-width: 100%; height: auto;"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Equipment</h5>

                            <!-- Display any error messages here -->
                            <?php if ($message): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $message ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="edit-inventory.php?action=update">
                                <input type="hidden" name="id" value="<?= $equipmentDetails['id'] ?>">

                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?= htmlspecialchars($equipmentDetails['name']) ?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description"
                                        name="description"><?= htmlspecialchars($equipmentDetails['description']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image URL:</label>
                                    <input type="text" class="form-control" id="image" name="image"
                                        value="<?= htmlspecialchars($equipmentDetails['image']) ?>">
                                </div>

                                <button type="submit" class="btn btn-success">Update Equipment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        exit(); // Stop further execution to avoid rendering the equipment list
    } else {
        // Redirect to the equipment list with an error message
        redirect('./Inventory.php?error=Equipment not found.');
    }
}
?>