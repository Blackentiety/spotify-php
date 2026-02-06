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
    public function addTrack(Track $track): void {
        $this->tracks[] = $track;
    }
    public function getTotalDuration():int {
        $totalDuration = 0;
        foreach ($this->tracks as $track) {
            $totalDuration += $track->getDuration();
        }
        return $totalDuration;
    }
    public function getFormattedDuration():string {
        $totalDuration = $this->getTotalDuration();
        // On calcule les heures avec une division entière
        $heures = intdiv($totalDuration, 3600);
        $totalDuration -= $heures * 3600;
        // On calcule les minutes avec une division entière
        $minutes = intdiv($totalDuration, 60);

        // On récupère le reste (les secondes) avec le modulo %
        $seconds = $totalDuration % 60;

        // On utilise sprintf pour forcer les deux chiffres sur les secondes (05 au lieu de 5)
        if ($heures > 0) {
            return sprintf('%d:%02d:%02d', $heures, $minutes, $seconds);
        } else {
            return sprintf('%d:%02d', $minutes, $seconds);
        }
    }
    public function filterByMinRating(int $minRating): array {
        $tracks = [];
        foreach ($this->tracks as $track) {
            if ($track->getRating() >= $minRating) {
                $tracks[] = $track;
            }
        }
        return $tracks;
    }
    public function shuffle(): void {
        shuffle($this->tracks);
    }
    public function getAverageRating(): float {
        $totalRating = 0;
        foreach ($this->tracks as $track) {
            $totalRating += $track->getRating();
        }
        return $totalRating/count($this->tracks);
    }
    public function filterByMaxDuration(int $maxDuration): array  {
        $tracks = [];
        foreach ($this->tracks as $track) {
            if ($track->getDuration() <= $maxDuration) {
                $tracks[] = $track;
            }
        }
        return $tracks;
    }
    public function removeTrack(Track $track): void {
        if (in_array($track, $this->tracks)) {
            $index = array_search($track, $this->tracks);
            unset($this->tracks[$index]);
            $this->tracks = array_values($this->tracks);
        }
    }
}