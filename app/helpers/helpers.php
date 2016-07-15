<?php 

function menu()

{

$foros =\App\Foro::all();

return $foros;


}


