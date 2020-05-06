<?php
//fetch.php

if(issset($_POST["querry"]))
{
    $connect = mysqli_connect("127.0.0.1", "root", "", "evzap");
    $request = mysqli_real_escape_string($connect, $_POST)["query"]);
    
    $query = "SELECT * FROM zaposlenici
        WHERE ime LIKE '%".$request."%'
        OR prezime LIKE '%".$request."%'
        OR mb LIKE '%".$request."%'
        OR oib LIKE '%".$request."%'
        OR rm LIKE '%".$request."%'
        OR pocetak_rs LIKE '%".$request."%'
        OR datum_pregleda LIKE '%".$request."%'
        OR datum_isteka_pregleda LIKE '%".$request."%'    
    ";
    $result = mysqli_query ($conect, $query);
    $html = '';
    $data = array ();
    $html .= '
    <table class="table">
                        <thead>
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
                        </thead>
    ';
    while($row = mysqli_fetch_array($result))
    {
        $data[] = $row["ime"];
        $data[] = $row["prezime"];
        $data[] = $row["oib"];
        $data[] = $row["rm"];
        $data[] = $row["pocetak_rs"];
        $data[] = $row["datum_pregleda"];
        $data[] = $row["datum_isteka_pregleda"];
        $html .= '
        <tr>
             <td>' . $row["ime"] . '</td>
             <td>' . $row["prezime"] . '</td>
             <td>' . $row["oib"] . '</td>
             <td>' . $row["rm"] . '</td>
             <td>' . $row["pocetak_rs"] . '</td>
             <td>' . $row["datum_pregleda"] . '</td>
             <td>' . $row["datum_isteka_pregleda"] . '</td>
        </tr>
        ';
    }
    $html .= '</table>';

    if(isset($_POST["typeahead_search"]))
    {
        echo $html;
    }
    else
    {
        $data = array_unique($data);
        echo json_encode($data);
    }

   
}

?>