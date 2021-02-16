
<div class="container">

    <table class="table table-striped table-dark">
        <thead>
            <tr>
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
</div>

<script>
function MuestraAlert(id){
   
    
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                //console.log(id); 
                @this.destroy(id);
            }
        })
    }

       </script>