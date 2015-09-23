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
		public $version				= '2.3.1';
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
						8	=> array(1,8,9,10,13,16),					// Half Elf
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
					array('name' => $this->glang('tank', true, $lang), 'value' => 'class:8,11,13'),
					array('name' => $this->glang('melee', true, $lang), 'value' => 'class:1,2,3,6,9,10'),
					array('name' => $this->glang('priest', true, $lang), 'value' => 'class:12,15,16'),
					array('name' => $this->glang('caster', true, $lang), 'value' => 'class:4,5,7,14'),
					array('name' => '-----------', 'value' => false),
					array('name' => $this->glang('Bard', true, $lang), 'value' => 'class:1'),
					array('name' => $this->glang('Beastlord', true, $lang), 'value' => 'class:2'),
					array('name' => $this->glang('Berserker', true, $lang), 'value' => 'class:3'),
					array('name' => $this->glang('Cleric', true, $lang), 'value' => 'class:15'),
					array('name' => $this->glang('Druid', true, $lang), 'value' => 'class:16'),
					array('name' => $this->glang('Enchanter', true, $lang), 'value' => 'class:4'),
					array('name' => $this->glang('Magician', true, $lang), 'value' => 'class:5'),
					array('name' => $this->glang('Monk', true, $lang), 'value' => 'class:6'),
					array('name' => $this->glang('Necromancer', true, $lang), 'value' => 'class:7'),
					array('name' => $this->glang('Paladin', true, $lang), 'value' => 'class:8'),
					array('name' => $this->glang('Ranger', true, $lang), 'value' => 'class:9'),
					array('name' => $this->glang('Rogue', true, $lang), 'value' => 'class:10'),
					array('name' => $this->glang('Shadowknight', true, $lang), 'value' => 'class:11'),
					array('name' => $this->glang('Shaman', true, $lang), 'value' => 'class:12'),
					array('name' => $this->glang('Warrior', true, $lang), 'value' => 'class:13'),
					array('name' => $this->glang('Wizard', true, $lang), 'value' => 'class:14'),
				);
			}
		}

		public function profilefields(){
			// Category 'character' is a fixed one! All others are created dynamically!
			$xml_fields = array(
				'guild'	=> array(
					'type'			=> 'text',
					'category'		=> 'character',
					'lang'			=> 'uc_guild',
					'size'			=> 32,
					'undeletable'	=> true,
					'sort'			=> 1
				),
				'gender'	=> array(
					'type'			=> 'dropdown',
					'category'		=> 'character',
					'lang'			=> 'uc_gender',
					'options'		=> array('male' => 'uc_male', 'female' => 'uc_female'),
					'tolang'		=> true,
					'undeletable'	=> true,
					'sort'			=> 3
				),
				'level'	=> array(
					'type'			=> 'spinner',
					'category'		=> 'character',
					'lang'			=> 'uc_level',
					'max'			=> 105,
					'min'			=> 1,
					'undeletable'	=> true,
					'sort'			=> 4
				),
			);
			return $xml_fields;
		}

		//Guildbank
		public function guildbank_money(){
		return 	$money_data = array(
		'platin'		=> array(
			'icon'			=> array(
				'type'		=> 'default',
				'name'		=> 'platin'
			),
			'factor'		=> 1000,
			'size'			=> 'unlimited',
			'language'		=> $this->user->lang(array('gb_currency', 'platinum')),
			'short_lang'	=> $this->user->lang(array('gb_currency', 'platinum_s')),
		),
		'gold'		=> array(
			'icon'			=> array(
				'type'		=> 'default',
				'name'		=> 'gold'
			),
			'factor'		=> 100,
			'size'			=> 1,
			'language'		=> $this->user->lang(array('gb_currency', 'gold')),
			'short_lang'	=> $this->user->lang(array('gb_currency', 'gold_s')),
		),
		'silver'	=> array(
			'icon'			=> array(
				'type'		=> 'default',
				'name'		=> 'silver'
			),
			'factor'		=> 10,
			'size'			=> 1,
			'language'		=> $this->user->lang(array('gb_currency', 'silver')),
			'short_lang'	=> $this->user->lang(array('gb_currency', 'silver_s')),
		),
		'copper'	=> array(
			'icon'			=> array(
				'type'		=> 'default',
				'name'		=> 'bronze'
			),
			'factor'		=> 1,
			'size'			=> 1,
			'language'		=> $this->user->lang(array('gb_currency', 'copper')),
			'short_lang'	=> $this->user->lang(array('gb_currency', 'copper_s')),
		)
		);
	}
	}
}
?>
