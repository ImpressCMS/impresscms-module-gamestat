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
global $xoopsDB, $xoopsConfig, $xoopsModule;
include("admin_header.php");
include_once ICMS_ROOT_PATH.'/modules/gamestat/admin/functions.php';
icms_cp_header();
adminmenu(0);
$file = file("../class/README.txt");

echo "<p><strong><i>"._AM_MODULE_INDEX_INFO. ":</i></strong> <strong>"._AM_MODULE_GAMESTAT_NAME. " " . round($xoopsModule->getVar('version') / 100, 2) ."</strong> " ._AM_MODULE_GAMESTAT_WITH. " <a href='http://gameq.sourceforge.net' target='_blank'>".$file[22]."</a></p>" ;
OpenTable();
    	global $xoopsModule;
  		echo "<br />Big thanks to <a href='http://www.impresscms.de/userinfo.php?uid=4' target='_blank'>Knallkopp</a> for template-coding and testing. And special thanks to <a href='http://www.sascha-drux.de' target='_blank'>Sascha Drux</a> for the great game-icons!";
    	echo "<p>"._AM_ICMS_INDEX_INFO_01. "</p>" ;
		echo "<p>"._AM_ICMS_INDEX_INFO_02. "</p>" ;
		echo "<p>"._AM_ICMS_INDEX_INFO_03. "</p>" ;
CloseTable();

icms_cp_footer();
?>
