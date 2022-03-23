<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand ms-4" href="#">
      <img src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      BOOKEP
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="uploadbook.php">Upload Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure you wan to log out?')">Logout</a>
        </li>
      </ul>
    </div>
  </nav>