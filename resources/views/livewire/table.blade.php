<h1>Listado de tabla</h1>
<div class="container">

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Contenido</th>
                <th colspan="2">&nbsp;</th>
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
                <td><button wire:click="destroy({{$post->id}})" class="btn btn-danger">
                        Eliminar
                    </button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    {{ $posts->links() }}
</div>

