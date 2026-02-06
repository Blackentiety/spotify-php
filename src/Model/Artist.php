<?php

namespace Spotify\Model;
class Artist {
    private string $name;
    private array $genres;
    private array $albums;
    public function __construct(string $name){
        $this->name = $name;
        $this->genres = [];
        $this->albums = [];
    }
    public function getName(): string {
        return $this->name;
    }
    public function addGenre(string $genre): void {
        if (!in_array($genre, $this->genres)) {
            $this->genres[] = $genre;
        }
    }
    public function getGenres(): array {
        return $this->genres;
    }
    public function addAlbum(Album $album): void {
        $this->albums[] = $album;
    }
    public function getAlbums(): array {
        return $this->albums;
    }

}