<?php

include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/das.css">
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION ['admin_name'] ?></span>
                <img class="img-profile rounded-circle" src="">
		</i>
                     
                
              </div>
            </li>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/lbbl.jpg">
				<h4><?php echo $_SESSION['admin_name'] ?></h4>
			</div>
			<ul>
				<li>
					<a href="admin_page.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li>
						<a href="displayuser.php">
						<i class="fa fa-user" aria-hidden="true"></i>
							<span>Users</span>
						</a>
						
     			 </li>
				</li>
				<li>
					<a href="view.php">
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
		<div class="divHeaderColumn">
                <img alt="Lumbini Bikas Bank Ltd"
                    title="Lumbini Bikas Bank Ltd"
                    src="img/lbbl_logo.png" width="100%" height="105" />
            </div>
      <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
			<p>LBBL</p>
		</section>
	</div>

</body>
</html>

</body>
</html>