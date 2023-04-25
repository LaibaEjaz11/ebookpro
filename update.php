<?php
require 'config.php';

if(isset($_GET['c_id'])){
  $id = $_GET['c_id'];
  $query = "SELECT * FROM customer WHERE c_id = $id";
  $result = mysqli_query($con, $query);
  $customer = mysqli_fetch_assoc($result);
}

if(isset($_POST['update'])){
    $id = $_GET['c_id'];
    $username = $_POST['c_name'];
    $email = $_POST['c_email'];
    $contact = $_POST['contact'];
    $query = "UPDATE customer SET c_name = '$username', c_email = '$email', contact = '$contact' WHERE c_id = $id";
    $result = mysqli_query($con, $query);
    if($result){
        header('Location: http://localhost:82/ebookpro/admin/dashboard.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Customer</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="mt-5 row justify-content-center">
            <div class="col-5">
            
    <h2>Update Customer Data</h2>
    <form method="POST">
        <label>Name</label>
        <input type="text" class="form-control" name="c_name" value="<?php echo $customer['c_name']; ?>"><br>
        <label>Email</label>
        <input type="email"  name="c_email"  class="form-control" value="<?php echo $customer['c_email']; ?>"><br>
        <label>Contact</label>
        <input type="text" name="contact"  class="form-control" value="<?php echo $customer['contact']; ?>"><br>
        <input type="submit"  class="mt-2 btn btn-primary btn-outline-light" name="update" value="Update">
    </form>
            </div>
        </div>
    </div>
</body>
</html>
