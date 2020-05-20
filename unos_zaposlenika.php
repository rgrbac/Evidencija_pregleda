<?php
    require ("povezivanje.php");
    
    //fill varijable
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $mb = $_POST['mb'];
    $pocetak_rs = $_POST['pocetak_rs'];
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
    
    





   
    //sql upit za punjenje tablice
   $sql = "INSERT INTO zaposlenici (ime, prezime, mb, oib, radno_mjesto, pocetak_rs) VALUES ('$ime','$prezime','$mb','$oib','$radno_mjesto','$pocetak_rs')";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        print_r($_POST);
        print($radno_mjesto) . " ";
        print($pocetak_rstemp) . " ";
        print($pocetak_rs) . " ";
        
    }
    else{
        header('Location: pregled_zaposlenika.php');
    }
?>