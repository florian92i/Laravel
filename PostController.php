<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
/*
 * la réception de la requête pour afficher les articles du blog et la réponse adaptée,

la réception de la requête pour le formulaire pour créer un nouvel article et son envoi,

la réception de la soumission du formulaire de création d'un nouvel article (réservé à un utilisateur connecté) et son enregistrement,

la réception de la demande de suppression d'un article (réservé à un administrateur) et sa suppression.
 */
    protected $postRepository;

    protected $nbrPerPage = 4;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth', ['except' => 'index']); // Je veux utiliser que la methode index si c'est un utilisateur d'ou le mot except
        $this->middleware('admin', ['only' => 'destroy']);
// j'ai supprimer les lignes au dessus mais je comprend R car sa change rien donc a revoir
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getPaginate($this->nbrPerPage);
        $links = $posts->render();

        return view('posts.liste', compact('posts', 'links'));
    }

    public function create()
    {
        return view('posts.add');
    }

    public function store(PostRequest $request)//On injecte la requête de formulaire.
        // On récupère les entrées du formulaire pour le titre et le contenu.
        // Pour l'identifiant de l'utilisateur on sait qu'il est forcément connecté alors on récupère cet identifiant avec la requête.
        // Si la validation se passe bien on envoie à la méthode  store du repository :
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]); //array_merge — Fusionne plusieurs tableaux en un seul

        $this->postRepository->store($inputs);

        return redirect(route('post.index'))->withOk("L'article " . $request->input('titre') . " a été créé par ". $request->user()->name);
    }

    public function edit($id)
    {
        $post = $this->postRepository->getById($id);

        return view('posts.edit',  compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $this->postRepository->update($id, $request->all());

        return redirect(route('post.index'))->withOk("L'article " . $request->input('titre') . " a été modifier par ". $request->user()->name);
    }


    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return redirect()->back();
    }

}