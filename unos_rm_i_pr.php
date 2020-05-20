<?php
     require ("povezivanje.php");
    
    //fill varijable
    //print_r($_POST); //ispis polja
    $radno_mjesto = $_POST['radno_mjesto'];
    $procjena_rizika = $_POST['procjena_rizika'];
    


   
    //sql upit za punjenje tablice
    $sql = "INSERT INTO radna_mjesta (radno_mjesto, procjena_rizika) VALUES('$radno_mjesto','$procjena_rizika')";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: unos_rm_i_pr.html');
    }0
?>