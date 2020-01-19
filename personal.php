<?php
  session_start();
  if(!isset($_SESSION['guest'])){
     header('Location: login.php');
    exit();
  }
 
 
    
    include 'database.php';
    $id = $_SESSION['ID'] ; 
    $stmt = $conn->prepare('select id,name,phone,startdate,enddate,enddate - startdate as days, number, type , price  ,(enddate - startdate) * price as stay  from guest inner join room on guest.num =room.number  where guest.id = ? limit 1;');

    $stmt->execute(array($id ));
    $row = $stmt->fetch();

    $stmt1 = $conn->prepare('select  * from orders  where gid = ?;');
    $stmt1->execute(array($id ));
    $orders = $stmt1->fetchAll();

    $stmt2 = $conn->prepare('select sum(orders.price) as orders from orders  where gid= ? ;');
    $stmt2->execute(array($id ));
    $ordersprice = $stmt2->fetch();

    $stmt3 = $conn->prepare('select  * from hall  where gid = ?;');
    $stmt3->execute(array($id ));
    $halls = $stmt3->fetchAll();

    $stmt4 = $conn->prepare('select sum(price) as hall from hall where gid = ?;');
    $stmt4->execute(array($id ));
    $hallprice = $stmt4->fetch();

    $stmt5 = $conn->prepare('select  * from travel  where gid = ?;');
    $stmt5->execute(array($id ));
    $travels = $stmt5->fetchAll();

    $stmt6 = $conn->prepare('select sum(price) as travelprice from travel where gid = ?;');
    $stmt6->execute(array($id ));
    $travelprice = $stmt6->fetch();

    $total =0;
    if($row['stay'] != null){
      $total +=$row['stay'];
    }
    if($ordersprice['orders'] != null){
      $total +=$ordersprice['orders'];
    }
    if($hallprice['hall'] != null){
      $total +=$hallprice['hall'];
    }
    if($travelprice['travelprice'] != null){
      $total +=$travelprice['travelprice'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hotel</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="personal.php">Bill<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="hall.php">Hall</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="travel.php">Travel</a>
          </li>
          <li class="nav-item">
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


	<!-- Start setting form --> 
  <div class="container">
  <div class="setting-body">
    <div class="setting">
      <h2 class="setting-title">Guest Information !</h2>
      <section class="setting clearfix">
          <span class="span1  pull-left">
           Guest Name 
          </span> 
          <span class="span2 pull-left">
            <span id="oldname"><?php echo $row['name'];?></span>
            
      </section>

      <section class="setting clearfix">
          <span class="span1  pull-left">
              Room Number
              </span> 
              <span class="span2 pull-left">
                <span id="oldemail"><?php echo $row['number'];?></span>
                </span>             
      </section>

      <section class="setting clearfix">
          <span class="span1  pull-left">
           Room type
          </span> 
          <span class="span2 pull-left">
            <span id="oldphone"><?php echo $row['type'];?></span>
        </span>
      </section>

      <section class="setting clearfix">
              <span class="span1  pull-left">Phone Number</span> 
              <span class="span2 pull-left">
                <span id="oldpassword"><?php echo $row['phone'];?></span>
            </span>
      
      </section>
      <section class="setting clearfix">
              <span class="span1  pull-left">Start Date</span> 
              <span class="span2 pull-left">
                <span id="oldpassword"><?php echo $row['startdate'];?></span>
            </span>
      
      </section>
      <section class="setting clearfix">
              <span class="span1  pull-left">End Date</span> 
              <span class="span2 pull-left">
                <span id="oldpassword"><?php echo $row['enddate'];?></span>
            </span>
      
      </section>
      <section class="setting clearfix">
              <span class="span1  pull-left">Price Room for day  </span> 
              <span class="span2 pull-left">
                <span id="oldpassword"><?php echo $row['price'];?></span>
            </span>
      
      </section>
       <section class="setting clearfix">
              <span class="span1  pull-left">Number Of Day</span> 
              <span class="span2 pull-left">
                <span id="oldpassword"><?php echo $row['days'];?>days</span>
            </span>
      
      </section>
      <section class="setting clearfix">
              <span class="span1  pull-left"><h3>Total bill is :</h3></span> 
              <span class="span2 pull-left">
                <span id="oldpassword">
                  <?php 
                    echo $total;
                  ?>$</span>
            </span>      
      </section>
    </div>
  </div>
  </div>
  <h1 class="order" style="margin-top:15px;margin-bottom: 0px;text-align: center;">Orders</h1>
  <div class="container home" id="order"   style="min-height: 150px;">
    <div class="row">
      <?php foreach ($orders as $order) {?>
        <div class="col-sm-12 col-md-6 col-lg-4" >
            <div class="home-card">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Order Name</td>
                      <td><?php echo $order['ordername'];?></td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td>
                        <?php echo $order['price'];?>$
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>            
          </div>
        <?php } ?>
      </div>
    </div>
  <h1 class="hall" style="margin-top:15px;margin-bottom: 0px;text-align: center;">Halls</h1>
  <div class="container home"   id="hall"  style="min-height: 200px;">
    <div class="row">
      <?php foreach ($halls as $hall) {?>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="home-card">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td colspan="2" class="text-center"><h2><?php echo $hall['hallname'];?></h2></td>
                  </tr>
                  <tr>
                    <td>Price </td>
                    <td>
                      <?php echo $hall['price'];?>$                      
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Date
                    </td>
                    <td>
                      <?php echo $hall['reserveday'];?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>            
          </div>
        <?php } ?>
      </div>
    </div>
  <h1 class="travel" style="margin-top:15px;margin-bottom: 0px;text-align: center;">Travels</h1>
  <div class="container home"   id="travel"  style="min-height: 380px;">
    <div class="row">
      <?php foreach ($travels as $travel) {?>
                  <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="home-card">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td colspan="2" class="text-center"><h2><?php echo $travel['travelname'];?></h2></td>                    
                  </tr>
                  <tr>
                    <td colspan="2">Places to visit </td>                    
                  </tr>
                  <tr>
                    <td colspan="2">
                      <p><?php echo $travel['place1'];?></p>
                      <p><?php echo $travel['place2'];?></p> 
                      <p><?php echo $travel['place3'];?></p>
                    </td>
                  </tr>
                  <tr>
                    <td>Price</td>
                    <td><?php echo $travel['price'];?>$</td>                    
                  </tr>
                  <tr>
                    <td>Flight Schedule</td>
                    <td><?php echo $travel['traveldate'];?></td>                    
                  </tr> 
                </tbody>
              </table>
            </div>            
          </div>
        <?php } ?>
      </div>
    </div>    
	<!-- End setting form -->
	<!-- 		start footer   -->
        <div class="container-fluid footer-body " style="margin-top: 0px;">
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
    <script src="js/setting.js"></script>

   
</body>
</html>