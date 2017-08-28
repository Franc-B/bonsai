<?php
require_once('config/config.php');

$message_erreur = "";
if(!empty($_POST['pseudo']) && !empty($_POST['passe']))
{
	$login=$_POST['pseudo'];
	$login_crypt=md5($login);
	$passe=$_POST['passe']; 
	$passe_crypt=md5($passe);
	if ($stmt = mysqli_prepare($mysqli, "SELECT * FROM `xwl_membres` WHERE email=?")) 
{
    /* Lecture des marqueurs */
    mysqli_stmt_bind_param($stmt, "s", $login);
    /* Exécution de la requête */
    mysqli_stmt_execute($stmt);
    /* Lecture des variables résultantes */
    mysqli_stmt_bind_result($stmt,$id_membre, $username,$niveau,$password,$email,$premier);
    /* Récupération des valeurs */
    mysqli_stmt_fetch($stmt);
     /* Fermeture du traitement */
    mysqli_stmt_close($stmt);
	/*echo $id_membre, $username,$niveau,$password,$email,$premier;*/
}
// 1er compte : mot de passe crypté, autres comptes : mot de passe non crypté

if($premier =='1' && $passe_crypt==$password || $passe==$passsword)	
		{
			$_SESSION['id_user'] = $id_membre;
			$_SESSION['login'] = $username;
			$_SESSION['connecte']=true;			
			// cookie valable 30j
			setcookie('phpBlocNote_cookie',$id_membre.'~'.$login_crypt.'~	'.$passe_crypt, time()+60*60*24*30);			
			require_once('nt_haut-nav.php');
			redirect('./content/nt_menu.php', "Bravo ".$premier=$row['username']." ! Vous êtes bien connecté(e).", $redirection);
		}
		else
		{
			$message_erreur .= "Erreur : le mot de passe est faux ! !";
		}
   }
 else
{
	$message_erreur .= "Erreur : veuillez saisir votre login  ET votre mot de passe !";
}



	

