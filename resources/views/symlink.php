<?php

$targetFolder1 = '/home/u980941338/domains/antonelladeferrari.com/saigonApp/storage/app/consultas';
$linkFolder1 = $_SERVER['DOCUMENT_ROOT'].'/consultas';
symlink($targetFolder1, $linkFolder1);

$targetFolder1 = '/home/u980941338/domains/antonelladeferrari.com/saigonApp/storage/app/fotos';
$linkFolder1 = $_SERVER['DOCUMENT_ROOT'].'/fotos';
symlink($targetFolder1, $linkFolder1);

$targetFolder1 = '/home/u980941338/domains/antonelladeferrari.com/saigonApp/storage/app/reel';
$linkFolder1 = $_SERVER['DOCUMENT_ROOT'].'/reel';
symlink($targetFolder1, $linkFolder1);

$targetFolder1 = '/home/u980941338/domains/antonelladeferrari.com/saigonApp/storage/app/thumbnails';
$linkFolder1 = $_SERVER['DOCUMENT_ROOT'].'/thumbnails';
symlink($targetFolder1, $linkFolder1);


?>