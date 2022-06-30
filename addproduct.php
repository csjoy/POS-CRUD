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
          <div class="fs-3">Add Product</div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
              include "functions/product.php";

              if (isset($_POST["save"])) {
                $br_id = $_POST["br_id"];
                $proBarcode = $_POST["proBarcode"];
                $proName = $_POST["proName"];
                $proDes = $_POST["proDes"];
                $proType = $_POST["proType"];
                $proSize = $_POST["proSize"];
                $proCostPrice = $_POST["proCostPrice"];
                $proSalePrice = $_POST["proSalePrice"];
                $quantity = $_POST["quantity"];




                if (empty($proBarcode)) {
                  echo '<div class="alert alert-danger" role="alert">Barcode field is Empty!</div>';
                } elseif (empty($proName)) {
                  echo '<div class="alert alert-danger" role="alert">Product Name field is Empty!</div>';
                } elseif (empty($proDes)) {
                  echo '<div class="alert alert-danger" role="alert">Product Description field is Empty!</div>';
                } elseif (empty($proType)) {
                  echo '<div class="alert alert-danger" role="alert">Product Type field is Empty!</div>';
                } elseif (empty($proSize)) {
                  echo '<div class="alert alert-danger" role="alert">Product Size field is Empty!</div>';
                } elseif (empty($proCostPrice)) {
                  echo '<div class="alert alert-danger" role="alert">Product Cost Price field is Empty!</div>';
                } elseif (empty($proSalePrice)) {
                  echo '<div class="alert alert-danger" role="alert">Product Sale Price field is Empty!</div>';
                } elseif (empty($quantity)) {
                  echo '<div class="alert alert-danger" role="alert">Product Quantity field is Empty!</div>';
                } else {
                  $result = productInput($br_id, $proBarcode, $proName, $proDes, $proType, $proSize, $proCostPrice, $proSalePrice, $quantity);
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
                  <label for="proBarcode" class="form-label w-25">Product Barcode</label>
                  <input type="text" class="form-control w-75" id="proBarcode" name="proBarcode">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="proName" class="form-label w-25">Product Name</label>
                  <input type="text" class="form-control w-75" id="proName" name="proName">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="proDes" class="form-label w-25">Product Description</label>
                  <input type="text" class="form-control w-75" id="proDes" name="proDes">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="proType" class="form-label w-25">Product Type</label>
                  <input type="text" class="form-control w-75" id="proType" name="proType">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="proSize" class="form-label w-25">Product Size</label>
                  <input type="text" class="form-control w-75" id="proSize" name="proSize">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="proCostPrice" class="form-label w-25">Product Cost Price</label>
                  <input type="text" class="form-control w-75" id="proCostPrice" name="proCostPrice">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="proSalePrice" class="form-label w-25">Product Sale Price</label>
                  <input type="text" class="form-control w-75" id="proSalePrice" name="proSalePrice">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                  <label for="quantity" class="form-label w-25">Product Quantity</label>
                  <input type="text" class="form-control w-75" id="quantity" name="quantity">
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