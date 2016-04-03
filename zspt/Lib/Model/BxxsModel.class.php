<?php
class BxxsModel extends Action{
	//test
	//
	//############test
	public function getbxxslsbyzs(){
		$info=collectinfo(__METHOD__,'',array());
		
		$bxxs=M('bxxs');
		$bxxsls=$bxxs->where('bxxszs=1')->select();

		return createarrok('ok',$bxxsls,'',$info);
	}
	

} 
?>