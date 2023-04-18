<?php
    include "config.php";
?>

<html>   
  <head>   
    <title>Pagination</title>   
    <link rel="stylesheet"  
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
    <style>   
    table {  
        border-collapse: collapse;  
    }  
        .inline{   
            display: inline-block;   
            float: right;   
            margin: 20px 0px;   
        }   
         
        input, button{   
            height: 34px;   
        }   
  
    .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: pink;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;   
    }   
        </style>   
  </head>   
  <body>   
  
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
      <br>   
      <div>   
        <h1>Pagination Simple Example</h1>   
        <p>This page demonstrates the basic    
           Pagination using PHP and MySQL.   
        </p>   
        <table class="table table-striped table-condensed    
                                          table-bordered">   
          <thead>   
            <tr>   
            <th>Memo Id</th>
            <th>Entry Name</th>                      
            <th>Verification Date</th>
            <th>Prepare Date</th>
            <th>Memo</th>
			<th>Serial Number</th>
            <th>Settlement Date</th>  
            </tr>   
          </thead>   
          <tbody>   
    <?php     
            while ($row = mysqli_fetch_array($rs_result)) {    
                  // Display each field of the records.    
            ?>     
            <tr>     
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['MemoId'] ?></a></td>
            <td><?php echo $row['EntryName']?></td>
            <td><?php echo $row['VerificationDate'] ?></td>
            <td><?php echo $row['PrepareDate'] ?></td>
            <td>
             <a href="Doc\<?php echo $row['Memo']?>"> Download</a>
           </td>
		   <td><?php echo $row['Serial_No']?></td>
            <td><?php echo $row['SettlementDate'] ?></td>
            <!-- <td><?php echo $row['ApproveDate'] ?></td>
            <td><?php echo $row['Remarks'] ?></td>
            <td><?php echo $row['ApproveBy'] ?></td> -->                                          
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
            echo "<a href='input.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='input.phpp?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='input.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='input.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  
  
  
      <div class="inline">   
      <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();">Go</button>   
     </div>    
    </div>   
  </div>  
  
  <script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'input.php?page='+page;   
    }   
  </script>  
  </body>   
</html>  