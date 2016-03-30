<?php
class StdModel extends Action{
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

				if($aim=='f_stdxqpmj_pmjid'){
					'f_std_grdid'=>2,'f_stdxqpmj_xqid'=>1,'f_pmj_bxxsid'=>2,'f_pmj_ccid'=>2,'f_pmj_klid'=>2,'f_pmj_xxxsid'=>2,'f_pmj_zsfwid'=>2,'f_pmj_xzid'=>2
				}
						//f_stdxqpmj_xqid  1
				foreach($factors as $lkgk=>$lkgv){
					// $tmp_lkgk=explode('_',$lkgk);$tmp_lkgk=$tmp_lkgk[0].'_'.$tmp.'_'.$tmp_lkgk[2];
					// $tmpnm=$tmp.'nm';
					// 重写
					if($aim=='f_stdxqpmj_pmjid'){
						switch ($lkgk) {
							case 'f_std_grdid':$lkgk='f_pmj_grdid';break;
							case 'f_pmj_bxxsid':$lkgk='f_pmj_grdid';break;
							case 'f_std_grdid':$lkgk='f_pmj_grdid';break;
							case 'f_std_grdid':$lkgk='f_pmj_grdid';break;
							case 'f_std_grdid':$lkgk='f_pmj_grdid';break;
							case 'f_std_grdid':$lkgk='f_pmj_grdid';break;
						}
						$odr='bxxsnm ASC,mjnm ASC';
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
				
				$tmp=M($tmp);
				$mls=$tmp->where($str_lkg)->order($tmpnm.' ASC')->select();
				$arr_tmp['ls']=$mls;
				array_push($arr_rslt,$arr_tmp);
			}
		}


   		return createarrok('ok',$arr_rslt,'',$info);
	}
} 
?>