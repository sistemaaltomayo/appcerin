@extends('template')
@section('style')

    <link rel="stylesheet" type="text/css" href="{{ asset('public/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/lib/select2/css/select2.min.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/lib/bootstrap-slider/css/bootstrap-slider.css') }} "/>
    <style> 
    .form-horizontal .control-label { padding-left: 16px; font-weight: bold;}
    .form-horizontal .form-group {padding: 0px 0 !important;}
    </style>    

@stop
@section('section')

<div class="be-content ajaxpersonal">
  <div class="main-content container-fluid">

    <!--Basic forms-->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
          <div class="panel-heading panel-heading-divider">Consulta<span class="panel-subtitle">Crear una nueva Consulta</span></div>
          <div class="panel-body">
            <form method="POST" action="{{ url('/agregar-consulta/'.$idopcion) }}" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                  {{ csrf_field() }}
                  <div class='formconsulta'>
                    @include('consulta.form.consulta')
                  </div>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>  



@stop

@section('script')



    <script src="{{ asset('public/lib/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/jquery.nestable/jquery.nestable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/moment.js/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>        
    <script src="{{ asset('public/lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/bootstrap-slider/js/bootstrap-slider.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/app-form-elements.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/parsley/parsley.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.formElements();
        $('form').parsley();
      });
    </script> 

    <script src="{{ asset('public/js/consulta/consulta.js?v='.$version) }}" type="text/javascript"></script>

@stop