<?php

namespace App\Support\Scrapers;

use Exception;
use Embed\Embed as EmbedClient;

class Embed
{
    public $data;

    public function create(string $url)
    {
        try {
            $info = EmbedClient::create($url);
        } catch (Exception $e) {
            report($e);
            $info = [];
        }

        $this->data = $this->parse($info);

        return $this;
    }

    public function parse($response)
    {
        $data = collect([
            'title' => optional($response)->title,
            'description' => optional($response)->description,
            'url' => optional($response)->url,
            'type' => optional($response)->type,
            'tags' => collect(optional($response)->tags),
            'image' => optional($response)->image,
            'image_width' => optional($response)->imageWidth,
            'image_height' => optional($response)->imageHeight,
            'images' => collect(optional($response)->images),
            'embed_code' => optional($response)->code,
            'embed_width' => optional($response)->width,
            'embed_height' => optional($response)->height,
            'embed_aspect' => optional($response)->aspectRatio,
            'author_name' => optional($response)->authorName,
            'author_url' => optional($response)->authorUrl,
            'provider_name' => optional($response)->providerName,
            'provider_url' => optional($response)->providerUrl,
            'provider_icon' => optional($response)->providerIcon,
            'provider_icons' => optional($response)->providerIcons,
            'published_date' => optional($response)->publishedDate,
            'license' => optional($response)->license,
            'linked_data' => optional($response)->linkedData,
            'feeds' => optional($response)->feeds,
        ]);

        return $data;
    }
}