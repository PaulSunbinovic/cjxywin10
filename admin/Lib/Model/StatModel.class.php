<?php
class StatModel extends Action{
	//test
	//
	//############test
	public function getstatlsbyjiaowu(){
		$info=collectinfo(__METHOD__,'',array());
		
		$stat=M('stat');
		$statls=$stat->where('statactvt=1 AND statmk=2')->select();

		return createarrok('ok',$statls,'',$info);
	}
	
} 
?>