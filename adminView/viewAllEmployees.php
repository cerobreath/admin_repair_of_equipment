<div>
  <h2>All Employees</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Username</th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact</th>
        <th class="text-center" colspan="2">Action</th>
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
          <td><button class="btn btn-custom-edit" style="height:40px"
              onclick="employeeEditForm('<?= $row['employee_id'] ?>')">Edit</button></td>
          <td><button class="btn btn-custom-delete" style="height:40px"
              onclick="employeeDelete('<?= $row['employee_id'] ?>')">Delete</button></td>
        </tr>

        <?php
        $count = $count + 1;

      }
    }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-custom-add " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Employee
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' onsubmit="addEmployee()" method="POST">
            <div class="form-group">
              <label for="name">Employee Name:</label>
              <input type="text" class="form-control" id="e_name" required>
            </div>
            <div class="form-group">
              <label for="surname">Employee Surname:</label>
              <input type="text" class="form-control" id="e_surname" required>
            </div>
            <div class="form-group">
              <label for="patronymic">Employee Patronymic:</label>
              <input type="text" class="form-control" id="e_patronymic" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" id="e_email" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" id="e_phone" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" style="height:40px">Add Employee</button>
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