<?php

require "vendor/autoload.php";

use jaraujo\Crawler\WebCrawler;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(["base_uri" => "https://www.jw.org/pt/biblioteca/musica-canticos/"]);
$crawler = new Crawler();

$finder = new WebCrawler($client, $crawler);
$results = $finder->finder("clipes-musicais/");

foreach ($results as $result) {
    echo $result . PHP_EOL;
}
