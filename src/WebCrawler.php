<?php

namespace jaraujo\Crawler;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class WebCrawler
{

    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function finder(string $url): array
    {
        $response = $this->httpClient->request("GET", $url);

        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);

        $elements = $this->crawler->filter("p.desc");

        $result = [];

        foreach ($elements as $element) {
            $result[] = $element->textContent;
        }

        return $result;
    }
}
