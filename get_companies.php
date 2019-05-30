
<?php
//Include database configuration file
include('connection_db.php');

if(isset($_POST["city_id"]) && !empty($_POST["city_id"])){
	//Get all state data
    $query = $db->query("SELECT * FROM companies WHERE city_id = ".$_POST['city_id']." ORDER BY company_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
      
        while($row = $query->fetch_assoc()){ 
		    echo '<tr>';
            echo '<td>'.$row['company_name'].'</td>';
			echo '<td>'.$row['stock_productos'].'</td>';
			echo '<td>'.$row['dinero_productos'].'</td>';
			
			echo '</tr>';
        }
    }
	
}
