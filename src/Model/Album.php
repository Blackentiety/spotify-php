<?php
namespace Spotify\Model;
final class Album {
    private string $title;
    private int $year;
    private Artist $artist;
    public function __construct(string $title, int $year, Artist $artist) {
        $this->title = $title;
        $this->year = $year;
        $this->artist = $artist;
        $artist->addAlbum($this);
    }
}