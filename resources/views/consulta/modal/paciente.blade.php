
<div id="mod-paciente" tabindex="-1" role="dialog" style="" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
      </div>
      <div class="modal-body">
        <fieldset class="scheduler-border">
          <legend class="scheduler-border">Buscar paciente</legend>
            <div class="control-group">

                <div class="form-group">
                  <div class="col-sm-6">
                    <div class="be-radio inline">
                      <input type="radio"  checked="checked" name="tipobuscar" id="A" value='A'>
                      <label for="A">Apellido</label>
                    </div>
                    <div class="be-radio inline">
                      <input type="radio" name="tipobuscar" id="D" value='D'>
                      <label for="D">DNI</label>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-12 input-group">

                    <input  type="text"
                            id="dniapellido" name='dniapellido' value="" placeholder="Apellido ó DNI"
                            autocomplete="off" class="form-control input-sm" data-aw="3"/>

                      <span class="input-group-btn">
                       <button id='buscarpacientepor' 
                       type="button" style='height: 37px;' 
                       class="btn btn-primary "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Buscar</font></font></button></span>


                  </div>
                </div>


            </div>
        </fieldset>


        <div class="panel-body ajax-lista-paciente">
          <table class="table table-striped table-borderless">
            <thead>
              <tr>
                <th>DNI</th>
                <th>Paciente</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>


      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>