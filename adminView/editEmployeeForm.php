<div class="container p-5">

<h4>Edit Employee Detail</h4>
<?php
    include_once "../config/dbconnect.php";
    $ID=$_POST['record'];
    $qry=mysqli_query($conn, "SELECT * FROM employees WHERE employee_id='$ID'");
    $numberOfRow=mysqli_num_rows($qry);
    if($numberOfRow>0){
        while($row1=mysqli_fetch_array($qry)){
?>
<form id="update-Employees" onsubmit="updateEmployees()" enctype='multipart/form-data'>
    <div class="form-group">
      <input type="text" class="form-control" id="employee_id" value="<?=$row1['employee_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Employee Name:</label>
      <input type="text" class="form-control" id="e_name" value="<?=$row1['name']?>">
    </div>
    <div class="form-group">
      <label for="surname">Employee Surname:</label>
      <input type="text" class="form-control" id="e_surname" value="<?=$row1['surname']?>">
    </div>
    <div class="form-group">
      <label for="patronymic">Employee Patronymic:</label>
      <input type="text" class="form-control" id="e_patronymic" value="<?=$row1['patronymic']?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="e_email" value="<?=$row1['email']?>">
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="e_phone" value="<?=$row1['phone']?>">
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-custom-update">Update Employee</button>
    </div>
    <?php
            }
        }
    ?>
  </form>

</div>
