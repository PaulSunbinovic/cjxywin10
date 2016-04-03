<?php
class StatModel extends Action{
	//test
	//
	//############test
	public function getstatlsbyzs(){
		$info=collectinfo(__METHOD__,'',array());
		
		$stat=M('stat');
		$statls=$stat->where('statmk=1')->select();

		return createarrok('ok',$statls,'',$info);
	}
	

} 
?>