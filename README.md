## Spotify-php
---
Voici mon rendu de ce mini projet sur phpunit

### Structure du projet
```structure
spotify-php/
├──src/
| ├──Model/
|   ├──Artist.php
|   ├──Album.php
|   ├──Track.php
|   ├──Playlist.php
|   ├──Library.php
| tests/
|   ├──ArtistTest.php
|   ├──AlbumTest.php
|   ├──TrackTest.php
|   ├──PlaylistTest.php
|   ├──LibraryTest.php
├──composer.json
├──README.md
```
### Composer
--- 
commencer par
supprimer le fichier `composer.lock`
ensuite taper la commande :
`composer install`
vous pouvez ensuite vérifier chacun des test unitaires avec :
```bash
composer test:Track
composer test:Artist
composer test:Album
composer test:Playlist
composer test:Library
```
