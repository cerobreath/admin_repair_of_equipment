<div>
    <h2>Repair Services</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Service ID</th>
                <th class="text-center">Category</th>
                <th class="text-center">Description</th>
                <th class="text-center">Price</th>
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
                </tr>
        <?php
                $count = $count + 1;
            }
        }
        ?>
    </table>