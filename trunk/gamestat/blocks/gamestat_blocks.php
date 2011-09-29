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

require_once (ICMS_ROOT_PATH.'/modules/gamestat/class/GameQ.php');

function b_gamestat_status_show($options)
{
	// Load module info and configs

	$modhandler = &xoops_gethandler('module');
	$xoopsModule = &$modhandler->getByDirname("gamestat");
	$config_handler = &xoops_gethandler('config');
	$xoopsModuleConfig = &$config_handler->getConfigsByCat(0,$xoopsModule->getVar('mid'));

	// Block Variables

	$block = array();
	$queryopts = array();
	$querydata = array();
	$playercount=0;

	// Get configuration from the block options.

	$queryopts['gamestat'][] = $options[1];	// gametype
	$queryopts['gamestat'][] = $options[2];	// IP or FQDN
	$queryopts['gamestat'][] = $options[3];	// Port #

	// Use the GameQ PHP Class to do the actual work:

	$gq = new GameQ;

	$gq->addServers($queryopts);

	$gq->setOption('timeout',$xoopsModuleConfig['querytimeout']);

	try {
		$querydata = $gq->requestData();
	}

	catch (GameQ_Exception $e) {
		$block['error'] = 1;
		$block['errormsg'] = "Query failed: $e.";
		return $block;
	}

	// Process successful data

	if ($querydata['gamestat']['gq_online']) {
		$block['svronline'] = 1;
		$block['svrstatustxt'] = _MB_GAMESTAT_SVRONLINE_TXT;
		$block['svrstatusimg'] = _MB_GAMESTAT_SVRONLINE_IMG;

		if ( $querydata['gamestat']['hostname'] ) {
 			$block['game'] = $querydata['gamestat']['hostname'];
		} elseif ( $querydata['gamestat']['OwningPlayerName'] ) {
			$block['game'] = $querydata['gamestat']['OwningPlayerName'];
		}
		$block['mapname'] = $querydata['gamestat']['mapname'];

		// Count Players.  Either from a variable, or the player array.

		if ( $querydata['gamestat']['numplayers'] ) {
			$block['playercount'] = $playercount;
			$playercount = $querydata['gamestat']['numplayers'];
		} elseif ( isset($querydata['gamestat']['players']) ) {
			$block['playercount'] = $playercount;
			$playercount = count($querydata['gamestat']['players']);
		}

		if ($playercount) {
			$block['playerstatus'] = $playercount." ";
			if ($playercount == 1) {
				$block['playerstatus'] .= _MB_GAMESTAT_ONEP;
			} else {
				$block['playerstatus'] .= _MB_GAMESTAT_MULTIP;
			}
		} else {
			$block['playerstatus'] = _MB_GAMESTAT_NOBODY;
		}

	} else {
		$block['svronline'] = 0;

		// Use the shortname if we can't pull from the server.

		$block['game'] = $options[1];

		$block['svrstatustxt'] = _MB_GAMESTAT_SVROFFLINE_TXT;
		$block['svrstatusimg'] = _MB_GAMESTAT_SVROFFLINE_IMG;
	}

	return $block;
}

function b_gamestat_status_edit($options)
{
	$form .= _MB_GAMESTAT_BLOCK_INFO_SMALL;
	$form .= "<br /><br />";
	$form .= _MB_GAMESTAT_STATUS_OPTA;

	$form .= "<input type='radio' name='options[0]' value= '1' ";
	if ($options[0] == "1") $form .= "checked='checked'";
	$form .= "/>";
	$form .= _MB_GAMESTAT_YES;
	$form .= "<input type='radio' name='options[0]' value= '0' ";
	if ($options[0] == "0") $form .= "checked='checked'";
	$form .= "/>";
	$form .= _MB_GAMESTAT_NO;
	$form .= "<br />";

	$form .= _MB_GAMESTAT_STATUS_OPTB;
	$form .= "<input type='text' name='options[1]' value='".$options[1]."' />";
	$form .= "<br />";

	$form .= _MB_GAMESTAT_STATUS_OPTC;
	$form .= "<input type='text' name='options[2]' value='".$options[2]."' />";
	$form .= "<br />";

	$form .= _MB_GAMESTAT_STATUS_OPTD;
	$form .= "<input type='text' name='options[3]' value='".$options[3]."' />";
	$form .= "<br />";

	return $form;
}

function b_gamestat_srvinfo_show($options)
{
	// Load module info and configs

	global $xoopsConfig;

	$modhandler = &xoops_gethandler('module');
	$xoopsModule = &$modhandler->getByDirname("gamestat");
	$config_handler = &xoops_gethandler('config');
	$xoopsModuleConfig = &$config_handler->getConfigsByCat(0,$xoopsModule->getVar('mid'));

	// Block Functions

	$block = array();
	$queryopts = array();
	$querydata = array();

	// Get configuration from the block options.

	$queryopts['gamestat'][] = $options[1];	// gametype
	$queryopts['gamestat'][] = $options[2];	// IP or FQDN
	$queryopts['gamestat'][] = $options[3];	// Port #

	// Use the GameQ PHP Class to do the actual work:

	$gq = new GameQ;

	$gq->addServers($queryopts);

	$gq->setOption('timeout',$xoopsModuleConfig['querytimeout']);

	try {
		$querydata = $gq->requestData();
	}

	catch (GameQ_Exception $e) {
		$block['error'] = 1;
		$block['errormsg'] = "Query failed: $e.";
		return $block;
	}

	// Provide location for game-specific output template

	if (file_exists (ICMS_ROOT_PATH."/modules/gamestat/templates/game_templates/".$options[1].".html") ) {
		$block['gametemplate'] = ICMS_ROOT_PATH."/modules/gamestat/templates/game_templates/".$options[1].".html";
	} else {
		$block['gametemplate'] = ICMS_ROOT_PATH."/modules/gamestat/templates/game_templates/generic.html";
	}

	// Export the Gamestat Output to the block.

	$block['gamestat'] = $querydata['gamestat'];

	// Check online status.  Boil some data.

	if ($querydata['gamestat']['gq_online']) {
		$block['svronline'] = 1;
		$block['svrstatustxt'] = _MB_GAMESTAT_SVRONLINE_TXT;
		$block['svrstatusimg'] = _MB_GAMESTAT_SVRONLINE_IMG;

		
		// Count Players.  Either from a variable, or the player array.

		if ( $querydata['gamestat']['numplayers'] ) {
			$playercount = $querydata['gamestat']['numplayers'];
		} elseif ( $querydata['gamestat']['players'] ) {
			$playercount = count($querydata['gamestat']['players']);
		} 
		
		if ($playercount) {
			$block['playercount'] = $playercount;
			$block['playerstatus'] = $playercount;
			if ($playercount == 1) {
				$block['playerstatus'] .= _MB_GAMESTAT_ONEP;
			} else {
				$block['playerstatus'] .= _MB_GAMESTAT_MULTIP;
			}
		} else {
			$block['playerstatus'] = _MB_GAMESTAT_NOBODY;
		}

	} else {
		$block['svronline'] = 0;

		$block['svrstatustxt'] = _MB_GAMESTAT_SVROFFLINE_TXT;
		$block['svrstatusimg'] = _MB_GAMESTAT_SVROFFLINE_IMG;
	}

	if ($options[0]) {
		$block['verbose'] = 1;
		$block['verbosedata'] = print_r($querydata, true);
	}

	$block['game'] = $options[1];
	
	return $block;
}

function b_gamestat_srvinfo_edit($options)
{
	$form = _MB_GAMESTAT_BLOCK_INFO_BIG;
	$form .= "<br /><br />";
	$form .= _MB_GAMESTAT_STATUS_OPTA;

	$form .= "<input type='radio' name='options[0]' value= '1' ";
	if ($options[0] == "1") $form .= "checked='checked'";
	$form .= "/>";
	$form .= _MB_GAMESTAT_YES;
	$form .= "<input type='radio' name='options[0]' value= '0' ";
	if ($options[0] == "0") $form .= "checked='checked'";
	$form .= "/>";
	$form .= _MB_GAMESTAT_NO;
	$form .= "<br />";

	$form .= _MB_GAMESTAT_STATUS_OPTB;
	$form .= "<input type='text' name='options[1]' value='".$options[1]."' />";
	$form .= "<br />";

	$form .= _MB_GAMESTAT_STATUS_OPTC;
	$form .= "<input type='text' name='options[2]' value='".$options[2]."' />";
	$form .= "<br />";

	$form .= _MB_GAMESTAT_STATUS_OPTD;
	$form .= "<input type='text' name='options[3]' value='".$options[3]."' />";
	$form .= "<br />";

	return $form;
}
?>
