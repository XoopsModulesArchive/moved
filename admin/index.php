<?
#######################################################
#  Moved version 1.01 pour Xoops 2.0.x			#
#  									#
#  Adaptation © 2005, Solo ( www.wolfpackclan.com )	#
#  									#
#  Licence : GPL 							#
#######################################################

include("admin_header.php");
xoops_cp_header();
include_once ("../include/nav.php");		
OpenTable();

if (!isset($_POST["ord"])) {
    $ord = isset($_GET["ord"]) ? $_GET["ord"] : "";
} else {
    $ord = $_POST["ord"];
}


if ($ord == "3") {
$ordre = "referer";
$sort_ordre = "ASC";
$ord_text = _MD_MOVED_ORIGINE;
}
if ($ord == "4") {
$ordre = "module";
$sort_ordre = "ASC";
$ord_text = _MD_MOVED_MODULE;
}
if ($ord == "1") {
$ordre = "agent";
$sort_ordre = "DESC";
$ord_text = _MD_MOVED_AGENT;
}
if ($ord == "2") {
$ordre = "visit";
$sort_ordre = "DESC";
$ord_text = _MD_MOVED_VISITS;
}
if ($ord == "") {
$ordre = "date";
$sort_ordre = "DESC";
$ord_text = _MD_MOVED_DATE;
}
if ($ord == "del") {
    $id = isset($_GET["id"]) ? $_GET["id"] : "";

		$sql = "DELETE FROM ".$xoopsDB->prefix("moved_ref")." WHERE id = $id";
		$xoopsDB->queryF($sql);

	redirect_header("index.php", 1, _MD_MOVED_DELETED);
	exit();
}
if ($ord == "clean") {
    $id = isset($_GET["id"]) ? $_GET["id"] : "";

		$clean_days = (time()-(86400 * 7) );
		$sql = "DELETE FROM ".$xoopsDB->prefix("moved_ref")." WHERE date < $clean_days";
		$xoopsDB->queryF($sql);

	redirect_header("index.php", 1, _MD_MOVED_CLEANED);
	exit();
}
echo _MD_MOVED_HEADER." <b>".$xoopsConfig['sitename']."</b> <br />
";

    $result = $xoopsDB->query("SELECT id, module, referer, agent, left(agent,12) as xagent, visit, date FROM ".$xoopsDB->prefix("moved_ref")." ORDER BY $ordre $sort_ordre");

    $referer = mysql_NumRows( $result );

if($referer == 0) 
{
  echo _MD_MOVED_NOVISIT."<p />";
}
else
{
  echo _MD_MOVED_REFERER." <b>$referer</b><p />
	<center>"._MD_MOVED_RANKING." <b>$ord_text</b></center>
	<br />";

  echo "<div align='center'>
<table border='0' cellpadding='4' cellspacing='1' class='bg2' width='100%'>
    <tr class='bg3'>
      <td><center><b>						N°				</b></center></td>
      <td><center><b><a href='index.php?ord=4'>	"._MD_MOVED_MODULE."	</a></b></center></td>
      <td><center><b><a href='index.php?ord=3'>	"._MD_MOVED_ORIGINE."	</a></b></center></td>
      <td><center><b><a href='index.php?ord=1'>	"._MD_MOVED_AGENT."	</a></b></center></td>
      <td><center><b><a href='index.php?ord=2'>	"._MD_MOVED_VISITS."	</a></b></center></td>
      <td><center><b><a href='index.php'>		"._MD_MOVED_DATE."	</a></b></center></td>
      <td><center><b>						"._MD_MOVED_ADMIN."	    </b></center></td>
    </tr>";


  $i = 0; 
// while ($i < $referer) 
while ( $myrow = $xoopsDB->fetchArray($result) ) 

  {
  $date = 		$myrow["date"];

	if ( !$myrow["referer"] ) { 
	$referers = 'Accès directe'; 
	$referers_url = '';
	} else {
	$referers_url = $myrow["referer"];
	$referers = str_replace( XOOPS_URL, '<img src="../images/icon/link_warning.gif" alt="" />' , $myrow["referer"] );
	$referers = "<a href='$referers_url' title='$referers_url' target='_blank'>$referers</a>";
	}

  $i++;
 echo "<tr class='bg1'>
	<td align='center'>	$i						</td>
	<td align='left'>		<a href='".XOOPS_URL."/modules/".$myrow["module"]."' target='_blank'>".$myrow["module"]."</a></td>
	<td align='left'>		$referers					</td>
	<td>				<a href='#' title='".$myrow["agent"]."'>".$myrow["xagent"]."</a>	</td>
	<td align='center'>	".$myrow["visit"]."					</td>
	<td>				".formatTimestamp($date,'m')."	</td>
	<td align='center'>	<a href='index.php?ord=del&id=".$myrow["id"]."'>
					<img src='../images/icon/delete.gif' alt='"._DELETE."'></a>
											</td>
	</tr>";
   }
 echo    "</table></div>
<p align='right'>
<a href='index.php?ord=clean'>"._MD_MOVED_CLEAN." 7&nbsp;"._MD_MOVED_DAYS." <img src='../images/icon/delete.gif' alt='"._DELETE."'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<img src='../images/icon/link_warning.gif' alt='' />"._MD_MOVED_WARN_EXP;
}

                CloseTable();
	echo "<P>";
	            OpenTable();
	echo '<div align="right">'._MD_MOVED_CREDIT.'<a href="mailto:solo@wolfpackclan.com">Solo</a> ( <a href="http://www.wolfpackclan.com\wolfactory" target="_blank">WolFactory</a> )</div>';
                CloseTable();
xoops_cp_footer();
// include("../include/admin_footer.php");
?>
