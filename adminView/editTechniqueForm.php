<div class="container p-5">
    <h4>Edit Technique Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT t.*, c.name AS category_name, e.email AS employee_email FROM technique t
                                     JOIN categories c ON t.category_id = c.category_id
                                     JOIN employees e ON t.employee_id = e.employee_id
                                     WHERE t.technique_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            ?>
            <form id="update-Technique" onsubmit="updateTechniques()" enctype='multipart/form-data'>
                <div class="form-group">
                    <label>Category:</label>
                    <select id="category">
                        <?php
                        $sqlCategories = "SELECT * FROM categories";
                        $resultCategories = $conn->query($sqlCategories);

                        if ($resultCategories->num_rows > 0) {
                            while ($rowCategory = $resultCategories->fetch_assoc()) {
                                $selected = ($row1['category_id'] == $rowCategory['category_id']) ? 'selected' : '';
                                echo "<option value='" . $rowCategory['category_id'] . "' $selected>" . $rowCategory['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="technique_description">Technique Description:</label>
                    <textarea class="form-control" id="technique_description"><?= $row1['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="employee_email">Employee Email:</label>
                    <select id="employee_email">
                        <?php
                        $sqlEmployees = "SELECT * FROM employees";
                        $resultEmployees = $conn->query($sqlEmployees);

                        if ($resultEmployees->num_rows > 0) {
                            while ($rowEmployee = $resultEmployees->fetch_assoc()) {
                                $selectedEmployee = ($row1['employee_id'] == $rowEmployee['employee_id']) ? 'selected' : '';
                                echo "<option value='" . $rowEmployee['employee_id'] . "' $selectedEmployee>" . $rowEmployee['email'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="technique_id" value="<?= $row1['technique_id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-custom-update">Update Technique</button>
                </div>
            </form>
            <?php
        }
    }
    ?>
</div>