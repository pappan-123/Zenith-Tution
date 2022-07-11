<?php require_once 'db_con.php';
if(isset($_COOKIE['wdb_username']))
{
	header("location:dashboard.php");
	exit;
}
session_start();


if(!$conn)
{
	die(mysqli_error());
}


if(isset($_POST['submit']))
{
	if((isset($_POST['username']) && !empty($_POST['username']))  && (isset($_POST['password']) && !empty($_POST['password'])))
	{
		$username = trim($_POST['username']);
		$password = $_POST['password'];
		
		$md5Pass = $password;
		
		$qry = "SELECT `id`, `name`, `email`, `number`, `username`, `password`, `class` FROM `enrolled_students` WHERE username = '".$username."' and password = '".$md5Pass."'";
		$rs = mysqli_query($conn, $qry);
		$numRows = mysqli_num_rows($rs);
		
		if($numRows == 1)
		{
			$getRow = mysqli_fetch_assoc($rs);
			$forOneHour = time() + 3600;
			
			
			setcookie("wdb_username",$username,$forOneHour,"/");
			
					
			$_SESSION = $getRow;
			header("location:dashboard.php");
			exit;
			
			
		}
		else
		{
			$errorMsg = "Wrong email or password";
		}
		
	}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ZenithTuition Login</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />

    <link
      href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/fonts/icomoon/style.css" />

    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/jquery-ui.css" />
    <link rel="stylesheet" href="/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="/css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="/css/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="/css/bootstrap-datepicker.css" />

    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="/css/aos.css" />

    <link rel="stylesheet" href="/css/style.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header
        class="site-navbar py-4 js-sticky-header site-navbar-target"
        role="banner"
      >
        <div class="container-fluid">
          <div class="d-flex align-items-center">
            <div class="site-logo mr-auto w-100">
              <a href="index.html"
                ><img src="/images/favicon.jpeg" /> Zenith Tuition</a
              >
            </div>

            <div class="mx-auto text-center"></div>

            <div class="ml-auto w-25">
              <nav
                class="site-navigation position-relative text-right"
                role="navigation"
              >
                <ul
                  class="
                    site-menu
                    main-menu
                    site-menu-dark
                    js-clone-nav
                    mr-auto
                    d-none d-lg-block
                    m-0
                    p-0
                  "
                >



                </ul>
              </nav>
              <a
                href="#"
                class="
                  d-inline-block d-lg-none
                  site-menu-toggle
                  js-menu-toggle
                  text-black
                  float-right
                "
                ><span class="icon-menu h3"></span
              ></a>
            </div>
          </div>
        </div>
      </header>

      <div class="intro-section" id="home-section">
        <div
          class="slide-1"
          style="background-image: url('/images/hero_1.jpg')"
          data-stellar-background-ratio="0.5"
        >
          <div class="container">
            <div class="row align-items-center">
              <div class="col-12">
                <div class="row align-items-center" my-5>
                  <!-- changed-->
                  <div
                    id="demoform"
                    class="col-lg-5 ml-auto"
                    data-aos="fade-up"
                    data-aos-delay="200"
                  >
                    <form
                      action=""
                      method="post"
                      class="form-box"
                      action="<?php echo $_SERVER['PHP_SELF']?>">
                      <h3 class="h4 text-black mb-4">
                        
                        
		<?php 
			if(isset($errorMsg))
			{
				echo $errorMsg;
				unset($errorMsg);
			} else { echo "Login:"; }
		?>
                      
                      </h3>
                      <div class="form-group">
                        <input
                         name = "username"
                          id="username"
                          placeholder="username"
                          type="text"
                          class="form-control"
                          value=""
                          required
                        />
                      </div>
                      <div class="form-group">
                        <input
                          name = "password"
                          id="password"
                          
                          placeholder="password"
                          
                          type="password"
                          value=""
                          class="form-control"
                          required
                        />
                      </div>
                      
                      

                      <div class="form-group">
                        <input
                          name = "submit"
                          type="submit"
                          class="btn btn-primary btn-pill"
                          value="Login"
                        />
                      </div>
                      
                      
                    </form>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <h1 data-aos="fade-up" data-aos-delay="100">
                      Already enrolled? You can go login to your dashboard here
                    </h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    <!-- .site-wrap -->

    <script type="text/javascript"></script>

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.stellar.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/jquery.easing.1.3.js"></script>
    <script src="/js/aos.js"></script>
    <script src="/js/jquery.fancybox.min.js"></script>
    <script src="/js/jquery.sticky.js"></script>

    <script src="/js/main.js"></script>

  </body>
</html>
