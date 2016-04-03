<?php
class StdModel extends Action{

	public function initlinkage($all,$get){
		$info=collectinfo(__METHOD__,'$all,$get',array($all,$get));
		if(isset($all)===false){return createarrerr('error_code','all 不能为空',$info);}//防止NULL
		
		$linkage=$all['linkage'];
		$splitmark=$all['splitmark'];
		$g=M($splitmark);

		

		
		//		f_stdxqpcls_pclsid  'f_std_grdid'=>2,'f_stdxqpmj_xqid'=>1
		foreach($linkage as $aim=>$factors){
			//所有倒要分析，就要变变变

			//会引起哪个m需要判断
			$tmp=explode('_',$aim);
			$tmp=$tmp[2];$tmp=explode('id',$tmp);
			//pcls
			$tmp=$tmp[0];
			
			
			//那么判断哪个值需要变化
			$str_lkg='1=1';

			
					//f_stdxqpmj_xqid  1
			foreach($factors as $lkgk=>$lkgv){
				// $tmp_lkgk=explode('_',$lkgk);$tmp_lkgk=$tmp_lkgk[0].'_'.$tmp.'_'.$tmp_lkgk[2];
				// $tmpnm=$tmp.'nm';
				// 重写
		
				if($aim=='f_stdxqpmj_pmjid'){
					switch ($lkgk) {
						case 'f_std_grdid':$tmp_lkgk='f_pmj_grdid';break;
						case 'f_std_sttid':$tmp_lkgk='f_pmj_sttid';break;
						default:$tmp_lkgk=$lkgk;break;
					}
					
					
				}else if($aim=='f_stdxqpcls_pclsid'){
					switch ($lkgk) {
						case 'f_std_grdid':$tmp_lkgk='f_pcls_grdid';break;
						case 'f_stdxqpmj_xqid':$tmp_lkgk='f_pcls_xqid';break;
						case 'f_std_sttid':$tmp_lkgk='f_cls_sttid';break;
						default:$tmp_lkgk=$lkgk;break;
					}
					
				}
				
				if($lkgv==2){
					if($get[$lkgk]){
						$go=$g->where($splitmark.'id'.'='.$get[$lkgk])->find();
						$gnm=$go[$splitmark.'nm'];
						$tmp=$gnm.'_'.$tmp;
						$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$get[$lkgk];
					}else{
						$str_lkg='1=2';break;//一票否决
					}
				}else if($lkgv==1){
					if($get[$lkgk]){
						$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$get[$lkgk];
					}else{
						$str_lkg='1=2';break;//一票否决
					}
				}else if($lkgv==0){
					if($get[$lkgk]){
						$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$get[$lkgk];
					}
				}
				
			}
			//假设已经有2013_std类似酱紫的了，反正如果不是的话没有获取的2013这种东西，他也选不出啥的
			$tmp=M($tmp);
			if($aim=='f_stdxqpmj_pmjid'){
				$tmp->join('tb_bxxs ON f_pmj_bxxsid=bxxsid')->join('tb_mj ON f_pmj_mjid=mjid');
				$odr='bxxsnm ASC,mjnm ASC';
			}else if($aim=='f_stdxqpcls_pclsid'){
				$tmp->join('tb_'.$gnm.'_cls ON f_pcls_clsid=clsid');
				$odr='clsnm ASC';
			}

			$mls=$tmp->where($str_lkg)->order($odr)->select();
			$mlsnw=array();
			foreach($mls as $mv){
				if($aim=='f_stdxqpmj_pmjid'){
					$mv['pmjnm']='【'.$mv['bxxsnm'].'】'.$mv['mjnm'];
				}else if($aim=='f_stdxqpcls_pclsid'){
					$mv['pclsnm']=$mv['clsnm'];
				}
				
				array_push($mlsnw,$mv);
			}
			$this->assign($aim,$mlsnw);
			
		}


   		return createarrok('ok',$data,'',$info);
	}

	//from NB
	public function dolinkage($all){
		$info=collectinfo(__METHOD__,'$all',array($all));
		if(isset($all)===false){return createarrerr('error_code','all 不能为空',$info);}//防止NULL
		$get=$_GET;
		unset($get['_URL_']);
		//f_stdxqpmj_xqid
		$trigger=$get['trigger'];

		$linkage=$all['linkage'];
		$splitmark=$all['splitmark'];
		$g=M($splitmark);

		$arr_rslt=array();
		//		f_stdxqpcls_pclsid  'f_std_grdid'=>2,'f_stdxqpmj_xqid'=>1
		foreach($linkage as $aim=>$factors){
			if(isset($factors[$trigger])){//如果影响因子被触动，就要变变变

				//会引起哪个m需要判断
				$tmp=explode('_',$aim);
				$tmp=$tmp[2];$tmp=explode('id',$tmp);
				$tmp=$tmp[0];
				//pcls
				$arr_tmp=array();
				$arr_tmp['aim']=$aim;
				$arr_tmp['prex']=$tmp;
				//那么判断哪个值需要变化
				$str_lkg='1=1';

				
						//f_stdxqpmj_xqid  1
				foreach($factors as $lkgk=>$lkgv){
					// $tmp_lkgk=explode('_',$lkgk);$tmp_lkgk=$tmp_lkgk[0].'_'.$tmp.'_'.$tmp_lkgk[2];
					// $tmpnm=$tmp.'nm';
					// 重写
			
					if($aim=='f_stdxqpmj_pmjid'){
						switch ($lkgk) {
							case 'f_std_grdid':$tmp_lkgk='f_pmj_grdid';break;
							case 'f_std_sttid':$tmp_lkgk='f_pmj_sttid';break;
							default:$tmp_lkgk=$lkgk;break;
						}
						$odr='bxxsnm ASC,mjnm ASC';
						
					}else if($aim=='f_stdxqpcls_pclsid'){
						switch ($lkgk) {
							case 'f_std_grdid':$tmp_lkgk='f_pcls_grdid';break;
							case 'f_stdxqpmj_xqid':$tmp_lkgk='f_pcls_xqid';break;
							case 'f_std_sttid':$tmp_lkgk='f_cls_sttid';break;
							default:$tmp_lkgk=$lkgk;break;
						}
						$odr='clsnm ASC';
					}
					
					if($lkgv==2){
						if($get[$lkgk]){
							$go=$g->where($splitmark.'id'.'='.$get[$lkgk])->find();
							$gnm=$go[$splitmark.'nm'];
							$tmp=$gnm.'_'.$tmp;
							$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$get[$lkgk];
						}else{
							$str_lkg='1=2';break;//一票否决
						}
					}else if($lkgv==1){
						if($get[$lkgk]){
							$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$get[$lkgk];
						}else{
							$str_lkg='1=2';break;//一票否决
						}
					}else if($lkgv==0){
						if($get[$lkgk]){
							$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$get[$lkgk];
						}
					}
					
				}
				//假设已经有2013_std类似酱紫的了，反正如果不是的话没有获取的2013这种东西，他也选不出啥的
				$tmp=M($tmp);
				if($aim=='f_stdxqpmj_pmjid'){
					$tmp->join('tb_bxxs ON f_pmj_bxxsid=bxxsid')->join('tb_mj ON f_pmj_mjid=mjid');
				}else if($aim=='f_stdxqpcls_pclsid'){
					$tmp->join('tb_'.$gnm.'_cls ON f_pcls_clsid=clsid');
				}

				$mls=$tmp->where($str_lkg)->order($odr)->select();
				$mlsnw=array();
				foreach($mls as $mv){
					if($aim=='f_stdxqpmj_pmjid'){
						$mv['pmjnm']='【'.$mv['bxxsnm'].'】'.$mv['mjnm'];
					}else if($aim=='f_stdxqpcls_pclsid'){
						$mv['pclsnm']=$mv['clsnm'];
					}
					
					array_push($mlsnw,$mv);
				}
				$arr_tmp['ls']=$mlsnw;
				array_push($arr_rslt,$arr_tmp);
			}
		}


   		return createarrok('ok',$arr_rslt,'',$info);
	}
} 
?>