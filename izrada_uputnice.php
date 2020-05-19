<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Zaposlenika</title>
</head>

<body>
  <!--navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- pozivanje bootstrap klase za alatnu traku s predefiniranim stilom -->
        <a class="navbar-brand" href="index.html">Evidencija pregleda</a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="unos_zaposlenika_forma.php">Unos zaposlenika <span class="sr-only">(current)</span></a> 
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="pregled_zaposlenika.php">Pregled zaposlenika <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="pregled_rm_i_pr.php">Pregled RM i PR <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="unos_rm_i_pr.html">Unos RM i PR <span class="sr-only">(current)</span></a>
              </li>       
              <li class="nav-item active">
                <a class="nav-link" href="arhiva_zaposlenika.php">Arhiva zaposlenika <span class="sr-only">(current)</span></a>
              </li>       
              <li class="nav-item active">
                <a class="nav-link" href="pomoc.html">Pomoć <span class="sr-only">(current)</span></a>
              </li>    
              </div>            
          </ul>
        </div>
      </nav>
  <!--end navbar-->
  <div class="row">
    </br>
  </div>
  <!--Ažuriranje-->
  <?php
    $con=mysqli_connect("127.0.0.1","root",""); //spajanje na server
                    
    if(!$con){
        die("Nesupjelo spajanje: " . mysqli_error());}
    
    mysqli_select_db($con,"evzap"); //spajanje na bazu
    $sql = "SELECT * FROM zaposlenici WHERE ID='$_GET[id]'"; //sql upit za ispis
    $myData = mysqli_query($con,$sql); //pull podataka iz baze
    $record = mysqli_fetch_array($myData);
  $id = $record['ID'];
  $sifra = date("YmdHis");
    
    echo  "<div class='container-fluid'>
    <h1>UPUTNICA</h1>
    <form> <!--izrada ispisa-->
      
    <!--šifra-->
      <div class='form-group'>
        <label for='sifra'>Šifra uputnice:</label>
        <input type='text' class='form-control' id='sifra' name='sifra' aria-describedby='imeHelp' value='$sifra' required>
        
      </div>
      <!--end šifra-->
    
    
    <!--ime-->
      <div class='form-group'>
        <label for='ime'>Ime zaposlenika:</label>
        <input type='text' class='form-control' id='ime' name='ime' aria-describedby='imeHelp' value='$record[ime]' required>
        
      </div>
      <!--end ime-->

      <!--prezime-->
      <div class='form-group'>
        <label for='prezime'>Prezime zaposlenika:</label>
        <input type='text' class='form-control' id='prezime' name='prezime' aria-describedby='prezimeHelp' value='$record[prezime]' required>
        
      </div>
      <!--end prezime-->

      <!--mb-->
      <div class='form-group'>
        <label for='mb'>Matični broj zaposlenika:</label>
        <input type='number' class='form-control' id='mb' name='mb' aria-describedby='mbHelp' value='$record[mb]' required>
        
      </div>
      <!--end mb-->

      <!--oib-->
      <div class='form-group'>
        <label for='oib'>OIB:</label>
        <input type='number' class='form-control' id='oib' name='oib' aria-describedby='oibHelp' value='$record[oib]' required>
       
      </div>";
     

     
      echo "<div class='form-group'>
        <label for='radno_mjesto'>Radno mjesto zaposlenika:</label>
        <select type='text' class='form-control' id='radno_mjesto' name='radno_mjesto' aria-describedby='radno_mjestoHelp' required>";
        $sqlradno_mjesto = "SELECT * FROM radna_mjesta"; //sql upit za ispis
        $myDataradno_mjesto = mysqli_query($con,$sqlradno_mjesto);
        while ($recordradno_mjesto =mysqli_fetch_array($myDataradno_mjesto))
        {
         echo "<option>" . $recordradno_mjesto['radno_mjesto'] . "</option>";
        }
        echo "</select>
        
      </div>
      <!--end radno_mjesto-->

      <!--pocetak_rs-->
      <div class='form-group'>
        <label for='pocetak_rs'>Početak radnog staža zaposlenika:</label>
        <input type='date' class='form-control' id='pocetak_rs' name='pocetak_rs' aria-describedby='pocetak_rsHelp' value='$record[pocetak_rs]' required>
        
      </div>
      <!--end pocetak_rs-->

    </form>
  </div>";
  ?>
<div class="container-fluid">


  <form>
        <div class="form-row">
          <div class="col-md-4 mb-4">
            <label for="potpis_zaposlenika"></label>
            <input type="potpis_zaposlenika" class="form-control"  name="potpis_zaposlenika" aria-describedby="potpis_zaposlenikaHelp" required>
            <small id="potpis_zaposlenikaHelp" class="form-text text-muted">Potpis zaposlenika</small>
          </div>
            <div class="col-md-4 mb-4">
              <label for="Djelatnik_zastite_na_radu"></label>
              <input type="text" class="form-control"  name="Djelatnik_zastite_na_radu" aria-describedby="Djelatnik_zastite_na_raduHelp" required>
              <small id="Djelatnik_zastite_na_raduHelp" class="form-text text-muted">Sandro Car</small>
            </div>  
           </div>


  <!--end Ažuriranje-->




  <!-- Optional JavaScript -->
  <script>  //skripta koja popozivaiva funkciju za ispis trenutnog ekrana
window.onload = function(){
    window.print();
};


 

    </script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
</body>

</html>