<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Upis novog zaposlenika</title>
</head>

<body style="background-color:#FFE4C4"></body>
<body>
  <!--alatna traka-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- pozivanje bootstrap klase za alatnu traku s predefiniranim stilom -->
    <a class="navbar-brand" href="index.html">Evidencija pregleda</a> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Povratak <span class="sr-only">(current)</span></a>
        </li>
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
            <a class="nav-link" href="pomoc.html">Pomoć <span class="sr-only">(current)</span></a>
          </li>    
          </div>            
      </ul>
    </div>
  </nav>
  <!--kraj alatne trake-->
  <div class="row">
  </br>
</div>


  <!--izbornik-->
  <div class="container-fluid">
    <form method="POST" action="unos_zaposlenika.php">  <!--formiranje metode pozivanje back end PHP metode-->

      <form>
        <div class="form-row">
          <div class="col-md-4 mb-4">
            <label for="ime">Ime</label>
            <input type="text" class="form-control" id="ime" name="ime" aria-describedby="imeHelp" required>
            <small id="imeHelp" class="form-text text-muted">Unesite ime zaposlenika</small>
          </div>
            <div class="col-md-4 mb-4">
              <label for="prezime">Prezime</label>
              <input type="text" class="form-control" id="prezime" name="prezime" aria-describedby="prezimeHelp" required>
              <small id="prezimeHelp" class="form-text text-muted">Unesite prezime zaposlenika</small>
            </div>  
           </div>
         

            <div class="form-row">
            <div class="col-md-4 mb-4">
              <label for="mb">Matični broj zaposlenika</label>
              <input type="number" class="form-control" id="mb" name="mb" aria-describedby="mbHelp" required>
              <small id="mbHelp" class="form-text text-muted">Unesite matični broj zaposlenika</small>
            </div>         
              <div class="col-md-4 mb-4">
                <label for="pocetak_rs">Početak radnog staža zaposlenika</label>
                <input type="date" class="form-control" id="pocetak_rs" name="pocetak_rs" aria-describedby="pocetak_rsHelp" required>
                <small id="pocetak_rsHelp" class="form-text text-muted">Unesite početak radnog staža zaposlenika</small>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 mb-4">
                <label for="oib">OIB zaposlenika</label>
                <input type="number" class="form-control" id="oib" name="oib" aria-describedby="oibHelp" required>
                <small id="oibHelp" class="form-text text-muted">Unesite matični broj zaposlenika</small>
              </div>  
              <?php       
              echo "<div class='form-group'>
            <label for='radno_mjesto'>Radno mjesto:</label>
            <select type='text' class='form-control' id='radno_mjesto' name='radno_mjesto' aria-describedby='radno_mjestoHelp' required>";
            $con=mysqli_connect("127.0.0.1","root",""); //spajanje na server
                    
            if(!$con){
                die("Nesupjelo spajanje: " . mysqli_error());}
            
            mysqli_select_db($con,"evzap"); //spajanje na bazu
            $sqlradno_mjesto = "SELECT * FROM radna_mjesta"; //sql upit za ispis
            $myDataradno_mjesto = mysqli_query($con,$sqlradno_mjesto);
            while ($recordradno_mjesto =mysqli_fetch_array($myDataradno_mjesto))
             {
                echo "<option>" . $recordradno_mjesto['radno_mjesto'] . "</option>";
             }
        echo "</select>
        <small id='radno_mjestoHelp' class='form-text text-muted'>Unesite radno mjesto zaposlenika</small>
      </div>
      <!--end radno_mjesto-->";
      ?>
      </div>
      <button class="btn btn-primary" type="submit">Spremi zaposlenika</button> <!--end izbornik-->
      </form>
<!--end izbornik-->






  <!-- Optional JavaScript -->
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