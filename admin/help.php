<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//						- christian (www.edom.org)		 	//
//						- herve (www.herve-thouzard.com)   		//
//						- Marcan (www.smartfactory.ca)   		//
//                  edito v2.3								//
//  ------------------------------------------------------------------------ 	//

include_once( "admin_header.php" );
		xoops_cp_header();
		include_once XOOPS_ROOT_PATH.'/class/xoopsform/grouppermform.php';
		$module_id = $xoopsModule->getVar('mid');
include_once ("../include/nav.php");
$myts =& MyTextSanitizer::getInstance();

$guide = _MD_MOVED_GUIDE;
$guide = $myts->makeTareaData4Show($guide);

OpenTable();
echo $guide;
CloseTable();

xoops_cp_footer();
?>
