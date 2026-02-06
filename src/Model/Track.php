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
    public function getFormattedDuration(): string {
        // On calcule les minutes avec une division entière
        $minutes = intdiv($this->length, 60);

        // On récupère le reste (les secondes) avec le modulo %
        $seconds = $this->length % 60;

        // On utilise sprintf pour forcer les deux chiffres sur les secondes (05 au lieu de 5)
        return sprintf('%d:%02d', $minutes, $seconds);
    }
    public function getRating(): int {
        return $this->rating;
    }
    public function setRating(int $rating): void {
        $this->rating = $rating;
    }
}