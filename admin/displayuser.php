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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
        <div class="container">
    <button class="btn btn-primary my-5">
        <a href="register_form.php" class="text-light">Add User</a>
    </button>
	<h1>List Of Users</h1>
        <table class="table">
                <thead>
                        <tr>
                        <!-- <th scope="col">Sno</th> -->
						<!-- <th scope="row">'.$id.'</th> -->
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">User_Type</th>
                        
                        </tr>
                </thead>
                <tbody>
                    <?php
                    $sql="Select * from `user_form`";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                       while($row=mysqli_fetch_assoc($result)){
                        $id=$row['id'];
                        $name=$row['name'];
                        $email=$row['email'];
                        $password=$row['password'];
                        $user_type=$row['user_type'];
                        echo '<tr>
                        
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$password.'</td>
                        <td>'.$user_type.'</td>
						
                        </tr>';
                       }
                    }


                    ?>
                       
                </tbody>
        </table>
    
</div>
		</section>
	</div>

</body>
</html>




