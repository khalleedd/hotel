<?php
session_start();
  // if(!isset($_SESSION['guest']) || isset($_SESSION['admin'])){
  //   header('Location: login.php');
  //   exit();
  // }
 include 'database.php';
 if($_SERVER['REQUEST_METHOD'] == 'POST' )
  {
    if(isset($_SESSION['ID']) && isset($_POST['ordername']) && isset($_POST['Price']))
    {
  	  $id = $_SESSION['ID']; 
      $order =$_POST['ordername'] ;
      $price = $_POST['Price'];

      $stmt = $conn->prepare('INSERT INTO orders (ordername,price,gid)VALUES( ?, ? , ? );');
      $stmt->execute(array($order,$price, $id));
      header('Location: personal.php');


    }
    if(isset($_SESSION['ID']) && isset($_POST['hallname']) && isset($_POST['Price']) && isset($_POST['date']))
    {
      $id = $_SESSION['ID']; 
      $hallname =$_POST['hallname'] ;
      $price = $_POST['Price'];
      $date = $_POST['date'];
    
      $stmt = $conn->prepare('select  * from hall where reserveday = ? ');
      $stmt->execute(array($date ));
      $row = $stmt->fetch();
      $count = $stmt->rowCount();

      if($count == 0 && $date != null){
        $stmt1 = $conn->prepare('INSERT INTO hall (hallname,gid,price,reserveday)VALUES( ?, ? , ? , ? );');
        $stmt1->execute(array($hallname,$id, $price,$date));
        header('Location: personal.php');
      }elseif($date == null){
        echo "<script>
                 alert('Please Choose day reservation');
                 window.location.href ='hall.php';
              </script>";
//        header('Location: hall.php');

      }else{
        echo "<script>
                 alert('The hall is reserved at this day');
                  window.location.href ='hall.php';
              </script>";
      }

        
    }

    if(isset($_SESSION['ID']) && isset($_POST['travelname']) && isset($_POST['place1']) && isset($_POST['place2']) && isset($_POST['place3']) && isset($_POST['Price']) && isset($_POST['traveldate']))
    {
       $id = $_SESSION['ID']; 
      $travelname =$_POST['travelname'] ;
      $place1 = $_POST['place1'];
      $place2 = $_POST['place2'];
      $place3 = $_POST['place3'];
      $price = $_POST['Price'];
      $traveldate = $_POST['traveldate'];
      
      $stmt = $conn->prepare('select  * from travel where  travelname = ?  and place1 = ?  and place2 = ? and place3 =? and price=? and traveldate = ? and gid = ? ');
      $stmt->execute(array($travelname,$place1, $place2,$place3,$price,$traveldate,$id));
      $row = $stmt->fetch();
      $count = $stmt->rowCount();

      if($count == 0 )
      {

        $stmt1 = $conn->prepare('INSERT INTO travel (travelname,place1,place2,place3,price,traveldate ,gid)VALUES( ?, ? , ? , ?, ? , ? ,? );');
        $stmt1->execute(array($travelname,$place1, $place2,$place3,$price,$traveldate,$id));
        header('Location: personal.php');  
    }else{
        echo "<script>
                 alert('You are already reserved in this journey');
                  window.location.href ='personal.php';
              </script>";
      }

  }
     
  }

