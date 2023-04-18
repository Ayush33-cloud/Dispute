<?php

include 'config.php';

session_start();

if(!isset($_SESSION['checker_name'])){
   header('location:login_form.php');
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/das.css">
  <link href="css/input.css"  rel="Stylesheet"  type="text/css"   />
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">LBBL <b>DISPUTE</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<i class="fa fa-user" aria-hidden="true" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION ['checker_name'] ?></span>
                <img class="img-profile rounded-circle" src="">
		</i>
                     
                
              </div>
            </li>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/lbbl.jpg">
				<h4><?php echo $_SESSION['checker_name'] ?></h4>
			</div>
			<ul>
				<li>
					<a href="checker_page.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>
			
				<li>
					<a href="checker-view.php">
						<i class="fa fa-list" aria-hidden="true"></i>
						<span>List Of Memos</span>
					</a>
				</li>
				<!-- <li>
					<a href="#">
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						<span>About</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Setting</span>
					</a>
				</li> -->
				<li>
					<a href="logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">
		
<?php 
include 'config.php';
include ('checkermemo-dispute-db.php'); 
if (isset($_GET['edits'])) {
  $id = $_GET['edits'];
  $updates = true;
  $records = mysqli_query($conn, "SELECT * FROM dispute_memo where id = $id");
  if(mysqli_num_rows($records)==1){
    $n = mysqli_fetch_array($records);
    $memoid = $n['MemoId'];
    $entryname = $n['EntryName'];
    $verificationD = $n['VerificationDate'];
    $prepareD = $n['PrepareDate'];
    $cbad = $n['CBAD'];
    $cbrd = $n['CBAD'];

    $settlementD = $n['SettlementDate'];
    $approveD = $n['ApproveDate'];
    $remarks = $n['Remarks'];
    $approve = $n['ApproveBy'];
   
  }
}
?>




 

<div class="container">
        <div class="title">
            <p>Memo Check</p>
        </div>

        <form method="POST" action="checkermemo-dispute-db.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="user_details">
                <div class="input_box">
                    <label >Memo ID</label>
                    <input readonly type="text" class="form-control" id="" name="MemoId" value="<?php echo $memoid; ?>">
                </div>
                <div class="input_box">
                    <label >Entry Name</label>
                    <input readonly type="text" class="form-control" id="" name="EntryName" value="<?php echo $entryname; ?>">
                </div>
                <div class="input_box">
                    <label >Verification Date</label>
                    <input readonly type="date" class="form-control" id="" name="VerificationDate" value="<?php echo $verificationD; ?>">
                </div>
                <div class="input_box">
                    <label >Prepare Date</label>
                    <input readonly type="date" class="form-control" id="" name="PrepareDate" value="<?php echo $prepareD; ?>">
                </div>
                <div class="input_box">
                    <label >CBAD</label>
                    <input readonly type="date" class="form-control" id="" name="CBAD" value="<?php echo $cbad; ?>">
                </div>
                <div class="input_box">
                    <label >CBRD</label>
                    <input readonly type="date" class="form-control" id="" name="CBRD" value="<?php echo $cbrd; ?>">
                </div>
                <br/>
                <br/>
                
                <div class="input_box">
                    <label>Settlement Date</label>
                    <input type="date" class="form-control" id="" name="SettlementDate" value="<?php echo $settlementD; ?>">
                </div>
                <div class="input_box">
                    <label>Approve Date</label>
                    <input type="date" class="form-control" id="" name="ApproveDate" value="<?php echo $approveD; ?>">
                </div>

                <div class="input_box">
                    <label >Approve By</label>
                    <input type="text" class="form-control" id="" name="ApproveBy" value="<?php echo $approve; ?>">
                </div>
            

            <div class="input_box">
                        
                        <label > Remarks</label>
                        
                
                        <select class="input_box"
                                            name="Remarks">
                                                <option value="not selected"
                                                <?php if($remarks == 'not selected'){
                                                    echo "selected";
                                                }?>
                                                >Remarks</option>
                                                <option value="check"
                                                <?php if($remarks == 'check'){
                                                    echo "selected";
                                                }?>
                                                >Check</option>
                                                <option value="uncheck"
                                                <?php if($remarks == 'uncheck'){
                                                    echo "selected";
                                                }?>
                                                >Uncheck</option>
                                                
                                        </select>
                                              
                    </div>  

           
                                                  
            <?php if ($updates == true): ?>
            <button class="reg_btn" type="submit" name="updates">update</button>
            <?php else: ?>
                <button class="reg_btn" type="submit" name="save" >Save</button>
            <?php endif ?>
            
            </div>
            </form>

            
        
            
       
    
    </div>


		</section>
	</div>

</body>
</html>

</body>
</html>

