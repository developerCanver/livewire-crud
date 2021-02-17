
<div class="container">

    @if ($posts->isNotEmpty())
        
    

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th colspan="1">&nbsp; </th>
                <th wire:click="sorBy('id')" style="cursor: pointer;" scope="col">
                    ID
                    @include('partials._sort-icon',['atributo'=>'id'])
                   
                </th>
                <th wire:click="sorBy('title')" style="cursor: pointer;" scope="col">
                    Titulo
                    @include('partials._sort-icon',['atributo'=>'title'])</th>
                <th wire:click="sorBy('body')" style="cursor: pointer;" scope="col">
                    Contenido
                    @include('partials._sort-icon',['atributo'=>'body'])
                </th>
                <th colspan="2">&nbsp; </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)
            <tr>
                <td class="border px-4 py-2">
                    <input type="checkbox" wire:model="eliminarselect" onclick="myFunction()" id="myCheck" value="{{$post->id}}">
                </td>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                
                <td><button class="btn btn-primary" wire:click="edit({{$post->id}})">
                        editar
                    </button>
                </td>
                <td>
                    {{-- <form wire:submit.prevent="MuestraAlert" class="formulario"> --}}
                        <button  onclick="MuestraAlert({{$post->id}})" class="btn btn-danger">
                            Eliminar
                        </button>

                    </form>

                   
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <p>
        Resultado {{$posts->firstItem()}} - {{$posts->lastItem()}} / {{$posts->total()}}
    </p>

   {{ $posts->links() }} 

   @else
   <div class="container m-5">

   
   <div class="alert alert-primary" role="alert">
    <p class="text-center m-3"> Ups! no hay registros 😥</p>
  </div>
</div>

        
    @endif
</div>

<script>
function MuestraAlert(id){
    Swal.fire({
        title: 'Esta seguro de eliminar ID '+id+'?',
        text: "Una vez borrado, no se podrá deshacer los cambios!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.isConfirmed) {
                //console.log(id); 
                @this.destroy(id);
            }
        })
    }

       </script>

<script>

    function myFunction() {
        var check="0";

    var checkBox = document.getElementById("myCheck");
        if (checkBox.checked == true){
            @this.contSelect();
            console.log("si");
            } else {
                @this.desSelect();
                console.log("no");
            }
    }
</script>