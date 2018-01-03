<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    private function save(Post $post, Array $inputs) // Ce qui permet l'insertion en base de donner
    {
        $post->titre = $inputs['titre'];
        $post->contenu = $inputs['contenu'];
        $post->save();
    }


    public function getPaginate($n)
    {
        return $this->post->with('user')
            ->orderBy('posts.created_at', 'desc')
            ->paginate($n);
        /*
         * On veut les articles avec (with) l'utilisateur (user),
         * dans l'ordre des dates de création (posts.created_at)
         * descendant (desc) avec une pagination de n articles ($n).
         */
    }

    public function store($inputs)
    {
        $this->post->create($inputs);
    }


    public function getById($id)
    {
        return $this->post->findOrFail($id); //La méthode  findOrFail essaie de récupérer dans la table l'enregistrement dont on transmet l'id
    }


    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }


    public function destroy($id)
    {
        $this->post->findOrFail($id)->delete();
    }

}