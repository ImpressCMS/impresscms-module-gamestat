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

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");
$mydirname = basename( dirname( __FILE__ ) );
global $xoopsUser, $xoopsDB, $xoopsModule, $xoopsConfig;

/**  General Information  */
$modversion = array(
  'name'=> _MI_GAMESTAT_NAME,
  'version'=> 1.01,
  'description'=> _MI_GAMESTAT_DESC,
  'author'=> "Ian A. Underwood",
  'credits'=> "René Sato - The ImpressCMS Project",
  'license'=> "GNU GPL",
  'official'=> 1.01,
  'dirname'=> basename( dirname( __FILE__ ) ),

/**  Images information  */
  'iconsmall'=> "images/icms_small_ilogo.gif",
  'iconbig'=> "images/icms_big_ilogo.gif",
  'image'=> "images/icms_big_ilogo.gif", 

/**  Development information */
  'status_version'=> "Final",
  'status'=> "Final",
  'date'=> "xx.xx.2009",
  'author_word'=> ""
);

$modversion['hasConfig'] = 1;

$modversion['support_site_url'] = 'http://www.impresscms.de/?campaign=module_GameStat';
$modversion['support_site_name']= 'ImpressCMS Forum - Modules Support';
$modversion['submit_bug'] 		= 'http://trac.impresscms.org/addons/newticket';


// Configuration Items

$modversion['config'][] = array (
	'name'			=>	'querytimeout',
	'title'			=>	'_MI_GAMESTAT_CONFIG_TIMEOUT',
	'description'	=>	'_MI_GAMESTAT_CONFIG_TIMEOUT_DESC',
	'formtype'		=>	'textbox',
	'valuetype'		=>	'int',
	'default'		=>	250
);


// Menu
$modversion['hasMain'] = 1;

// Administrative Items

$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu_gamestat.php";

// Blocks

$modversion['blocks'][1]['file']		= "gamestat_blocks.php";
$modversion['blocks'][1]['name']		= _MI_GAMESTAT_BLOCK_STATUS_NAME;
$modversion['blocks'][1]['show_func']	= "b_gamestat_status_show";
$modversion['blocks'][1]['edit_func']	= "b_gamestat_status_edit";
$modversion['blocks'][1]['template']	= "gamestat_status.html";
$modversion['blocks'][1]['options']		= "0|bf2|62.104.179.234|29900";

$modversion['blocks'][2]['file']		= "gamestat_blocks.php";
$modversion['blocks'][2]['name']		= _MI_GAMESTAT_BLOCK_SRVINFO_NAME;
$modversion['blocks'][2]['show_func']	= "b_gamestat_srvinfo_show";
$modversion['blocks'][2]['edit_func']	= "b_gamestat_srvinfo_edit";
$modversion['blocks'][2]['template']	= "gamestat_srvinfo.html";
$modversion['blocks'][2]['options']		= "0|bf2|62.104.179.234|29900";
?>
