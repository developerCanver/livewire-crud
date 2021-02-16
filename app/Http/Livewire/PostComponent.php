<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostComponent extends Component
{
    use WithPagination;
    public $exportable = true;

    protected $paginationTheme = 'bootstrap';
    public $view = 'create';
    public $title,$body,$post_id;
    public $search;

    public $sorBy='id';
    public $ordenar = 'desc';

    protected $queryString = ['search'];
   

    public function render()
    {
        
        $consulta = Post::query()
        ->orderBy($this->sorBy, $this->ordenar)
        ->where('title', 'like', '%'.$this->search.'%')
        ->paginate(15);

        return view('livewire.post-component', [
            //'posts' => Post::where('title', 'like', '%'.$this->search.'%')->paginate(15),
            //'posts' => Post::orderBy('id','desc')->paginate(8),
            //    'posts' => Post::table('id','body','title')->paginate(15)
            //'posts' => Post::where('title', 'like', '%'.$this->search.'%')->get(),
            'posts' => $consulta
        ]);
    }

    //ordenar consulta
    public  function sorBy($atributo){

        if($this->ordenar == 'asc'){
            $this->ordenar = 'desc';
        }else{
                $this->ordenar = 'asc';
            
        }
        return $this->sorBy= $atributo;
    }

 

  //Guardar
    public  function store(){
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

       $post= Post::create([
            'title' => $this->title,
            'body' => $this->body,

        ]);
      
        //mensak¿je de alerta 
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => ''.$this->title.', fue Guardado con Exito! 🌝']);

       $this->edit($post->id);
        
    }



    public  function edit($id){
       $post= Post::find($id);
    
        $this->post_id=$id; //capturo id para enviarlo actualizar registor
        $this->title=$post->title;
        $this->body=$post->body;
     //cmabias la vista por lavariable insertada
     $this->view='edit';

    }


    public  function default(){
       $this->title="";
       $this->body="";

       //cambia la vista a guardar
       $this->view='create';
 
     }


     public  function update(){
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post= Post::find($this->post_id);

        $post->update([
            'title' => $this->title,
            'body' => $this->body,

        ]);

        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => ''.$this->title.', fue actualizado con Exito! 🌝']);
        $this->default();
    }

    
//Eliminar
    public  function destroy($id){
        Post::destroy($id);
        $this->dispatchBrowserEvent('alert',
        ['type' => 'info',  'message' => 'Eliminado con Exito!  🌝']);
    }


}
