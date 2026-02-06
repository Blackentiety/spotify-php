<?php
namespace Spotify\Model;
class Playlist {
    private string $title;
    private array $tracks;
    public function __construct(string $title) {
        $this->title = $title;
        $this->tracks = [];
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getTracks(): array {
        return $this->tracks;
    }
    public function addTrack(Track $track) {
        $this->tracks[] = $track;
    }
    public function getTotalDuration():int {
        $totalDuration = 0;
        foreach ($this->tracks as $track) {
            $totalDuration += $track->getDuration();
        }
        return $totalDuration;
    }
}