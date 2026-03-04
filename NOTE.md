*** Session

On peut ouvrir un sessionstart directement sur le fichier config.php pour eviter de le faire sur chaque fichier du dossier mais ATTENTION = declarer deux fois un session_start produit un warning donc pour eviter ca, on peut ecrire:

```php
if (session*status()* *===* PHP_SESSION_NONE) {
session_start();
}
```

