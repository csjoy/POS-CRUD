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
          <div class="fs-3">Add Customer</div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Customer</li>
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
              include "functions/customer.php";

              if (isset($_POST["save"])) {
                $br_id = $_POST["br_id"];
                $cusName = $_POST["cusName"];
                $cusAdd = $_POST["cusAdd"];
                $cusEmail = $_POST["cusEmail"];
                $cusPhoneNumber = $_POST["cusPhoneNumber"];

                if (empty($cusName)) {
                  echo '<div class="alert alert-danger" role="alert">Customer Name field is Empty!</div>';
                } elseif (empty($cusAdd)) {
                  echo '<div class="alert alert-danger" role="alert">Customer Address field is Empty!</div>';
                } elseif (empty($cusPhoneNumber)) {
                  echo '<div class="alert alert-danger" role="alert">Phone Number field is Empty!</div>';
                } else {
                  $result = customerInput($br_id, $cusName, $cusAdd, $cusEmail, $cusPhoneNumber);
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
                  <label for="cusName" class="form-label w-25">Customer Name</label>
                  <input type="text" class="form-control w-75" id="cusName" name="cusName">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="cusAdd" class="form-label w-25">Customer Address</label>
                  <input type="text" class="form-control w-75" id="cusAdd" name="cusAdd">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="cusEmail" class="form-label w-25">Customer Email</label>
                  <input type="email" class="form-control w-75" id="cusEmail" name="cusEmail">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="cusPhoneNumber" class="form-label w-25">Phone Number</label>
                  <input type="text" class="form-control w-75" id="cusPhoneNumber" name="cusPhoneNumber">
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