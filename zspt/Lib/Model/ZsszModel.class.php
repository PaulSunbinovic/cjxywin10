<?php
class ZsszModel extends Action{
	//test
	//
	//############test
	public function getzsszo(){
		$info=collectinfo(__METHOD__,'',array());
		$zssz=M('zssz');
		$zsszo=$zssz->where('zsszid=1')->find();

		return createarrok('ok',$zsszo,'',$info);
	}
	

} 
?>