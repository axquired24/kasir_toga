<?php

namespace App\Repo;

// Package
use Intervention\Image\ImageManager;

// use File;

/**
 * Article Repository.
 */
class Repo
{
    // Image Processor

    /**
     * Optimize Original Image.
     */
    public function original($photo, $filename, $path)
    {
        $manager = new ImageManager();
        $image = $manager->make($photo)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })
            ->save($path.$filename);

        return $image;
    }

    /**
     * Create Icon From Original.
     */
    public function icon($photo, $filename, $path)
    {
        $manager = new ImageManager();
        $image = $manager->make($photo)->resize(100, 100)
            ->save($path.$filename);

        return $image;
    }
}
