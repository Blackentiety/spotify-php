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
    public function getDuration(): int {
        $duration = 0;
        foreach ($this->tracks as $track) {
            $duration += $track->getDuration();
        }
        return $duration;
    }
    public function getFormattedDuration(): string {
        $duration = $this->getDuration();
        // On calcule les heures avec une division entière
        $heures = intdiv($duration, 3600);
        $duration -= $heures * 3600;
        // On calcule les minutes avec une division entière
        $minutes = intdiv($duration, 60);

        // On récupère le reste (les secondes) avec le modulo %
        $seconds = $duration % 60;

        // On utilise sprintf pour forcer les deux chiffres sur les secondes (05 au lieu de 5)
        if ($heures > 0) {
            return sprintf('%d:%02d:%02d', $heures, $minutes, $seconds);
        } else {
            return sprintf('%d:%02d', $minutes, $seconds);
        }
    }
}