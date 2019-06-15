<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 23.03.2016
 * Time: 23.26
 */
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];
if (!$innloggetBruker) {
    print ("Denne siden krever innlogging");
}
else {
//    include ("start.php");
    print ("<div class='row'>");
    print ("<div class='col-md-8'>");
    print ("Velkommen til startsiden<br>");
    print ("Du er logget inn som $innloggetBruker <br>");
    print ("I menyen til venstre finner du ulike valg som kan utføres ved bruk av denne applikasjonen");
    print ("</div>");
    print ("</div>");
//    include ("slutt.php");
}
?>