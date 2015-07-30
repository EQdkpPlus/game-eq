<?php
 /*
 * Project:		EQdkp-Plus
 * License:		Creative Commons - Attribution-Noncommercial-Share Alike 3.0 Unported
 * Link:		http://creativecommons.org/licenses/by-nc-sa/3.0/
 * -----------------------------------------------------------------------
 * Began:		2009
 * Date:		$Date$
 * -----------------------------------------------------------------------
 * @author		$Author$
 * @copyright	2006-2011 EQdkp-Plus Developer Team
 * @link		http://eqdkp-plus.com
 * @package		eqdkp-plus
 * @version		$Rev$
 * 
 * $Id$
 */

if ( !defined('EQDKP_INC') ){
    header('HTTP/1.0 404 Not Found');
    exit;
}
$english_array = array(
	'classes' => array(
		0	=> 'Unknown',
		1	=> 'Bard',
		2	=> 'Beastlord',
		3	=> 'Berserker',
		15	=> 'Cleric',
		16	=> 'Druid',
		4	=> 'Enchanter',
		5	=> 'Magician',
		6	=> 'Monk',
		7	=> 'Necromancer',
		8	=> 'Paladin',
		9	=> 'Ranger',
		10	=> 'Rogue',
		11	=> 'Shadow Knight',
		12	=> 'Shaman',
		13	=> 'Warrior',
		14	=> 'Wizard',
	),
	'races' => array(
		0	=> 'Unknown',
		3	=> 'Barbarian',
		6	=> 'Dark Elf',
		16	=> 'Drakkin'
		4	=> 'Dwarf',
		14	=> 'Erudite',
		12	=> 'Frog',
		1	=> 'Gnome',
		8	=> 'Half Elf',
		15	=> 'Halfling',
		5	=> 'High Elf',
		2	=> 'Human',
		13	=> 'Iksar',
		11	=> 'Ogre',
		10	=> 'Troll',
		9	=> 'Vah Shir',
		7	=> 'Wood Elf',
	),
	'lang' => array(
		'eq'						=> 'EverQuest',
		'plate'						=> 'Plate',
		'silk'						=> 'Silk',
		'leather'					=> 'Leather',
		'chain'						=> 'Chain',
		'uc_race'					=> 'Race',
		'uc_class'					=> 'Class',

		// Admin Settings
		'core_sett_fs_gamesettings'	=> 'EverQuest Settings',
		'uc_faction'				=> 'Faction',
		'uc_faction_help'			=> 'Select the default faction',
	),
);

?>
