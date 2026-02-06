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
        if (!in_array($album, $this->albums)) {
            $this->albums[] = $album;
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
}