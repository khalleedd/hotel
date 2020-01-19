<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('Location: guests.php');
    exit();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    include 'database.php';
    $name = $_POST['name'];
    $password = $_POST['password'];
  
    $stmt = $conn->prepare('select  name , password from admins where name = ? and password = ? limit 1;');
    $stmt->execute(array($name , $password));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
    
    if($count >0){
        $_SESSION['admin'] = $row['name']; //Register Session guest
       
        header('Location: guests.php'); //Redirect to Dashboard page
      exit();
    }else{
      echo "<script>
        alert('name or password is uncorrect');
      </script>";
    }

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
	<nav class="navbar navbar-expand-lg navbar-light bg-info ">
	  <a class="navbar-brand" href="#">Hotel</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="reserve.php">Reservation</a>
        </li>
        <li class="nav-item active">
	        <a class="nav-link " href="login.php">Login<span class="sr-only">(current)</span></a>
	      </li>
        
	    </ul>
	  </div>
	</nav>
	
	<!-- Start Login form -->
    <div class="container-fluid body"  >
        <div class="login">
          <h1 class="text-secondary">Admin Login!</h1>
          <form id="register"action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="clearfix" >
                <i class="fa fa-user" aria-hidden="true" ></i>
            <input type="text" class="form-control form-control-lg" autocomplete="off" required="required" name="name" placeholder="Enter user name"/> 
            </div>
          <div class="clearfix " >
               <i class="fa fa-unlock-alt" ></i>
              <input type="password" class="form-control form-control-lg" required="required" autocomplete="new-pass" name="password" placeholder="Enter your password"/>
          </div>
            <p id="error" style="color:red;"></p>
            <input class="btn btn-info btn-lg btn-block"  type="submit" value="Login"/>                
          </form>
        </div>
    </div> 
	<!-- End Login form -->
	<!-- 		start footer   -->
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

<!-- 		end footer   -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/backend.js"></script>
   
</body>
</html>