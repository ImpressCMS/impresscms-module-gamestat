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
adminmenu(1);
OpenTable();
// Read ini file
$ini = parse_ini_file(ICMS_ROOT_PATH."/modules/gamestat/class/GameQ/games.ini", true);
foreach ($ini as $key => &$entry) $entry['id'] = $key;
?>
    <h1><?php echo "" . _AM_MODULE_GAMEQ . "\n"; ?> (<?php echo count($ini); ?>)</h1>
    <table>
    <thead>
        <tr>
            <td><?php echo "" . _AM_MODULE_GAMENAME . "\n"; ?></td>
            <td><?php echo "" . _AM_MODULE_GAMEIDENTIFIER . "\n"; ?></td>
            <td><?php echo "" . _AM_MODULE_GAMEDEFAULTPORT . "\n"; ?></td>
        </tr>
    </thead>
<?php

foreach ($ini as $key => $entry) {
    $cls = empty($cls) ? ' class="uneven"' : '';
    printf("<tr%s><td>%s</td><td>%s</td><td>%s</td></tr>\n", $cls, $entry['name'], $entry['id'], $entry['port']);
}
CloseTable();
icms_cp_footer(); 
exit();
?>
