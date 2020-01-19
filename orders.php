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
          <li class="nav-item ">
            <a class="nav-link" href="hall.php">Hall</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="travel.php">Travel</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="orders.php">Restaurant<span class="sr-only">(current)</span></a>
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
                          <td>Order Name</td>
                          <td>cured meat</td>
                          <input type="hidden" name="ordername" value="cured meat">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            22$
                            <input type="hidden" name="Price" value="22">
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
                          <td>Order Name</td>
                          <td>fish</td>
                          <input type="hidden" name="ordername" value="fish">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            35$
                            <input type="hidden" name="Price" value="35">
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
                          <td>Order Name</td>
                          <td>checken</td>
                          <input type="hidden" name="ordername" value="checken">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            28$
                            <input type="hidden" name="Price" value="28">
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
                          <td>Order Name</td>
                          <td>salad</td>
                          <input type="hidden" name="ordername" value="salad">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            7$
                            <input type="hidden" name="Price" value="7">
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
                          <td>Order Name</td>
                          <td>disert</td>
                          <input type="hidden" name="ordername" value="disert">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            18$
                            <input type="hidden" name="Price" value="18">
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
                          <td>Order Name</td>
                          <td>meat</td>
                          <input type="hidden" name="ordername" value="meat">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            19$
                            <input type="hidden" name="Price" value="19">
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
                          <td>Order Name</td>
                          <td>sea food</td>
                          <input type="hidden" name="ordername" value="sead food">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            36$
                            <input type="hidden" name="Price" value="36">
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
                          <td>Order Name</td>
                          <td>crib</td>
                          <input type="hidden" name="ordername" value="crib">
                        </tr>
                        <tr>
                          <td>17</td>
                          <td>
                            17$
                            <input type="hidden" name="Price" value="17">
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
                          <td>Order Name</td>
                          <td>sogik</td>
                          <input type="hidden" name="ordername" value="sogik">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            14$
                            <input type="hidden" name="Price" value="14">
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
                          <td>Order Name</td>
                          <td>fresh water</td>
                          <input type="hidden" name="ordername" value="fresh water">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            5$
                            <input type="hidden" name="Price" value="5">
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
                          <td>Order Name</td>
                          <td>pipsi</td>
                          <input type="hidden" name="ordername" value="pipsi">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            4$
                            <input type="hidden" name="Price" value="4">
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
                          <td>Order Name</td>
                          <td>coctal</td>
                          <input type="hidden" name="ordername" value="coctal">
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td>
                            7$
                            <input type="hidden" name="Price" value="7">
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