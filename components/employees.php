<?php
// Include the functions file for necessary functions and classes
require_once './inc/functions.php';

?>

<!-- HTML for displaying the general content for all logged-in users -->
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
                    <h3>Admin dashboard - Employees</h3>
                    <p>Use these links below for extra features</p>
                    <p class="text-muted">Access will be denied for regular users</p>
                </li>
                    <li class="nav-item mb-4">
                        <a href="./Employees.php.php" class="btn btn-primary">Employee List</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Employee-Roles-Edit.php" class="btn btn-primary">Edit Employee Roles</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="./Employee-Removal.php" class="btn btn-primary">Remove Employees</a>
                    </li>
            </ul>
        </div>
        <?php } ?>

        <!-- Inventory container -->
        <div class="col-md-9">
            <div class="container mt-4">
                <h2>Employees</h2>
                <?php
                // Retrieve all members with roles data using the updated method
                    $users = $controllers->members()->get_all_members_with_roles();

                    // Display members with roles data
                    if (!empty($users)) {
                        echo '<table class="table table-striped">';
                        echo '<thead><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Roles</th></tr></thead>';
                        echo '<tbody>';
                        foreach ($users as $user) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($user['ID']) . '</td>';
                            echo '<td>' . htmlspecialchars($user['firstname']) . '</td>';
                            echo '<td>'. htmlspecialchars($user['lastname']) . '</td>';
                            echo '<td>' . htmlspecialchars($user['email']) . '</td>';
                            echo '<td>' . htmlspecialchars($user['role_names']) . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo '<p>No Employees registered.</p>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
