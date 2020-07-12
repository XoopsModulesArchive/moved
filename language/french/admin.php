<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Moved v1.2								//
//  ------------------------------------------------------------------------ 	//

define("_MD_MOVED_NAME",		"Moved");
define("_MD_MOVED_ORIGINE",		"Origine");

define("_MD_MOVED_INDEX",		"Liste des r�f�rants");
define("_MD_MOVED_HELP",		"Aide");

define("_MD_MOVED_HEADER",		"Redirection sur ");
define("_MD_MOVED_NOVISIT",		"Il n'y a pas encore de donn�e enregistr�e.
Pour plus d'informations concernant l'installation de ce module, <a href='../help.php'>lisez le guide d'installation</a>.");

define("_MD_MOVED_CREDIT",		"Moved est une cr�ation de ");
define("_MD_MOVED_DATE",		"Derni�re visite");
define("_MD_MOVED_AGENT",		"Agent");
define("_MD_MOVED_REFERER",		"R�f�rant :");
define("_MD_MOVED_VISITS",		"Nombre de visite");
define("_MD_MOVED_RANKING",		"Classement par");

define("_MD_MOVED_ADMIN",		"Admin");
define("_MD_MOVED_MODULE",		"Module");
define("_MD_MOVED_DELETED",		"R�f�rant supprim�");
define("_MD_MOVED_CLEANED",		"R�f�rants purg�s");
define("_MD_MOVED_CLEAN",		"Supprimer les r�f�rants vieux de ");
define("_MD_MOVED_DAYS",		"jours.");
define("_MD_MOVED_WARN_EXP",		" : Liens internes ! V�rifiez votre page pour d�fnir une url correcte.");

define("_MD_MOVED_GUIDE",		"<h1 align='center'>Guide d'installation
"._MD_MOVED_NAME."</h1>

Ceci est un module de redirection pour les pages de modules remplac�s. Il permet de rediriger les visiteurs et les 'spiders' des moteurs de recherche de retrouver les bonnes pages, et �viter les pages 404.

Pour plus d'infomation, consultez les paragraphes suivantes

<ul><li><a href='#q1'>1) Installation</a></li>
<li><a href='#q2'>2) Pr�ferences</a></li>
<li><a href='#q3'>3) Adaptation</a></li>
<li><a href='#q4'>4) Clonage</a></li>
<li><a href='#q4'>5) V�rification des r�f�rents</a></li></ul>






<hr />







<a id='q1' name='q1'><h2>1) Installation</h2></a>
Suivez les 4 �tapes d'installation pour remplacer un module manquant.

<ol><li>1) T�l�chargez le '<a href='../doc/module_replacement.zip'>Module de remplacement</a>' sur votre disque dur.</li>

<li>2) Renommez le r�pertoire <font color='FF3333'>'module_replacement'</font> avec le nom du module � remplacer :
	(ie. : module_replacement -> section)</li>

	<ol><li>a. Editez le fichier <font color='FF3333'><b>'xoops_version.php'</b></font>, et remplacez la ligne suivante : 

   		[code]&#36module = 'module_replacement'; [/code]
   		avec le nom du module � remplacer :
		(ex : &#36module = 'section';)</li>


	<li>b. Editez le fichier de langue <font color='FF3333'><b>'language/LANGUE_PAR_DEFAUT/modinfo.php'</b></font>, et remplacez la ligne suivante : 

   		[code]&#36MODULE = 'module_replacement'; [/code]
   		avec le nom du module � remplacer : (ie : &#36module = 'section';)</li>
		Renouvelez l'op�ration pour chaque fichier de langue utilis� sur votre site !


	<li>c. Editez le fichier <font color='FF3333'><b>'include/install_funcs.php'</b></font>, et remplacez la ligne suivante :
 
   		[code]xoops_module_install_[i]module_replacement[/i](&&#36module) { [/code]
   		avec le nom du module � remplacer : 
		(ie : xoops_module_install_section(&&#36module) {)</li></ol>



<li>3) T�l�chargez le r�pertoire ainsi cr�� dans le r�pertoire 'modules' de votre site Xoops et installez le normalement avec le gestionnaire de module.</li>

<li>4) Editez les preferences du module, et indiquez le module ou la page � afficher en lieu et place. 
   (ie : modules/smartsection/)</li></ol>
C'est tout !






<hr />






<a id='q2' name='q2'><h2>2) Pr�ferences</h2></a>
Cliquez sur logo le lien pr�sent dans le logo du module.

<ol><li><b>a. Redirection</b>

Remplace la page d'index (ou autre url) d�faillante par une page valide.
- Iindiquez une url absolue ou relative (m�me externe � votre site). 
- Laisser vierge pour la page d'accueil par d�faut de votre site Xoops.</li>

<li><b>b. Page de redirection </b>

Afficher la page de redirection, ou ne pas effectuer de transition interm�diaire.</li>

<li><b>c. Logo</b>

Affiche une banni�re sur votre page de redirection. 
Indiquez l'url de l'image. Laisser vierge pour ne pas en afficher. </li>

<li><b>d. Texte de redirection</b>

Indiquez le texte � afficher sur la page de redirection.</li>

<li><b>e. Dur�e de redirection</b>

Indiquez combien de temps la page de redirection doit s'afficher en secondes.</li>

<li><b>f. Traquer les redirection </b>

Enregistrer les donn�e concernant les r�f�rants, de fa�on � pouvoir mettre � jour les donn�es.</li>

<li><b>g. Nettoyer les entr�es</b>

D�terminer le laps de temps apr�s lequel les donn�es sur les r�f�rants sont conserv�es en m�moire. 
Indique une valeur en jours.</li>

<li><b>h. Avertire par mail</b>

Si vous souhaitez �tre averti par mail � chaque fois qu'un nouveau lien d�faillant est d�tect�, choisissez l'une des options.</li></ol>






<hr />







<a id='q3' name='q3'><h2>3) Adaptation</h2></a>
Les pages de redirection par defaut sont les suivantes :
<ul><li>index.php</li>
<li>article.php</li>
<li>category.php</li>
<li>client.php</li>
<li>content.php</li>
<li>item.php</li>
<li>join.php</li>
<li>page.php</li>
<li>print.php</li>
<li>rate.php</li>
<li>submit.php</li></ul>
V�rifier que le module que vous remplacez contient bien les fichiers ci-dessous(� la racine). Si il vous en manque, copiez et renommez le fichier 'index.php' avec le nom du fichier source manquant. 






<hr />







<a id='q4' name='q4'><h2>4) Clonage</h2></a>
Il est possible d'installer plusieurs modules de remplacement. R�p�tez simplement les op�rations d'installation en adaptant les noms des modules � remplacer. Les pr�f�rences doivent �tre d�finis pour chacun des modules de remplacement ainsi install�s.

Voici une liste de module types d�j� pr�ts :
<ul>
<li><a href='../doc/wfsection.zip' target='_blank'>WFSection</a></li>
<li><a href='../doc/news.zip' target='_blank'>News</a></li>
<li><a href='../doc/newbb.zip' target='_blank'>NewBB</a></li>
</ul>






<hr />








<a id='q5' name='q5'><h2>5) <b>V�rification des r�f�rents</b></h2></a>
Afin de suivre � la trace les r�f�rents, cliquez simplement sur l'icone de l'un des modules de remplacement. 

L'ic�ne <img src='../images/icon/link_warning.gif' alt='' /> indique que la page source (r�f�rant) provient de votre propre site. Il est vivement conseill� de contr�ler le lien et le modifier en fonction des modification eff�ctu�es sur votre site.

Un visiteur en provenance d'un moteur de recherche sera automatiquement redirig� vers la page de recherche de votre site avec les r�sultats de sa recherche par mot cl�. 

Bon Xoops,

Solo














<div align='right'>Moved est une cr�ation de Solo (Solo71) de la <a href='www.wolfpackclan.com/wolfactory'>wolFactory</a>. - (c) juillet 2005</a>
");
?>

