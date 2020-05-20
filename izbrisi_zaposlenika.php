<?php
	require ("povezivanje.php");
	
	
	
	

	$mysqli_query = "SELECT * FROM zaposlenici WHERE ID='$_GET[id]'"; //selektiranje atributa iz tablice zaposlenici za ID koji je odabran
	//$mysqli_query = "SELECT zaposlenici.ime , zaposlenici.prezime , zaposlenici.mb, zaposlenici.oib , zaposlenici.radno_mjesto , zaposlenici.pocetak_rs , zaposlenici.datum_pregleda , zaposlenici.datum_isteka_pregleda FROM zaposlenici WHERE ID='$_GET[id]'";
	$zaposlenici = mysqli_query($con,$mysqli_query); //krerianje varijable $zaposlenici i povlačenje vrijednosti
	$row = mysqli_fetch_array($zaposlenici); //krerianje varijable $row i punjenje s rasponom vrijednosti dohvaćenih podataka
		$ime = $row['ime'];
		$prezime = $row['prezime'];
		$mb = $row['mb'];
    	$oib = $row['oib'];
    	$radno_mjesto = $row['radno_mjesto'];
		$pocetak_rs = $row['pocetak_rs'];
		$datum_pregleda = $row['datum_pregleda'];
    	$datum_isteka_pregleda = $row['datum_isteka_pregleda'];
		$vrijeme_promjene = date("YmdHis");
		if(empty($datum_pregleda)){
			$datum_pregleda = "0000-00-00";
		}
		if(empty($datum_isteka_pregleda)){
			$datum_isteka_pregleda = "0000-00-00";
		}

	$sql = "INSERT INTO arhiva_zaposlenika (ime, prezime, mb, oib, radno_mjesto, pocetak_rs, datum_pregleda, datum_isteka_pregleda,vrijeme_promjene) VALUES('$ime','$prezime','$mb','$oib','$radno_mjesto','$pocetak_rs','$datum_pregleda','$datum_isteka_pregleda','$vrijeme_promjene')";
	


	$sqld = "DELETE  FROM zaposlenici WHERE ID='$_GET[id]'"; //drugi upit za isti ID koji je odabran
	

	if(mysqli_query($con,$sql) && mysqli_query($con,$sqld)){ //
		header('Location: pregled_zaposlenika.php');
	}else{

		echo "Pogreska brisanja";
		
		print($row['datum_pregleda']) . "    " .	
		/*
		print ($ime);
		print ($prezime)." ".
		print ($mb)." ".
		print ($oib)." ".
		print ($radno_mjesto)." ".
		print ($pocetak_rs)." ".
		*/
		print ($datum_pregleda)."     ".
		print ($datum_isteka_pregleda);
		
	}
	
?>