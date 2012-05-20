<?php

require_once('../Classes/Mysql.class.php');

/*
 @nom: configuration
 @description: Stockage des constantes de configuration du projet
 */

/***********************/
/**  BASE DE DONNEES  **/
/***********************/

define('UPLOAD_FOLDER','uploads/');//chemin vers le dossier d'upload (ne pas oublier de mettre les droits d'�criture sur ce dossier)
define('DCFOLDER',UPLOAD_FOLDER.'.dc/'); //fichier contenant les donn�es d'�v�nements
define('LANGFOLDER','lang/'); //dossier contenant les fichiers donn�es de traductions
define('EVENTFILE','.event.dc'); //fichier contenant les donn�es d'�v�nements
define('USERFILE','.user.dc.php'); //fichier contenant les donn�es utilisateurs
define('CONFIGFILE','.config.dc.php'); //fichier contenant les donn�es utilisateurs
define('TAGSFILE','.tags.dc'); //fichier contenant les tags des fichiers envoy�s
define('CHUCKFILE','.chuck.dc.fortune');//Nom du fichier fortune contenant les citations de Chuck Norris

/*************************/
/**  WEBSERVICES / API  **/
/*************************/

/******************/
/**  TRADUCTION  **/
/******************/

/**************/
/**  THEMES  **/
/**************/

define('TPL_NAME','DefaultTheme');//Racine des themes

/******************/
/**  PAGINATION  **/
/******************/

/*****************************/
/**  INFORMATIONS GLOBALES  **/
/*****************************/

define('DC_TITLE','DropCenter');//Titre du dropCenter
define('DC_LOCATION','NoWhere');
define('DC_CATEGORY','Computers');
define('DC_KEYWORDS','partage,fichiers,fox,idleman,web,css3,html5');
define('DC_AUTHOR','Fox,Idleman');
define('DC_IDE','Eclipse,Sublime2,Notepad++');
define('DC_LANGAGE','Fr');
define('DC_URL','http://localhost/DropCenter');
define('DC_LICENCE','GPL');
define('DC_COPYRIGHT',SITE_TITLE.' by '.SITE_AUTHOR.' '.SITE_LICENCE.' <a href="'.SITE_URL.'">'.SITE_URL.'</a>');//Racine des themes
define('DC_DESCRIPTION','File drop center kiss n\'fun');//description du dropCenter

define('DC_TIMZONE','Europe/Paris'); // Time zone de votre hebergeur
define('DC_LOGO','');//logo central du dropCenter (Si rien n'est mis, le logo par d�faut appara�t)
define('DC_LICENCE','CC BY 3.0');//License de votre dropCenter
define('UPLOAD_FOLDER','uploads/');//chemin vers le dossier d'upload (ne pas oublier de mettre les droits d'�criture sur ce dossier)
define('NAME_LIMIT',25);//Nombre maximal de caract�res affich�s pour les fichiers
define('NAME_LIMIT_BORDER','..');//Les caract�res qui s'afficheront pour signifier qu'un nom est raccourci
define('MAX_SIZE',1000);//Taille maximale authoris�e par fichier en Mo (Pensez a configurer post_max_size et upload_max_size dans le fichier php.ini de votre serveur si vous voulez uploader de gros fichiers).
define('FORBIDEN_FORMAT','exe,php,sh,bin,htaccess,htm,html,asp');//Les extensions interdites � l'ex�cution s�par�es par des virgules (les fichiers seront bien envoy�s mais un .txt sera rajout� � l'extension afin d'emp�cher les utilisateurs d'ex�cuter leurs fichiers sur le serveur
define('AVATAR_DEFAULT','defaultAvatar.png'); //chemin de l'avatar par d�faut
define('AVATARFOLDER',UPLOAD_FOLDER.'avatars/'); //dossier contenant les avatars
define('FORTUNE',true);//Affiche une citation al�atoire Chuck Norris Facts (mettre � false pour ne pas afficher)
define('RSS_MAIL','rss@mail.com');
define('READ_FOR_ANONYMOUS',false);// D�finit si les visiteurs non authentifi�s peuvent lire le contenu du dropCenter (true = lecture possible, false = lecture interdite)
define('DC_LANG','fr - Francais');//D�finit la langue par d�faut
define('DIR_LANG','lang/');//Dossier des fichiers de langue
define('MAIL',true);//Autorise les notifications par e-mail
define('DISPLAY_DOTFILES',false);//Affiche ou non les dossiers/fichiers commen�ant par un point
define('DISPLAY_UPDATE',true);//Activer la v�rification des mises-�-jour
define('DISPLAY_AVATAR_FOLDER',false);//Afficher le dossier des avatars



/******************/
/**  INCLUSIONS  **/
/******************/

define('STYLESHEET_PATH','Css');//Racine des themes
define('JAVASCRIPT_PATH','Javascript');//Racine des themes

/**************/
/**  AUTRES  **/
/**************/

define('SECURE_DELIMITER_BEGIN','<?php /*'); //
define('SECURE_DELIMITER_END','*/ ?>'); //
define('DC_VERSION','1.4'); //Version du programme
define('DC_NAME','Beta');//Nom du programme
define('DC_VERSION_NUMBER','1.4');//Nom du programme
define('DC_WEBSITE','http://dropcenter.fr/');//Site du programme

?>