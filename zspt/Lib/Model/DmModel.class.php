<?php
class DmModel extends Action{
	//test
	//
	//############test
	public function getmobybxxspredandsexid($bxxsprex,$sexid){
		$info=collectinfo(__METHOD__,'$bxxsprex,$sexid',array($bxxsprex,$sexid));
		$dm=M('dm');
		
		//这块比较自定义，根据政策来调整的
		if($bxxsprex=='Z'){
			if($sexid==1){$dmid=2;}//东区
			if($sexid==2){$dmid=1;}//西区
		}else{
			$dmid=3;
		}
		$dmo=$dm->where('dmid='.$dmid)->find();

		return createarrok('ok',$dmo,'',$info);
	}
	

} 
?>