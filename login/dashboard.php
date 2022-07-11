<?php 
session_start();

if(!isset($_COOKIE['wdb_username']))
{
	header("location:login.php");
	exit;
}



if(isset($_GET['logout']) && $_GET['logout'] == true)
{
setcookie("wdb_username","",-3000,"/");
setcookie("wdb_remember_me","",-3000,"/");
	
	header("location:login.php");
	exit;
}


require_once 'db_con.php';
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT `id`, `name`, `email`, `number`, `username`, `password`, `class` FROM `enrolled_students` WHERE username = '".$_COOKIE['wdb_username']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);





echo "id   : " . $row["id"]. "<br>Name  : " . $row["name"]. "<br>email :" . $row["email"];



echo "<strong><br><br>You are sussessfully login........ hello username-".$_COOKIE['wdb_username'];

?>
</strong
<br	>
<a href="dashboard.php?logout=true">Logout</a>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="styles.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bx-alarm-snooze"></i>
        <span class="logo_name">Zenith Tuition</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cycling"></i>
            <span class="links_name">Progress</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-message-dots"></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">All Courses</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-error-alt"></i>
            <span class="links_name">Settings</span>
          </a>
        </li>

        <li class="log_out">
          <a href="#">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>

        <div class="dropdown">
          <button class="dropbtn">Shiv</button>

          <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="#">Pay</a>
            <a href="#">Logout</a>
          </div>
        </div>
      </nav>

      <div class="home-content">
        <h2>Book your free class now !!!</h2>
        <div class="container">
          <div class="cards grid-row">
            <div class="card">
              <div class="card-top">
                <img
                  src="https://i.ibb.co/8Bj9h3F/program-applied-physics.jpg"
                  alt="program-applied-physics"
                  border="0"
                />
              </div>
              <div class="card-info">
                <h2>Physics</h2>
                <span class="date">Monday, Jan 20, 2021</span>
              </div>
              <div class="card-bottom flex-row">
                <a href="#" class="read-more">Go To Class</a>
                <a href="#" class="button btn-sky">Link</a>
              </div>
            </div>
            <div class="card">
              <div class="card-top">
                <img
                  src="https://i.ibb.co/gMdHRtZ/download.jpg"
                  alt="download"
                  border="0"
                />
              </div>
              <div class="card-info">
                <h2>Chemistry</h2>
                <span class="date">Wednesday, Jan 22, 2021</span>
              </div>
              <div class="card-bottom flex-row">
                <a href="#" class="read-more">Go To Class</a>
                <a href="#" class="button btn-sky">Link</a>
              </div>
            </div>
            <div class="card">
              <div class="card-top">
                <img
                  src="https://i.ibb.co/gt4JSCs/First-grade-schoolboy-wrote-multiplication-table-on-blackboard-with-chalk-at-classroom-and-looking-a.jpg"
                  alt="First-grade-schoolboy-wrote-multiplication-table-on-blackboard-with-chalk-at-classroom-and-looking-a"
                  border="0"
                />
              </div>
              <div class="card-info">
                <h2>Mathematics</h2>
                <span class="date">Tuesday, Jan 21, 2021</span>
              </div>
              <div class="card-bottom flex-row">
                <a href="#" class="read-more">Go To Class</a>
                <a href="#" class="button btn-sky">Link</a>
              </div>
            </div>
            <div class="card">
              <div class="card-top">
                <img
                  src="https://i.ibb.co/ynxWykp/1601919495731.jpg"
                  alt="1601919495731"
                  border="0"
                />
              </div>
              <div class="card-info">
                <h2>Biology</h2>
                <span class="date">Thursday, Jan 23, 2021</span>
              </div>
              <div class="card-bottom flex-row">
                <a href="#" class="read-more">Go To Class</a>
                <a href="#" class="button btn-sky">Link</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>
