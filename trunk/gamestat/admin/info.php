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
adminmenu(2);
OpenTable();
echo "Block-Manager?" ;
CloseTable();
icms_cp_footer(); 
?>
