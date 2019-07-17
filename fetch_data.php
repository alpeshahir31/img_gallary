<?php

//fetch_data.php

include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM img1 WHERE img_status='1'
	";
	
	if(isset($_POST["name"]))
	{
		$brand_filter = implode("','", $_POST["name"]);
		$query .= "
		 AND img_name IN('".$brand_filter."')
		";		
	}
	
	

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; ">
					<img src="' . $row[ "images1" ] .'" alt="" class="img-responsive"><br />
					<p align="left"><strong>'. $row['img_name'] .'</strong>
					<a href="delete.php?del='.$row["img_id"].'"" "class="bb" ><span class="glyphicon glyphicon-trash" style="float:right;"></span></a></p>
									</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>