# Laravel
******
## Sommaire


* [Installation](#installation)
  * [Une barre de débogage](#une-barre-de-debogage)
  * [Pour crée des formulaires simplement](#pour-cr%C3%A9e-des-formulaires-simplement)
* [Cmd artisan](#cmd-artisan)
  * [Pour voir tout les commandes possibles via l'outil artisan](#pour-voir-tout-les-commandes-possibles-via-loutil-artisan)
  * [Pour crée un controler](#pour-cr%C3%A9e-un-controler)
  * [Pour voir tout les chemin du route](#pour-voir-tout-les-chemin-du-route)
* [Utile](#utile)
  * [Pour crée une page 404 au lieu de celle par default](#pour-cr%C3%A9e-une-page-404-au-lieu-de-celle-par-default)
* [Authentification](#authentification)
  * [Restreindre certaine page si la personne est log ou non](#restreindre-certaine-page-si-la-personne-est-log-ou-non)
  * [Pour modifier les route une fois l'utilisateur log](#pour-modifier-les-route-une-fois-lutilisateur-log)
  * [Changer la redirection apres avoir appuyer sur le bouton deconnexion](#changer-la-redirection-apres-avoir-appuyer-sur-le-bouton-deconnexion)

* [Base de donner](#base-de-donner)
  * [Renseigner le nom de sa base de donner (.env)](#renseigner-le-nom-de-sa-base-de-donner-env)
  * [Installer la migration](#installer-la-migration)
  * [Créer la migration](#cr%C3%A9er-la-migration)
  * [Utiliser la migration](#utiliser-la-migration)
  * [Revenir en arrière avec unrollback](#revenir-en-arri%C3%A8re-avec-unrollback)
  * [Créer une requête de formulaire](#cr%C3%A9er-une-requ%C3%AAte-de-formulaire)
 
******

# Installation
`composer create-project --prefer-dist laravel/laravel nom_projet`
******
### Une barre de debogage
`composer require barryvdh/laravel-debugbar:~2.4 `
![alt text](https://cloud.githubusercontent.com/assets/973269/4270452/740c8c8c-3ccb-11e4-8d9a-5a9e64f19351.png)

A rajouter pour activer la barre de debug dans config->app.php en dessous de   
       
> Application Service Providers... 
:

`Barryvdh\Debugbar\ServiceProvider::class,` 

`'Debugbar' => Barryvdh\Debugbar\Facade::class,`



******

### Pour crée des formulaires simplement:
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

# Architecture fichier

##Controler

##Repository 

# Cmd artisan

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

# Utile

## Pour crée une page 404 au lieu de celle par default:

Il faut crée la page 404 dans ce dossier
`resources/views/errors/404.blade.php  `
Laravel s'occupe du reste

******

# Authentification

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

## Changer la redirection apres avoir appuyer sur le bouton deconnexion
> Aller dans le dossier AuthenticatesUsers
 
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');           // Changer le '/' par l'url que vous voulez 
    }
    
> Pour voir les routes rechercher la class `Router` et ensuite recherche dans cet class la fonction `auth` 
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

> remplir la migration https://laravel.com/docs/5.5/migrations#creating-columns
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
*******

# Les dates
*******

### Crée ces dates avec Carbon
> La classe Carbon, issue d'un package chargé par Laravel, permet la manipulation facile des dates. N'hésitez pas à l'utiliser dès que vous avez des dates à gérer.

`use Carbon\Carbon;`

Exemple:
<?php

    use Illuminate\Database\Seeder;
    use Carbon\Carbon;

    class PostTableSeeder extends Seeder {

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

	public function run()
	{
		DB::table('posts')->delete();

		for($i = 0; $i < 100; ++$i)
		{
			$date = $this->randDate();
		
				'created_at' => $date,
				'updated_at' => $date
			]);
		}
	}
}

> Url doc: http://carbon.nesbot.com/docs/
*******
