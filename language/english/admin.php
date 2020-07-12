<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Moved v1.0								//
//  ------------------------------------------------------------------------ 	//

define("_MD_MOVED_NAME",		"Moved");
define("_MD_MOVED_ORIGINE",		"Referer");
define("_MD_MOVED_HEADER",		"Referers of ");
define("_MD_MOVED_NOVISIT",		"There are no data recorded in the database yet.");

define("_MD_MOVED_INDEX",		"Referers' Tracker");
define("_MD_MOVED_HELP",		"Help");

define("_MD_MOVED_CREDIT",		"Moved is a creation of ");
define("_MD_MOVED_DATE",		"Last update");
define("_MD_MOVED_AGENT",		"Agent");
define("_MD_MOVED_REFERER",		"Number of wrong backlinks :");
define("_MD_MOVED_VISITS",		"Visits");
define("_MD_MOVED_RANKING",		"Ordered by");

define("_MD_MOVED_ADMIN",		"Admin");
define("_MD_MOVED_MODULE",		"Module");
define("_MD_MOVED_DELETED",		"Referer deleted");
define("_MD_MOVED_CLEANED",		"Referer cleaned");
define("_MD_MOVED_CLEAN",		"Remove referers older than ");
define("_MD_MOVED_DAYS",		"days");
define("_MD_MOVED_WARN_EXP",		" : Internal links! Check your pages to define proper url.");

define("_MD_MOVED_GUIDE",		"<h1 align='center'>Installation guide
"._MD_MOVED_NAME."</h1>

This is a removed or missing module page redirection module. That is, it will redirect your users and search engine 'spiders' to be redirected to the right place and prevent the 404 like errors.

For more informations, read the following explanations

<ul><li><a href='#q1'>1) Installation</a></li>
<li><a href='#q2'>2) Preferences</a></li>
<li><a href='#q3'>3) Adaptation</a></li>
<li><a href='#q4'>4) Cloning</a></li>
<li><a href='#q4'>5) Referers tracking</a></li></ul>






<hr />







<a id='q1' name='q1'><h2>1) Installation</h2></a>
Follow the next 6 steps to replace a missing module:

<ol><li>1) Download the '<a href='../doc/module_replacement.zip'>Replacement Module</a>' on your hard drive.</li>

<li>2) Renam the directory <font color='FF3333'>'module_replacement'</font> with the name of the replaced directory:
	(ie. : module_replacement -> section)</li>

	<ol><li>a. Edit file <font color='FF3333'><b>'xoops_version.php'</b></font>, and replace the following code line: 

   		[code]&#36module = 'module_replacement'; [/code]
   		with the replaced module name:
		(ie : &#36module = 'section';)</li>


	<li>b. Edit language file <font color='FF3333'><b>'language/LANGUE_PAR_DEFAUT/modinfo.php'</b></font>, and replace the following code line: 

   		[code]&#36MODULE = 'module_replacement'; [/code]
   		with the replaced module name:
		(ie : &#36module = 'section';)</li>
		Repeat the operation for each and every default language used on your website!


	<li>c. Edit file <font color='FF3333'><b>'include/install_funcs.php'</b></font>, and replace the following code line:
 
   		[code]xoops_module_install_[i]module_replacement[/i](&&#36module) { [/code]
   		with the replaced module name:
		(ie : xoops_module_install_section(&&#36module) {)</li></ol>



<li>3) Upload the modified directory in your 'modules' Xoops site directory and install it as usual with the module manager.</li>

<li>5) Edit the module preferences, and indicate the replacement module url. See preferences for more.
   (ie : modules/smartsection/)</li></ol>
That's it.






<hr />






<a id='q2' name='q2'><h2>2) Preferences</h2></a>
Click on the module logo's preferences link in admin area.

<ol><li><b>a. Redirection</b>

Replace the replaced index page by another page.
- Displaying an absolute or relative url (can be outside your website). 
- Leave blank for default homepage (default).

<li><b>b. Redirection page</b>

Display or not a redirection page.</li>

<li><b>c. Logo</b>

Display a logo on your redirection page. 
Enter the picture url here. 
Leave empty to display none.</li>

<li><b>d. Redirection text</b>

Place here your custom redirection message.</li>

<li><b>e. Redirection timer</b>

Define how many second the redirection page is displayed in seconds..</li>

<li><b>f. Track referers and redirected pages</b>

Records datas from referers and redirected pages so that you may update your datas (if internal links).</li>

<li><b>g. Clean up entries</b>

Define how long in days datas are recorded in database.
Value set in days.</li>

<li><b>h. Warn by mail</b>

If you want to be warned by mail for each and every new referers recorded, pick one option.</li></ol>






<hr />







<a id='q3' name='q3'><h2>3) Adaptation</h2></a>
Default supported redirection pages are:
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
Check wether the module you are replacing has the above mentioned files. If not, copy and rename the index.php file as the source missing file. 






<hr />







<a id='q4' name='q4'><h2>4) Cloning</h2></a>

It is possible to clone the 'module_replacement' module and use it for more than one missing module. 
Just respect the installation process as explained above.
Preferences are to be defined for each and every replacement module.

Here is a list of ready to install module:
<ul>
<li><a href='../doc/wfsection.zip' target='_blank'>WFSection</a></li>
<li><a href='../doc/news.zip' target='_blank'>News</a></li>
<li><a href='../doc/newbb.zip' target='_blank'>NewBB</a></li>
</ul>






<hr />








<a id='q5' name='q5'><h2>5) <b>Referers verification</b></h2></a>
So that you may track down wrong referers click on a replacement module icon in admin area. 

The icone <img src='../images/icon/link_warning.gif' alt='' /> indicates that the source page (referer) comes from your own website. It is highly recommended to check the concerned link and modify it regarding the operated modification on your site.

Note that a referer coming from a search engine, would be automatically redirected to the search page of your website, with result of its previous query. 

Happy Xoopsing,

Solo














<div align='right'>Moved is a creation of Solo (Solo71) from <a href='www.wolfpackclan.com/wolfactory'>wolFactory</a>. - (c) Jully 2005</a>
");


?>

