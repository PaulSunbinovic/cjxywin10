<?php
class GrdModel extends Action{
	//test
	//
	//############test
	public function getgrdobydflt(){
		$info=collectinfo(__METHOD__,'',array());
		$grd=M('Grd');
		$grdo=$grd->where('grddflt=1')->find();
		return createarrok('ok',$grdo,'',$info);
	}
	

} 
?>