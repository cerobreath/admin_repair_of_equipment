<div>
    <h2>Repair Techniques</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Technique ID</th>
                <th class="text-center">Category</th>
                <th class="text-center">Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Employee Email</th>
                <th class="text-center">Client Email</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT t.*, c.name AS category_name, e.email AS employee_email, cl.email AS client_email
        FROM technique t
        JOIN categories c ON t.category_id = c.category_id
        JOIN employees e ON t.employee_id = e.employee_id
        LEFT JOIN order_techniques ot ON t.technique_id = ot.technique_id
        LEFT JOIN orders o ON ot.order_id = o.order_id
        LEFT JOIN clients cl ON o.client_id = cl.client_id
        ORDER BY c.category_id";
        
        $result = $conn->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?= $count ?>
                    </td>
                    <td>
                        <?= $row["category_name"] ?>
                    </td>
                    <td>
                        <?= $row["name"] ?>
                    </td>
                    <td>
                        <?= $row["description"] ?>
                    </td>
                    <td>
                        <?= $row["employee_email"] ?>
                    </td>
                    <td>
                        <?= $row["client_email"] ?>
                    </td>
                    <td>
                        <button class="btn btn-custom-edit" style="height:40px"
                            onclick="techniqueEditForm('<?= $row['technique_id'] ?>')">Edit</button>
                    </td>
                    <td>
                        <button class="btn btn-custom-delete" style="height:40px"
                            onclick="techniqueDelete('<?= $row['technique_id'] ?>')">Delete</button>
                    </td>
                </tr>
                <?php
                $count = $count + 1;
            }
        }
        ?>
    </table>

    <button type="button" class="btn btn-custom-add" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Technique
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Technique</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' onsubmit="addTechnique()" method="POST">
                        <div class="form-group">
                            <label>Category:</label>
                            <select id="category" required>
                                <option disabled selected>Select category</option>
                                <?php
                                $sqlCategories = "SELECT * FROM categories";
                                $resultCategories = $conn->query($sqlCategories);

                                if ($resultCategories->num_rows > 0) {
                                    while ($rowCategory = $resultCategories->fetch_assoc()) {
                                        echo "<option value='" . $rowCategory['category_id'] . "'>" . $rowCategory['name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="technique_name">Technique Name:</label>
                            <input type="text" class="form-control" id="technique_name" required>
                        </div>
                        <div class="form-group">
                            <label for="technique_description">Technique Description:</label>
                            <textarea class="form-control" id="technique_description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="employee_email">Employee Email:</label>
                            <select id="employee_email" required>
                                <?php
                                $sqlEmployees = "SELECT * FROM employees";
                                $resultEmployees = $conn->query($sqlEmployees);

                                if ($resultEmployees->num_rows > 0) {
                                    while ($rowEmployee = $resultEmployees->fetch_assoc()) {
                                        echo "<option value='" . $rowEmployee['employee_id'] . "'>" . $rowEmployee['email'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" style="height:40px">Add Technique</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>