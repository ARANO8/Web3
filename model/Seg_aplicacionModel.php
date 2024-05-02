<?php
/*Generate By AlanC , Date: 20210719*/
include_once "../core/ModeloBasePDO.php";
class Seg_aplicacionModel extends ModeloBasePDO {
public function __construct() { 
parent::__construct(); 
} 
 public function findall() { 
 $sql = " SELECT cod_apl,cod_apl_sup,cod_mod,dsc_apl,obs_apl,tpo_apl,menu,ayuda,url,target_tpo,hr_ini,ht_fin,sw_vie,sw_sab,sw_dom,sw_fer,estado,usu_cre,fh_cre,usu_mod,fh_mod
 FROM seg_aplicacion ";
 $param = array(); 
 return parent::gselect($sql, $param);
}
 public function findpaginateall($p_filtro, $p_limit, $p_offset) { 
 $sql = " SELECT cod_apl,cod_apl_sup,cod_mod,dsc_apl,obs_apl,tpo_apl,menu,ayuda,url,target_tpo,hr_ini,ht_fin,sw_vie,sw_sab,sw_dom,sw_fer,estado,usu_cre,fh_cre,usu_mod,fh_mod
 FROM seg_aplicacion
 WHERE upper(concat(IFNULL(cod_apl,''),IFNULL(cod_apl_sup,''),IFNULL(cod_mod,''),IFNULL(dsc_apl,''),IFNULL(obs_apl,''),IFNULL(tpo_apl,''),IFNULL(menu,''),IFNULL(ayuda,''),IFNULL(url,''),IFNULL(target_tpo,''),IFNULL(hr_ini,''),IFNULL(ht_fin,''),IFNULL(sw_vie,''),IFNULL(sw_sab,''),IFNULL(sw_dom,''),IFNULL(sw_fer,''),IFNULL(estado,''),IFNULL(usu_cre,''),IFNULL(fh_cre,''),IFNULL(usu_mod,''),IFNULL(fh_mod,''))) like  CONCAT('%',upper(IFNULL(:p_filtro,'' )), '%') 
 limit :p_limit 
 offset :p_offset  ";
 $param = array(); 
      array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
         array_push($param, [':p_limit', $p_limit, PDO::PARAM_INT]);
         array_push($param, [':p_offset', $p_offset, PDO::PARAM_INT]);
  $var =  parent::gselect($sql, $param);
         $sqlCount = "SELECT count(1) as cant FROM seg_aplicacion 
      WHERE  upper(concat(IFNULL(cod_apl,''),IFNULL(cod_apl_sup,''),IFNULL(cod_mod,''),IFNULL(dsc_apl,''),IFNULL(obs_apl,''),IFNULL(tpo_apl,''),IFNULL(menu,''),IFNULL(ayuda,''),IFNULL(url,''),IFNULL(target_tpo,''),IFNULL(hr_ini,''),IFNULL(ht_fin,''),IFNULL(sw_vie,''),IFNULL(sw_sab,''),IFNULL(sw_dom,''),IFNULL(sw_fer,''),IFNULL(estado,''),IFNULL(usu_cre,''),IFNULL(fh_cre,''),IFNULL(usu_mod,''),IFNULL(fh_mod,''))) like CONCAT('%',upper(IFNULL(:p_filtro,'' )), '%') ";
 							        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
		  $var1 =  parent::gselect($sqlCount, $param);
 $var['LENGTH']=$var1 ['DATA'][0]['cant'];    
  return $var;
 }
function findId($p_cod_apl) { $sql = " SELECT cod_apl,cod_apl_sup,cod_mod,dsc_apl,obs_apl,tpo_apl,menu,ayuda,url,target_tpo,hr_ini,ht_fin,sw_vie,sw_sab,sw_dom,sw_fer,estado,usu_cre,fh_cre,usu_mod,fh_mod
 FROM seg_aplicacion
  WHERE cod_apl = :p_cod_apl";
 $param = array(); 
array_push($param, [':p_cod_apl', $p_cod_apl, PDO::PARAM_STR]);

 return parent::gselect($sql, $param);
    }
public function insert($p_cod_apl,$p_cod_apl_sup,$p_cod_mod,$p_dsc_apl,$p_obs_apl,$p_tpo_apl,$p_menu,$p_ayuda,$p_url,$p_target_tpo,$p_hr_ini,$p_ht_fin,$p_sw_vie,$p_sw_sab,$p_sw_dom,$p_sw_fer,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod) {
 $sql = " INSERT INTO seg_aplicacion
 (cod_apl,cod_apl_sup,cod_mod,dsc_apl,obs_apl,tpo_apl,menu,ayuda,url,target_tpo,hr_ini,ht_fin,sw_vie,sw_sab,sw_dom,sw_fer,estado,usu_cre,fh_cre,usu_mod,fh_mod) 
 VALUES (:p_cod_apl,:p_cod_apl_sup,:p_cod_mod,:p_dsc_apl,:p_obs_apl,:p_tpo_apl,:p_menu,:p_ayuda,:p_url,:p_target_tpo,:p_hr_ini,:p_ht_fin,:p_sw_vie,:p_sw_sab,:p_sw_dom,:p_sw_fer,:p_estado,:p_usu_cre,:p_fh_cre,:p_usu_mod,:p_fh_mod) ";
 $param = array(); 
array_push($param, [':p_cod_apl', $p_cod_apl, PDO::PARAM_STR]);

array_push($param, [':p_cod_apl_sup', $p_cod_apl_sup, PDO::PARAM_STR]);

array_push($param, [':p_cod_mod', $p_cod_mod, PDO::PARAM_STR]);

array_push($param, [':p_dsc_apl', $p_dsc_apl, PDO::PARAM_STR]);

array_push($param, [':p_obs_apl', $p_obs_apl, PDO::PARAM_STR]);

array_push($param, [':p_tpo_apl', $p_tpo_apl, PDO::PARAM_STR]);

array_push($param, [':p_menu', $p_menu, PDO::PARAM_STR]);

array_push($param, [':p_ayuda', $p_ayuda, PDO::PARAM_STR]);

array_push($param, [':p_url', $p_url, PDO::PARAM_STR]);

array_push($param, [':p_target_tpo', $p_target_tpo, PDO::PARAM_STR]);

array_push($param, [':p_hr_ini', $p_hr_ini, PDO::PARAM_STR]);

array_push($param, [':p_ht_fin', $p_ht_fin, PDO::PARAM_STR]);

array_push($param, [':p_sw_vie', $p_sw_vie, PDO::PARAM_INT]);

array_push($param, [':p_sw_sab', $p_sw_sab, PDO::PARAM_INT]);

array_push($param, [':p_sw_dom', $p_sw_dom, PDO::PARAM_INT]);

array_push($param, [':p_sw_fer', $p_sw_fer, PDO::PARAM_INT]);

array_push($param, [':p_estado', $p_estado, PDO::PARAM_STR]);

array_push($param, [':p_usu_cre', $p_usu_cre, PDO::PARAM_STR]);

array_push($param, [':p_fh_cre', $p_fh_cre, PDO::PARAM_STR]);

array_push($param, [':p_usu_mod', $p_usu_mod, PDO::PARAM_STR]);

array_push($param, [':p_fh_mod', $p_fh_mod, PDO::PARAM_STR]);

 return parent::ginsert($sql, $param);
    }
public function update($p_cod_apl,$p_cod_apl_sup,$p_cod_mod,$p_dsc_apl,$p_obs_apl,$p_tpo_apl,$p_menu,$p_ayuda,$p_url,$p_target_tpo,$p_hr_ini,$p_ht_fin,$p_sw_vie,$p_sw_sab,$p_sw_dom,$p_sw_fer,$p_estado,$p_usu_cre,$p_fh_cre,$p_usu_mod,$p_fh_mod) {
$sql = "UPDATE seg_aplicacion SET 
cod_apl_sup = :p_cod_apl_sup,cod_mod = :p_cod_mod,dsc_apl = :p_dsc_apl,obs_apl = :p_obs_apl,tpo_apl = :p_tpo_apl,menu = :p_menu,ayuda = :p_ayuda,url = :p_url,target_tpo = :p_target_tpo,hr_ini = :p_hr_ini,ht_fin = :p_ht_fin,sw_vie = :p_sw_vie,sw_sab = :p_sw_sab,sw_dom = :p_sw_dom,sw_fer = :p_sw_fer,estado = :p_estado,usu_cre = :p_usu_cre,fh_cre = :p_fh_cre,usu_mod = :p_usu_mod,fh_mod = :p_fh_mod
 WHERE cod_apl = :p_cod_apl";
 $param = array(); 
array_push($param, [':p_cod_apl', $p_cod_apl, PDO::PARAM_STR]);

array_push($param, [':p_cod_apl_sup', $p_cod_apl_sup, PDO::PARAM_STR]);

array_push($param, [':p_cod_mod', $p_cod_mod, PDO::PARAM_STR]);

array_push($param, [':p_dsc_apl', $p_dsc_apl, PDO::PARAM_STR]);

array_push($param, [':p_obs_apl', $p_obs_apl, PDO::PARAM_STR]);

array_push($param, [':p_tpo_apl', $p_tpo_apl, PDO::PARAM_STR]);

array_push($param, [':p_menu', $p_menu, PDO::PARAM_STR]);

array_push($param, [':p_ayuda', $p_ayuda, PDO::PARAM_STR]);

array_push($param, [':p_url', $p_url, PDO::PARAM_STR]);

array_push($param, [':p_target_tpo', $p_target_tpo, PDO::PARAM_STR]);

array_push($param, [':p_hr_ini', $p_hr_ini, PDO::PARAM_STR]);

array_push($param, [':p_ht_fin', $p_ht_fin, PDO::PARAM_STR]);

array_push($param, [':p_sw_vie', $p_sw_vie, PDO::PARAM_INT]);

array_push($param, [':p_sw_sab', $p_sw_sab, PDO::PARAM_INT]);

array_push($param, [':p_sw_dom', $p_sw_dom, PDO::PARAM_INT]);

array_push($param, [':p_sw_fer', $p_sw_fer, PDO::PARAM_INT]);

array_push($param, [':p_estado', $p_estado, PDO::PARAM_STR]);

array_push($param, [':p_usu_cre', $p_usu_cre, PDO::PARAM_STR]);

array_push($param, [':p_fh_cre', $p_fh_cre, PDO::PARAM_STR]);

array_push($param, [':p_usu_mod', $p_usu_mod, PDO::PARAM_STR]);

array_push($param, [':p_fh_mod', $p_fh_mod, PDO::PARAM_STR]);


 return parent::gupdate($sql, $param);
    }
function delete($p_cod_apl) { $sql = "DELETE FROM seg_aplicacion WHERE cod_apl = :p_cod_apl"; $param = array(); 
array_push($param, [':p_cod_apl', $p_cod_apl, PDO::PARAM_STR]);


 return parent::gdelete($sql, $param);
    }
} 
 ?>
