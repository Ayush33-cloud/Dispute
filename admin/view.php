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
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
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
						<span>List of Memos</span>
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
				</li>  -->
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
      
      // Import the file where we defined the connection to Database.     
          require_once "config.php";   
      
          $per_page_record = 7;  // Number of entries to show in a page.   
          // Look for a GET variable page if not found default is 1.        
          if (isset($_GET["page"])) {    
              $page  = $_GET["page"];    
          }    
          else {    
            $page=1;    
          }    
      
          $start_from = ($page-1) * $per_page_record;     
      
          $query = "SELECT * FROM dispute_memo LIMIT $start_from, $per_page_record";     
          $rs_result = mysqli_query ($conn, $query);    
      ?>    
        <div class="container">
            <h1>Memo List</h1>
        <table class="table table-striped table-condensed    
                                          table-bordered">
        <thead>
          <tr>
            <!-- <th>S.No</th> -->
            <th>Memo Id</th>
            <th>Entry Name</th>                      
            <th>Verification Date</th>
            <th>Prepare Date</th>
            <th>Memo</th>
            <th>Settlement Date</th>
            <th>Approve Date</th>
            <th>Remarks</th>
            <th>Approve By</th>

            <!-- <th>Print Preview</th> -->
            
          </tr>
        </thead>                   
         

        <tbody>
        
           

        <?php     
            while ($row = mysqli_fetch_array($rs_result)) {    
                  // Display each field of the records.    
            ?>  
                             

        
          <tr>
          <!-- <td><?php echo $row['id']?></td> -->
            <td><a href="update-memo.php?edits=<?php echo $row['id']; ?>"><?php echo $row['MemoId'] ?></a></td>
            <td><?php echo $row['EntryName']?></td>
            <td><?php echo $row['VerificationDate'] ?></td>
            <td><?php echo $row['PrepareDate'] ?></td>
            <td>
             <a href="Doc\<?php echo $row['Memo']?>"> Download</a>
           </td>
            <td><?php echo $row['SettlementDate'] ?></td>
            <td><?php echo $row['ApproveDate'] ?></td>
            <td>
              <?php
                if($row['Remarks']=="Remarks"){
                  echo "<span class='badge badge-info'>Remarks</span>";
                  }elseif($row['Remarks']=="check"){
                    echo "<span class='badge badge-primary'>check</span>";
                  }elseif($row['Remarks']=="uncheck"){
                    echo "<span class=='badge badge-warning'>uncheck</span>";
                  }else{
                    echo "<span class='badge badge-dark'>No Action</span>";
                  }
              ?>
            </td>
            <td><?php echo $row['ApproveBy'] ?></td>
            
            
            
          </tr>
          <?php     
                };    
            ?> 
                       
                </tbody>
        </table>
        <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM dispute_memo";     
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='view.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='view.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='view.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='view.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  
  
  
      <!-- <div class="inline">   
      <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();">Go</button>   
     </div> -->
    
</div>
		</section>
	</div>


<script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'view.php?page='+page;   
    }   
  </script> 
  </body>
</html>









