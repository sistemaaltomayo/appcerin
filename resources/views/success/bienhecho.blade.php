@if ($bien)
	<div class="panel-body">
	  <div role="alert" class="alertaw alert alert-success alert-dismissible">
	    <button type="button" data-dismiss="alert" aria-label="Close" class="close">
	    	<span aria-hidden="true" class="mdi mdi-close"></span>
	    </button>
	    <span class="icon mdi mdi-check"></span>
	    <strong>¡Bien Hecho!</strong> {{$bien}}
	  </div>
	</div>
@endif