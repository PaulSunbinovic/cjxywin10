<?php
class PmjModel extends Action{
	
	//公版
	public function getmo($grdid,$pmjid){
		$info=collectinfo(__METHOD__,'$grdid,$pmjid',array($grdid,$pmjid));
		if(isset($grdid)===false){return createarrerr('error_code','grdid 不能为空',$info);}//防止NULL
		if(isset($pmjid)===false){return createarrerr('error_code','pmjid 不能为空',$info);}//防止NULL
		$grd=D('Grd');
		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];
		$pmj=M($grdo['grdnm'].'_pmj');
		$pmjo=$pmj->join('tb_bxxs ON f_pmj_bxxsid=bxxsid')->where('pmjid='.$pmjid)->find();

		
		return createarrok('ok',$pmjo,'',$info);
	}

	

} 
?>