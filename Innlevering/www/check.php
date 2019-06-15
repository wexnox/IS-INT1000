<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 29.03.2016
 * Time: 03.09
 */
session_start();
if (!isset($_SESSION['brukernavn']) || isset($_SESSION['brukernavn']) && $_SESSION['brukernavn'] == false) {
    header('Location: innlogging.php');
}
?>