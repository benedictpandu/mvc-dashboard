<?php
if (!isset($_SESSION["user"])) {
    header('Location: ' . BASEURL . '/login');
    exit(); 
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['title']?></title>
    <link href="<?=BASEURL;?>/public/css/output.css" rel="stylesheet">
</head>
<body>
