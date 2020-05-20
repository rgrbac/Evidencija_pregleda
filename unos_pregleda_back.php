<?php
     require ("povezivanje.php");
    //fill varijable
    $id = $_GET['id'];
    $datum_pregleda = $_POST['datum_pregleda'];
    $datum_isteka_pregleda = $_POST['datum_isteka_pregleda'];
  
  


   
   
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