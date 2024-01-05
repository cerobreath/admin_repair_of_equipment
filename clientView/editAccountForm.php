<div class="container p-5">

<h4>Edit Client Detail</h4>
<?php
    include_once "../config/dbconnect.php";
    $ID=$_POST['record'];
    $qry=mysqli_query($conn, "SELECT * FROM clients WHERE client_id='$ID'");
    $numberOfRow=mysqli_num_rows($qry);
    if($numberOfRow>0){
        while($row1=mysqli_fetch_array($qry)){
?>
<form id="update-Clients" onsubmit="updateClientsAccount()" enctype='multipart/form-data'>
    <div class="form-group">
        <input type="text" class="form-control" id="client_id" value="<?=$row1['client_id']?>" hidden>
    </div>
    <div class="form-group">
        <label for="name">Client Name:</label>
        <input type="text" class="form-control" id="c_name" value="<?=$row1['name']?>">
    </div>
    <div class="form-group">
        <label for="surname">Client Surname:</label>
        <input type="text" class="form-control" id="c_surname" value="<?=$row1['surname']?>">
    </div>
    <div class="form-group">
        <label for="patronymic">Client Patronymic:</label>
        <input type="text" class="form-control" id="c_patronymic" value="<?=$row1['patronymic']?>">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="c_email" value="<?=$row1['email']?>">
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="c_phone" value="<?=$row1['phone']?>">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="c_address" value="<?=$row1['address']?>">
    </div>
    <div class="form-group">
        <label for="password">New Password:</label>
        <input type="password" class="form-control" id="c_password" placeholder="Enter new password">
    </div>
    <div class="form-group">
        <button type="submit" style="height:40px" class="btn btn-custom-update">Update Client</button>
    </div>
    <?php
            }
        }
    ?>
  </form>

</div>