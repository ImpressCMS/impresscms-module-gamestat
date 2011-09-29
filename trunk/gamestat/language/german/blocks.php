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
define ("_MB_GAMESTAT_YES", "Ja");
define ("_MB_GAMESTAT_NO", "Nein");
define ("_MB_GAMESTAT_NOBODY", "Keiner ist online.");
define ("_MB_GAMESTAT_ONEP", " Spieler ist online.");
define ("_MB_GAMESTAT_MULTIP", " Spieler sind online.");

define ("_MB_GAMESTAT_STATUS_IPFQDN", "IP Adresse/Name: ");
define ("_MB_GAMESTAT_STATUS_PORT", "Port #: ");

define ("_MB_GAMESTAT_BLOCK_INFO_SMALL", "Das ist ein kleiner Block. Wir empfehlen als <b>Blocktype:</b> <i>Seitenblock rechts</i> oder <i>Seitenblock links</i>. ");
define ("_MB_GAMESTAT_BLOCK_INFO_BIG", "Das ist ein großer Block. Wir empfehlen den <b>Blocktype:</b> <i>Mittelblock - Mitte</i>. ");
define ("_MB_GAMESTAT_STATUS_OPTA", "Array Dump zeigen? ");
define ("_MB_GAMESTAT_STATUS_OPTB", "Game Kennung ");
define ("_MB_GAMESTAT_STATUS_OPTC", "IP/FQDN ");
define ("_MB_GAMESTAT_STATUS_OPTD", "Query Port ");

define ("_MB_GAMESTAT_SVRONLINE_TXT", "Server Online");
define ("_MB_GAMESTAT_SVRONLINE_IMG", "../gamestat/language/german/images/svronline.png");

define ("_MB_GAMESTAT_SVROFFLINE_TXT", "Server Offline");
define ("_MB_GAMESTAT_SVROFFLINE_IMG", "../gamestat/language/german/images/svroffline.png");

// Items referenced in multiple block templates.
define ("_MB_GAMESTAT_BLOCK_ERROR", "Fehler: ");
define ("_MB_GAMESTAT_BLOCK_MAP", "Karte:");
define ("_MB_GAMESTAT_BLOCK_STATUS", "Status:");
define ("_MB_GAMESTAT_BLOCK_ARRAY", "Captured Array:");

// Items referenced in block templates.
define ("_MB_GAMESTAT_SRVINFO_NAME", "Server Name:");
define ("_MB_GAMESTAT_SRVINFO_ADDRPORT", "Adresse/Port:");

// Game Infos
define ("_MB_SERVER_IP", "Server IP:");
define ("_MB_SERVER_PORT", "Server Port:");
define ("_MB_SERVER_RANKED", "Ranked Server:");
define ("_MB_SERVER_GAME_VERSION", "Server Version:");
define ("_MB_SERVER_CURRENT_MOD", "Aktuelle Mod:");
define ("_MB_SERVER_GAME_TYPE", "Aktueller Game Type:");
define ("_MB_SERVER_CURRENT_MAP", "Aktuelle Map:");
define ("_MB_SERVER_TEAM_1", "Team 1:");
define ("_MB_SERVER_TEAM_2", "Team 2:");
define ("_MB_SERVER_MAX_PLAYER", "Maximale Spielerzahl:");
define ("_MB_SERVER_CURRENT_PLAYER", "Aktuelle Spielerzahl:");
define ("_MB_SERVER_ROUNDS", "Runden:");
define ("_MB_SERVER_CURRENT_ROUND", "Aktuelle Runde:");
define ("_MB_SERVER_FRAGLIMIT", "Fraglimit:");
define ("_MB_SERVER_TIMELIMIT", "Zeitlimit:");
define ("_MB_SERVER_TIMELIMIT_NO", "Kein Limit");
define ("_MB_SERVER_TIMELIMIT_MINUTE", "Minuten");
define ("_MB_SERVER_MODE", "Aktueller Modus:");
define ("_MB_SERVER_AUTOBALACE", "Autobalance:");
define ("_MB_SERVER_FRIENDLY_FIRE", "Friendly Fire:");
define ("_MB_SERVER_PLAYER_NAME", "Name");
define ("_MB_SERVER_PLAYER_SCORE", "Score");
define ("_MB_SERVER_PLAYER_KILLS", "Kills");
define ("_MB_SERVER_PLAYER_DEATH", "Death");
define ("_MB_SERVER_PLAYER_HONOR", "Anerkennung");
define ("_MB_SERVER_PLAYER_PING", "Ping");
define ("_MB_SERVER_PLAYER_FRAGS", "Frags");
define ("_MB_SERVER_TEAM_FLAG", "Flagge");
define ("_MB_SERVER_YES", "Ja");
define ("_MB_SERVER_NO", "Nein");
define ("_MB_SERVER_LOGGED", "Server mit Passwort");
define ("_MB_SERVER_NO_MAP_IMAGE", "Keine Map-Grafik vorhanden");
define ("_MB_SERVER_PLAYER", "Spieler");
define ("_MB_SERVER_ADDITION", "Weitere gamespezifische Daten sind momentan nicht verfügbar.");
define ("_MB_SERVER_NUMBOTS", "Bots:");
define ("_MB_SERVER_BOT_SKILL", "Bot Skill:");
define ("_MB_SERVER_STOCK_MUTATORS", "Mutator:");
define ("_MB_SERVER_OFFICIAL", "Offizieller Server:");

// Graphics
define ("_MB_GRAPHICS_BY", "Icon von");

//AA
define ("_MB_SERVER_MOD_AA_AA", "Americas Army");

//BF2
define ("_MB_SERVER_PLAYERSTATS_BF2_URL", "http://bf2s.com/player/");

define ("_MB_SERVER_MOD_BF2_BF2", "Battlefield 2");
define ("_MB_SERVER_MOD_BF2_PR", "Project Reality");
define ("_MB_SERVER_MOD_BF2_BFP2", "Pirates 2");
define ("_MB_SERVER_MOD_BF2_AIX", "Allied Intent Xtended");
define ("_MB_SERVER_MOD_BF2_DCON", "Desert Conflict");
define ("_MB_SERVER_MOD_BF2_FH", "Forgotten Hope");
define ("_MB_SERVER_MOD_BF2_FH2", "Forgotten Hope 2");
define ("_MB_SERVER_MOD_BF2_XPACK", "Xtension Pack");

define ("_MB_SERVER_MOD_GAMETYPE_BF2_GPM_CQ", "Conquest");
define ("_MB_SERVER_MOD_GAMETYPE_BF2_GPM_COOP", "Cooperation");

define ("_MB_SERVER_MOD_GAMETYPE_PR_GPM_CQ", "Assault and Secure");
define ("_MB_SERVER_MOD_GAMETYPE_PR_GPM_COUNTER", "Counter-Attack");
define ("_MB_SERVER_MOD_GAMETYPE_PR_GPM_INSUGENCY", "Insurgency");
define ("_MB_SERVER_MOD_GAMETYPE_PR_GPM_CNC", "Command & Control");
define ("_MB_SERVER_MOD_GAMETYPE_PR_GPM_TRAINING", "Training");
define ("_MB_SERVER_MOD_GAMETYPE_PR_GPM_SKIRMISH", "Skirmish");

define ("_MB_SERVER_MOD_GAMETYPE_BFP2_GPM_CQ", "Conquest");
define ("_MB_SERVER_MOD_GAMETYPE_BFP2_GPM_RALLY", "Rally");
define ("_MB_SERVER_MOD_GAMETYPE_BFP2_GPM_TACTICAL", "Tactical");

//BF2142
define ("_MB_SERVER_PLAYERSTATS_BF2142_URL", "http://www.2142-stats.de/");

define ("_MB_SERVER_MOD_BF2142_BF2142", "Battlefield 2142");

define ("_MB_SERVER_MOD_GAMETYPE_BF2142_GPM_SL", "Northern Strike");
define ("_MB_SERVER_MOD_GAMETYPE_BF2142_GPM_NV", "Assault");
define ("_MB_SERVER_MOD_GAMETYPE_BF2142_GPM_TI", "Titan");

//UT3
define ("_MB_SERVER_MOD_UT3_UT3", "Unreal Tournament 3");

define ("_MB_SERVER_MOD_GAMETYPE_UT3_UTGAMECONTENT.UTONSLAUGHTGAME_CONTENT", "Onslaught");
define ("_MB_SERVER_MOD_GAMETYPE_UT3_UTGAMECONTENT.UTVEHICLECTFGAME_CONTENT", "Vehicular CTF");
define ("_MB_SERVER_MOD_GAMETYPE_UT3_UTGAMECONTENT.UTCTFGAME_CONTENT", "Capture The Flag");
define ("_MB_SERVER_MOD_GAMETYPE_UT3_UTGAME.UTTEAMGAME", "Team Game");
define ("_MB_SERVER_MOD_GAMETYPE_UT3_UTGAME.UTDEATHMATCH", "Deathmatch");

define ("_MB_SERVER_MOD_GAMEMODE_UT3_1", "DM");
define ("_MB_SERVER_MOD_GAMEMODE_UT3_2", "WAR");
define ("_MB_SERVER_MOD_GAMEMODE_UT3_3", "VCTF");
define ("_MB_SERVER_MOD_GAMEMODE_UT3_4", "TDM");
define ("_MB_SERVER_MOD_GAMEMODE_UT3_5", "Duel");

define ("_MB_SERVER_MOD_BOT_SKILL_UT3_1", "Novice");
define ("_MB_SERVER_MOD_BOT_SKILL_UT3_2", "Average");
define ("_MB_SERVER_MOD_BOT_SKILL_UT3_3", "Experienced");
define ("_MB_SERVER_MOD_BOT_SKILL_UT3_4", "Skilled");
define ("_MB_SERVER_MOD_BOT_SKILL_UT3_5", "Adept");
define ("_MB_SERVER_MOD_BOT_SKILL_UT3_6", "Masterful");
define ("_MB_SERVER_MOD_BOT_SKILL_UT3_7", "Inhuman");
define ("_MB_SERVER_MOD_BOT_SKILL_UT3_8", "Godlike");

define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_0", "Keiner");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_1", "[Big Head]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_2", "[Friendly Fire]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_4", "[Handicap]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_8", "[InstaGib]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_16", "[Low Gravity]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_32", "[Unknown-32]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_64", "[No Powerups]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_128", "[No Translocator]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_256", "[Slow Motion]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_512", "[Unknown-512]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_1024", "[Speed Freak]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_2048", "[Super Berserk]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_4096", "[Unknown-4096]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_8192", "[Weapon Replacement]");
define ("_MB_SERVER_MOD_STOCK_MUTATORS_UT3_16384", "[Weapons Respawn]");

//COD4
define ("_MB_SERVER_MOD_COD4_COD4", "Call of Duty 4");
?>