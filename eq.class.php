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
	header('HTTP/1.0 404 Not Found');exit;
}

if(!class_exists('eq')) {
	class eq extends game_generic {
		public $version			= '2.1.2';
		protected $this_game	= 'eq';
		protected $types		= array('classes', 'races', 'factions', 'filters');
		protected $classes		= array();
		protected $races		= array();
		protected $factions		= array();
		protected $filters		= array();
		public $langs			= array('english');

		protected $class_dependencies = array(
			array(
				'name'		=> 'faction',
				'type'		=> 'factions',
				'admin' 	=> true,
				'decorate'	=> false,
				'parent'	=> false,
			),
			array(
				'name'		=> 'race',
				'type'		=> 'races',
				'admin'		=> false,
				'decorate'	=> true,
				'parent'	=> array(
					'faction' => array(
						'good'		=> 'all',
						'evil'		=> 'all',
					),
				),
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
						0 	=> 'all',		// Unknown
						1 	=> 'all',		// Gnome
						2 	=> 'all',		// Human
						3 	=> 'all',		// Barbarian
						4 	=> 'all',		// Dwarf
						5 	=> 'all',		// High Elf
						6 	=> 'all',		// Dark Elf
						7 	=> 'all',		// Wood Elf
						8 	=> 'all',		// Half Elf
						9 	=> 'all',,		// Vah Shir
						10 	=> 'all',		// Troll
						11 	=> 'all',		// Ogre
						12 	=> 'all',		// Frog
						13 	=> 'all',		// Iksar
						14 	=> 'all',		// Erudite
						15 	=> 'all',		// Halfling
						16 	=> 'all',		// Drakkin
					),
				),
			),
		);

		protected $glang		= array();
		protected $lang_file	= array();
		protected $path			= '';
		public  $lang			= false;

		/**
		* Returns Information to change the game
		*
		* @param bool $install
		* @return array
		*/
		public function get_OnChangeInfos($install=false){

		}

		/**
		* Initialises filters
		*
		* @param array $langs
		*/
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