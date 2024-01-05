<div>
    <h2>Repair Services</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Service ID</th>
                <th class="text-center">Category</th>
                <th class="text-center">Description</th>
                <th class="text-center">Price</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT s.*, c.name AS category_name FROM services s
                JOIN categories c ON s.category_id = c.category_id";
        $result = $conn->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $row["category_name"] ?></td>
                    <td><?= $row["description"] ?></td>
                    <td><?= $row["price"] ?></td>
                    <td><button class="btn btn-custom-edit" style="height:40px"
                            onclick="serviceEditForm('<?= $row['id'] ?>')">Edit</button></td>
                    <td><button class="btn btn-custom-delete" style="height:40px"
                            onclick="serviceDelete('<?= $row['id'] ?>')">Delete</button></td>
                </tr>
        <?php
                $count = $count + 1;
            }
        }
        ?>
    </table>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-custom-add" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Service
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Service</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' onsubmit="addService()" method="POST">
                        <div class="form-group">
                            <label>Category:</label>
                            <select id="category" required>
                                <option disabled selected>Select category</option>
                                <?php
                                $sql = "SELECT * FROM categories";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['category_id'] . "'>" . $row['name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service_description">Service Description:</label>
                            <input type="text" class="form-control" id="service_description" required>
                        </div>
                        <div class="form-group">
                            <label for="service_price">Service Price:</label>
                            <input type="number" class="form-control" id="service_price" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" style="height:40px">Add Service</button>
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
