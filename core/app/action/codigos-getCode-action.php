<?php
$id = $_REQUEST['n'];
$typeCode = $_REQUEST['code'];
switch ($typeCode) {
    case 'ope':
        $result = OperacionData::getId($id);
        break;

    case 'pie':
        $result = PiezaData::getId($id);
        break;

    case 'ins':
        $result = InsumoData::getId($id);
        break;

    case 'maq':
        $result = MaquinaData::getId($id);
        break;
}



echo json_encode($result); 


?>