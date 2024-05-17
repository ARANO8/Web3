<?php
/*Generate By AlanC , Date: 20210719*/
include_once "../core/ModeloBasePDO.php";
class Seg_ver_moduloModel extends ModeloBasePDO {
public function __construct() { 
parent::__construct(); 
} 
 public function findall() { 
 $sql = " SELECT id,cod_mod,dsc_mod,estado,usu_cre,fh_cre,usu_mod,fh_mod,nro,obs
 FROM seg_ver_modulo ";
 $param = array(); 
 return parent::gselect($sql, $param);
}
 public function findpaginateall($p_filtro, $p_limit, $p_offset) { 
 $sql = " SELECT id,cod_mod,dsc_mod,estado,usu_cre,fh_cre,usu_mod,fh_mod,nro,obs
 FROM seg_ver_modulo
 WHERE upper(concat(IFNULL(id,''),IFNULL(cod_mod,''),IFNULL(dsc_mod,''),IFNULL(estado,''),IFNULL(usu_cre,''),IFNULL(fh_cre,''),IFNULL(usu_mod,''),IFNULL(fh_mod,''),IFNULL(nro,''),IFNULL(obs,''))) like  CONCAT('%',upper(IFNULL(:p_filtro,'' )), '%') 
 limit :p_limit 
 offset :p_offset  ";
 $param = array(); 
      array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
         array_push($param, [':p_limit', $p_limit, PDO::PARAM_INT]);
         array_push($param, [':p_offset', $p_offset, PDO::PARAM_INT]);
  $var =  parent::gselect($sql, $param);
         $sqlCount = "SELECT count(1) as cant FROM seg_ver_modulo 
      WHERE  upper(concat(IFNULL(id,''),IFNULL(cod_mod,''),IFNULL(dsc_mod,''),IFNULL(estado,''),IFNULL(usu_cre,''),IFNULL(fh_cre,''),IFNULL(usu_mod,''),IFNULL(fh_mod,''),IFNULL(nro,''),IFNULL(obs,''))) like CONCAT('%',upper(IFNULL(:p_filtro,'' )), '%') ";
 							        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
		  $var1 =  parent::gselect($sqlCount, $param);
 $var['LENGTH']=$var1 ['DATA'][0]['cant'];    
  return $var;
 }
function findId($p_id) { $sql = " SELECT id,cod_mod,dsc_mod,estado,usu_cre,fh_cre,usu_mod,fh_mod,nro,obs
 FROM seg_ver_modulo
  WHERE id = :p_id";
 $param = array(); 
array_push($param, [':p_id', $p_id, PDO::PARAM_INT]);

 return parent::gselect($sql, $param);
    }
public function insert($p_id,$p_cod_mod,$p_dsc_mod,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod,$p_nro,$p_obs) {
 $sql = " INSERT INTO seg_ver_modulo
 (id,cod_mod,dsc_mod,estado,usu_cre,fh_cre,usu_mod,fh_mod,nro,obs) 
 VALUES (:p_id,:p_cod_mod,:p_dsc_mod,:p_estado,:p_usu_cre,:p_fh_cre,:p_usu_mod,:p_fh_mod,:p_nro,:p_obs) ";
 $param = array(); 
array_push($param, [':p_id', $p_id, PDO::PARAM_INT]);

array_push($param, [':p_cod_mod', $p_cod_mod, PDO::PARAM_STR]);

array_push($param, [':p_dsc_mod', $p_dsc_mod, PDO::PARAM_STR]);

array_push($param, [':p_estado', $p_estado, PDO::PARAM_STR]);

array_push($param, [':p_usu_cre', $p_usu_cre, PDO::PARAM_STR]);

array_push($param, [':p_fh_cre', $p_fh_cre, PDO::PARAM_STR]);

array_push($param, [':p_usu_mod', $p_usu_mod, PDO::PARAM_STR]);

array_push($param, [':p_fh_mod', $p_fh_mod, PDO::PARAM_STR]);

array_push($param, [':p_nro', $p_nro, PDO::PARAM_INT]);

array_push($param, [':p_obs', $p_obs, PDO::PARAM_STR]);

 return parent::ginsert($sql, $param);
    }
public function update($p_id,$p_cod_mod,$p_dsc_mod,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod,$p_nro,$p_obs) {
$sql = "UPDATE seg_ver_modulo SET 
cod_mod = :p_cod_mod,dsc_mod = :p_dsc_mod,estado = :p_estado,usu_cre = :p_usu_cre,fh_cre = :p_fh_cre,usu_mod = :p_usu_mod,fh_mod = :p_fh_mod,nro = :p_nro,obs = :p_obs
 WHERE id = :p_id";
 $param = array(); 
array_push($param, [':p_id', $p_id, PDO::PARAM_INT]);

array_push($param, [':p_cod_mod', $p_cod_mod, PDO::PARAM_STR]);

array_push($param, [':p_dsc_mod', $p_dsc_mod, PDO::PARAM_STR]);

array_push($param, [':p_estado', $p_estado, PDO::PARAM_STR]);

array_push($param, [':p_usu_cre', $p_usu_cre, PDO::PARAM_STR]);

array_push($param, [':p_fh_cre', $p_fh_cre, PDO::PARAM_STR]);

array_push($param, [':p_usu_mod', $p_usu_mod, PDO::PARAM_STR]);

array_push($param, [':p_fh_mod', $p_fh_mod, PDO::PARAM_STR]);

array_push($param, [':p_nro', $p_nro, PDO::PARAM_INT]);

array_push($param, [':p_obs', $p_obs, PDO::PARAM_STR]);


 return parent::gupdate($sql, $param);
    }
function delete($p_id) { $sql = "DELETE FROM seg_ver_modulo WHERE id = :p_id"; $param = array(); 
array_push($param, [':p_id', $p_id, PDO::PARAM_INT]);


 return parent::gdelete($sql, $param);
    }
} 
 ?>
