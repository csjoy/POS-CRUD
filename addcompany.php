<?php
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
          <div class="fs-3">Add Company</div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Company</li>
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
                  echo '<div class="alert alert-danger" role="alert">Email Address field is Empty!</div>';
                } elseif (empty($comManagerName)) {
                  echo '<div class="alert alert-danger" role="alert">Phone Number field is Empty!</div>';
                } else {
                  $result = companyInput($br_id, $comName, $comAdd, $comPhone, $comEmail, $comManagerName);
                }
              }
              ?>
            </div>
            <form method="POST">
              <div class="card-body">
                <div class="mb-3 d-flex justify-content-between">
                  <label class="form-label w-25">Branch</label>
                  <select name="br_id" class="form-control w-75">
                    <?php
                    $branchData = branchData();
                    if ($branchData->num_rows > 0) {
                      while ($data = $branchData->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $data["br_id"]; ?>">
                          <?php echo $data["brName"]; ?>
                        </option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="comName" class="form-label w-25">Company Name</label>
                  <input type="text" class="form-control w-75" id="comName" name="comName">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="comAdd" class="form-label w-25">Company Address</label>
                  <input type="text" class="form-control w-75" id="comAdd" name="comAdd">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="comPhone" class="form-label w-25">Phone Number</label>
                  <input type="text" class="form-control w-75" id="comPhone" name="comPhone">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="comEmail" class="form-label w-25">Company Email</label>
                  <input type="email" class="form-control w-75" id="comEmail" name="comEmail">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="comManagerName" class="form-label w-25">Manager Name</label>
                  <input type="text" class="form-control w-75" id="comManagerName" name="comManagerName">
                </div>
              </div>
              <div class="card-footer">
                <button name="save" type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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