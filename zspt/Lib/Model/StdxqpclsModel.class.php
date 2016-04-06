<?php
class stdxqpclsModel extends Action{
	//test
	//
	//############test
	public function add($grdid,$stdid,$xqid,$pclsid){
		$info=collectinfo(__METHOD__,'$grdid,$stdid,$xqid,$pclsid',array($grdid,$stdid,$xqid,$pclsid));
		$grd=D('Grd');

		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];
		$stdxqpcls=M($grdo['grdnm'].'_stdxqpcls');

		$dt=array('f_stdxqpcls_grdid'=>$grdid,'f_stdxqpcls_stdid'=>$stdid,'f_stdxqpcls_xqid'=>$xqid,'f_stdxqpcls_pclsid'=>$pclsid);

		$stdxqpcls->data($dt)->add();


		return createarrok('ok',$data,'',$info);
	}
	

} 
?>