<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the end -->
  <div class="float-end d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the start -->
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

</div>
<!--  ./wrapper -->

<!-- OPTIONAL SCRIPTS -->

<!-- overlayScrollbars -->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/js/OverlayScrollbars.min.js" integrity="sha256-7mHsZb07yMyUmZE5PP1ayiSGILxT6KyU+a/kTDCWHA8=" crossorigin="anonymous"></script>
<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha256-9SEPo+fwJFpMUet/KACSwO+Z/dKMReF9q4zFhU/fT9M=" crossorigin="anonymous"></script>
<!-- jQuery 3.6.0 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<!-- SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- REQUIRED SCRIPTS -->

<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->

<script>
  jQuery(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>

<script>
  <?php
  $_SESSION['title'] = "Success Message";
  $_SESSION['text'] = "Login Success";
  $_SESSION['icon'] = "success";
  if (isset($_SESSION['title']) && isset($_SESSION['sweet'])) { ?>
    swal({
      title: "<?php echo $_SESSION['title'] ?>",
      text: "<?php echo $_SESSION['text'] ?>",
      icon: "<?php echo $_SESSION['icon'] ?>",
      button: "Okay",
    });
  <?php
    unset($_SESSION['title']);
    unset($_SESSION['text']);
    unset($_SESSION['icon']);
    unset($_SESSION['sweet']);
  } ?>
</script>

<script>
  const SELECTOR_SIDEBAR = '.sidebar'
  const Default = {
    scrollbarTheme: 'os-theme-light',
    scrollbarAutoHide: 'leave'
  }
  document.addEventListener("DOMContentLoaded", function() {
    if (typeof OverlayScrollbars !== 'undefined') {
      OverlayScrollbars(document.querySelectorAll(SELECTOR_SIDEBAR), {
        className: Default.scrollbarTheme,
        sizeAutoCapable: true,
        scrollbars: {
          autoHide: Default.scrollbarAutoHide,
          clickScrolling: true
        }
      })
    }
  })
</script>

</body>

</html>