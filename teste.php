<?php

include_once('noticia.class.php');

$not = new Noticia();
$not->render();

$vid = new Video();
$vid->render();

?>
