<div>
  <h2>Categories of Equipment</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Category Name</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * FROM categories";
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
          </td>
        <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>