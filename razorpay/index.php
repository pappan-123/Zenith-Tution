<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<head>
    <title>ZenithTuition</title>
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
              <a href="https://zenithtuition.com/"
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
                ">
                  
              </a>
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
                    <form class="form-box" method = "post">
    <input type="text" name="name" id="name" placeholder="Enter your name"class="form-control" required/><br/> 
    
    
    <input type="textbox" name="amt" id="amt" placeholder="Enter amt" class="form-control" required/><br/>
    
    
    <input type="textbox" name="roll" id="roll" placeholder="Enter Roll No"class="form-control" required/><br/> 
    
    
    <select name="month" id="month" placeholder="Month" class="form-control" required>
        <option value="">Select Month</option>
        <option value="Jan">January</option>
        <option value="Feb">February</option>
        <option value="Mar">March</option>
        <option value="Apr">April</option>
        <option value="May">May</option>
        <option value="Jun">June</option>
        <option value="Jul">July</option>
        <option value="Aug">August</option>
        <option value="Sep">September</option>
        <option value="Oct">October</option>
        <option value="Nov">November</option>
        <option value="Dec">December</option>
    </select> <br/>
    
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" />
</form>
</div>
</div>
</div>

                  
                  

<script>
    
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        var month = jQuery('#month').val();
        var roll = jQuery('#roll').val();
        
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name+"&roll="+roll+"&month="+month,
               success:function(result){
                   var options = {
                        "key": "rzp_test_uxAyVb6iVyze6Q", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Zenith Tuition",
                        "description": "Test Transaction",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
    

</script>