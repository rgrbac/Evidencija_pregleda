<?php
     require ("povezivanje.php");

    //fill varijable
    $id = $_GET['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $mb = $_POST['mb'];
    $oib = $_POST['oib'];
    $pocetak_rs = $_POST['pocetak_rs'];

    

    $radno_mjesto = $_POST['radno_mjesto'];
    $sqld = "SELECT * FROM radna_mjesta";
    $myData = mysqli_query($con,$sqld); //pull podataka iz baze
      while($record = mysqli_fetch_array($myData)){
        //Prebacivanje teksta u ID
        if(strcmp($record['radno_mjesto'],$radno_mjesto) == 0){
          $radno_mjesto = $record['ID'];
        }        
      }   

     
    //sql upit za punjenje tablice
    $sqld = "UPDATE zaposlenici SET ime = '$ime', prezime = '$prezime', mb = '$mb' , oib = '$oib' , pocetak_rs = '$pocetak_rs', radno_mjesto='$radno_mjesto' WHERE ID = '$id'";

    //Uspješno . neuspješno punjenje
  
   if(!mysqli_query($con,$sqld)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: pregled_zaposlenika.php');
    }
?>