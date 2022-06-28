<?php

// $targetFolder = '/home/u980941338/domains/bicicura.com/streetapp/storage/app/avatars';
// $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/avatars';
// symlink($targetFolder,$linkFolder);

$targetFolder1 = '/home/u980941338/domains/bicicura.com/streetapp/storage/app/avatars';
$linkFolder1 = $_SERVER['DOCUMENT_ROOT'].'/public/avatars';
symlink($targetFolder1, $linkFolder1);

$targetFolder2 = '/home/u980941338/domains/bicicura.com/streetapp/storage/app/extras';
$linkFolder2 = $_SERVER['DOCUMENT_ROOT'].'/book';
symlink($targetFolder2, $linkFolder2);

$targetFolder3 = '/home/u980941338/domains/bicicura.com/streetapp/storage/app/polaroids';
$linkFolder3 = $_SERVER['DOCUMENT_ROOT'].'/polaroids';
symlink($targetFolder3, $linkFolder3);

echo 'Symlink process successfully completed';

?>