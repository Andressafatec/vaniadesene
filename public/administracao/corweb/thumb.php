<?php
define('QUALIDADE_DEFAULT',75);
define('TAMANHO_DEFAULT',128);
$HOST='127.0.0.1';
$TRANSPARENCIA=20;
$new_width =150;
$new_height=115;
$qualidade=0;
$tamanho=0;
$random=0;
$nomelogo='marcadagua.gif';
$LOGO_RATIO=0.4;
if (isset($_REQUEST['transparencia'])) {
	$TRANSPARENCIA = intval($_REQUEST['transparencia']);
}
if (isset($_REQUEST['logotipo'])) {
	$nomelogo = $_REQUEST['logotipo'];
}
if (isset($_REQUEST['proporcaoLogo'])) {
	$LOGO_RATIO = doubleval($_REQUEST['proporcaoLogo']);
}
$foto=$_REQUEST['foto'];
if (isset($_REQUEST['tamanho'])) {
	$tamanho = intval($_REQUEST['tamanho']);
}
if (isset($_REQUEST['random'])) {
	$random = intval($_REQUEST['random']);
}
if (isset($_REQUEST['altura'])) {
	$new_height = intval($_REQUEST['altura']);
}
if (isset($_REQUEST['largura'])) {
	$new_width = intval($_REQUEST['largura']);
}
if (!$qualidade) $qualidade = QUALIDADE_DEFAULT;
if (!$new_width && !$new_height && !$tamanho) $tamanho = TAMANHO_DEFAULT;
if ($tamanho) {
	if ($width > $height) {
		$new_width = $tamanho;
	} else {
		$new_height = $tamanho;
	}
}

if ($new_width && !$new_height) {
		$new_height = intval($height*($new_width/$width));
}
if (!$new_width && $new_height) {
		$new_width = intval($width*($new_height/$height));
}
if ($foto == '') {
	imagemSemFoto($new_width, $new_height);
} else {
	$arquivo = 'http://'.$HOST.'/corweb/fotos/'.$foto;

	$type = exif_imagetype($arquivo);
	if ($type==IMAGETYPE_JPEG) {
		$image = @imagecreatefromjpeg($arquivo);
	} else if ($type==IMAGETYPE_GIF) {
		$image = @imagecreatefromgif($arquivo);
	} else if ($type==IMAGETYPE_PNG) {
		$image = @imagecreatefrompng($arquivo);
	}
	if (!$image) {
		imagemSemFoto($new_width, $new_height);
		exit(0);
	}

	list($width, $height) = getimagesize($arquivo);
	$ratio = $width/$height;

	if ($new_width/$new_height > $ratio) {
		 $new_width = $new_height*$ratio;
	} else {
		 $new_height = $new_width/$ratio;
	}

	//MarcaDagua
	$logotipo = 'http://'.$HOST.'/corweb/imagens/'.$nomelogo;
	$typeL = exif_imagetype($logotipo);
	if ($typeL==IMAGETYPE_JPEG) {
		$logo = imagecreatefromjpeg($logotipo);
	} else if ($typeL==IMAGETYPE_GIF) {
		$logo = imagecreatefromgif($logotipo);
	} else if ($typeL==IMAGETYPE_PNG) {
		$logo= imagecreatefrompng($logotipo);
	}
	if (!$logo) {
		imagemSemFoto($new_width, $new_height);
		exit(0);
	}

	list($widthLogo, $heightLogo) = getimagesize($logotipo);
	$ratioWLogo = $width*$LOGO_RATIO;

	$ratioLogo = $widthLogo/$heightLogo;
	$new_widthLogo = $width*$LOGO_RATIO;
	$new_heightLogo = $height*$LOGO_RATIO;
	if ($new_widthLogo/$new_heightLogo > $ratioLogo) {
		 $new_widthLogo = $new_heightLogo*$ratioLogo;
	} else {
		 $new_heightLogo = $new_widthLogo/$ratioLogo;
	}
	$logo_p = imagecreatetruecolor($new_widthLogo, $new_heightLogo);
	setTransparency($logo_p,$logo);
	imagecopyresampled($logo_p, $logo, 0, 0, 0, 0, $new_widthLogo, $new_heightLogo, $widthLogo, $heightLogo);
	imagedestroy($logo);
	$logo = $logo_p;

	// Water mark random position
	$margin = 5;
	$wmX=$margin;
	$wmY=$margin;
	if ($random==1) {
		$wmX = (bool)rand(0,1) ? $margin : (imageSX($image) - imageSX($logo)) - $margin;
		$wmY = (bool)rand(0,1) ? $margin : (imageSY($image) - imageSY($logo)) - $margin;
	}

	// Water mark process
	imageCopyMerge($image, $logo, $wmX, $wmY, 0, 0, imageSX($logo), imageSY($logo), $TRANSPARENCIA);

	if (isset($_REQUEST['qualidade'])) {
		$qualidade = intval($_REQUEST['qualidade']);
	}
	$image_p = imagecreatetruecolor($new_width, $new_height);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	header('Content-type: '.image_type_to_mime_type($type));
	if ($type==IMAGETYPE_JPEG) {
		imagejpeg($image_p, null, $qualidade);
	} else if ($type==IMAGETYPE_GIF) {
		imagegif($image_p, null, $qualidade);
	} else if ($type==IMAGETYPE_PNG) {
		imagepng($image_p, null, $qualidade);
	}
	imagedestroy($image);
	imagedestroy($image_p);
	imagedestroy($logo);
}
function setTransparency($new_image,$image_source)    {
		$transparencyIndex = imagecolortransparent($image_source);
		$transparencyColor = array('red' => 255, 'green' => 255, 'blue' => 255);

		if ($transparencyIndex >= 0) {
				$transparencyColor    = imagecolorsforindex($image_source, $transparencyIndex);
		}

		$transparencyIndex    = imagecolorallocate($new_image, $transparencyColor['red'], $transparencyColor['green'], $transparencyColor['blue']);
		imagefill($new_image, 0, 0, $transparencyIndex);
		imagecolortransparent($new_image, $transparencyIndex);
}
function imagemSemFoto($new_width, $new_height) {
	header("Content-type: image/png");
	$im = @imagecreate($new_width, $new_height) or die("Cannot Initialize new GD image stream");
	$background_color = imagecolorallocate($im, 0, 0, 0);
	$text_color = imagecolorallocate($im, 255, 255, 255);
	imagestring($im, 3, ($new_width / 3 ), ($new_height / 2) - 10,  "Sem Foto", $text_color);
	imagepng($im);
	imagedestroy($im);
}
?>
