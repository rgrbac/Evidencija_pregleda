<?php
    $con = mysqli_connect('127.0.0.1','root',''); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'evzap')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }

    //fill varijable
    $id = $_GET['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $mb = $_POST['mb'];
    $oib = $_POST['oib'];
    $pocetak_rs = $_POST['pocetak_rs'];


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
    $sql = "UPDATE zaposlenici SET ime = '$ime', prezime = '$prezime', mb = '$mb' , oib = '$oib' , pocetak_rs = '$pocetak_rs' WHERE ID = '$id'";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: kreriaj_zaposlenika.php');
    }
?>