@if ($sorBy !== $atributo)
    <i class="text-muted fas fa-sort"></i>
@elseif ($ordenar == 'asc')
<i  style="color:rgba(38, 38, 236,0.774)" class="text-muted fas fa-sort-up"></i>
@else
<i  style="color:rgba(38, 38, 236,0.774)" class="text-muted fas fa-sort-down"></i>
@endif