<?php
class CwModel extends Action{
	//test
	//
	//############test
	public function add($grdid,$xnid,$xqid,$stdid,$xfsm,$jckwfsm,$zsfsm){
		$info=collectinfo(__METHOD__,'$grdid,$xnid,$xqid,$stdid,$xfsm,$jckwfsm,$zsfsm',array($grdid,$xnid,$xqid,$stdid,$xfsm,$jckwfsm,$zsfsm));
		$grd=D('Grd');
		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];

		$cw=M($grdo['grdnm'].'_cw');

		$dt=array('f_cw_grdid'=>$grdid,'f_cw_xnid'=>$xnid,'f_cw_xqid'=>$xqid,'f_cw_stdid'=>$stdid,'cwyjxfsm'=>$xfsm,'cwyjjckwfsm'=>$jckwfsm,'cwyjzsfsm'=>$zsfsm,'cwsjxfsm'=>0,'cwsjjckwfsm'=>0,'cwsjzsfsm'=>0);

		$cw->data($dt)->add();

		return createarrok('ok',$data,'',$info);
	}
	

} 
?>