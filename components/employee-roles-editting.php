<?php
// Include necessary files
$message = '';
require_once './inc/functions.php';

?>
<?php
// Check if the action is 'edit' and a user ID is provided
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    // Fetch the user details
    $userDetails = $controllers->members()->get_member_by_id($userId);

    // Check if the user exists
    if ($userDetails) {
        ?>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Current User Details</h5>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>ID:</strong> <?= htmlspecialchars($userDetails['ID']) ?></li>
                                <li class="list-group-item"><strong>Name:</strong> <?= htmlspecialchars($userDetails['firstname']) ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($userDetails['email']) ?></li>
                                <li class="list-group-item"><strong>Role:</strong> <?= htmlspecialchars($userDetails['role_names'] ?? '') ?></li>
                            </ul>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit User Role</h5>
                            <form method="post" action="Employee-Roles-Edit.php?action=update">
                                <input type="hidden" name="id" value="<?= $userDetails['ID'] ?>">

                                <div class="form-group">
                                    <label for="role">Select Role:</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="1" <?= (isset($userDetails['role_id']) && $userDetails['role_id'] == 1) ? 'selected' : '' ?>>Admin</option>
                                        <option value="2" <?= (isset($userDetails['role_id']) && $userDetails['role_id'] == 2) ? 'selected' : '' ?>>Employee</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">Update User Role</button>
                            </form>
                        </div>
                    </div>
                </div>

        <?php
        exit(); // Stop further execution to avoid rendering the user list
    } else {
        // Redirect to the user list with an error message
        redirect('./Employees.php?error=User not found.');
    }
}
?>