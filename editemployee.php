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
          <div class="fs-3">Edit Employee</div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
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
              include "functions/employee.php";

              if (isset($_POST["save"])) {
                $br_id = $_POST["br_id"];
                $emDesignation = $_POST["emDesignation"];
                $emName = $_POST["emName"];
                $emAdd = $_POST["emAdd"];
                $emNid = $_POST["emNid"];
                $emPhone = $_POST["emPhone"];
                $emEmail = $_POST["emEmail"];
                $emJoiningDate = $_POST["emJoiningDate"];
                $emSalary = $_POST["emSalary"];
                $pass = $_POST["pass"];
                $true = false;

                if (empty($emDesignation)) {
                  echo '<div class="alert alert-danger" role="alert">Designation field is Empty!</div>';
                } elseif (empty($emName)) {
                  echo '<div class="alert alert-danger" role="alert">Employee Name field is Empty!</div>';
                } elseif (empty($emAdd)) {
                  echo '<div class="alert alert-danger" role="alert">Employee Address field is Empty!</div>';
                } elseif (empty($emNid)) {
                  echo '<div class="alert alert-danger" role="alert">Employee Nid field is Empty!</div>';
                } elseif (empty($emPhone)) {
                  echo '<div class="alert alert-danger" role="alert">Employee Phone field is Empty!</div>';
                } elseif (empty($emEmail)) {
                  echo '<div class="alert alert-danger" role="alert">Employee Email field is Empty!</div>';
                } elseif (empty($emJoiningDate)) {
                  echo '<div class="alert alert-danger" role="alert">Employee Joining Date is Empty!</div>';
                } elseif (empty($emSalary)) {
                  echo '<div class="alert alert-danger" role="alert">Employee Salary field is Empty!</div>';
                } elseif (empty($pass)) {
                  echo '<div class="alert alert-danger" role="alert">Password field is Empty!</div>';
                } else {
                  $id = $_GET["id"];
                  $result = editEmployee($br_id, $emDesignation, $emName, $emAdd, $emNid, $emPhone, $emEmail, $emJoiningDate, $emSalary, $pass, $id);
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
                        <label for="emDesignation" class="form-label w-25">Employee Designation</label>
                        <input type="text" class="form-control w-75" id="emDesignation" name="emDesignation" value="<?php echo $data['emDesignation'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="emName" class="form-label w-25">Employee Name</label>
                        <input type="text" class="form-control w-75" id="emName" name="emName" value="<?php echo $data['emName'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="emAdd" class="form-label w-25">Employee Address</label>
                        <input type="text" class="form-control w-75" id="emAdd" name="emAdd" value="<?php echo $data['emAdd'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="emNid" class="form-label w-25">NID Number</label>
                        <input type="text" class="form-control w-75" id="emNid" name="emNid" value="<?php echo $data['emNid'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="emPhone" class="form-label w-25">Phone Number</label>
                        <input type="text" class="form-control w-75" id="emPhone" name="emPhone" value="<?php echo $data['emPhone'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="emEmail" class="form-label w-25">Email Address</label>
                        <input type="email" class="form-control w-75" id="emEmail" name="emEmail" value="<?php echo $data['emEmail'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="emJoiningDate" class="form-label w-25">Joining Date</label>
                        <input type="date" class="form-control w-75" id="emJoiningDate" name="emJoiningDate" value="<?php echo $data['emJoiningDate'] ?>">
                      </div>
                      <div class="mb-3 d-flex justify-content-between">
                        <label for="emSalary" class="form-label w-25">Employee Salary</label>
                        <input type="text" class="form-control w-75" id="emSalary" name="emSalary" value=" <?php echo $data['emSalary'] ?>"">
                      </div>
                      <div class=" mb-3 d-flex justify-content-between">
                        <label for="pass" class="form-label w-25">Password</label>
                        <input type="password" class="form-control w-75" id="pass" name="pass" value="<?php echo $data['pass'] ?>">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button name="save" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
              <?php
                }
              } else {
                header("location :manageemployee.php");
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