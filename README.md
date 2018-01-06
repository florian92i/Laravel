# Laravel
******
## Sommaire


* [Installation](#installation)
  * [Une barre de débogage](#une-barre-de-debogage)
  * [Pour crée des formulaires simplement](#pour-cr%C3%A9e-des-formulaires-simplement)
  
* [Architecture fichier les dossiers les plus importants](#architecture-fichier)
  * [Views (resources\views)](#views-resourcesviews)
  * [Routes(routes\web.php)](#routesrouteswebphp)
  * [Controllers (app\Http\Controllers)](#controllers-apphttpcontrollers)
  * [Repository (app\Repositories)](#repository-apprepositories)
  * [Request (app\Http\Requests)](#request-apphttprequests)

* [Cmd artisan](#cmd-artisan)
  * [Pour voir tout les commandes possibles via l'outil artisan](#pour-voir-tout-les-commandes-possibles-via-loutil-artisan)
  * [Pour crée un controler](#pour-cr%C3%A9e-un-controler)
  * [Pour voir tout les chemin du route](#pour-voir-tout-les-chemin-du-route)
  
* [Utile](#utile)
  * [Pour crée une page 404 au lieu de celle par default](#pour-cr%C3%A9e-une-page-404-au-lieu-de-celle-par-default)
  
* [Authentification](#authentification)
  * [Crée une authentification](#cr%C3%A9e-une-authentification)
  * [Restreindre certaine page si la personne est log ou non](#restreindre-certaine-page-si-la-personne-est-log-ou-non)
  * [Pour modifier les route une fois l'utilisateur log](#pour-modifier-les-route-une-fois-lutilisateur-log)
  * [Changer la redirection apres avoir appuyer sur le bouton deconnexion](#changer-la-redirection-apres-avoir-appuyer-sur-le-bouton-deconnexion)

* [BDD](#bdd)
  * [Renseigner le nom de sa base de donner (.env)](#renseigner-le-nom-de-sa-base-de-donner-env)
  * [Installer la migration](#installer-la-migration)
  * [Créer la migration](#cr%C3%A9er-la-migration)
  * [Utiliser la migration](#utiliser-la-migration)
  * [Revenir en arrière avec unrollback](#revenir-en-arri%C3%A8re-avec-unrollback)
  * [Validation Formulaire](#validation-formulaire-)
  
* [Logiciel pour generer les tables](#logiciel-pour-generer-les-tables)


* [Remplir nos tables avec des enregistrements pour faire nos essais](#remplir-nos-tables-avec-des-enregistrements-pour-faire-nos-essais)
  * [Dans quel fichier ?](#dans-quel-fichier-)

* [Les Dates](#les-dates)
  * [Crée ces dates avec Carbon](#cr%C3%A9e-ces-dates-avec-carbon)

* [Formulaire](#formulaire)
  * [Personnaliser les messages d'erreur(resources/lang/en/validation.php)](#personnaliser-les-messages-derreurresourceslangenvalidationphp)

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

### Views (resources\views)

> Contient tout les dossiers avec le code html
******

### Routes(routes\web.php)

> Contient les trajets pour diriger vos Views
******

### Controllers (app\Http\Controllers)

> C'est le boss, c'est lui qui va appeller toute les fonctions placé dans le repository et lui passé les paramètre pour que le repository marche
******

### Repository (app\Repositories)

> Pour le dire simplement, le modèle Repository est un type de conteneur où la logique d'accès aux données est stockée. Il cache les détails de la logique d'accès aux données de la logique métier. En d'autres termes, nous permettons à la logique métier d'accéder à l'objet de données sans connaître l'architecture d'accès aux données sous-jacente.C'est le feu.
******

### Request (app\Http\Requests)
> C'est la ou on fera les controles de saisi, par exemple max 60 caractere ect...
******

# Cmd artisan

## Pour voir tout les commandes possibles via l'outil artisan

`php artisan`

![alt text](https://github.com/florian92i/Laravel/blob/master/artisan_cpt.PNG)
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

>exemple avec les commandes make afficher par `php artisan`
![alt text](https://s3-eu-west-1.amazonaws.com/sdz-upload/prod/upload/img0182.JPG)

> Ensuite il faut inserer dans web.php:

`Auth::routes();      //Auth::routes() génère automatiquement toutes les routes de l'authentification`
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

# BDD 

## Renseigner le nom de sa base de donner (.env)
> faut indiquer où se trouve votre base, son nom, le nom de l'utilisateur, le mot de passe dans le fichier de configuration.env
## Installer la migration:   
`php artisan migrate:install`
> Cela va nous permettre de suivre toute nos changement de migration par exemple si on a crée une base de donner ect..

*******
## Créer la migration:     
`php artisan make:migration create_emails_table`

> Configurer la migration en creant les id ect...  https://laravel.com/docs/5.5/migrations#creating-columns
*******
## Utiliser la migration:    
`php artisan migrate`


********

## Supprimer les tables de sa BDD 
`php artisan migrate:reset`
*******


## Revenir en arrière avec unrollback 
Annule la dernière migration effectuée:       
`php artisan migrate:rollback`
*******





https://openclassrooms.com/courses/decouvrez-le-framework-php-laravel-1/migrations-et-modeles-1#/id/r-3617345 :
`php artisan make:model Email`

## Validation Formulaire :  

`php artisan make:request EmailRequest`
> (unique = pas deux fois le meme nom dans la table)
> Exemple de validation demander: 

	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		return [
			'titre' => 'required|max:80',
			'contenu' => 'required',
			'tags' => ['Regex:/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/']
		];
	}
*******

# Logiciel pour generer les tables

>http://www.laravelsd.com/
>https://openclassrooms.com/courses/decouvrez-le-framework-php-laravel-1/les-commandes-et-les-assistants#/id/r-3618715
# Remplir nos tables avec des enregistrements pour faire nos essais

## Dans quel fichier ?
> DatabaseSeeder.php deja la par default
![alt text](https://sdz-upload.s3.amazonaws.com/prod/upload/img88.JPG)
> A l'interieur de se dossier remplir la function `run()` exemple:

	public function run()
	{
   	   $this->call(UserTableSeeder::class);    // Relier au fichier UserTableSeeder.php
  	   $this->call(EmailTableSeeder::class);   // Relier au fichier EmailTableSeeder.php
	}
	
> Commande pour crée les deux fichier en question:

`php artisan make:seeder UserTableSeeder`

> Exemple de ce qu'il faudrait metre pour la table users:

    public function run()
	{
		DB::table('users')->delete();

		for($i = 0; $i < 10; ++$i)
		{
			DB::table('users')->insert([
				'name' => 'Nom' . $i,
				'email' => 'email' . $i . '@blop.fr',
				'password' => bcrypt('password' . $i),
				'admin' => rand(0, 1)
			]);
		}
	}
	
> Il suffit maintenant d'utiliser la commande d'Artisan remplir nos tables

`php artisan db:seed`

# Les dates
*******

## Crée ces dates avec Carbon
> La classe Carbon, issue d'un package chargé par Laravel, permet la manipulation facile des dates. N'hésitez pas à l'utiliser dès que vous avez des dates à gérer.

> Vous devez ajouter cet ligne dans le fichier dans lequel vous utiliserez des dates `use Carbon\Carbon;`

Exemple:


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


> Url doc: http://carbon.nesbot.com/docs/
*******

# Formulaire
*******
## Personnaliser les messages d'erreur(resources/lang/en/validation.php)
> Acceder au fichier `validation.php` ensuite:

	<?php
	'custom' => [
   	    'attribute-name' => [
			'rule-name' => 'custom-message',
  	 			],
		    ],
> C'est ici qu'on peut ajouter des messages spécifiques exemple :
	
	<?php
	'custom' => [
    		'tags' => [
			'regex' => "tags, separated by commas (no spaces), should have a maximum of 50 characters.",
			],
		],
