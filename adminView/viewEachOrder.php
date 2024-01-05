<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Category</th>
                <th>Technique Name</th>
                <th>Technique Description</th>
                <th>Employee Email</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $orderID = $_GET['orderID'];

        $sql = "SELECT t.*, c.name AS category_name, e.email AS employee_email
                FROM order_techniques ot
                JOIN technique t ON ot.technique_id = t.technique_id
                JOIN categories c ON t.category_id = c.category_id
                JOIN employees e ON t.employee_id = e.employee_id
                WHERE ot.order_id = $orderID";

        $result = $conn->query($sql);
        $count = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $row["category_name"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["description"] ?></td>
                    <td><?= $row["employee_email"] ?></td>
                </tr>
                <?php
                $count = $count + 1;
            }
        } else {
            echo "No techniques found for this order.";
        }
        ?>
    </table>
</div>