<?php
require 'config.php';

$cat_id = null;
if(isset($_GET['cat_id'])){
  $cat_id = $_GET['cat_id'];
  $fetch_sql = "SELECT * FROM categories WHERE cat_id = '{$cat_id}'";
  $res = mysqli_query($con,$fetch_sql);
  $total_rows = mysqli_num_rows($res);
} else {
  $total_rows = 0;
}

if(isset($_POST['update'])){
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['cat_name'];
    $cat_status = $_POST['catstatus'];
    $update_sql = "UPDATE categories SET cat_name = '{$cat_name}', cat_status = '{$cat_status}' WHERE cat_id = '{$cat_id}'";
    $result = mysqli_query($con,$update_sql);
    if($result){
        header('Location:http://localhost:82/ebookpro/admin/category.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="mt_5 row justify-content-center">
            <div class="col-5">
                <h2 class="text-center">Update Categories</h2>
                  <?php
                  if($total_rows!=0){
                    while($data = mysqli_fetch_assoc($res)){
                  ?>  
                          <form method="POST">
                <input type="hidden" name="cat_id" value="<?php echo $data['cat_id'] ?>">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data['cat_id']?>" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="cat_name" class="form-control" value = "<?php echo $data['cat_name']?>">
                  </div>
                </div>
     
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Category Status</label>
                  <div class="col-sm-10">
                   <select name="catstatus" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                   </select>
                  </div>
                </div>

                <input type="submit" name="update" class="mt-2 btn btn-primary btn-outline-light" value="Update Record">
              </form>         
                         
                <?php
                    }
                 }
                ?>
            </div>
        </div>
    </div>
    <?php
// require '
//  'config.php';

// if(isset($_POST['update'])){
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $pass = $_POST['pass'];
//     $contact = $_POST['contact'];
//     $update_sql = "UPDATE empreg SET name = '{$username}', email = '{$email}', pass = '{$pass}', contact ='{$contact}' WHERE id = '{$id}'";
//     $result = mysqli_query($con,$update_sql);
//     if($result){
//         header('Location: http://localhost:82/CRUD/view.php');
//         exit();
//     }
// }
?>
</body>
</html>