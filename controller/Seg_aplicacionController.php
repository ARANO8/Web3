<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");


session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/appweb/config/global.php");

require_once (ROOT_DIR . "/model/Seg_aplicacionModel.php");


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
    $tseg_aplicacion = new Seg_aplicacionModel();
$p_cod_apl = !empty($input['cod_apl'])?$input['cod_apl']:$_GET['cod_apl'];;

    $var = $tseg_aplicacion->findId($p_cod_apl);
    echo json_encode($var);
}
function  filterPaginateAll($input){
    $nro_record_page = 10;
    $page = !empty($input['page'])?$input['page']:$_GET['page'];
    $filter = !empty($input['filter'])?$input['filter']:$_GET['filter'];
    $p_limit = 10;
    $p_offset=0;
    $p_offset=abs(($page-1) * $nro_record_page);
    $tseg_aplicacion = new Seg_aplicacionModel();
    $var = $tseg_aplicacion->findpaginateall($filter, $p_limit, $p_offset);
    echo json_encode($var);
}

function  filterAll($input){
    $tseg_aplicacion = new Seg_aplicacionModel();
    $var = $tseg_aplicacion->findall();
    echo json_encode($var);
}
function insert($input){
$p_cod_apl = !empty($input['cod_apl'])?$input['cod_apl']:$_POST['cod_apl'];;
$p_cod_apl_sup = !empty($input['cod_apl_sup'])?$input['cod_apl_sup']:$_POST['cod_apl_sup'];;
$p_cod_mod = !empty($input['cod_mod'])?$input['cod_mod']:$_POST['cod_mod'];;
$p_dsc_apl = !empty($input['dsc_apl'])?$input['dsc_apl']:$_POST['dsc_apl'];;
$p_obs_apl = !empty($input['obs_apl'])?$input['obs_apl']:$_POST['obs_apl'];;
$p_tpo_apl = !empty($input['tpo_apl'])?$input['tpo_apl']:$_POST['tpo_apl'];;
$p_menu = !empty($input['menu'])?$input['menu']:$_POST['menu'];;
$p_ayuda = !empty($input['ayuda'])?$input['ayuda']:$_POST['ayuda'];;
$p_url = !empty($input['url'])?$input['url']:$_POST['url'];;
$p_target_tpo = !empty($input['target_tpo'])?$input['target_tpo']:$_POST['target_tpo'];;
$p_hr_ini = !empty($input['hr_ini'])?$input['hr_ini']:$_POST['hr_ini'];;
$p_ht_fin = !empty($input['ht_fin'])?$input['ht_fin']:$_POST['ht_fin'];;
$p_sw_vie = !empty($input['sw_vie'])?$input['sw_vie']:$_POST['sw_vie'];;
$p_sw_sab = !empty($input['sw_sab'])?$input['sw_sab']:$_POST['sw_sab'];;
$p_sw_dom = !empty($input['sw_dom'])?$input['sw_dom']:$_POST['sw_dom'];;
$p_sw_fer = !empty($input['sw_fer'])?$input['sw_fer']:$_POST['sw_fer'];;
$p_estado = !empty($input['estado'])?$input['estado']:$_POST['estado'];;
$p_usu_cre = !empty($input['usu_cre'])?$input['usu_cre']:$_POST['usu_cre'];;
$p_fh_cre = !empty($input['fh_cre'])?$input['fh_cre']:$_POST['fh_cre'];;
$p_usu_mod = !empty($input['usu_mod'])?$input['usu_mod']:$_POST['usu_mod'];;
$p_fh_mod = !empty($input['fh_mod'])?$input['fh_mod']:$_POST['fh_mod'];;

    $tseg_aplicacion = new Seg_aplicacionModel();
	$var = $tseg_aplicacion->insert($p_cod_apl,$p_cod_apl_sup,$p_cod_mod,$p_dsc_apl,$p_obs_apl,$p_tpo_apl,$p_menu,$p_ayuda,$p_url,$p_target_tpo,$p_hr_ini,$p_ht_fin,$p_sw_vie,$p_sw_sab,$p_sw_dom,$p_sw_fer,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod);
    
    echo json_encode($var);
}
 function update($input){
$p_cod_apl = !empty($input['cod_apl'])?$input['cod_apl']:$_POST['cod_apl'];;
$p_cod_apl_sup = !empty($input['cod_apl_sup'])?$input['cod_apl_sup']:$_POST['cod_apl_sup'];;
$p_cod_mod = !empty($input['cod_mod'])?$input['cod_mod']:$_POST['cod_mod'];;
$p_dsc_apl = !empty($input['dsc_apl'])?$input['dsc_apl']:$_POST['dsc_apl'];;
$p_obs_apl = !empty($input['obs_apl'])?$input['obs_apl']:$_POST['obs_apl'];;
$p_tpo_apl = !empty($input['tpo_apl'])?$input['tpo_apl']:$_POST['tpo_apl'];;
$p_menu = !empty($input['menu'])?$input['menu']:$_POST['menu'];;
$p_ayuda = !empty($input['ayuda'])?$input['ayuda']:$_POST['ayuda'];;
$p_url = !empty($input['url'])?$input['url']:$_POST['url'];;
$p_target_tpo = !empty($input['target_tpo'])?$input['target_tpo']:$_POST['target_tpo'];;
$p_hr_ini = !empty($input['hr_ini'])?$input['hr_ini']:$_POST['hr_ini'];;
$p_ht_fin = !empty($input['ht_fin'])?$input['ht_fin']:$_POST['ht_fin'];;
$p_sw_vie = !empty($input['sw_vie'])?$input['sw_vie']:$_POST['sw_vie'];;
$p_sw_sab = !empty($input['sw_sab'])?$input['sw_sab']:$_POST['sw_sab'];;
$p_sw_dom = !empty($input['sw_dom'])?$input['sw_dom']:$_POST['sw_dom'];;
$p_sw_fer = !empty($input['sw_fer'])?$input['sw_fer']:$_POST['sw_fer'];;
$p_estado = !empty($input['estado'])?$input['estado']:$_POST['estado'];;
$p_usu_cre = !empty($input['usu_cre'])?$input['usu_cre']:$_POST['usu_cre'];;
$p_fh_cre = !empty($input['fh_cre'])?$input['fh_cre']:$_POST['fh_cre'];;
$p_usu_mod = !empty($input['usu_mod'])?$input['usu_mod']:$_POST['usu_mod'];;
$p_fh_mod = !empty($input['fh_mod'])?$input['fh_mod']:$_POST['fh_mod'];;

    $tseg_aplicacion = new Seg_aplicacionModel();
	$var = $tseg_aplicacion->update($p_cod_apl,$p_cod_apl_sup,$p_cod_mod,$p_dsc_apl,$p_obs_apl,$p_tpo_apl,$p_menu,$p_ayuda,$p_url,$p_target_tpo,$p_hr_ini,$p_ht_fin,$p_sw_vie,$p_sw_sab,$p_sw_dom,$p_sw_fer,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod);
    
    echo json_encode($var);
}
 function delete($input){
$p_cod_apl = !empty($input['cod_apl'])?$input['cod_apl']:$_POST['cod_apl'];;

    $tseg_aplicacion = new Seg_aplicacionModel();
	$var = $tseg_aplicacion->delete($p_cod_apl);
    
    echo json_encode($var);
} 
 ?>
