
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Listado Post</a>
  <div class="form-inline">
    <input class="form-control mr-sm-2" wire:model.debounce.300ms="search" type="search" placeholder="Buscar" aria-label="Search">
    {{-- <input class="form-control mr-sm-2" wire:model="search" type="search" placeholder="Search" aria-label="Search">
  --}}
  <div class="col m-2  form-inline">
    Pagina   &nbsp;
    <select wire:model="paginacion" class="form-control" >
      <option >5</option>
      <option >10</option>
      <option >20</option>
      <option >50</option>
      <option value="10000">All</option>
    </select>
    @if ($contadorSelect > 1)
    <button   onclick="alertDelAll({{$contadorSelect}})" class="btn btn-danger ml-2">
      Eliminar {{$contadorSelect}}, Registros
  </button>
        
    @endif
    
  </div>
</div>
</nav>

<script>
  function alertDelAll(id){
      Swal.fire({
          title: 'Esta seguro de eliminar '+id+', Registros?',
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
                  @this.destroyselect(id);
              }
          })
      }
  </script>
   