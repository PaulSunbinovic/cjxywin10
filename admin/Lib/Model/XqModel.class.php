<?php
class XqModel extends Action{
	//test
	//
	//############test
	public function getxqobydq(){
		$info=collectinfo(__METHOD__,'',array());
		
		$xq=M('xq');
		$xqo=$xq->where('xqdq=1')->find();

		return createarrok('ok',$xqo,'',$info);
	}
	

} 
?>