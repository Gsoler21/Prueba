<h2>Listado de empleados</h2>
<a href="index.php?page=employe&acc=ins">Agregar Nueva empleados</a>

<table style="margin:2em; width:90%">
    <tr>
        <th>
            codigo
        </th>
        <th>
            Nombre
        </th>
        <th>
            Apellido
        </th>
        <th>
            Sexo
        </th>
        <th>

        </th>
    </tr>
    {{foreach empleados}}
    <tr>
        <td>
            {{IdEmp}}
        </td>
        <td>
          {{NomEmp}}
        </td>
        <td>
            {{ApEmp}}
        </td>
        <td>
            {{SexEmp}}
        </td>
        <td>
            <a href="index.php?page=employe&acc=upd&IdEmp={{IdEmp}}">Actalizar</a> |
            <a href="index.php?page=employe&acc=dlt&IdEmp={{IdEmp}}">Eliminar</a>

        </td>
    </tr>
    {{endfor empleados}}
</table>
