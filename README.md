# Laravel
******
## Sommaire

- [Installation](#Installation)
       -azer
- [Les dispositifs techniques pour accéder aux contenus](#les-dispositifs-techniques-pour-accéder-aux-contenus)
- [Le RGAA et les documents en téléchargement](#le-rgaa-et-les-documents-en-téléchargement)
- [À qui s’adressent ces guides ?](#À-qui-sadressent-ces-guides)
- [Présentation des guides](#présentation-des-guides)
- [Licence](#licence)
******

## Installation
`composer create-project --prefer-dist laravel/laravel nom_projet`
******
## Une barre de débogage
`composer require barryvdh/laravel-debugbar:~2.4 `
![alt text](https://cloud.githubusercontent.com/assets/973269/4270452/740c8c8c-3ccb-11e4-8d9a-5a9e64f19351.png)

A rajouter pour activer la barre de debug dans config->app.php en dessous de   
       
> Application Service Providers... 
:

`Barryvdh\Debugbar\ServiceProvider::class,` 

`'Debugbar' => Barryvdh\Debugbar\Facade::class,`



******

## Pour crée des formulaires simplement:
> installer ce paquet via Composer
https://laravelcollective.com/docs/5.2/html

`composer require "laravelcollective/html":"^5.2.0"`

> Ensuite, ajoutez votre nouveau fournisseur au providers tableau de :config/app.php

      'providers' => [
         // ...
              Collective\Html\HtmlServiceProvider::class,
         // ...
       ],
******      
> Enfin, ajoutez deux alias de classe au aliases tableau de :config/app.php

       'aliases' => [
         // ...
              'Form' => Collective\Html\FormFacade::class,
              'Html' => Collective\Html\HtmlFacade::class,
        // ...
        ],
******

## Pour voir tout les commandes possibles via l'outil artisan

`php artisan`

******

## Pour crée un controler:

`php artisan make:controller NomControler`
******


## Pour voir tout les chemin du route:

`php artisan route:list`
![alt text](https://s3-eu-west-1.amazonaws.com/sdz-upload/prod/upload/img0154.JPG)
******

## Pour crée une page 404 au lieu de celle par default:

Il faut crée la page 404 dans ce dossier
`resources/views/errors/404.blade.php  `
Laravel s'occupe du reste

******

## Crée une authentification:

`php artisan make:auth`
![alt text](https://s3-eu-west-1.amazonaws.com/sdz-upload/prod/upload/img0182.JPG)

******

## Restreindre certaine page si la personne est log ou non:

`Route::get('profile', ['middleware' => 'auth', 'uses' => 'ProfileController@show']);`

Laravel fournit le `auth` middleware par défaut pour restreindre

https://openclassrooms.com/courses/decouvrez-le-framework-php-laravel-1/l-authentification-1
https://laravel.com/docs/5.0/authentication#protecting-routes
//Pour toute questions sur l'aut regarder la doc elle explique tout
******

## Pour modifier les route une fois l'utilisateur log:

Vous pouvez personnaliser l'emplacement de redirection post-authentification 
en définissant une  redirectTopropriété sur le 

* LoginController,

* RegisterControlleret,

* ResetPasswordController

Voici le code a mettre :

    protected function redirectTo()
    {
        return '/path';
    }

******
# Base de donner

## Renseigner le nom de sa base de donner (.env)
> faut indiquer où se trouve votre base, son nom, le nom de l'utilisateur, le mot de passe dans le fichier de configuration.env
### Installer la migration:   
`php artisan migrate:install`
> Cela va nous permettre de suivre toute nos changement de migration par exemple si on a crée une base de donner ect..

*******
### Créer la migration:     
`php artisan make:migration create_emails_table`


*******
### Utiliser la migration:    
`php artisan migrate`


*******
### Revenir en arrière avec unrollback 
Annule la dernière migration effectuée:       
`php artisan migrate:rollback`
*******





https://openclassrooms.com/courses/decouvrez-le-framework-php-laravel-1/migrations-et-modeles-1#/id/r-3617345 :
`php artisan make:model Email`

### Créer une requête de formulaire:            
`php artisan make:request EmailRequest`
