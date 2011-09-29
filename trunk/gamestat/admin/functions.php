<?php
/**
* ImpressCMS-Info version infomation
*
* This file holds are the configuration information of this module
*
* @copyright	http://www.impresscms.de
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		http://www.impresscms.de | René Sato
* @version		$Id$
*/
function adminmenu($currentoption = 0, $breadcrumb = '')
{
	echo "
    	<style type='text/css'>
    	#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    	#buttonbar { float:left; width:100%; background: #e7e7e7 url('" . ICMS_URL . "/modules/gamestat/images/bg.png') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }
    	#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
		#buttonbar li { display:inline; margin:0; padding:0; }
		#buttonbar a { float:left; background:url('" . ICMS_URL . "/modules/gamestat/images/left_both.png') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }
		#buttonbar a span { float:left; display:block; background:url('" . ICMS_URL . "/modules/gamestat/images/right_both.png') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
		/* Commented Backslash Hack hides rule from IE5-Mac \*/
		#buttonbar a span {float:none;}
		/* End IE5-Mac hack */
		#buttonbar a:hover span { color:#333; }
		#buttonbar #current a { background-position:0 -150px; border-width:0; }
		#buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
		#buttonbar a:hover { background-position:0% -150px; }
		#buttonbar a:hover span { background-position:100% -150px; }
		</style>
    ";
 	global $xoopsModule, $xoopsConfig;
	
	

	$tblColors = array('','','');
	if($currentoption>=0) {
		$tblColors[$currentoption] = 'current';
	}

	if (file_exists(ICMS_ROOT_PATH . '/modules/gamestat/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once ICMS_ROOT_PATH. '/modules/gamestat/language/' . $xoopsConfig['language'] . '/modinfo.php';
	} else {
		include_once ICMS_ROOT_PATH . '/modules/gamestat/language/english/modinfo.php';
	}

	echo "<div id='buttontop'>";
	echo "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
	echo "<td style=\"width: 60%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\"><a href=" . ICMS_URL . " \>" . _AM_MODULE_GOTOHOMEPAGE . "</a></td>";
	echo "<td style=\"width: 40%; font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;\"><b>" . $xoopsModule->name() . "  " . _AM_MODULE_MODULEADMIN . "</b> " . $breadcrumb . "</td>";
	echo "</tr></table>";
	echo "</div>";

	echo "<div id='buttonbar'>";
	echo "<ul>";
	echo "<li id='" . $tblColors[0] . "'><a href=\"index.php\"><span>" . _AM_MODULE_ADMENU0 . "</span></a></li>\n";
	echo "<li id='" . $tblColors[1] . "'><a href=\"gamelist.php\"><span>" . _AM_MODULE_ADMENU8 . "</span></a></li>\n";
	echo "<li id='" . $tblColors[2] . "'><a href=\"" . ICMS_URL . "/modules/system/admin.php?fct=blocksadmin\"><span>" . _AM_MODULE_ADMENU9 . "</span></a></li>\n";
	
	echo "</ul></div>";
	echo "<br /><br /><pre>&nbsp;</pre><pre>&nbsp;</pre>";
}
?>
