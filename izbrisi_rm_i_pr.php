<?php
	$con=mysqli_connect("127.0.0.1","root","");
				
	if(!$con){
		die("Nesupjelo spajanje: " . mysqli_error());
	}
	mysqli_select_db($con,"evzap");
	$sql = "DELETE FROM radna_mjesta WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		header('Location: pregled_rm_i_pr.php');
	}else{
		echo "Pogreska brisanja";
	}

?>