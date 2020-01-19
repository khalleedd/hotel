<?php
  session_start();
  if(isset($_SESSION['guest'])){
    header('Location: personal.php');
    exit();
  }

  
$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
$number =0;
if($do == 'Reserve')
{
  $number =isset($_GET['number']) ? $_GET['number'] : 0;
}


  if($_SERVER['REQUEST_METHOD'] == 'POST' )
  {
    include 'database.php';

    $name = $_POST['name'];
    $type = $_POST['type'];
    $phone = $_POST['phone'];
    $pay = $_POST['pay'];
    $start = $_POST['startdate'];
    $end = $_POST['enddate'];

    if($start >$end)
     {
      echo "<script>
        alert('Enter Start Date and End Date Correctly');

      </script>";
    }
    else{

      $stmt = $conn->prepare('select  number from room where available = true and type =? limit 1;');
      $stmt->execute(array($type));
      $room = $stmt->fetch();
      $groom =$room['number'];
      $count = $stmt->rowCount();
      
      if($count >0){
          $stmt1 = $conn->prepare('INSERT INTO guest (name, phone,pay,startdate,enddate,num)VALUES( ?, ? , ? , ? , ? , ?  )');
          $stmt1->execute(array($name , $phone,$pay,$start,$end,$groom));

          $stmt2 = $conn->prepare('UPDATE room SET available=false WHERE number= ?;');
          $stmt2->execute(array($groom));

          $stmt3 = $conn->prepare('select  id from guest where name = ? and phone = ?  and startdate =? and enddate = ? limit 1;');
          $stmt3->execute(array($name , $phone,$start,$end));
          $row = $stmt3->fetch();
          $id =$row['id'];
          $_SESSION['guest'] = 'guest'; //Register Session guest
          $_SESSION['ID'] = $id; //Register Session ID
          $_SESSION['phone'] = $phone; //Register Session phone

          header('Location: personal.php'); //Redirect to personal page
      }else{
      echo "<script>
        alert('The type Room you choosed has been booked');
      </script>";
    }
    }    
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
<body class="body-reserve">
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
            <a class="nav-link" href="reserve.php">Reservation<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin</a>
          </li>
        </ul>
      </div>
    </nav>	


	<!-- Start setting form --> 
  <div class="container body">
    <div class="login">
          <h1 class="text-secondary">Reserve Room!</h1>
          <form id="register" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="clearfix " >
               <i class="fa fa-user" ></i>
              <input type="text" class="form-control form-control-lg" required="required"  name="name" placeholder="Enter guest name"/>
          </div>
          <div class="clearfix " >
               <i class="fa fa-hotel" ></i>
              <select  class="form-control form-control-lg" required="required"  name="type" >
                <option>Select Room type</option>
                <option value="single">Single</option>
                <option value="double">Double</option>
                <option value="suite">Suite</option>
              </select>
          </div>
          <div class="clearfix " >
               <i class="fa fa-phone" ></i>
              <input type="text" class="form-control form-control-lg" required="required"  name="phone" placeholder="Enter guest Phone"/>
          </div>
          <div class="clearfix " >
               <i class="fa fa-hotel" ></i>
              <select  class="form-control form-control-lg" required="required"  name="pay" >
                <option>Select Payment Method</option>
                <option value="Manual">Manual</option>
                <option value="paypal">paypal</option>
              </select>
          </div>
          <div style="color: gray; font-weight: 600;">Enter Start date</div>
          <div class="clearfix " >
               <i class="fa fa-calendar  " ></i>
              <input type="date" class="form-control form-control-lg"  name="startdate" />
          </div>
          <div style="color: gray; font-weight: 600;">Enter End date</div>
          <div class="clearfix " >
               <i class="fa fa-calendar  " ></i>
              <input type="date" class="form-control form-control-lg"  name="enddate" />
          </div>
            <input class="btn btn-info btn-lg btn-block"  type="submit" value="Reserve"/>                
          </form>
        </div>
  </div>    
    <!--    start footer   -->
        <div class="container-fluid footer-body ">
        <div class="footer" >

        <span>Copyright &copy; 2018 .</span>
        <ul>
            <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://www.facebook.com" target="_blank"><i  class="fa fa-linkedin" aria-hidden="true" ></i></a></li>
            <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        </ul> 
        </div>
    </div>    

<!--    end footer   -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/backend.js"></script>
    <script src="js/setting.js"></script>

   
</body>
</html>
