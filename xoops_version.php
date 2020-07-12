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

$modversion['name'] = _MI_MOVED_NAME;
$modversion['version'] = 1.2;
$modversion['description'] = _MI_MOVED_DSC;
$modversion['credits'] = "Solo (www.wolfpackclan.com)";
$modversion['author'] = "Solo";
$modversion['help'] = "";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "images/moved_slogo.png";
$modversion['dirname'] = "moved"; 

//sql tables
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0] = "moved_ref";


//Admin
// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//Main
$modversion['hasMain'] = 0;
?>