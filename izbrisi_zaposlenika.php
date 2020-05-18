<?php
	$con=mysqli_connect("127.0.0.1","root","");
				
	if(!$con){
		die("Nesupjelo spajanje: " . mysqli_error());
	}
	mysqli_select_db($con,"evzap");
	
	
	
	$mysqli_query = "SELECT * FROM zaposlenici WHERE ID='$_GET[id]'";
	
	$zaposlenici = mysqli_query($con,$mysqli_query);
	$row = mysqli_fetch_array($zaposlenici);
	
		$ime = $row['ime'];
		$prezime = $row['prezime'];
		$mb = $row['mb'];
    	$oib = $row['oib'];
    	$radno_mjesto = $row['radno_mjesto'];
		$pocetak_rs = $row['pocetak_rs'];
		$datum_pregleda = $row['datum_pregleda'];
    	$datum_isteka_pregleda = $row['datum_isteka_pregleda'];
		$vrijeme_promjene = date("YmdHis");
	
	

	
	
	$sql = "INSERT INTO arhiva_zaposlenika (ime, prezime, mb, oib, radno_mjesto, pocetak_rs, datum_pregleda, datum_isteka_pregleda,vrijeme_promjene) VALUES('$ime','$prezime','$mb','$oib','$radno_mjesto','$pocetak_rs','$datum_pregleda','$datum_isteka_pregleda','$vrijeme_promjene')";
	


	$sql = "DELETE FROM zaposlenici WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		header('Location: pregled_zaposlenika.php');
	}else{

		echo "Pogreska brisanja";
	}
?>