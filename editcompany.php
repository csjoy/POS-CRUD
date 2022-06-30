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
          <div class="fs-3">Edit Company</div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Company</li>
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
              include "functions/company.php";

              if (isset($_POST["save"])) {
                $br_id = $_POST["br_id"];
                $comName = $_POST["comName"];
                $comAdd = $_POST["comAdd"];
                $comPhone = $_POST["comPhone"];
                $comEmail = $_POST["comEmail"];
                $comManagerName = $_POST["comManagerName"];


                if (empty($comName)) {
                  echo '<div class="alert alert-danger" role="alert">Company Name field is Empty!</div>';
                } elseif (empty($comAdd)) {
                  echo '<div class="alert alert-danger" role="alert">Company Address field is Empty!</div>';
                } elseif (empty($comPhone)) {
                  echo '<div class="alert alert-danger" role="alert">Phone Number field is Empty!</div>';
                } elseif (empty($comEmail)) {
                  echo '<div class="alert alert-danger" role="alert">Company Email field is Empty!</div>';
                } elseif (empty($comManagerName)) {
                  echo '<div class="alert alert-danger" role="alert">Phone Number field is Empty!</div>';
                } else {
                  $id = $_GET["id"];
                  $result = editCompany($br_id, $comName, $comAdd, $comPhone, $comEmail, $comManagerName, $id);
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
                        <label class="form-label w-25">Branch</label>
                        <select name="br_id" class="form-control w-75">
                          <?php
                          $branchData = branchData();
                          if ($branchData->num_rows > 0) {
                            while ($tmp = $branchData->fetch_assoc()) {
                          ?>
                              <option value="<?php echo $tmp["br_id"]; ?>">
                                <?php echo $tmp["brName"]; ?>
                              </option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="comName" class="form-label w-25">Company Name</label>
                        <input type="text" class="form-control w-75" id="comName" name="comName" value="<?php echo $data['comName'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="comAdd" class="form-label w-25">Company Address</label>
                        <input type="text" class="form-control w-75" id="comAdd" name="comAdd" value="<?php echo $data['comAdd'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="comPhone" class="form-label w-25">Phone Number</label>
                        <input type="text" class="form-control w-75" id="comPhone" name="comPhone" value="<?php echo $data['comAdd'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="comEmail" class="form-label w-25">Email Address</label>
                        <input type="email" class="form-control w-75" id="comEmail" name="comEmail" value="<?php echo $data['comEmail'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="comManagerName" class="form-label w-25">Manager Name</label>
                        <input type="text" class="form-control w-75" id="comManagerName" name="comManagerName" value="<?php echo $data['comManagerName'] ?>">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button name="save" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
              <?php
                }
              } else {
                header("location :managecustomer.php");
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