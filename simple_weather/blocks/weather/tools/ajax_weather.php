<?php
defined('C5_EXECUTE') or die("Access Denied.");

// using YQL to get JSON back instead of the default RSS
$url = 'http://query.yahooapis.com/v1/public/yql?q=select%20item%20from%20weather.forecast%20where%20location%3D%22'.$_GET['zip'].'%22&format=json';
$weather = json_decode(file_get_contents($url));
$item = $weather->query->results->channel->item;

Loader::library('simple_html_dom', 'simple_weather');
$post_dom = str_get_html($item->description);
$first_img = $post_dom->find('img', 0);
$icon = $first_img->attr['src'];

// the icon is embedded in an HTML block, this will find it and add it to the $items array
$json = array (
	'weather' => $item,
	'icon' => $icon
);

header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');
echo json_encode($json);
exit;
?>