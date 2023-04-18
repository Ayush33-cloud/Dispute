<?php 
// session_start();
$conn =mysqli_connect('localhost','root','','user_db');
// echo $db;



//ATM DISPUTE CARD UPDATE// 
if (isset($_POST['updates'])) {
  $id = $_POST['id'];
  $memoid = $_POST['MemoId'];
  $entryname = $_POST['EntryName'];
  $verificationD = $_POST['VerificationDate'];
  $prepareD = $_POST['PrepareDate'];

  // $file = $_FILES['memo']['name'];
  // $tempname = $_FILES['memo']['tmp_name'];
  // $fol = "Doc/". $file;
  // move_uploaded_file($tempname, $fol);

  $settlementD = $_POST['SettlementDate'];
  $approveD = $_POST['ApproveDate'];
  $remarks = $_POST['Remarks'];
  $approveby = $_POST['ApproveBy'];
  

  


  mysqli_query($conn, "UPDATE dispute_memo set MemoId = '$memoid', 
                              EntryName = '$entryname', 
                              VerificationDate = '$verificationD', 
                              PrepareDate = '$prepareD', 
                              -- Memo = '$memo', 
                              -- Memo = '$file',


                              SettlementDate = '$settlementD', 
                              ApproveDate = '$approveD', 
                              Remarks = '$remarks', 
                              ApproveBy = '$approveby'WHERE id = $id"); 
                              
  $_SESSION['message'] = "Address updated!"; 
  header('location: view.php');
}




?>