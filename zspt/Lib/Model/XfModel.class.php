<?php
class XfModel extends Action{
	//test
	//
		
	public function getmo($grdid,$sttid,$bxxsid,$ccid,$klid){
		$info=collectinfo(__METHOD__,'$grdid,$sttid,$bxxsid,$ccid,$klid',array($grdid,$sttid,$bxxsid,$ccid,$klid));
		$grd=D('Grd');

		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];

		$xf=M($grdo['grdnm'].'_xf');
		
		$xfo=$xf->where('f_xf_grdid='.$grdid.' AND f_xf_sttid='.$sttid.' AND f_xf_bxxsid='.$bxxsid.' AND f_xf_ccid='.$ccid.' AND f_xf_klid='.$klid)->find();

		
		return createarrok('ok',$xfo,'',$info);
	}
	

} 
?>