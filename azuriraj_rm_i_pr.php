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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!--klasa koja kreira alatnu traku ispisanu u HTML primjenjenim CSS stilom-->
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
            <a class="nav-link" href="unos_rm_i_pr.html">Unos RM i PR <span class="sr-only">(current)</span></a>
          </li>       
          <li class="nav-item active">
            <a class="nav-link" href="pomoc.html">Pomoć <span class="sr-only">(current)</span></a>
          </li>    
          </div>            
      </ul>
    </div>
      </nav>
  <!--end navbar-->
  <div class="row"> <!--Klasa Row kojom se kreraju retci u HTML-u-->
    </br>
  </div>
  <!--Ažuriranje-->
  <?php
    $con=mysqli_connect("127.0.0.1","root",""); //spajanje na lokalni server s korisničkim imenom root i praznom lozinkom
                    
    if(!$con){
        die("Nesupjelo spajanje: " . mysqli_error());} //poruka o neuspojelom spajanju
    
    mysqli_select_db($con,"evzap"); //spajanje na bazu 
    $sql = "SELECT * FROM radna_mjesta WHERE ID='$_GET[id]'"; //sql upit za ispis
    $myData = mysqli_query($con,$sql); //pull podataka iz baze
    $record = mysqli_fetch_array($myData);
	$id = $record['ID'];
    
    echo  "<div class='container-fluid'>
    <form method='POST' action='azuriraj_rm_i_pr_back.php?id=$id'> <!--pozivanje beckeed skripte za ažuriranje podataka u bazi-->
      
    <!--radno_mjesto-->
      <div class='form-group'>
        <label for='radno_mjesto'>Radno Mjesto:</label>
        <input type='text' class='form-control' id='radno_mjesto' name='radno_mjesto' aria-describedby='radno_mjestoHelp' value='$record[radno_mjesto]' required>
        <small id='radno_mjestoHelp' class='form-text text-muted'>Unesite radno mjesto</small>
      </div>
      <!--end radno_mjesto-->

      <!--procjena_rizika-->
      <div class='form-group'>
        <label for='procjena_rizika'>Procjena Rizika:</label>
        <input type='text' class='form-control' id='procjena_rizika' name='procjena_rizika' aria-describedby='procjena_rizikaHelp' value='$record[procjena_rizika]' required>
        <small id='procjena_rizikaHelp' class='form-text text-muted'>Unesite procjenu rizika</small>
      </div>
      <!--end procjena_rizika-->

      
      <button type='submit' class='btn btn-success btn-block'>Ažuriraj Radno mjesto i procjenu rizika</button>
    </form>
  </div>"
  ?>
  <!--end Ažuriranje-->


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