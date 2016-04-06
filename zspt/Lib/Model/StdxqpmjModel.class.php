<?php
class stdxqpmjModel extends Action{
	//test
	//
	//############test
	public function add($grdid,$stdid,$xqid,$pmjid){
		$info=collectinfo(__METHOD__,'$grdid,$stdid,$xqid,$pmjid',array($grdid,$stdid,$xqid,$pmjid));
		$grd=D('Grd');

		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];
		$stdxqpmj=M($grdo['grdnm'].'_stdxqpmj');

		$dt=array('f_stdxqpmj_grdid'=>$grdid,'f_stdxqpmj_stdid'=>$stdid,'f_stdxqpmj_xqid'=>$xqid,'f_stdxqpmj_pmjid'=>$pmjid);

		$stdxqpmj->data($dt)->add();


		return createarrok('ok',$data,'',$info);
	}
	

} 
?>