
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Listado Post</a>
  <div class="form-inline">
    <input class="form-control mr-sm-2" wire:model.debounce.300ms="search" type="search" placeholder="Buscar" aria-label="Search">
    {{-- <input class="form-control mr-sm-2" wire:model="search" type="search" placeholder="Search" aria-label="Search">
  --}}
  <div class="col  form-inline">
    Pagina   &nbsp;
    <select wire:model="paginacion" class="form-control" >
      <option >5</option>
      <option >10</option>
      <option >20</option>
      <option >50</option>
      <option value="10000">All</option>
    </select>

    <button  wire:click="destroyselect" class="btn btn-danger">
      Eliminar {{$contadorSelect}}, Registros
  </button>
  </div>
</div>
</nav>

   