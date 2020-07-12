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

// General settings
include_once("../../mainfile.php");
include_once(XOOPS_ROOT_PATH."/header.php");
$myts =& MyTextSanitizer::getInstance();

// Enregister les infos du référant en cours
if ( $xoopsModuleConfig['tracker'] ) {

	$module = $xoopsModule -> getVar('dirname');
	$referer = getenv("HTTP_REFERER");
	$agent = getenv("HTTP_USER_AGENT");
	$query = getenv("QUERY_STRING");
//	$query = $_SERVER['QUERY_STRING'];
//   	$query = parse_url($_SERVER['HTTP_REFERER']);	
	$date = time();

// Nettoyer la bdd des entrées trop anciennes...
	if ( $xoopsModuleConfig['tracker_clean'] > 0 AND $xoopsModuleConfig['tracker_clean'] ) {
		$clean_days = (time()-(86400 * $xoopsModuleConfig['tracker_clean']) );
		$sql = "DELETE FROM ".$xoopsDB->prefix("moved_ref")." WHERE date < $clean_days AND module = $module";
		$xoopsDB->queryF($sql);
	}

	$sql = "SELECT module, referer, agent, visit, date 
	FROM ".$xoopsDB->prefix("moved_ref")." 
	WHERE referer = '$referer' AND module = '$module'";

	$result = $xoopsDB->query($sql);

	if ( $xoopsDB->getRowsNum($result) == 0 ) {
// The referer is not yet in the db, so let's add a new record
		$sql = "INSERT INTO ".$xoopsDB->prefix("moved_ref") . " VALUES ('', '$module', '$referer', '$agent', '1', '$date')";
		$xoopsDB->queryF($sql);

// Send a mail if new entry
	if ( $xoopsModuleConfig['warning'] != 'none' ) {

		if ( ($xoopsModuleConfig['warning'] == 'all' OR ($xoopsModuleConfig['warning'] == 'mysite' AND eregi( XOOPS_URL, $referer ) ) AND $SERVER_NAME )) { 
    	  		$url = "http://".$SERVER_NAME.$PHP_SELF;
  			$today = date("F j, Y, g:i a"); 
			$object = _MOVED_MAIL_OBJECT;
			$core = _MOVED_MAIL_CORE;
  			mail( $xoopsConfig['adminmail'] , "$object $referer", "$object $referer 
			$today
			$core $url"); 
 		}

	}


 	} else {
 // The referer is already in the db
 		$sql = "UPDATE ".$xoopsDB->prefix("moved_ref")." SET visit = visit+1, agent = '$agent', date = '$date' WHERE referer='$referer'";
 		$xoopsDB->queryF($sql);
	}
}


// Module Banner
if ($xoopsModuleConfig['moved_banner']) {
 $banner = '<img src="'.$xoopsModuleConfig['moved_banner'].'" alt="'.$xoopsModule -> getVar('name').'">'; 
 } else {
 $banner = '';}


//Rediriger l'index vers le moteur de recherche interne du site si mot clé
	if (	$query ) {

// Regexp pour matcher http://www.google.xxx/ ou http://www.google.co.xx/
$google_str = '/^http:\/\/www.google\.([a-z]{2,3})|(co\.[a-z]{2})\//i';
$alta_str = '/^http:\/\/www.altavista\.([a-z]{2,3})|(co\.[a-z]{2})\//i';
$msn_str = '/^http:\/\/search.msn\.([a-z]{2,3})|(co\.[a-z]{2})\//i';
$yahoo_str = '/^http:\/\/search.yahoo\.([a-z]{2,3})|(co\.[a-z]{2})\//i';

   // on récupère la QUERY_STRING du REFERER
   $url_array = parse_url($_SERVER['HTTP_REFERER']);
   parse_str($url_array['query'],$variables);

// Si le visiteur vient d'une page google ou altavista ou msn
 // if ( 	preg_match( $google_str,$_SERVER['HTTP_REFERER']) 
 //	OR 	preg_match( $alta_str,	$_SERVER['HTTP_REFERER']) 
 //	OR 	preg_match( $msn_str,	$_SERVER['HTTP_REFERER']) ) {

   // les mots clé se trouvent dans la variable 'q'
   $keywords = urldecode($variables['q']);
 //	} 

// Si le visiteur vient d'une page yahoo
// if ( 	preg_match( $yahoo_str,$_SERVER['HTTP_REFERER']) ) {

   // les mots clé se trouvent dans la variable 'p'
   $keywords2 = urldecode($variables['p']);
 //	}

	$query = $keywords.$keywords2;
	$redirect = XOOPS_URL.'/search.php?query='.$query.'&action=results';

//Rediriger l'index vers une url spécifique
	} elseif (	$xoopsModuleConfig['moved_index'] AND 
 			!eregi("/".$xoopsModule -> getVar('dirname'), $xoopsModuleConfig['moved_index']) ) {

			if (	eregi("http://", $xoopsModuleConfig['moved_index']) OR 
				eregi("https://", $xoopsModuleConfig['moved_index']) )
 				{
				$redirect = $xoopsModuleConfig['moved_index'];
			 	} else {
				$redirect = XOOPS_URL.'/'.$xoopsModuleConfig['moved_index'];
				} 
	} else {
			$redirect = '../../index.php';
	}

echo'
<div align="center">
'.$banner.'</div>';

if ( $xoopsModuleConfig['page'] ) {
	redirect_header( $redirect, $xoopsModuleConfig['moved_timer'], $myts->makeTareaData4Show($xoopsModuleConfig['moved_text']) );
	exit();
} else {
	header("Status : 301 Moved Permanently"); 
	header("Location: $redirect"); 
	exit();
}

include_once(XOOPS_ROOT_PATH."/footer.php");
?>
