<?php
session_start();
?>
<nav class="
    navbar navbar-expand-lg navbar-light
    bg-light
    container-fluid
    d-flex
    justify-content-between
  ">
  <a class="navbar-brand font-weight-bold" href="#">Employee Management</a>
  <!-- Left buttons -->
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li id="dashboardLink" class="nav-item active">
        <a class="nav-link" href="#">Dashboard</a>
      </li>
      <li id="employeeLink" class="nav-item">
        <a class="nav-link" href="#">Employee</a>
      </li>
    </ul>
  </div>
  <!-- Logout functionality -->
  <div class="d-flex align-items-center">
    <p class="m-0 text-info"><?php echo $_SESSION["loged"]; ?></p>
    <a class="btn btn-outline-info ml-3" href="#">Logout</a>
  </div>
</nav>

<script>
  $("#dashboardLink").on("click", function() {
    console.log("Redirecting to dashboard page");
  });

  $("#employeeLink").on("click", function() {
    console.log("Redirecting to employee page");
  });
</script>