<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        $article_checked = Article::all()->where('is_accepted', '1');
        $article_not_checked = Article::all()->where('is_accepted', '0');
        return view('revisor.index', compact('article_to_check', 'article_checked', 'article_not_checked'));
    }

    public function acceptArticle(Article $article){
        $article->setAccpted(true);
        return redirect()->back()->with('message', 'Articolo Accettato');
    }

    public function rejectArticle(Article $article)
    {
        $article->setAccpted(false);
        return redirect()->back()->with('message', 'Articolo Rifiutato');
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'Richiesta per diventare Revisore inoltrata');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect ('/')->with('message', 'Utente è diventato revisore');
    }
}
