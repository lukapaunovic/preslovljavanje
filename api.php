<?php
$text = (!empty($_GET['text']) ? htmlspecialchars($_GET['text'], ENT_QUOTES, 'UTF-8') : false);
$type = (!empty($_GET['type']) ? htmlspecialchars($_GET['type'], ENT_QUOTES, 'UTF-8') : false);

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
		"Љ" => "LJ",
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
	$arr = array("status"=>'a da odjebeš malo?');
	header('Content-Type: application/json');	
	echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); 
}
?>