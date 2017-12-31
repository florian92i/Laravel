# Laravel
composer require barryvdh/laravel-debugbar:~2.4 //  une barre de débogage
![alt text](https://cloud.githubusercontent.com/assets/973269/4270452/740c8c8c-3ccb-11e4-8d9a-5a9e64f19351.png)

A rajouter pour activer la barre de debug dans config->app.php:
Barryvdh\Debugbar\ServiceProvider::class,
'Debugbar' => Barryvdh\Debugbar\Facade::class,




Pour crée des formulaires simplement:
https://openclassrooms.com/courses/decouvrez-le-framework-php-laravel-1/installation-et-organisation-1#/id/r-3616419


Pour voir tout les commandes possibles via l'outil artisan:
php artisan


Pour crée un controler:
php artisan make:controller NomControler


Pour voir tout les chemin du route:
php artisan route:list
![alt text](https://s3-eu-west-1.amazonaws.com/sdz-upload/prod/upload/img0154.JPG)

Pour crée une page 404 au lieu de celle par default:
resources/views/errors/404.blade.php  
Laravel s'occupe du reste


Crée une authentification:
php artisan make:auth
![alt text](https://s3-eu-west-1.amazonaws.com/sdz-upload/prod/upload/img0182.JPG)

Restreindre certaine page si la personne est log ou non:

Route::get('profile', ['middleware' => 'auth', 'uses' => 'ProfileController@show']);
Laravel fournit le auth middleware par défaut pour restreindre
https://openclassrooms.com/courses/decouvrez-le-framework-php-laravel-1/l-authentification-1
https://laravel.com/docs/5.0/authentication#protecting-routes
