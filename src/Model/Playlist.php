<?php
namespace Spotify\Model;
class Playlist {
    private string $title;
    private array $tracks;
    public function __construct(string $title) {
        $this->title = $title;
        $this->tracks = [];
    }
}