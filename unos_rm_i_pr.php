<?php
    $con = mysqli_connect('127.0.0.1','root',''); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'evzap')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }
    
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