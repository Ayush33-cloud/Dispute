<?php

include 'config.php';
session_start();

if(!isset($_SESSION['maker_name'])){
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Memo Add</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/das.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/test.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">LBBL <b>DISPUTE</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<i class="fa fa-user" aria-hidden="true"></i>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/lbbl.jpg">
				<h4><?php echo $_SESSION['maker_name'] ?></h4>
			</div>
			<ul>
				<li>
					<a href="maker_page.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li>
					<a href="maker-view.php">
               <i class="fa fa-list" aria-hidden="true"></i>
						<span>Memo List</span>
					</a>
				</li>
				<!-- <li>
					<a href="#">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>Comment</span>
					</a>
				</li>
				<li>
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
		<div class="container mt-5">
				<?php
			if(isset($_SESSION['status']))
			{
				echo "<h4>".$_SESSION['status']."</h4>";
				unset($_SESSION['status']);
			}
				?>
				<h1>Add Memo List</h1>
				<button class="btn btn-primary my-5">
					<a href="maker-view.php" class="text-light">List Memo</a>
				</button>
					
		<form action="tue.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Memo Id</label>
					<input type="text"
						class="form-control"
						placeholder="Memo Id"
						name="memoid" />
				</div>

				<div class="form-group">
					<label>Entry Name</label>
					<input type="text"
						class="form-control"
						placeholder="Name"
						name="entryname" />
				</div>

			<div class="form-group">
						<label>Verification Date</label>
						<input type="date"
							class="form-control"
							placeholder="Date"
							name="verificationdate">
					</div>

			<div class="form-group">
						<label>Prepare Date</label>
						<input type="date"
							class="form-control"
							placeholder="Date"
							name="preparedate">
					</div>

				<div class="form-group">
							<label>Memo</label>
					<input required type="file" class="form-control" 
					accept=".pdf" name="memo" placeholder="memo">
						</div>

						<div class="form-group">
							<label>Serial Numbers</label>
							<input type="text"
								class="form-control"
								placeholder="Serial Numbers"
								name="serialN" />
						</div>
						<div class="form-group">
						<label>CBAD</label>
						<input type="date"
							class="form-control"
							placeholder="Date"
							name="cbad">
					</div>
					<div class="form-group">
						<label>CBRD</label>
						<input type="date"
							class="form-control"
							placeholder="Date"
							name="cbrd">
					</div>

			<!-- <div class="form-group">
						<label>Settlement Date</label>
						<input type="date"
							class="form-control"
							placeholder="Date"
							name="settlementdate">
					</div> -->
				<input type="hidden" name="settlementdate" placeholder="Date">
				<input type="hidden" name="approvedate" placeholder="Date">
				<input type="hidden" name="remarks" placeholder="remarks">
				<input type="hidden" name="approveby" placeholder="Approve By">
					
		

					<div class="form-group">
						<input type="submit"
							value="submit"
							class="btn btn-danger"
							name="submit">
					</div>
				</form>
			</div>
				</section>
	</div>

</body>
</html>



















