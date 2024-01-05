<?php
session_start();
?>

<div id="ordersBtn">
    <h2>Order Details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th style="width: 20%;">Technique Name</th>
                <th style="width: 40%;">Order Date</th>
                <th style="width: 20%;">Payment Method</th>
                <th>More Details</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $clientId = $_SESSION['client_id'];  // Assuming client_id is stored in the session
        $sql = "SELECT o.*
                FROM orders o
                WHERE o.client_id = $clientId";
        $result = $conn->query($sql);

        $count = 1; // Counter
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orderTechniquesQuery = "SELECT t.name AS technique_name
                                FROM order_techniques ot
                                JOIN technique t ON ot.technique_id = t.technique_id
                                WHERE ot.order_id = " . $row["order_id"];
                $orderTechniquesResult = $conn->query($orderTechniquesQuery);
                $techniqueNames = [];

                if ($orderTechniquesResult->num_rows > 0) {
                    while ($techniqueRow = $orderTechniquesResult->fetch_assoc()) {
                        $techniqueNames[] = $techniqueRow["technique_name"];
                    }
                }

                ?>
                <tr>
                    <td>
                        <?= $count++ ?>
                    </td>

                    <td>
                        <?= implode(', ', $techniqueNames) ?>
                    </td>
                    <td>
                        <?= $row["order_date"] ?>
                    </td>
                    <td>
                        <?= $row["pay_method"] ?>
                    </td>
                    <td>
                        <a class="btn btn-secondary openPopup"
                            data-href="./adminView/viewEachOrder.php?orderID=<?= $row['order_id'] ?>"
                            href="javascript:void(0);">View</a>
                    </td>
                    <td>
                        <button class="btn btn-custom-edit" style="height:40px"
                            onclick="orderClientEditForm('<?= $row['order_id'] ?>')">Edit</button>
                    </td>
                    <td>
                        <button class="btn btn-custom-edit" style="height:40px"
                            onclick="orderClientDelete('<?= $row['order_id'] ?>')">Delete</button>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="order-view-modal modal-body"></div>
        </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
</div>

<script>
    // for view order modal
    $(document).ready(function () {
        $('.openPopup').on('click', function () {
            var dataURL = $(this).attr('data-href');

            $('.order-view-modal').load(dataURL, function () {
                $('#viewModal').modal({ show: true });
            });
        });
    });

    function ChangeOrderStatus(id) {
        $.ajax({
            url: "./controller/updateOrderStatus.php",
            method: "post",
            data: { record: id },
            success: function (data) {
                alert('Order Status updated successfully');
                disableStatusButtons(id, 'order_status');
                showOrderItems();
            }
        });
    }

    function ChangePay(id) {
        $.ajax({
            url: "./controller/updatePayStatus.php",
            method: "post",
            data: { record: id },
            success: function (data) {
                alert('Payment Status updated successfully');
                disableStatusButtons(id, 'pay_status');
                showOrderItems();
            }
        });
    }

    function disableStatusButtons(id, statusType) {
        // Disable the buttons based on the updated status
        var statusButtons = $('[data-record="' + id + '"][data-status-type="' + statusType + '"]');

        statusButtons.prop('disabled', true);
    }
</script>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-custom-add" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Order
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Order</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype='multipart/form-data' onsubmit="addOrderClient()" method="POST">

                    <div class="form-group">
                        <label for="order_date">Order Date:</label>
                        <input type="date" class="form-control" id="order_date" name="order_date" required>
                    </div>
                    <div class="form-group">
                        <label for="pay_method">Payment Method:</label>
                        <input type="text" class="form-control" id="pay_method" name="pay_method" required>
                    </div>

                    <div class="form-group">
                        <label>Technique:</label>
                        <select id="technique_id" name="technique_id" required>
                            <option disabled selected>Select technique</option>
                            <?php
                            $sqlTechniques = "SELECT * FROM technique";
                            $resultTechniques = $conn->query($sqlTechniques);

                            if ($resultTechniques->num_rows > 0) {
                                while ($rowTechnique = $resultTechniques->fetch_assoc()) {
                                    echo "<option value='" . $rowTechnique['technique_id'] . "'>" . $rowTechnique['name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" style="height:40px">Add Order</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
            </div>
        </div>
    </div>
</div>