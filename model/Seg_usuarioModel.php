<?php
include_once "../core/ModeloBasePDO.php";
class Seg_usuarioModel extends ModeloBasePDO {
public function __construct() { 
parent::__construct(); 
} 
 public function findall() { 
 $sql = " SELECT cod_usu,psw,rrhh_cod,prf_cod,email,sw_session,token,ip,login,estado,usu_cre,fh_cre,usu_mod,fh_mod
 FROM seg_usuario ";
 $param = array(); 
 return parent::gselect($sql, $param);
}
 public function findpaginateall($p_filtro, $p_limit, $p_offset) { 
 $sql = " SELECT cod_usu,psw,rrhh_cod,prf_cod,email,sw_session,token,ip,login,estado,usu_cre,fh_cre,usu_mod,fh_mod
 FROM seg_usuario
 WHERE upper(concat(IFNULL(cod_usu,''),IFNULL(psw,''),IFNULL(rrhh_cod,''),IFNULL(prf_cod,''),IFNULL(email,''),IFNULL(sw_session,''),IFNULL(token,''),IFNULL(ip,''),IFNULL(login,''),IFNULL(estado,''),IFNULL(usu_cre,''),IFNULL(fh_cre,''),IFNULL(usu_mod,''),IFNULL(fh_mod,''))) like  CONCAT('%',upper(IFNULL(:p_filtro,'' )), '%') 
 limit :p_limit 
 offset :p_offset  ";
 $param = array(); 
      array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
         array_push($param, [':p_limit', $p_limit, PDO::PARAM_INT]);
         array_push($param, [':p_offset', $p_offset, PDO::PARAM_INT]);
  $var =  parent::gselect($sql, $param);
         $sqlCount = "SELECT count(1) as cant FROM seg_usuario 
      WHERE  upper(concat(IFNULL(cod_usu,''),IFNULL(psw,''),IFNULL(rrhh_cod,''),IFNULL(prf_cod,''),IFNULL(email,''),IFNULL(sw_session,''),IFNULL(token,''),IFNULL(ip,''),IFNULL(login,''),IFNULL(estado,''),IFNULL(usu_cre,''),IFNULL(fh_cre,''),IFNULL(usu_mod,''),IFNULL(fh_mod,''))) like CONCAT('%',upper(IFNULL(:p_filtro,'' )), '%') ";
 							        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
		  $var1 =  parent::gselect($sqlCount, $param);
 $var['LENGTH']=$var1 ['DATA'][0]['cant'];    
  return $var;
 }
function findId($p_cod_usu) { $sql = " SELECT cod_usu,psw,rrhh_cod,prf_cod,email,sw_session,token,ip,login,estado,usu_cre,fh_cre,usu_mod,fh_mod
 FROM seg_usuario
  WHERE cod_usu = :p_cod_usu";
 $param = array(); 
array_push($param, [':p_cod_usu', $p_cod_usu, PDO::PARAM_STR]);

 return parent::gselect($sql, $param);
    }
public function insert($p_cod_usu,$p_psw,$p_rrhh_cod,$p_prf_cod,$p_email,$p_sw_session,$p_token,$p_ip,$p_login,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod) {
 $sql = " INSERT INTO seg_usuario
 (cod_usu,psw,rrhh_cod,prf_cod,email,sw_session,token,ip,login,estado,usu_cre,fh_cre,usu_mod,fh_mod) 
 VALUES (:p_cod_usu,:p_psw,:p_rrhh_cod,:p_prf_cod,:p_email,:p_sw_session,:p_token,:p_ip,:p_login,:p_estado,:p_usu_cre,:p_fh_cre,:p_usu_mod,:p_fh_mod) ";
 $param = array(); 
array_push($param, [':p_cod_usu', $p_cod_usu, PDO::PARAM_STR]);

array_push($param, [':p_psw', $p_psw, PDO::PARAM_STR]);

array_push($param, [':p_rrhh_cod', $p_rrhh_cod, PDO::PARAM_STR]);

array_push($param, [':p_prf_cod', $p_prf_cod, PDO::PARAM_STR]);

array_push($param, [':p_email', $p_email, PDO::PARAM_STR]);

array_push($param, [':p_sw_session', $p_sw_session, PDO::PARAM_INT]);

array_push($param, [':p_token', $p_token, PDO::PARAM_STR]);

array_push($param, [':p_ip', $p_ip, PDO::PARAM_STR]);

array_push($param, [':p_login', $p_login, PDO::PARAM_STR]);

array_push($param, [':p_estado', $p_estado, PDO::PARAM_STR]);

array_push($param, [':p_usu_cre', $p_usu_cre, PDO::PARAM_STR]);

array_push($param, [':p_fh_cre', $p_fh_cre, PDO::PARAM_STR]);

array_push($param, [':p_usu_mod', $p_usu_mod, PDO::PARAM_STR]);

array_push($param, [':p_fh_mod', $p_fh_mod, PDO::PARAM_STR]);

 return parent::ginsert($sql, $param);
    }
public function update($p_cod_usu,$p_psw,$p_rrhh_cod,$p_prf_cod,$p_email,$p_sw_session,$p_token,$p_ip,$p_login,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod) {
$sql = "UPDATE seg_usuario SET 
psw = :p_psw,rrhh_cod = :p_rrhh_cod,prf_cod = :p_prf_cod,email = :p_email,sw_session = :p_sw_session,token = :p_token,ip = :p_ip,login = :p_login,estado = :p_estado,usu_cre = :p_usu_cre,fh_cre = :p_fh_cre,usu_mod = :p_usu_mod,fh_mod = :p_fh_mod
 WHERE cod_usu = :p_cod_usu";
 $param = array(); 
array_push($param, [':p_cod_usu', $p_cod_usu, PDO::PARAM_STR]);

array_push($param, [':p_psw', $p_psw, PDO::PARAM_STR]);

array_push($param, [':p_rrhh_cod', $p_rrhh_cod, PDO::PARAM_STR]);

array_push($param, [':p_prf_cod', $p_prf_cod, PDO::PARAM_STR]);

array_push($param, [':p_email', $p_email, PDO::PARAM_STR]);

array_push($param, [':p_sw_session', $p_sw_session, PDO::PARAM_INT]);

array_push($param, [':p_token', $p_token, PDO::PARAM_STR]);

array_push($param, [':p_ip', $p_ip, PDO::PARAM_STR]);

array_push($param, [':p_login', $p_login, PDO::PARAM_STR]);

array_push($param, [':p_estado', $p_estado, PDO::PARAM_STR]);

array_push($param, [':p_usu_cre', $p_usu_cre, PDO::PARAM_STR]);

array_push($param, [':p_fh_cre', $p_fh_cre, PDO::PARAM_STR]);

array_push($param, [':p_usu_mod', $p_usu_mod, PDO::PARAM_STR]);

array_push($param, [':p_fh_mod', $p_fh_mod, PDO::PARAM_STR]);


 return parent::gupdate($sql, $param);
    }
function delete($p_cod_usu) { $sql = "DELETE FROM seg_usuario WHERE cod_usu = :p_cod_usu"; $param = array(); 
array_push($param, [':p_cod_usu', $p_cod_usu, PDO::PARAM_STR]);


 return parent::gdelete($sql, $param);
    }

   public function verificarlogin($p_email, $p_psw){
      $sql = "SELECT cod_usu,rrhh_cod,prf_cod,email,sw_session,token,ip,login,estado
      FROM seg_usuario
      WHERE estado = 'ACTIVO' AND 
      email = :p_email AND 
      psw = :p_psw";
      $param = array();
      array_push($param, [':p_email', $p_email, PDO::PARAM_STR]);
      array_push($param, [':p_psw', $p_psw, PDO::PARAM_STR]);
      return parent::gselect($sql, $param);
   }
   public function register($p_cod_usu, $p_psw, $p_email, $p_estado, $p_usu_cre)
   {
      $sql = " INSERT INTO seg_usuario
   
         (cod_usu,psw,email,estado,usu_cre,fh_cre) 
   VALUES (:p_cod_usu,:p_psw,:p_email,:p_estado,:p_usu_cre,now()) ";
      $param = array();
      array_push($param, [':p_cod_usu', $p_cod_usu, PDO::PARAM_STR]);
      array_push($param, [':p_psw', $p_psw, PDO::PARAM_STR]);
      array_push($param, [':p_email', $p_email, PDO::PARAM_STR]);
      array_push($param, [':p_estado', $p_estado, PDO::PARAM_STR]);
      array_push($param, [':p_usu_cre', $p_usu_cre, PDO::PARAM_STR]);
      return parent::ginsert($sql, $param);
   }
   
} 
 ?>
