<?php
// Include the functions file for necessary functions and classes
require_once './inc/functions.php';

?>
    <!-- Inventory container -->
    <div class="col-md-9">
            <div class="container mt-4">
                <h2>Inventory</h2>
                <?php
                // Retrieve all equipment data using the equipment controller
                $equipment = $controllers->equipment()->get_all_equipments();

                // Display equipment data
                if (!empty($equipment)) {
                    echo '<table class="table table-striped">';
                    echo '<thead><tr><th>Image</th><th>Name</th><th>Description</th><th>Remove</th></tr></thead>';
                    echo '<tbody>';
                    foreach ($equipment as $equip) {
                        echo '<tr>';
                        echo '<td><img src="' . htmlspecialchars($equip['image']) . '" alt="Image of ' . htmlspecialchars($equip['description']) . '" style="width: 100px; height: auto;"></td>';
                        echo '<td>' . htmlspecialchars($equip['name']) . '</td>';
                        echo '<td>' . htmlspecialchars($equip['description']) . '</td>';
                        echo '<td><button class="btn btn-danger btn-lg w-100 mb-4" type="submit">Delete</button>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                } else {
                    echo '<p>No inventory available.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
