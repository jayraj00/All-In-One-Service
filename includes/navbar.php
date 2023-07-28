<?php 
require_once "./classes/User.php";

if(!User::userLoggedIn()) {
  header("Location:login.php");
}

$user = new User($cn, $_SESSION['email']);

$url = $_SERVER['REQUEST_URI'];
?>
    <ul class="navBar navbar-list">
      <?php if($user->isProvider()) { ?>
        <a href="home.php">
          <li class="list-item <?php if(strpos($url,'home.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-home"></i>
            Home
          </li>
        </a>  
        <a href="prevjob.php">
          <li class="list-item <?php if(strpos($url,'prevjob.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-clock-o"></i>
            Previous Jobs
          </li>
        </a>
        <a href="todayjob.php">
          <li class="list-item <?php if(strpos($url,'todayjob.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-th-list"></i>
            Today's Jobs
          </li>
        </a>
        <a href="uncomplete.php">
          <li class="list-item <?php if(strpos($url,'uncomplete.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-book"></i>
            Upcoming Jobs
          </li>
        </a>
        <a href="cancelledjob.php">
          <li class="list-item <?php if(strpos($url,'cancelledjob.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-book"></i>
            Cancelled Jobs
          </li>
        </a>
      <?php } else if($user->isAdmin()) { ?>
        <a href="admin-users.php">
          <li class="list-item <?php if(strpos($url,'admin-users.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-users"></i>
            Users
          </li>
        </a>
        <a href="admin-providers.php">
          <li class="list-item <?php if(strpos($url,'admin-providers.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-users"></i>
            Providers
          </li>
        </a>
        <a href="admin-hirings.php">
          <li class="list-item <?php if(strpos($url,'admin-hirings.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-server"></i>
            Hirings
          </li>
        </a>
      <?php } else if (!$user->isProvider()) { ?>
        <a href="index.php">
          <li class="list-item <?php if(strpos($url,'index.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-home"></i>
            Home
          </li>
        </a>
        <a href="services.php">
          <li class="list-item <?php if(strpos($url,'services.php',0)) echo "active"; ?>">
            <i class="fa fa-lg fa-book"></i>
            Servies
          </li>
        </a>
      <?php } ?>
      <a href="profile.php">
        <li class="list-item <?php if(strpos($url,'profile.php',0)) echo "active"; ?>">
          <i class="fa fa-lg fa-user"></i>
          Profile
        </li>
      </a>
      <a href="logout.php">
        <li class="list-item">
          ➡
          Logout
        </li>
      </a>
    </ul>

