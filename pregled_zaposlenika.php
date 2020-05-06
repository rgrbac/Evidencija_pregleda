<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Popis zaposlenika</title>
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
              <a class="nav-link" href="index.html">Povratak <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="unos_zaposlenika.html">Unos zaposlenika <span class="sr-only">(current)</span></a> 
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
    <!--end navbar-->

    <div class="row">
        </br>
    </div>
   
        <div class="row">
            </br>
        </div>

         

        <!-- Pregled zaposlenika -->
        <div class="row">
            <div class="col">
                <?php
				
                    $con=mysqli_connect("127.0.0.1","root",""); //spajanje na server
                    
                    if(!$con){
                        die("Nesupjelo spajanje: " . mysqli_error());}
                    
                    mysqli_select_db($con,"evzap"); //spajanje na bazu
                    $sql = "SELECT zaposlenici.ID, zaposlenici.ime, zaposlenici.prezime, zaposlenici.mb, zaposlenici.oib, radna_mjesta.radno_mjesto AS rm, zaposlenici.pocetak_rs, zaposlenici.datum_pregleda, zaposlenici.datum_isteka_pregleda FROM zaposlenici, radna_mjesta WHERE zaposlenici.radno_mjesto = radna_mjesta.ID"; //sql upit za ispis zaposlenika
                    $myData = mysqli_query($con,$sql); //pull podataka iz baze
                    
                    //kreiranje klase table za ispis podataka   
                    echo '<table class="table"> 
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Ime</th> 
                            <th scope="col">Prezime</th>
                            <th scope="col">Matični broj</th>
                            <th scope="col">OIB</th>
                            <th scope="col">Radno Mjesto</th>
                            <th scope="col">Početak radnog staža</th>
                            <th scope="col">Datum obavljenog pregleda</th>
                            <th scope="col">Datum isteka pregleda</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>';
                        while($record = mysqli_fetch_array($myData)){
                            echo "<tr>";
                            echo "<td style='background-color:#90ee90'>" . $record['ime'] . "</td>";
                            echo "<td style='background-color:#90ee90'>" . $record['prezime'] . "</td>";
                            echo "<td style='background-color:#90ee90'>" . $record['mb'] . "</td>";
                            echo "<td style='background-color:#90ee90'>" . $record['oib'] . "</td>";
                            echo "<td style='background-color:#90ee90'>" . $record['rm'] . "</td>";
                            echo "<td style='background-color:#90ee90'>" . $record['pocetak_rs'] . "</td>";
                            echo "<td style='background-color:#90ee90'>" . $record['datum_pregleda'] . "</td>";
                            echo "<td style='background-color:#90ee90'>" . $record['datum_isteka_pregleda'] . "</td>";
                            echo "<td style='background-color:#90ee90'><a href=azuriraj_zaposlenika.php?id=".$record['ID']." <button type='button' class='btn btn-info btn-sm btn-block'>Ažuriraj zaposlenika</button></a></td>";
                            //kreriranje klase buton koja poziva php skriptu za taj ID djelatnika
                            echo "<td style='background-color:#90ee90'><a href=unos_pregleda.php?id=".$record['ID']." <button type='button' class='btn btn-dark btn-sm btn-block'>Unos pregleda</button></a></td>";
                            echo "<td style='background-color:#90ee90'><a href=izrada_uputnice.php?id=".$record['ID']." <button type='button' class='btn btn-warning btn-sm btn-block'>Ispis uputnice</button></a></td>";
                            echo "<td style='background-color:#90ee90'><a onClick=brisanje(".$record['ID'].") <button type='button' class='btn btn-danger btn-sm btn-block'>Izbriši</button></a></td>";
                            echo "</tr>";
                        }
                 ?>
            </div>
        </div>
       
    </div>



    <!--end Ispis zaposlenika-->
    <!-- Optional JavaScript -->
    <!-- Potvrda brisanja -->
    <script>
        function brisanje(id) {
            var odgovor = false;
            odgovor = confirm("Jeste li sigurni?");
            if (odgovor) {
                window.open("izbrisi_zaposlenika.php?id=" + id, "_parent");   
            }
        }
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