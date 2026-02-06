<?php

namespace Spotify\Model;
class Artist {
    private string $name;
    private array $genres;
    public function __construct(string $name){
        $this->name = $name;
        $this->genres = [];
    }
    public function getName(): string {
        return $this->name;
    }
    public function addGenre(string $genre): void {
        $this->genres[] = $genre;
    }
    public function getGenres(): array {
        return $this->genres;
    }
}