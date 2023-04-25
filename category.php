<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php
require 'header.inc.php';
require 'function.inc.php';
if(isset($_GET['type']) && $_GET['type']!=''){
  $type = getsafe($con,$_GET['type']);
  $operation = getsafe($con,$_GET['operation']);
  if($type=='status'){
    $id = getsafe($con,$_GET['id']);
    if($operation=='active'){
      $status = 1;
    }
    else{
      $status = 0;
    }
    $update_status = "UPDATE categories SET cat_status = '{$status}' WHERE cat_id ='{$id}'";
    $res_status = mysqli_query($con,$update_status);
    if($res_status){
      echo "<script>window.location.href='http://localhost:82/ebookpro/admin/category.php'</script>";
    }
  }
}

$fetch_cat = "SELECT * FROM categories";
$res_cat = mysqli_query($con,$fetch_cat);
$total_rows = mysqli_num_rows($res_cat);





require 'sidebar.inc.php';
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <a href="add_category.php" role="button" class="mt-3 mb-3 btn btn-primary btn-outline-light">Add Categories</a>
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories </h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Status</th>
                    <th scope="col">Category Update</th>
                    <th scope="col">Category Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($total_rows!=0){
                    while($data = mysqli_fetch_assoc($res_cat)){
                      
                  ?>
                  <tr>
                    <th scope="row"><?php echo $data['cat_id']?></th>
                    <td><?php echo $data['cat_name']?></td>
                    <td>
                      <?php
                      if($data['cat_status']=='1'){
                        echo "<a role='button' class='btn btn-primary btn-outline-light' href='?type=status&&operation=deactive&id=".$data['cat_id']."'>Active</a>";
                      }
                      else{
                        echo "<a role='button' class='btn btn-primary btn-outline-light' href='?type=status&&operation=active&id=".$data['cat_id']."'>Deactive</a>";
                      }
                      ?>
                    </td>
                    <td>
                            <a href="update_cat.php?cat_id=<?php echo $data['cat_id']?>" class="btn btn-success btn-outline-light" role="button">Update</a>
                        </td>
                        <td>
                        <a href="delete_cat.php?cat_id=<?php echo $data['cat_id']?>" class="btn btn-danger btn-outline-light" role="button">Delete</a>
                        </td>
                  </tr>
                  <?php
                    }
                  }?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>