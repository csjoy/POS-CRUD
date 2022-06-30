<?php
ob_start();
include "layouts/header.php";
if (!isset($_SESSION["name"])) {
  header("location: index.php");
}
?>
<?php include "layouts/navbar.php" ?>
<?php include "layouts/sidebar.php" ?>

<!-- Main content -->
<main class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <div class="fs-3">Edit Branch</div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Branch</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row g-4">
        <!-- Start column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <?php
              include "functions/branch.php";

              if (isset($_POST["save"])) {
                $brName = $_POST["brName"];
                $brLocation = $_POST["brLocation"];
                $brManager = $_POST["brManager"];
                $brPhone = $_POST["brPhone"];
                $brEmail = $_POST["brEmail"];

                if (empty($brName)) {
                  echo '<div class="alert alert-danger" role="alert">Branch Name field is Empty!</div>';
                } elseif (empty($brLocation)) {
                  echo '<div class="alert alert-danger" role="alert">Branch Location field is Empty!</div>';
                } elseif (empty($brManager)) {
                  echo '<div class="alert alert-danger" role="alert">Branch Manager field is Empty!</div>';
                } elseif (empty($brPhone)) {
                  echo '<div class="alert alert-danger" role="alert">Phone Number field is Empty!</div>';
                } elseif (empty($brEmail)) {
                  echo '<div class="alert alert-danger" role="alert">Email Address field is Empty!</div>';
                } else {
                  $id = $_GET["id"];
                  $result = editBranch($brName, $brLocation, $brManager, $brPhone, $brEmail, $id);
                  echo $result;
                }
              }
              if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $result = getDataById($id);
                while ($data = $result->fetch_assoc()) {
              ?>
                  <form method="POST">
                    <div class="card-body">
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="brName" class="form-label w-25">Branch Name</label>
                        <input type="text" class="form-control w-75" id="brName" name="brName" value="<?php echo $data['brName'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="brLocation" class="form-label w-25">Branch Location</label>
                        <input type="text" class="form-control w-75" id="brLocation" name="brLocation" value="<?php echo $data['brLocation'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="brManager" class="form-label w-25">Branch Manager</label>
                        <input type="text" class="form-control w-75" id="brManager" name="brManager" value="<?php echo $data['brManager'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="brPhone" class="form-label w-25">Phone Number</label>
                        <input type="text" class="form-control w-75" id="brPhone" name="brPhone" value="<?php echo $data['brPhone'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="brEmail" class="form-label w-25">Email Address</label>
                        <input type="email" class="form-control w-75" id="brEmail" name="brEmail" value="<?php echo $data['brEmail'] ?>">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button name="save" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
              <?php
                }
              } else {
                header("location :managebranch.php");
              }
              ?>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</main>
<!-- /.content-wrapper -->

<?php include "layouts/footer.php"; ?>