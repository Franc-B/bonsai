<?php
// inclusion du fichier de configuration
require_once('config/config.php');
// inclusion des fonctions
require_once('fonctions.php');

// variables globales
global $id_user;
global $redirection;
global $titre_site;
global $sous_titre_site;
global $type_install;

$id_user = 0;
$redirection = 0;
$titre_site = '';

// démarrage de la session
session_start();

// test si connecté
$connecte = test_connexion();

// test niveau utilisateur
$niveau = trouve_niveau($id_user);
// lecture des paramètres de l'application dans la base de données
lire_config();
?>
<!DOCTYPE html>
<html>
    <head>    	
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8"/>
    <meta name=viewport content="width=device-width, initial-scale=1">
       <title>bonsaï</title>  
<link rel="stylesheet" href="templates/stylebon.css" />    
    </head>
    <body>
    <div id="bloc_page"> 
 <section> 
 <?php
// Enregistrons les informations de date dans des variables
$jour = date('d');$mois = date('m');$annee = date('Y');
$heure = date('H');$minute = date('i');
if(!$connecte)
{
	?>
	<div id="formulaire1">	<h1>Veuillez vous connecter :</h1><br /><br />
	
	<form action='nt_connex_confirm.php' method='post'>
	
<h3>votre login :</h3>
<input type='text' name='pseudo' /><br /><br />
	 
	<h3>Mot de passe :</h3>
	<input type='password' name='passe' /><br /><br />
	
	 
	
   <input type='submit' name='connect' value='Connexion' /></form></div>
   <?php
 }
else
{
	echo ("Bonjour ".$_SESSION['login']." !<br />Vous êtes déjà connecté(e).");

	
}

?>


