<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 23.03.2016
 * Time: 23.27
 */
?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" title="stilark">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Innlogging</h3>
                <form action="" id="innloggingSkjema" name="innloggingSkjema" method="post">
                    <div class="form-group">
                        <label>Brukernavn</label>
                        <input class="form-control" type="text" name="brukernavn" id="brukernavn" placeholder="Brukernavn">
                    </div>
                    <div class="form-group">
                        <label>Passord</label>
                        <input class="form-control" type="password" name="passord" id="passord" placeholder="Passord">
                    </div>
                    <button class='btn btn-default' type="submit" name="logginnKnapp" value="#">Logg inn</button>
                    <button class='btn btn-default' type="reset" name="nullstill" id="nullstill" >Nullstill</button>
                </form>
<?php
@$logginnKnapp=$_POST["logginnKnapp"];
if ($logginnKnapp)
{
    include ("sjekk.php");

    $brukernavn=$_POST["brukernavn"];
    $passord=$_POST["passord"];

    if (!sjekkBrukernavnPassord($brukernavn,$passord))
    {
        print ('Feil brukernavn/passord');
    }
    else
    {
        @session_start();
        $_SESSION["brukernavn"]=$brukernavn;
        print ("<META http-equiv='refresh' content='0;URL=hoved.php'>");
        print ("</div>");
        print ("</div>");
        print ("</div>");

    }
}
?>