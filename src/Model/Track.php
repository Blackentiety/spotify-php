<?php

namespace Spotify\Model;

class Track {
    private string $title;
    private int $length;
    private int $rating;
    private Album $album;
    public function __construct(string $title, int $length) {
        $this->title = $title;
        $this->length = $length;
        $this->rating = 0;
    }
}