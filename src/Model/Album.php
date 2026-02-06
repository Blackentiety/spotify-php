<?php
namespace Spotify\Model;
final class Album {
    private string $title;
    private int $year;
    private Artist $artist;
    private array $tracks;
    public function __construct(string $title, int $year, Artist $artist) {
        $this->title = $title;
        $this->year = $year;
        $this->artist = $artist;
        $artist->addAlbum($this);
        $this->tracks = [];
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getYear(): int {
        return $this->year;
    }
    public function getArtist(): Artist {
        return $this->artist;
    }
    public function addTrack(Track $track): void {
        $this->tracks[] = $track;
    }
    public function getTracks(): array {
        return $this->tracks;
    }
}