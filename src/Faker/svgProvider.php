<?php

declare(strict_types=1);

namespace App\Faker;

use Faker\Provider\Base;

class svgProvider extends Base
{
    public static function svg(string $label = null, int $width = 32, int $height = 32, string $colorStart = null, string $colorEnd = null): string
    {
        $randColor = static function(): string {
            return substr(md5((string)random_int(0, PHP_INT_MAX)), 0, 6);
        };

        $content = sprintf(
            "https://placeholder.pics/svg/%sx%s/%s-%s/FFFFFF-FFFFFF/%s",
            $width,
            $height,
            $colorStart ?? $randColor(),
            $colorEnd ?? $randColor(),
            $label
        );

        return $content;
    }
}
