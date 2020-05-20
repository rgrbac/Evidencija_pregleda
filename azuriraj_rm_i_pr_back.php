<?php
     require ("povezivanje.php");

    //fill varijable
    $id = $_GET['id'];
    $radno_mjesto = $_POST['radno_mjesto'];
    $procjena_rizika = $_POST['procjena_rizika'];
    
    
   
    //sql upit za punjenje tablice
    $sql = "UPDATE radna_mjesta SET radno_mjesto = '$radno_mjesto', procjena_rizika = '$procjena_rizika' WHERE ID = '$id'";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: pregled_rm_i_pr.php');
    }
?>