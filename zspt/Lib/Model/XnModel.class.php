<?php
class XnModel extends Action{
	//test
	//
	//############test
	public function getmobygrdid($grdid){
		$info=collectinfo(__METHOD__,'$grdid',array($grdid));
		if(isset($grdid)===false){return createarrerr('error_code','grdid 不能为空',$info);}//防止NULL
		$grd=D('Grd');
		$xn=M('xn');

		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];
		$xnnm=$grdo['grdnm'];
		$xno=$xn->where("xnnm='".$xnnm."'")->find();

		return createarrok('ok',$xno,'',$info);
	}


} 
?>