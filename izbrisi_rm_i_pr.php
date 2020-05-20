<?php
	 require ("povezivanje.php");


	
	$sql = "DELETE FROM radna_mjesta WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		header('Location: pregled_rm_i_pr.php');
	}else{
		echo "Pogreska brisanja";
	}

?>