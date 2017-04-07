<?php

#    Preslovljavanje ćirlica-latinica
#    Copyright (C) 2017 Luka <internetfazoni@gmail.com>
#
#    This program is free software: you can redistribute it and/or modify
#    it under the terms of the GNU General Public License as published by
#    the Free Software Foundation, either version 3 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program.  If not, see <http://www.gnu.org/licenses/>.


$text = (!empty($_POST['text']) ? htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8') : false);
$type = (!empty($_POST['type']) ? htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8') : false);

class SrLatin {
	var $replace = array(
		"А" => "A",
		"Б" => "B",
		"В" => "V",
		"Г" => "G",
		"Д" => "D",
		"Ђ" => "Đ",
		"Е" => "E",
		"Ж" => "Ž",
		"З" => "Z",
		"И" => "I",
		"Ј" => "J",
		"К" => "K",
		"Л" => "L",
		"Љ" => "Lj",
		"М" => "M",
		"Н" => "N",
		"Њ" => "Nj",
		"О" => "O",
		"П" => "P",
		"Р" => "R",
		"С" => "S",
		"Т" => "T",
		"Ћ" => "Ć",
		"У" => "U",
		"Ф" => "F",
		"Х" => "H",
		"Ц" => "C",
		"Ч" => "Č",
		"Џ" => "Dž",
		"Ш" => "Š",
		"а" => "a",
		"б" => "b",
		"в" => "v",
		"г" => "g",
		"д" => "d",
		"ђ" => "đ",
		"е" => "e",
		"ж" => "ž",
		"з" => "z",
		"и" => "i",
		"ј" => "j",
		"к" => "k",
		"л" => "l",
		"љ" => "lj",
		"м" => "m",
		"н" => "n",
		"њ" => "nj",
		"о" => "o",
		"п" => "p",
		"р" => "r",
		"с" => "s",
		"т" => "t",
		"ћ" => "ć",
		"у" => "u",
		"ф" => "f",
		"х" => "h",
		"ц" => "c",
		"ч" => "č",
		"џ" => "dž",
		"ш" => "š",
	);

	public function convert_lat( $text ) {
		return strtr( $text, $this->replace );
	}

	public function convert_cyr( $text ) {
		return strtr( $text, array_flip($this->replace) );
	}
    
}

if(($type!=false) && ($text!=false)) {
$SrLatin = new SrLatin();
    
    if($type=="lat") {
$text = $SrLatin->convert_lat($text);
       
    }
    
    if($type=="cyr") {
$text = $SrLatin->convert_cyr($text);
    }
    
    $arr = array("text"=>$text);
header('Content-Type: application/json');	
echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); 
    
} else {
	$arr = array("status"=>'Nedozvoljen pristup!');
	header('Content-Type: application/json');	
	echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); 
}
?>
