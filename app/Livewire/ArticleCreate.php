<?php

namespace App\Livewire;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ArticleCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $category;
    public $price;
    public $temporary_images;
    public $images = [];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'category' => 'required',
        'price' => 'required|numeric|max:99999.99|min:0',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024'
    ];

    public function messages()
    {
        return [
            'name.required' => 'Titolo Richiesto',
            'description.required' => 'Descrizione richiesta',
            'price.required' => 'Specificare il prezzo',
            'images.*.max' => 'File troppo grande',
            'temporary_images.*.max'=> 'File troppo grande'
        ];
    }

    public function updatedTemporaryImages() {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function createArticle(){
        $this->validate();

        $category = Category::find($this->category);

        $article = $category->articles()->create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price

        ]);

        if (count($this->images))
        {
            foreach ($this->images as $image) {
                /* $article->images()->create(['path'=>$image->store('images', 'public')]); */
                $newFileName = "articles/{$article->id}";
                $newImage = $article->images()->create(['path' => $image->store($newFileName, 'public')]);

            RemoveFaces::withChain([
                new ResizeImage($newImage->path, 400, 400),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
        }
        File::deleteDirectory(storage_path('/app/livewire-tmp'));
        //se articles() qua sotto viene segnato come errore è un intoppo di Intelephense. Funziona comunque.
        Auth::user()->articles()->save($article);
        return redirect()->route('article.create')->with('message', 'Item inserito correttamente');
        // $this->reset();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.article-create');
    }
}
