<?php
/*	Project:	EQdkp-Plus
 *	Package:	Dungeons and Dragons online game package
 *	Link:		http://eqdkp-plus.eu
 *
 *	Copyright (C) 2006-2015 EQdkp-Plus Developer Team
 *
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU Affero General Public License as published
 *	by the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Affero General Public License for more details.
 *
 *	You should have received a copy of the GNU Affero General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}

if(!class_exists('ddo')) {
	class ddo extends game_generic {
		protected static $apiLevel	= 20;
		public static $shortcuts	= array();
		protected $this_game		= 'ddo';
		protected $types			= array('classes', 'races', 'filters');
		protected $classes			= array();
		protected $races			= array();
		protected $filters			= array();
		public $langs				= array('english');

		protected $class_dependencies = array(
			array(
				'name'		=> 'race',
				'type'		=> 'races',
				'admin'		=> false,
				'decorate'	=> true,
				'parent'	=> false
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
						1 	=> 'all',		// Drow Elf
						2 	=> 'all',		// Dwarf
						3 	=> 'all',		// Elf
						4 	=> 'all',		// Half Elf
						5 	=> 'all',		// Halfling
						6 	=> 'all',		// Half-Orc
						7 	=> 'all',		// Human
						8 	=> 'all',		// Warforged
						9 	=> 'all',		// Iron Defender
					),
				),
			),
		);
		
		protected $class_colors = array(
			0	=> '#808080',
			1	=> '#808080',
			2	=> '#808080',
			3	=> '#808080',
			4	=> '#808080',
			5	=> '#808080',
			6	=> '#808080',
			7	=> '#808080',
			8	=> '#808080',
			9	=> '#808080',
			10	=> '#808080',
			11	=> '#808080',
			12	=> '#808080',
			13	=> '#808080',
			14	=> '#808080',
			15	=> '#808080',
			16	=> '#808080',
			17	=> '#808080',
			18	=> '#808080',
		);

		protected $glang		= array();
		protected $lang_file	= array();
		protected $path			= '';
		public $lang			= false;
		public $version			= '1.0.0';

		public function profilefields(){
			$xml_fields = array(
				'classpath'	=> array(
					'type'			=> 'dropdown',
					'category'		=> 'character',
					'lang'			=> 'uc_class_path',
					'options'		=> array('Angel of Vengeance' => 'uc_path_1', 'Arcane Archer' => 'uc_path_2', 'Arcane Cannon' => 'uc_path_3', 'Bastion of the Outlands' => 'uc_path_4', 'Beacon of Hope' => 'uc_path_5', 'Deepwood Sniper' => 'uc_path_6', 'Divine Avenger' => 'uc_path_7', 'Elementalist' => 'uc_path_8', 'Henshin Mystic' => 'uc_path_9', 'Master Mechanic' => 'uc_path_10', 'Mastermaker' => 'uc_path_11', 'Necromancer' => 'uc_path_12', 'Ninja Spy' => 'uc_path_13', 'Runic Champion' => 'uc_path_14', 'Savage of the Wild' => 'uc_path_15', 'Scourge of the Undead' => 'uc_path_16', 'Shintao Monk' => 'uc_path_17', 'Spellsinger' => 'uc_path_18', 'Stalwart Soldier' => 'uc_path_19', 'Storm of Kargon' => 'uc_path_20', 'Tempest' => 'uc_path_21', 'The Dark Blade' => 'uc_path_22', 'The Dynamic Hand' => 'uc_path_23', 'The Flame of Justice' => 'uc_path_24', 'The Font of Healing' => 'uc_path_25', 'The Ingenious Sage' => 'uc_path_26', 'The Mighty Protector' => 'uc_path_27', 'The Path of Light' => 'uc_path_28', 'The Path of Shadow' => 'uc_path_29', 'The Truthbringer' => 'uc_path_30', 'The Voice of Power' => 'uc_path_31', 'Thief Acrobat' => 'uc_path_32', 'Two-headed Heron' => 'uc_path_33', 'Vanguard Warrior' => 'uc_path_34', 'Virtuoso of the Sword' => 'uc_path_35', 'War Chanter' => 'uc_path_36', 'Warpriest of Siberys' => 'uc_path_37', 'Whirlwind Fighter' => 'uc_path_38'),
					'undeletable'	=> true,
					'tolang'		=> true
				),
				'gender'	=> array(
					'type'			=> 'dropdown',
					'category'		=> 'character',
					'lang'			=> 'uc_gender',
					'options'		=> array('Male' => 'uc_male', 'Female' => 'uc_female'),
					'undeletable'	=> true,
					'tolang'		=> true
				),
				'guild'	=> array(
					'type'			=> 'text',
					'category'		=> 'character',
					'lang'			=> 'uc_guild',
					'size'			=> 32,
					'undeletable'	=> true,
				),
			);
			return $xml_fields;
		}

		protected function load_filters($langs){
			if(!$this->classes) {
				$this->load_type('classes', $langs);
			}
			foreach($langs as $lang) {
				$names = $this->classes[$this->lang];
				$this->filters[$lang][] = array('name' => '-----------', 'value' => false);
				foreach($names as $id => $name) {
					$this->filters[$lang][] = array('name' => $name, 'value' => 'class:'.$id);
				}
				$this->filters[$lang] = array_merge($this->filters[$lang], array(
					array('name' => '-----------', 'value' => false),
					array('name' => $this->glang('tank', true, $lang), 'value' => 'class:2,6'),
					array('name' => $this->glang('damage_dealer', true, $lang), 'value' => 'class:1,2,7,9,10,11,12'),
					array('name' => $this->glang('support', true, $lang), 'value' => 'class:3,5,8'),
					array('name' => $this->glang('healer', true, $lang), 'value' => 'class:4,5'),
					
				));
			}
		}

		public function install($install=false){}
	}
}
?>