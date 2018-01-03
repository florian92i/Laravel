<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['titre','contenu','user_id'];
    protected $redirectAfterLogout = 'post';

    public function user()
    {
        return $this->belongsTo('App\User'); //Ici on a la méthode  user (au singulier) qui permet de trouver l'utilisateur auquel appartient (belongsTo) l'article.
        // C'est donc la réciproque de la méthode précédente.
        //https://laravel.com/docs/5.5/eloquent-relationships#defining-relationships pour comprendre
    }

}
/*
 *  EN gros ça permet de connecter les tables entre elle donc entre user et post une jointure
 */