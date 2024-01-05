<div class="container p-5">
    <h4>Edit Service Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT s.*, c.name AS category_name FROM services s
                                     JOIN categories c ON s.category_id = c.category_id
                                     WHERE s.id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            ?>
            <form id="update-Services" onsubmit="updateServices()" enctype='multipart/form-data'>
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
                    <input type="text" class="form-control" id="service_id" value="<?= $row1['id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="service_description">Service Description:</label>
                    <input type="text" class="form-control" id="service_description" value="<?= $row1['description'] ?>">
                </div>
                <div class="form-group">
                    <label for="service_price">Service Price:</label>
                    <input type="number" class="form-control" id="service_price" value="<?= $row1['price'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-custom-update">Update Service</button>
                </div>
            </form>
            <?php
        }
    }
    ?>
</div>