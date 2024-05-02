<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");


session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/appweb/config/global.php");

require_once (ROOT_DIR . "/model/Seg_ver_moduloModel.php");


$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);

try{
$Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info,'/'));

}catch (Exception $e)
{
echo $e->getMessage();
}
switch ($method) {
    case 'GET'://consulta
    
  $p_ope = !empty($input['ope'])?$input['ope']:$_GET['ope'];
    if (!empty($p_ope)) {
    
    	if ($p_ope == 'filterId'  ) {
            filterId($input);
        }elseif ($p_ope == 'filterSearch' ){
            filterPaginateAll($input);
        }elseif ($p_ope ==  'filterall'){
            filterAll($input);
        }
    }
        
        break;
    case 'POST'://inserta
        insert($input);
        break;
    case 'PUT'://actualiza
        update($input);
        break;
    case 'DELETE'://elimina
    		$input=$_GET;
        delete($input);
        break;
    default://metodo NO soportado
        echo 'METODO NO SOPORTADO';
        break;
}
 function  filterId($input ){
    $tseg_ver_modulo = new Seg_ver_moduloModel();
$p_id = !empty($input['id'])?$input['id']:$_GET['id'];;

    $var = $tseg_ver_modulo->findId($p_id);
    echo json_encode($var);
}
function  filterPaginateAll($input){
    $nro_record_page = 10;
    $page = !empty($input['page'])?$input['page']:$_GET['page'];
    $filter = !empty($input['filter'])?$input['filter']:$_GET['filter'];
    $p_limit = 10;
    $p_offset=0;
    $p_offset=abs(($page-1) * $nro_record_page);
    $tseg_ver_modulo = new Seg_ver_moduloModel();
    $var = $tseg_ver_modulo->findpaginateall($filter, $p_limit, $p_offset);
    echo json_encode($var);
}

function  filterAll($input){
    $tseg_ver_modulo = new Seg_ver_moduloModel();
    $var = $tseg_ver_modulo->findall();
    echo json_encode($var);
}
function insert($input){
$p_id = !empty($input['id'])?$input['id']:$_POST['id'];;
$p_cod_mod = !empty($input['cod_mod'])?$input['cod_mod']:$_POST['cod_mod'];;
$p_dsc_mod = !empty($input['dsc_mod'])?$input['dsc_mod']:$_POST['dsc_mod'];;
$p_estado = !empty($input['estado'])?$input['estado']:$_POST['estado'];;
$p_usu_cre = !empty($input['usu_cre'])?$input['usu_cre']:$_POST['usu_cre'];;
$p_fh_cre = !empty($input['fh_cre'])?$input['fh_cre']:$_POST['fh_cre'];;
$p_usu_mod = !empty($input['usu_mod'])?$input['usu_mod']:$_POST['usu_mod'];;
$p_fh_mod = !empty($input['fh_mod'])?$input['fh_mod']:$_POST['fh_mod'];;
$p_nro = !empty($input['nro'])?$input['nro']:$_POST['nro'];;
$p_obs = !empty($input['obs'])?$input['obs']:$_POST['obs'];;

    $tseg_ver_modulo = new Seg_ver_moduloModel();
	$var = $tseg_ver_modulo->insert($p_id,$p_cod_mod,$p_dsc_mod,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod,$p_nro,$p_obs);
    
    echo json_encode($var);
}
 function update($input){
$p_id = !empty($input['id'])?$input['id']:$_POST['id'];;
$p_cod_mod = !empty($input['cod_mod'])?$input['cod_mod']:$_POST['cod_mod'];;
$p_dsc_mod = !empty($input['dsc_mod'])?$input['dsc_mod']:$_POST['dsc_mod'];;
$p_estado = !empty($input['estado'])?$input['estado']:$_POST['estado'];;
$p_usu_cre = !empty($input['usu_cre'])?$input['usu_cre']:$_POST['usu_cre'];;
$p_fh_cre = !empty($input['fh_cre'])?$input['fh_cre']:$_POST['fh_cre'];;
$p_usu_mod = !empty($input['usu_mod'])?$input['usu_mod']:$_POST['usu_mod'];;
$p_fh_mod = !empty($input['fh_mod'])?$input['fh_mod']:$_POST['fh_mod'];;
$p_nro = !empty($input['nro'])?$input['nro']:$_POST['nro'];;
$p_obs = !empty($input['obs'])?$input['obs']:$_POST['obs'];;

    $tseg_ver_modulo = new Seg_ver_moduloModel();
	$var = $tseg_ver_modulo->update($p_id,$p_cod_mod,$p_dsc_mod,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod,$p_nro,$p_obs);
    
    echo json_encode($var);
}
 function delete($input){
$p_id = !empty($input['id'])?$input['id']:$_POST['id'];;

    $tseg_ver_modulo = new Seg_ver_moduloModel();
	$var = $tseg_ver_modulo->delete($p_id);
    
    echo json_encode($var);
} 
 ?>
