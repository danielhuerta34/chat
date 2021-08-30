@extends('layouts.master')

@section('content')
<div class="content mt-4">
	<div class="container-fluid ">
		<div class="data">
            <?=$render;?>
        </div>
	</div>
</div>

<script>
    $(document).on("click", ".pdocrud-filter-option-remove, .pdocrud-filter-option", function(event,obj,data){
      $('.pdocrud-filter').val('');
    });

    $(document).on("keyup", "#pdocrud_search_box", function(event){
        let busqueda = $("#pdocrud_search_box").val();

      if(busqueda == ""){
        $('#pdocrud_search_btn').click();
      }

    });

    $(document).on("click", ".ui-menu-item", function(event){
      $('#pdocrud_search_btn').click();
    });
</script>
@endsection