<h2>{{empleadoTitle}}</h2>
<a href="index.php?page=empleados">Listado de empleados</a>
<form action="index.php?page=empleado&acc={{empleadoMode}}" method="post">
  <div>
    <label class="col4" for="IdEmp">Código</label>
    <input class="col8" type="text" disabled="disabled" id="IdEmp" name="IdEmp" value="{{IdEmp}}"/>
    <input type="hidden" id="IdEmp" name="IdEmp" value="{{IdEmp}}"/>
  </div>
  <div>
    <label class="col4" for="NomEmp">Nombre</label>
    <input class="col8" type="text" id="NomEmp" name="NomEmp" value="{{NomEmp}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="ApEmp">Apellido</label>
    <input class="col8" type="text" id="ApEmp" name="ApEmp" value="{{ApEmp}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="SexEmp">Sexo</label>
    <select class="col8" id="SexEmp" name="SexEmp" {{disabled}}>
      <option value="M" {{actSelected}}>Masculino</option>
      <option value="F" {{inaSelected}}>Femenino</option>
    </select>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{empleadoMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
