<div>
  <h2>All Employees</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Username</th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * from employees";
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
            <?= $row["name"] ?>
            <?= $row["surname"] ?>
            <?= $row["patronymic"] ?>
          </td>
          <td>
            <?= $row["email"] ?>
          </td>
          <td>
            <?= $row["phone"] ?>
          </td>
        </tr>

        <?php
        $count = $count + 1;

      }
    }
    ?>
  </table>
</div>