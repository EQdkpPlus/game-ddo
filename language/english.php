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
$english_array = array(
	'classes' => array(
		0	=> 'Unknown',
		1	=> 'Artificer',
		2	=> 'Barbarian',
		3	=> 'Bard',
		4	=> 'Cleric',
		5	=> 'Favored Soul',
		6	=> 'Fighter',
		7	=> 'Monk',
		8	=> 'Paladin',
		9	=> 'Ranger',
		10	=> 'Rogue',
		11	=> 'Sorcerer',
		12	=> 'Wizard',
	),

	'races' => array(
		0	=> 'Unknown',
		1	=> 'Drow Elf',
		2	=> 'Dwarf',
		3	=> 'Elf',
		4	=> 'Half-Elf',
		5	=> 'Halfling',
		6	=> 'Half-Orc',
		7	=> 'Human',
		8	=> 'Warforged',
		9	=> 'Iron Defender',
	),

	'lang' => array(
		'ddo'							=> 'Dungeons & Dragons Online',
		'tank'							=> 'Tank',
		'damage_dealer'					=> 'Damage Dealer',
		'support'						=> 'Support',
		'healer'						=> 'Healer',
		
		// Profile information
		'uc_gender'						=> 'Gender',
		'uc_male'						=> 'Male',
		'uc_female'						=> 'Female',
		'uc_guild'						=> 'Guild',
		'uc_class_path'					=> 'Class Path',
		'uc_race'						=> 'Race',
		'uc_class'						=> 'Class',
		
		// Class Information
		'uc_path_0' => '-',
		'uc_path_1' => 'Angel of Vengeance',
		'uc_path_2' => 'Arcane Archer',
		'uc_path_3' => 'Arcane Cannon',
		'uc_path_4' => 'Bastion of the Outlands',
		'uc_path_5' => 'Beacon of Hope',
		'uc_path_6' => 'Deepwood Sniper',
		'uc_path_7' => 'Divine Avenger',
		'uc_path_8' => 'Elementalist',
		'uc_path_9' => 'Henshin Mystic',
		'uc_path_10' => 'Master Mechanic',
		'uc_path_11' => 'Mastermaker',
		'uc_path_12' => 'Necromancer',
		'uc_path_13' => 'Ninja Spy',
		'uc_path_14' => 'Runic Champion',
		'uc_path_15' => 'Savage of the Wild',
		'uc_path_16' => 'Scourge of the Undead',
		'uc_path_17' => 'Shintao Monk',
		'uc_path_18' => 'Spellsinger',
		'uc_path_19' => 'Stalwart Soldier',
		'uc_path_20' => 'Storm of Kargon',
		'uc_path_21' => 'Tempest',
		'uc_path_22' => 'The Dark Blade',
		'uc_path_23' => 'The Dynamic Hand',
		'uc_path_24' => 'The Flame of Justice',
		'uc_path_25' => 'The Font of Healing',
		'uc_path_26' => 'The Ingenious Sage',
		'uc_path_27' => 'The Mighty Protector',
		'uc_path_28' => 'The Path of Light',
		'uc_path_29' => 'The Path of Shadow',
		'uc_path_30' => 'The Truthbringer',
		'uc_path_31' => 'The Voice of Power',
		'uc_path_32' => 'Thief Acrobat',
		'uc_path_33' => 'Two-headed Heron',
		'uc_path_34' => 'Vanguard Warrior',
		'uc_path_35' => 'Virtuoso of the Sword',
		'uc_path_36' => 'War Chanter',
		'uc_path_37' => 'Warpriest of Siberys',
		'uc_path_38' => 'Whirlwind Fighter',

	),
);
?>