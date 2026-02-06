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
}