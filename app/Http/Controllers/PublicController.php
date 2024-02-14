<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSellerMail;
use App\Mail\ContactSeller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home(){
        $articles = Article::where('is_accepted', true)->take(6)->orderBy('created_at','DESC')->get();
        /* $bestCategories = DB::table('articles')->select('category_id')->groupBy('category_id')->orderByRaw('count(category_id) DESC')->get();
        dd($bestCategories); */
        /* $categories = Category::all();
        $veryBestCategory = collect([]);

        foreach ($categories as $key => $category) {
            if($bestCategories->contains('category_id',$category->id)){

                $veryBestCategory->put($bestCategories[$key],$category) . PHP_EOL;
            }
        }
        dd($veryBestCategory);
        dd($genoveffa); */
        /* $genoveffa = Article::with('category')->groupBy('category_id')->get(); */
        /* $genoveffa = DB::table('categories')->select('categories.name', 'categories.id')->join('articles','categories.id','=','articles.category_id')->groupBy('categories.name')->get(); */

        /* $genoveffa =
        Category::select('categories.name', \DB::raw('COUNT(categories.name) as total'))
        ->join('articles', 'categories.id', '=', 'articles.category_id')
        ->groupBy('categories.name')
        ->orderByDesc('total')
        ->get(); */

        $genoveffa = Category::withCount('articles')
        ->orderByDesc('articles_count')
        ->get(['name', 'articles_count'])->take(6);


        return view('home', compact('articles', 'genoveffa'));
    }

    public function categoryShow(Category $category){
        return view('categoryShow', ['categoria'=>$category]);
    }

    public function index(){
        $articles = Article::where('is_accepted', true)->paginate(6);
        return view('index', compact('articles'));
    }

    public function searchArticles(Request $request){

        $articles =  Article::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('article.index', compact('articles')) ;
    }

    public function setLanguage($lang){

        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function profile(){
        $user = Auth::user();
        $articles = Article::where('user_id', $user->id)->get();
        return view ('profile', compact('user','articles'));
    }

    public function destroyItem(Article $article)
    {
        $article->setAccpted(false);
        return redirect()->route('profile')->with('message', 'Articolo Cancellato');
    }

    public function contact(Article $article)
    {
        return view('contact', compact('article'));
    }

    public function contactSeller(ContactSellerMail $request, Article $article){

        $sellerEmail = $article->user->email;

        $item = $article->name;
        $message = $request->message;
        $email = $request->email;

        $mailToSeller = compact('message', 'email', 'item');

        Mail::to($sellerEmail)->send(new ContactSeller($mailToSeller));

        return redirect()->route('home')->with('message', 'Messaggio inviato con successo');
    }
}
