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
    public function getTitle(): string {
        return $this->title;
    }
    public function getDuration(): int {
        return $this->length;
    }
    public function getRating(): int {
        return $this->rating;
    }
    public function setRating(int $rating): void {
        $this->rating = $rating;
    }
}