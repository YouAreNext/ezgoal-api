<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Firebase\JWT\JWT;
use PHPHtmlParser\Dom;

class ParseService
{
  public function parseLink($url)
  {
    $dom = new Dom;
    $dom->loadFromUrl($url);
    $title = $dom->find('h1')->text;
    $description = $dom->find('meta[property="og:description"]');
    $image = $dom->find('meta[property="og:image"]');
    $images = $dom->find('img');
    $imagesToChoose = [];

    for ($i = 0; $i < 3; $i++) {
      if ($images[$i]) {
        $imagesToChoose[] = $images[$i]->getAttribute('src');
      }
    }

    if (!$title || trim($title[0]) == '') {
      $title = $dom->find('meta[property="og:title"]');
      if ($title[0]) {
        $title = $title->getAttribute('content');
      }
    }

    if (($description[0])) {
      $description = $description->getAttribute('content');
    }
    if (($image[0])) {
      $image = $image->getAttribute('content');
    }

    return [
      'title' => $title,
      'description' => $description,
      'image' => $image,
      'images' => $imagesToChoose
    ];
  }
}
