<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");


session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/appweb/config/global.php");

require_once(ROOT_DIR . "/model/Seg_usuarioModel.php");


$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info, '/'));
} catch (Exception $e) {
    echo $e->getMessage();
}
switch ($method) {

    case 'POST':
        $p_ope = !empty($input['ope']) ? $input['ope'] : $_POST['ope'];
        if ($p_ope == 'login') {
            login($input);
        } else if ($p_ope == 'register') {
            register($input);
        }
        break;
}

function  login($input)
{
    $p_email = !empty($input['email']) ? $input['email'] : $_POST['email'];
    $p_password = !empty($input['psw']) ? $input['psw'] : $_POST['psw'];
    $p_password = hash('sha512', md5($p_password));
    $su   = new Seg_usuarioModel();
    $var = $su->verificarlogin($p_email, $p_password);
    if (count($var['DATA']) > 0) {
        $_SESSION['login'] = $var['DATA'][0];
        echo json_encode($var);
        exit();
    } else {
        $array = array();
        $array['ESTADO'] = false;
        $array['ERROR'] = "Usuario o Contraseña no valida, verifique sus datos, demasiados intentos bloqueara al usuario el acceso al sistema.";
        echo json_encode($var);
        exit();
    }
}
function register($input)
{
    $p_cod_usu = !empty($input['cod_usu']) ? $input['cod_usu'] : $_POST['cod_usu'];;
    $p_psw = !empty($input['psw']) ? $input['psw'] : $_POST['psw'];;
    $p_psw = hash('sha512', md5($p_psw));
    
    $p_email = !empty($input['email']) ? $input['email'] : $_POST['email'];;
    $p_estado = 'ACTIVO';
    $p_usu_cre = 'ONLINE';
    
    
    $tseg_usuario = new Seg_usuarioModel();
    $var = $tseg_usuario->register($p_cod_usu, $p_psw, $p_email, $p_estado, $p_email, $p_usu_cre);

    echo json_encode($var);
}
