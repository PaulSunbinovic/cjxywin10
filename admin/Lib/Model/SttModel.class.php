<?php
class SttModel extends Action{
	
	// //公版
	// public function getmo($sttid){
	// 	$info=collectinfo(__METHOD__,'$sttid',array($sttid));
	// 	if(isset($sttid)===false){return createarrerr('error_code','sttid 不能为空',$info);}//防止NULL
		
	// 	$stt=M('stt');
	// 	$stto=$stt->join('tb_cc ON f_stt_ccid=ccid')->where('sttid='.$sttid)->find();

		
	// 	return createarrok('ok',$stto,'',$info);
	// }

	// //公版
	// public function getmls(){
	// 	$info=collectinfo(__METHOD__,'',array());
	// 	$stt=M('stt');
	// 	$sttls=$stt->join('tb_cc ON f_stt_ccid=ccid')->select();
	// 	return createarrok('ok',$sttls,'',$info);
	// }

	// //公版
	// public function getmlsbyccid($ccid){
	// 	$info=collectinfo(__METHOD__,'$ccid',array($ccid));
	// 	if(isset($ccid)===false){return createarrerr('error_code','ccid 不能为空',$info);}//防止NULL

	// 	$stt=M('stt');
	// 	$sttls=$stt->join('tb_cc ON f_stt_ccid=ccid')->where('f_stt_ccid='.$ccid)->select();

	// 	return createarrok('ok',$sttls,'',$info);
	// }
	
	// //公版
	// public function deletebyccid($ccid){
	// 	$info=collectinfo(__METHOD__,'$ccid',array($ccid));
	// 	if(isset($ccid)===false){return createarrerr('error_code','ccid 不能为空',$info);}//防止NULL
		
	// 	$arr_sttls=$this->getmlsbyccid($ccid);$sttls=$arr_sttls['data'];
	// 	foreach($sttls as $sttv){
	// 		$this->delete($sttv['sttid']);
	// 	}

	// 	return createarrok('ok',$data,'',$info);
	// }

	//
	public function delete($sttid){
		$info=collectinfo(__METHOD__,'$sttid',array($sttid));
		if(isset($sttid)===false){return createarrerr('error_code','sttid 不能为空',$info);}//防止NULL
		
		$stt=M('stt');$usr=D('Usr');/////$tcr=D('Tcr');$std=D('Std');
		$stt->where('sttid='.$sttid)->delete();
		//删除依赖
      	$usr->deletebysttid($sttid);
      	
		return createarrok('ok',$data,'',$info);
	}

	// //公版
	// public function add($get){
	// 	$info=collectinfo(__METHOD__,'$get',array($get));
	// 	if(isset($get)===false){return createarrerr('error_code','get 不能为空',$info);}//防止NULL
		
	// 	$stt=M('stt');
	// 	$stt->data($get)->add();

	// 	return createarrok('ok',$data,'',$info);
	// }

	// //公版
	// public function mdf($get,$sttid){
	// 	$info=collectinfo(__METHOD__,'$get,$sttid',array($get,$sttid));
	// 	if(isset($get)===false){return createarrerr('error_code','get 不能为空',$info);}//防止NULL
	// 	if(isset($sttid)===false){return createarrerr('error_code','sttid 不能为空',$info);}//防止NULL

	// 	$stt=M('stt');
	// 	$stt->where('sttid='.$sttid)->setField($get);

	// 	return createarrok('ok',$data,'',$info);
	// }

} 
?>