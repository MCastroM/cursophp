<?php
require_once '../vendor/autoload.php';


// Crear variable foto original
$foto_original = '15112008-IMG_0207.jpg';

// variable para guardar la foto modificada
$guardar_en = 'foto_modificada.jpg';

// Utilizando el objeto de PHPThumb
$thumb = new PHPThumb\GD($foto_original);
// ob_clean();
$thumb->resize(80, 80);
$thumb->show();
$thumb->save($guardar_en);
