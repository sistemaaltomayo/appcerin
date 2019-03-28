  <div class="col-sm-12">
    <div class="form-group">
      <label class="control-label">Razón Social</label>
      <div class="col-sm-12">
        <input  type="text"
                id="razonsocial" name='razonsocial' value="{{$comprobante->nombre}} {{$comprobante->apPaterno}} {{$comprobante->apMaterno}}" placeholder="Razón Social"
                required = ""
                disabled="disabled"
                autocomplete="off" class="form-control input-sm" data-aw="2"/>
      </div>
    </div>
  </div>

  <div class="col-sm-12">
    <div class="form-group">
      <label class="control-label">Dirección</label>
      <div class="col-sm-12">
        <input  type="text"
                id="direccion" name='direccion' value="{{$comprobante->direccion}}" placeholder="Dirección"
                required = ""
                disabled="disabled"
                autocomplete="off" class="form-control input-sm" data-aw="2"/>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group">
      <label class="control-label">Email</label>
      <div class="col-sm-12">
        <input  type="text"
                id="email" name='email' value="{{$comprobante->mail}}" placeholder="Email"
                required = ""
                disabled="disabled"
                autocomplete="off" class="form-control input-sm" data-aw="2"/>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group">
      <label class="control-label">Numero Documento</label>
      <div class="col-sm-12">
        <input  type="text"
                id="numerodocumentoguardar" name='numerodocumentoguardar' value="{{$comprobante->dni}}" placeholder="Numero Documento"
                disabled="disabled"
                autocomplete="off" class="form-control input-sm" data-aw="2"/>
      </div>
    </div>
  </div>

</div>