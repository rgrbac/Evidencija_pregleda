<?php
$con=mysqli_connect("127.0.0.1","eviz_admin","Admin2210!"); //spajanje na server
                    
                    if(!$con){
                        die("Nesupjelo spajanje: " . mysqli_error());}
                    
                    mysqli_select_db($con,"eviz_evzap"); //spajanje na bazu

?>