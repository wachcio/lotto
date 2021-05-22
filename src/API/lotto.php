<?php
$game = $_GET['game'];
$index = $_GET['index'];
$size = $_GET['size'];
$sort = $_GET['sort'];
$order = $_GET['order'];

$url = "https://www.lotto.pl/api/lotteries/draw-results/by-gametype?game=$game&index=$index&size=$size&sort=$sort&order=$order" . PHP_EOL;

$json = file_get_contents($url);
echo $json;
