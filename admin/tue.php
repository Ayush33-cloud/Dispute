<?php
session_start();
    include 'config.php';
    if(isset($_POST['submit']))
    {
        
			$memoid = $_POST['memoid'];
			$entryname = $_POST['entryname'];
			$verificationdate = $_POST['verificationdate'];
      $preparedate = $_POST['preparedate'];
			// $memo = $_POST['memo'];

      $file = $_FILES['memo']['name'];
      $tempname = $_FILES['memo']['tmp_name'];
      $fol = "Doc/". $file;
      // if(file_exists($fol)){
      //   echo "Sorry already exists.";
      // }
      move_uploaded_file($tempname, $fol);

      $serialN = $_POST['serialN'];
      $cbad = $_POST['cbad'];
      $cbrd = $_POST['cbrd'];
      $settlementdate = $_POST['settlementdate'];
      $approvedate = $_POST['approvedate'];
      $remarks = $_POST['remarks'];
      $approveby = $_POST['approveby'];

			
      $sql="INSERT INTO dispute_memo
			VALUES(NULL,'$memoid','$entryname','$verificationdate','$preparedate','$file','$serialN',
      '$cbad','$cbrd','$settlementdate','$approvedate','$remarks','$approveby')";
      $query = mysqli_query($conn,$sql);

      if($query){
        $_SESSION['status'] = "Inserted Successfully";
        header("location:maker-view.php");
      }
      else{
        $_SESSION['status'] = "Date Not Inserted Successfully";
        header("location:test.php");
      }

    }
?>