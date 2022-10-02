<?php

require "vendor/autoload.php";

use jaraujo\Crawler\WebCrawler;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(["base_uri" => "https://www.jw.org/pt/biblioteca/musica-canticos/"]);
$crawler = new Crawler();

$finder = new WebCrawler($client, $crawler);
$courses = $finder->finder("clipes-musicais/");

foreach ($courses as $course) {
    echo $course . PHP_EOL;
}
