#### Inserito Bootstrap
#### Inserito Fortify
#### Inserito Layout di base
- modifica al loyout di base inserendo Header e Navbar nel Layout centrale per capire in che pagina ci trovassimo. Da verificare.
#### Inserito Form Registrazione/Login/Logout funzionante
- inserite le funzionalità di redirect con messaggi
- da verificare il redirect sulla pagina di crea articoli
-
#### Inserito category_id
- questa è la funzione per creare gli articoli nel Form.
```
    public function createArticle(){
        $this->validate();

        $category = Category::find($this->category);

        $article = $category->articles()->create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price
        ]);

        //se articles() qua sotto viene segnato come errore è un intoppo di Intelephense. Funziona comunque.

        Auth::user()->articles()->save($article);
        return redirect()->route('article.create')->with('message', 'Item inserito correttamente');
        $this->reset();
    }
```
Stranamente Intelephense segna questo "article()" come errore.
```
Auth::user()->articles()->save($article);
```

# Inserito un abbozzo di CRUD
- Ora qualsiasi utente può creare qualsiasi tipo di articolo e vederne la pagina di dettaglio. Le rotte funzionano e non ci sono bug palesi. Per implementare la possibilità che SOLO il creatore dell'articolo possa eliminare e/o modificare l'articolo (e tutti gli altri suoi articoli), bisogna mettere un controllo sulla presenza del tasto. Dobbiamo verificare se esiste un modo per difendere anche le rotte specifiche. Dovremmo fare qualche tentativo.


# TODO
- inserire i componenti livewire nei form di login e register.
- cercare di sistemare github

home: Federico
article-create: Giuseppe
categoryShow: Manuel
auth.login/auth.register: Manuel
article.show: Nicola



# Sample di colorazioni ecc.
- Sfondo: "Whitesmoke"
- Secondary: #641c34; vinaccia
- Details: "#f9b234" giallosporco
