<?php
session_start();
require_once './inc/header.php';
require_once './inc/functions.php';
$equipmentController = $controllers->equipment();

// Check for the delete action
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    // Retrieve the id of the equipment to be deleted
    $equipmentId = $_GET['id'];

    // Call a function to handle the deletion
    $equipmentController->delete_equipment($equipmentId);


    header('Location: Inventory.php');
    exit;
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
                    <h3>Admin dashboard - Inventory</h3>
                    <p>Use these links below for extra features</p>
                </li>
                <li class="nav-item mb-4">
                        <a href="./Inventory.php" class="btn btn-primary">Back to Inventory</a>
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
        <?php } ?>
<div class="container mt-4">
    <h2>Remove - Inventory</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $equipment = $equipmentController->get_all_equipments();
            foreach ($equipment as $equip): ?>
                <tr>
                    <td>
                        <img src="<?= htmlspecialchars($equip['image']) ?>" 
                            alt="Image of <?= htmlspecialchars($equip['description']) ?>" 
                            style="width: 100px; height: auto;">
                    </td>
                    <td><?= htmlspecialchars($equip['name']) ?></td>
                    <td><?= htmlspecialchars($equip['description']) ?></td>
                    <td>
                     <a href="inventory-removal.php?action=delete&id=<?= $equip['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this item?')">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . "/inc/footer.php"; ?>