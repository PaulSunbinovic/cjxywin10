<?php
class stdxqdmModel extends Action{
	//test
	//
	//############test
	public function add($grdid,$stdid,$xqid,$dmid){
		$info=collectinfo(__METHOD__,'$grdid,$stdid,$xqid,$dmid',array($grdid,$stdid,$xqid,$dmid));
		$grd=D('Grd');

		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];
		$stdxqdm=M($grdo['grdnm'].'_stdxqdm');

		$dt=array('f_stdxqdm_grdid'=>$grdid,'f_stdxqdm_stdid'=>$stdid,'f_stdxqdm_xqid'=>$xqid,'f_stdxqdm_dmid'=>$dmid);

		$stdxqdm->data($dt)->add();


		return createarrok('ok',$data,'',$info);
	}
	

} 
?>