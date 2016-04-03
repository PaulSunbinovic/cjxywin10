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
	
	public function getgrdlsbygrdid($grdid){
		$info=collectinfo(__METHOD__,'$grdid',array($grdid));
		if(isset($grdid)===false){return createarrerr('error_code','grdid 不能为空',$info);}//防止NULL
		$grd=M('grd');
		$grdls=$grd->where('grdid='.$grdid)->select();

		return createarrok('ok',$grdls,'',$info);
	}

} 
?>