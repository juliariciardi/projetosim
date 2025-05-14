<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto SIM</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="logo">
    <a href="http://www.fct.unl.pt" target="_blank">
        <img src="Figuras-sim/logo_fct.png" width="170px" alt="" id="logo">
    </a>
    <h4>CLÍNICA SIM-FCT</h4>
</div>

<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
if (isset($_SESSION['authUser']) and $_SESSION['authUser'] ==1) {
    include "menus_private.php";
} else  {
    include "menus_public.php";
}
?>
