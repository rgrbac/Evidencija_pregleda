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
    $radno_mjesto = $_POST['radno_mjesto'];
    $procjena_rizika = $_POST['procjena_rizika'];


      
   
    //sql upit za punjenje tablice
    $sql = "UPDATE radna_mjesta SET radno_mjesto = '$radno_mjesto', procjena_rizika = '$procjena_rizika' WHERE ID = '$id'";

    //Uspješno . neuspješno punjenje
    if(!mysqli_query($con,$sql)){
        echo "Podaci nisu uneseni u bazu podataka";
        
    }
    else{
        header('Location: index.html');
    }
?>