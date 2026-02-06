<?php
namespace Spotify\Model;
class Library {
    private array $tracks=[];
    private array $albums=[];
    private array $playlists=[];
    private array $artists=[];
    public function addTrack(Track $track): void {
        $artist = $track->getArtist();
        $album = $track->getAlbum();
        if (!in_array($track, $this->tracks)) {
            $this->tracks[] = $track;
            if (!in_array($album, $this->albums)) {
                $this->albums[] = $album;
            }
            if (!in_array($artist, $this->artists)) {
                $this->artists[] = $artist;
            }
        }
    }
    public function addArtist(Artist $artist): void {
        if (!in_array($artist, $this->artists)) {
            $this->artists[] = $artist;
        }
    }
    public function addAlbum(Album $album): void {
        $tracks = $album->getTracks();
        $artist = $album->getArtist();
        if (!in_array($album, $this->albums)) {
            $this->albums[] = $album;
        }
        foreach ($tracks as $track) {
            if (!in_array($track, $this->tracks)) {
                $this->tracks[] = $track;
            }
        }
        if (!in_array($artist, $this->artists)) {
            $this->artists[] = $artist;
        }
    }
    public function getTracks(): array {
        return $this->tracks;
    }
    public function getAlbums(): array {
        return $this->albums;
    }
    public function getArtists(): array {
        return $this->artists;
    }
    public function addPlaylist(Playlist $playlist): void {
        if (!in_array($playlist, $this->playlists)) {
            $this->playlists[] = $playlist;
        }
    }
    public function getPlaylists(): array {
        return $this->playlists;
    }
    public function getStatistics(): array {
        $stats = ['artist_count'=>0, 'album_count'=>0, 'track_count'=>0, 'playlist_count'=>0, 'total_duration'=>0, 'average_rating'=>0];
        foreach ($this->tracks as $track) {
            $stats['track_count']++;
            $stats['average_rating']+= $track->getRating();
            $stats['total_duration']+= $track->getDuration();
        }
        $stats['average_rating']/= count($this->tracks);
        foreach ($this->albums as $album) {
            $stats['album_count']++;
        }
        foreach ($this->artists as $artist) {
            $stats['artist_count']++;
        }
        foreach ($this->playlists as $playlist) {
            $stats['playlist_count']++;
        }
        return $stats;
    }
    public function search(string $query): array {
        $results = ['tracks'=>[], 'albums'=>[], 'artists'=>[]];
        foreach ($this->tracks as $track) {
            // str_contains vérifie si $query est dans le titre
            if (str_contains(strtolower($track->getTitle()), strtolower($query))) {
                $results['tracks'][] = $track;
            }
        }
        foreach ($this->albums as $album) {
            if (str_contains(strtolower($album->getTitle()), strtolower($query))) {
                $results['albums'][] = $album;
            }
        }
        foreach ($this->artists as $artist) {
            if (str_contains(strtolower($artist->getName()), strtolower($query))) {
                $results['artists'][] = $artist;
            }
        }
        return $results;
    }
}