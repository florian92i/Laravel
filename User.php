<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $redirectAfterLogout = 'post';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /*On déclare ici qu'un utilisateur a plusieurs (hasMany) articles (posts). On aura ainsi une méthode pratique pour récupérer les articles d'un utilisateur.*/
}


/*
 * Ok petit resumer:
 * EN gros ça permet de connecter les tables entre elle donc entre user et post une jointure
 */
