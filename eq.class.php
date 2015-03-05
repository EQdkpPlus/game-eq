<?php
 /*
 * Project:		EQdkp-Plus
 * License:		Creative Commons - Attribution-Noncommercial-Share Alike 3.0 Unported
 * Link:		http://creativecommons.org/licenses/by-nc-sa/3.0/
 * -----------------------------------------------------------------------
 * Date:		$Date$
 * -----------------------------------------------------------------------
 * @author		$Author$
 * @copyright	2006-2014 EQdkp-Plus Developer Team
 * @link		http://eqdkp-plus.com
 * @package		eqdkp-plus
 * @version		$Rev$
 *
 * $Id$
 */

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}

if(!class_exists('eq')) {
	class eq extends game_generic {
		protected static $apiLevel	= 20;
		public $version				= '2.2.2';
		protected $this_game		= 'eq';
		protected $types			= array('classes', 'races', 'factions', 'filters');
		protected $classes			= array();
		protected $races			= array();
		protected $factions			= array();
		protected $filters			= array();
		public $langs				= array('english');

		protected $class_dependencies = array(
			
			array(
				'name'		=> 'race',
				'type'		=> 'races',
				'admin'		=> false,
				'decorate'	=> true,
				'parent'	=> false,
			),
			array(
				'name'		=> 'class',
				'type'		=> 'classes',
				'admin'		=> false,
				'decorate'	=> true,
				'primary'	=> true,
				'colorize'	=> true,
				'roster'	=> true,
				'recruitment' => true,
				'parent'	=> array(
					'race' => array(
						0	=> 'all',									// Unknown
						1	=> array(4,5,7,8,10,11,13,14,15),			// Gnome
						2	=> array(1,4,5,6,7,8,9,10,11,13,14,15,16),	// Human
						3	=> array(2,3,10,12,13),						// Barbarian
						4	=> array(3,15,8,10,13),						// Dwarf
						5	=> array(15,4,5,8,14),						// High Elf
						6	=> array(4,5,7,10,11,13,14,15),				// Dark Elf
						7	=> array(1,2,16,9,10,13),					// Wood Elf
						8	=> array(1,4,8,9,10,13),					// Half Elf
						9	=> array(1,2,3,10,12,13),					// Vah Shir
						10	=> array(2,3,11,12,13),						// Troll
						11	=> array(2,3,11,12,13),						// Ogre
						12	=> array(15,6,7,8,10,11,12,13,14),			// Froglok
						13	=> array(2,6,7,11,12,13),					// Iksar
						14	=> array(15,4,5,7,8,11,14),					// Erudite
						15	=> array(15,16,8,9,10,13),					// Halfling
						16	=> array(1,15,16,4,5,6,7,8,9,10,11,13,14),	// Drakkin
					),
				),
			),
		);

		protected $glang		= array();
		protected $lang_file	= array();
		protected $path			= '';
		public  $lang			= false;

		public function install($install=false){}

		protected function load_filters($langs){
			if(!$this->classes) {
				$this->load_type('classes', $langs);
			}
			foreach($langs as $lang) {
				$names = $this->classes[$this->lang];
				$this->filters[$lang] = array(
					array('name' => '-----------', 'value' => false),
					array('name' => $this->glang('plate', true, $lang), 'value' => array(1 => 'class', 8 => 'class', 11 => 'class', 13 => 'class', 15 => 'class')),
					array('name' => $this->glang('chain', true, $lang), 'value' => array(3 => 'class', 9 => 'class', 10 => 'class', 12 => 'class')),
					array('name' => $this->glang('leather', true, $lang), 'value' => array(2 => 'class', 6 => 'class', 16 => 'class')),
					array('name' => $this->glang('silk', true, $lang), 'value' => array(4 => 'class', 5 => 'class', 7 => 'class', 14 => 'class')),
				);
			}
		}
	}
}
?>
