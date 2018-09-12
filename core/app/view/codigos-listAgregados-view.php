<?php 
    $operaciones = OperacionData::getAll();
    $piezas = PiezaData::getAll();
    $insumos = InsumoData::getAll();
    $maquinas = MaquinaData::getAll();
?>
<script>
    function getCode(n){
        let code = document.querySelector("#opList").value;
        let codeInput = document.querySelector("#codeInput");
        let nameInput = document.querySelector("#nameInput");
        let idInput = document.querySelector("#idInput");
        let type = document.querySelector("#type");
        // console.log(code);
        params = {
            "n": n,
            "code": code
        }
        $.ajax({
            data: params,
            url: './index.php?action=codigos-getCode',
            dataType: 'json',
            type: 'GET',
            beforeSend: function () {
                console.log('cargando');
            },
            success: function(res){
                // console.log(res);
                codeInput.value = res.codigo;
                nameInput.value = res.nombre;
                idInput.value = res.id;
                type.value = code;

            },
            error: function (err) {
                console.log(err);
            }
        })
    }

      function doSearch(){
                var tableReg = document.getElementById('datos');
                var searchText = document.getElementById('searchTerm').value;
                var cellsOfRow="";
                var found=false;
                var compareWith="";
     
                // Recorremos todas las filas con contenido de la tabla
                for (var i = 1; i < tableReg.rows.length; i++)
                {
                    cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                    found = false;
                    // Recorremos todas las celdas
                    for (var j = 0; j < cellsOfRow.length && !found; j++)
                    {
                        compareWith = cellsOfRow[j].innerHTML;
                        // Buscamos el texto en el contenido de la celda
                        if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
                        {
                            found = true;
                        }
                    }
                    if(found)
                    {
                        tableReg.rows[i].style.display = '';
                    } else {
                        // si no ha encontrado ninguna coincidencia, esconde la fila de la tabla
                        tableReg.rows[i].style.display = 'none';
                    }
                }
            }
</script>

<div class="secc">
    <div class="card card-list">
        <div class="card-header">
            <h4>LISTADO AGREGADOS</h4>
        </div>
        <div class="form-row">
            <!-- <a href="./index.php?view=codigos-agregar"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a> -->
        </div>
        <form class="f">
            <input id="searchTerm" placeholder="BUSCAR..." type="text" onkeyup="doSearch()" />
            <select name="opList" id="opList" onchange="codigo(this);">
                <option value="ope">OPERACIONES</option>
                <option value="pie">PIEZAS</option>
                <option value="ins">INSUMOS</option>
                <option value="maq">MÁQUINAS</option>
            </select>
        </form>
        <div class="JStableOuter">
            <table id='datos' border="2" align="center" class="table-hover">
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th id="nombre">NOMBRE</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>
                <tbody id="ope">
                    <?php foreach($operaciones as $ope){ ?>
                    <tr>
                        <td><?php echo $ope->codigo ?></td>
                        <td><?php echo $ope->nombre ?></td>
                        <td>
                            <a href="#" class="btn btn-warning" onclick="getCode(<?php echo $ope->id ?>);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i></a>
                            <a href="./index.php?action=codigos-delAgg&type=ope&id=<?php echo $ope->id ?>" class="btn btn-danger">X</a>
                        </td>
                    </tr>           
                    <?php } ?>
                </tbody>
                <tbody id="pie">
                    <?php foreach($piezas as $pie){ ?>
                    <tr>
                        <td><?php echo $pie->codigo ?></td>
                        <td><?php echo $pie->nombre ?></td>
                        <td>
                            <a href="#" class="btn btn-warning" onclick="getCode(<?php echo $pie->id ?>);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i></a>
                            <a href="./index.php?action=codigos-delAgg&type=pie&id=<?php echo $pie->id ?>" class="btn btn-danger">X</a>
                        </td>
                    </tr>           
                    <?php } ?>
                </tbody>
                <tbody id="ins">
                    <?php foreach($insumos as $ins){ ?>
                    <tr>
                        <td><?php echo $ins->codigo ?></td>
                        <td><?php echo $ins->nombre ?></td>
                        <td>
                            <a href="#" class="btn btn-warning" onclick="getCode(<?php echo $ins->id ?>);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i></a>
                            <a href="./index.php?action=codigos-delAgg&type=ins&id=<?php echo $ins->id ?>" class="btn btn-danger">X</a>
                        </td>
                    </tr>           
                    <?php } ?>
                </tbody>
                <tbody  id="maq">
                <?php foreach($maquinas as $maq){ ?>
                    <tr>
                        <td><?php echo $maq->codigo ?></td>
                        <td><?php echo $maq->nombre ?></td>
                        <td>
                            <a href="#" class="btn btn-warning" onclick="getCode(<?php echo $maq->id ?>);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i></a>
                            <a href="./index.php?action=codigos-delAgg&type=maq&id=<?php echo $maq->id ?>" class="btn btn-danger">X</a>
                        </td>
                    </tr>           
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./index.php?action=codigos-updateCodigo" method="post">
        <div class="modal-body">
            <label for="codeInput">CÓDIGO</label>
            <input type="text" name="codeInput" id="codeInput">
            <label for="nameInput">NOMBRE</label>
            <input type="text" name="nameInput" id="nameInput">
            <input type="hidden" name="idInput" id="idInput">
            <input type="hidden" name="type" id="type">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            <button type="submit" name="save" class="btn btn-success">GUARDAR CAMBIOS</button>
        </div>  
      </form> 
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
    $('.JStableOuter table').scroll(function(e) { 
    
        $('.JStableOuter thead').css("left", -$(".JStableOuter tbody").scrollLeft()); 
        $('.JStableOuter thead th:nth-child(1)').css("left", $(".JStableOuter table").scrollLeft() -0 ); 
        $('.JStableOuter tbody td:nth-child(1)').css("left", $(".JStableOuter table").scrollLeft()); 

        $('.JStableOuter thead').css("top", -$(".JStableOuter tbody").scrollTop());
        $('.JStableOuter thead tr th').css("top", $(".JStableOuter table").scrollTop()); 

    });
    });
    
function codigo (e) {
    let ope = document.getElementById('ope');
    let pie = document.getElementById('pie');
    let ins = document.getElementById('ins');
    let maq = document.getElementById('maq');
    let nombre = document.getElementById('nombre');

    switch (e.value) {
        case 'ope':
            nombre.innerHTML = 'OPERACIÓN'
            ope.style.display = 'table-row-group';
            pie.style.display = 'none';
            ins.style.display = 'none';
            maq.style.display = 'none';
            break;
        case 'pie':
            nombre.innerHTML = 'PIEZA'
            ope.style.display = 'none';
            pie.style.display = 'table-row-group';
            ins.style.display = 'none';
            maq.style.display = 'none';
            break;
        case 'ins':
            nombre.innerHTML = 'INSUMO'
            ope.style.display = 'none';
            pie.style.display = 'none';
            ins.style.display = 'table-row-group';
            maq.style.display = 'none';
            break;
        case 'maq':
            nombre.innerHTML = 'MÁQUINA'
            ope.style.display = 'none';
            pie.style.display = 'none';
            ins.style.display = 'none';
            maq.style.display = 'table-row-group';
            break;
        default:
            nombre.innerHTML = 'OPERACIÓN'
            e.value = 'ope';
            ope.style.display = 'table-row-group';
            pie.style.display = 'none';
            ins.style.display = 'none';
            maq.style.display = 'none';
            break;
    }
}
codigo('ope');
</script>