<?php
  session_start();
  if(!isset($_SESSION['guest'])){
    header('Location: login.php');
    exit();
  }
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Site</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.media.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <ul class="nav ">
        <li class="nav-item">
         <div class="pull-left icon  ">
           <i class="fa fa-caret-down btn" id="dropdownMenu1" data-toggle="dropdown"></i>
            <ul class="dropdown-menu" id="setting-logout" aria-labelledby="dropdownMenu1;" >
              <!-- <li><a href="setting.html"><i class="fa fa-cog"></i>Setting</a></li> -->
              <li><a href="logout.php"><i class="fa fa-sign-out"></i>Sign out</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="navbar-brand" href="#">Hotel</a>      
        </li> 
      </ul>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="personal.php">Bill</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="hall.php">Hall<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="travel.php">Travel</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="orders.php">Restaurant</a>
          </li>
          
          <?php if(isset($_SESSION['admin'])){?>     

          <li class="nav-item">
            <a class="nav-link" href="guests.php">Guests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="available.php">Available Rooms</a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </nav>	


	<!-- Start home form -->
    <div class="container home"  >
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="home-card">
              <table class="table table-striped">
                <tbody>
                  <form  method='POST' action="server.php">
                  <tr>
                    <td colspan="2" class="text-center"><h2>Wedding Hall</h2></td>
                    <input type="hidden" name="hallname" value="Wedding Hall">
                  </tr>
                  <tr>
                    <td>Price </td>
                    <td>
                      1200$
                      <input type="hidden" name="Price" value="1200">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <input type="date" class="form-control form-control-lg"  name="date" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"><button type="submit" class="btn btn-info btn-block">Reserve</button></td>
                  </tr>
                  </form>
                </tbody>
              </table>
            </div>            
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="home-card">
              <table class="table table-striped">
                <tbody>
                  <form  method='POST' action="server.php">
                  <tr>
                    <td colspan="2" class="text-center"><h2>Meeting Hall</h2></td>
                    <input type="hidden" name="hallname" value="Meeting Hall">
                  </tr>
                  <tr>
                    <td>Price </td>
                    <td>
                      8500$
                      <input type="hidden" name="Price" value="8500">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <input type="date" class="form-control form-control-lg"  name="date" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"><button type="submit" class="btn btn-info btn-block">Reserve</button></td>
                  </tr>
                  </form>
                </tbody>
              </table>
            </div>            
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="home-card">
              <table class="table table-striped">
                <tbody>
                  <form  method='POST' action="server.php">
                  <tr>
                    <td colspan="2" class="text-center"><h2>Fooding Hall</h2></td>
                    <input type="hidden" name="hallname" value="Fooding Hall">
                  </tr>
                  <tr>
                    <td>Price </td>
                    <td>
                      600$
                      <input type="hidden" name="Price" value="600">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <input type="date" class="form-control form-control-lg"  name="date" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"><button type="submit" class="btn btn-info btn-block">Reserve</button></td>
                  </tr>
                  </form>
                </tbody>
              </table>
            </div>            
          </div>
        </div>
    </div> 
	<!-- End home form -->
	<!-- 		start footer   -->
        <div class="container-fluid footer-body ">
        <div class="footer" >

        <span>Copyright &copy; 2020 khalid .</span>
        <ul>
            <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://www.facebook.com" target="_blank"><i  class="fa fa-linkedin" aria-hidden="true" ></i></a></li>
            <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        </ul>	
        </div>
    </div>    

<!-- 		end footer   -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/backend.js"></script>
   
</body>
</html>