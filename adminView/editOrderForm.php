<div class="container p-5">

    <h4>Edit Order Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    $orderID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM orders WHERE order_id='$orderID'");
    $numberOfRows = mysqli_num_rows($qry);

    if ($numberOfRows > 0) {
        while ($row = mysqli_fetch_array($qry)) {
            ?>
            <form id="update-Orders" onsubmit="updateOrders()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="order_id" value="<?= $row['order_id'] ?>" hidden>
                    <div class="form-group">
                        <label for="client_id">Client:</label>
                        <select class="form-control" id="client_id">
                            <?php
                            $sqlClients = "SELECT * FROM clients";
                            $resultClients = $conn->query($sqlClients);

                            while ($client = $resultClients->fetch_assoc()) {
                                $selected = ($client['client_id'] == $row['client_id']) ? 'selected' : '';
                                echo "<option value='{$client['client_id']}' $selected>{$client['email']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_date">Order Date:</label>
                        <input type="date" class="form-control" id="order_date" value="<?= $row['order_date'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="pay_method">Payment Method:</label>
                        <input type="text" class="form-control" id="pay_method" value="<?= $row['pay_method'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="technique_id">Technique:</label>
                        <select class="form-control" id="technique_id">
                            <?php
                            $sqlTechniques = "SELECT * FROM technique";
                            $resultTechniques = $conn->query($sqlTechniques);

                            while ($technique = $resultTechniques->fetch_assoc()) {
                                $selected = ($technique['technique_id'] == $row['technique_id']) ? 'selected' : '';
                                echo "<option value='{$technique['technique_id']}' $selected>{$technique['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" style="height:40px" class="btn btn-custom-update">Update Order</button>
                    </div>
            </form>
            <?php
        }
    }
    ?>

</div>