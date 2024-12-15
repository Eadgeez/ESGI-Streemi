<?php

declare(strict_types=1);

namespace App\Faker;

use Faker\Provider\Base;

class ImageProvider extends Base
{
    public static function picsumUrl($width = 640, $height = 480, $grayscale = false, $blur = false, $random = false): string
    {
        $url = "https://picsum.photos/{$width}/{$height}";

        $options = [];
        if ($grayscale) {
            $options[] = 'grayscale';
        }
        if ($blur) {
            $options[] = 'blur';
        }
        if ($random) {
            $options[] = "random=" . strval(random_int(1, 1000) ?? 1);
        }

        if (count($options) > 0) {
            $url .= '?' . implode('&', $options);
        }

        return $url;
    }
}
