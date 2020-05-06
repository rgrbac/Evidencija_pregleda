<?php
    $con = mysqli_connect('127.0.0.1','root',''); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'evzap')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }
    
    //fill varijable
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $mb = $_POST['mb'];
    $oib = $_POST['oib'];
    $radno_mjesto = $_POST['radno_mjesto'];
    $sql = "SELECT * FROM radna_mjesta";
    $myData = mysqli_query($con,$sql); //pull podataka iz baze
      while($record = mysqli_fetch_array($myData)){
        //Prebacivanje teksta u ID
        if(strcmp($record['radno_mjesto'],$radno_mjesto) == 0){
          $radno_mjesto = $record['ID'];
        }        
      }   
    
    $pocetak_rs = $_POST['pocetak_rs'];
   







   
    //sql upit za punjenje tablice
    $sql = "INSERT INTO zaposlenici (ime, prezime, mb, oib, radno_mjesto, pocetak_rs) VALUES('$ime','$prezime','$mb','$oib','$radno_mjesto','$pocetak_rs')";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: pregled_zaposlenika.php');
    }0
?>