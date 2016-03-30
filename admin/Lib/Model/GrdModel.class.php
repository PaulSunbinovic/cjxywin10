<?php
class GrdModel extends Action{
	//test
	//
	//############test
	public function getgrdobyrecent(){
		$info=collectinfo(__METHOD__,'',array());
		$grd=M('Grd');
		$grdo=$grd->order('grdnm DESC')->find();
		return createarrok('ok',$grdo,'',$info);
	}
	

} 
?>