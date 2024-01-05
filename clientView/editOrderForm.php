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
            <form id="update-Orders" onsubmit="updateClientOrders()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="order_id" value="<?= $row['order_id'] ?>" hidden>
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
                    <button type="submit" style="height:40px" class="btn btn-custom-update">Update Order</button>
                </div>
            </form>
            <?php
        }
    }
    ?>

</div>
