<?php

namespace Intervention\Image\Imagick\Commands;

use Intervention\Image\Commands\AbstractCommand;

class PixelateCommand extends AbstractCommand
{
    /**
     * Applies a pixelation effect to a given image
     *
     * @param  \Intervention\Image\Image $image
     * @return boolean
     */
    public function execute($image)
    {
        $size = $this->argument(0)->type('digit')->value(10);

        $width = $image->getWidth();
        $height = $image->getHeight();

        $image->getCore()->scaleImage(max(1, (int) ($width / $size)), max(1, (int) ($height / $size)));
        $image->getCore()->scaleImage($width, $height);

        return true;
    }
}
