<?php
    $con = mysqli_connect('127.0.0.1','root',''); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'evzap')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }

    //fill varijable
    //$datum_pregleda = $_GET['datum_pregleda'];
   // $datum_isteka_pregleda = $_POST['datum_isteka_pregleda'];
   $datum_pregleda = '2020-04-25';
   $datum_isteka_pregleda = '2020-04-26';
    


   
   
    //sql upit za punjenje tablice
    $sql = "UPDATE zaposlenici SET datum_pregleda = '$datum_pregleda', datum_isteka_pregleda = '$datum_isteka_pregleda' WHERE ID = '$id'";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: pregled_zaposlenika.php');
    }
?>