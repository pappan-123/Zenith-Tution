<?php require_once 'db_con.php';
session_start();
if(isset($_POST['signup'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $class = $_POST['class'];
    
    $input_error = array();
    if (empty($name)) {
			$input_error['name'] = "The Name Field is Required";
		}
		if (empty($email)) {
			$input_error['email'] = "The Email Field is Required";
		}
		if (empty($username)) {
			$input_error['username'] = "The UserName Field is Required";
		}
		if (empty($password)) {
			$input_error['password'] = "The Password Field is Required";
		}
		if (empty($class)) {
			$input_error['class'] = "Please select a class";
		}
		
		
		if (count($input_error)==0) {
		    $check_email= mysqli_query($conn,"SELECT * FROM `enrolled_students` WHERE `email`='$email';");
		    
		    if (mysqli_num_rows($check_email)==0) {
		        $check_username= mysqli_query($conn,"SELECT * FROM `enrolled_students` WHERE `username`='$username';");
		        if (mysqli_num_rows($check_username)==0) {
		            mysqli_query($conn, "INSERT INTO `enrolled_students`(`name`, `email`,`number`, `username`, `password`, `class`) VALUES ('$name', '$email', '$number','$username', '$password','$class')");
		        }
		        else{
					$username_error="Username not available";
				}
		    }
		    else{
				$email_error= "This email already exists";
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
                      onsubmit="bookDemo(); return false;"
                    >
                      <!-- changed-->
                      <h3 class="h4 text-black mb-4">
                        SignUp:
                      </h3>
                      <div class="form-group">
                        <input
                          name = "name"
                          id="name"
                          type="text"
                          class="form-control"
                          placeholder="name"
                          required
                        />
                      </div>
                      
                      <div class="form-group">
                        <input
                          id="phno"
                          name = "number"
                          type="text"
                          class="form-control"
                          placeholder="mobile no"
                          maxlength = "10"
                          required
                        />
                      </div>
                      
                      <div class="form-group">
                        <input
                          id="email"
                          type="email"
                          name = "email"
                          class="form-control"
                          placeholder="email"
                          required
                        />
                      </div>
                      
                     <div class="form-group mb-4">
                        <select class="form-control" name = "class" >
                          <option value="">Select your class</option>
                          <option value="std-7">Class VII</option>
                          <option value="std-8">Class VIII</option>
                          <option value="std-9">Class IX</option>
                          <option value="std-10">Class X</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <input
                          id="username"
                          name = "username"
                          type="text"
                          class="form-control"
                          placeholder="username"
                          required
                        />
                      </div>
                      
                      <div class="form-group">
                        <input
                          id="password"
                          name  = "password"
                          type="password"
                          class="form-control"
                          placeholder="password"
                          required
                        />
                      </div>
        

                      <div class="form-group">
                        <input
                          type="submit"
                          name = "signup"
                          class="btn btn-primary btn-pill"
                          value="SignUp"
                        />
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-6 mb-4">
                    
                    <p class="mb-4" data-aos="fade-up" data-aos-delay="150">
                      Already enrolled? Login Here
                    </p>
                    <p data-aos="fade-up" data-aos-delay="200">
                      <a
                        href="https://zenithtuition.com/login/login.php"
                        class="btn btn-primary py-3 px-5 btn-pill"
                        >login
                   </a>

                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      


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
