<?php
include "layouts/header.php";
if (!isset($_SESSION["name"])) {
  header("location: index.php");
  exit();
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
          <div class="fs-3">Manage Employee</div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Employee</li>
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
          <div class="card p-3">
            <table id="myTable" class="table table-striped w-100">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>BranchID</th>
                  <th>Name</th>
                  <th>Design</th>
                  <th>Addr</th>
                  <th>Nid</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Join</th>
                  <th>Salary</th>
                  <th>Pass</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "functions/employee.php";

                $result = extractData();
                $sl = 1;
                if ($result->num_rows > 0) {
                  while ($data = $result->fetch_assoc()) {
                ?>
                    <tr>
                      <td><?php echo $sl ?></td>
                      <td><?php echo $data["br_id"] ?></td>
                      <td><?php echo $data["emName"] ?></td>
                      <td><?php echo $data["emDesignation"] ?></td>
                      <td><?php echo $data["emAdd"] ?></td>
                      <td><?php echo $data["emNid"] ?></td>
                      <td><?php echo $data["emPhone"] ?></td>
                      <td><?php echo $data["emEmail"] ?></td>
                      <td><?php echo $data["emJoiningDate"] ?></td>
                      <td><?php echo $data["emSalary"] ?></td>
                      <td><?php echo $data["pass"] ?></td>
                      <td>
                        <a class="btn btn-info btn-sm" href="editemployee.php?id=<?php echo $data["em_id"] ?>"><i class="fas fa-edit"></i></a>

                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $data["em_id"] ?>"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="delete<?php echo $data["em_id"] ?>" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete this user?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="deleteemployee.php?id=<?php echo $data["em_id"] ?>" type="button" class="btn btn-danger">Confirm</a>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php
                    $sl++;
                  }
                } else {
                  echo "Data Not Found";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</main>
<!-- /.content-wrapper -->

<?php include "layouts/footer.php"; ?>