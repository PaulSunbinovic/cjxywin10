<?php
class ZsfModel extends Action{
	//test
	//
		
	public function getmo($grdid,$dmid){
		$info=collectinfo(__METHOD__,'$grdid,$dmid',array($grdid,$dmid));
		$grd=D('Grd');

		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];

		$zsf=M($grdo['grdnm'].'_zsf');
		
		$zsfo=$zsf->where('f_zsf_grdid='.$grdid.' AND f_zsf_dmid='.$dmid)->find();

		
		return createarrok('ok',$zsfo,'',$info);
	}
	

} 
?>