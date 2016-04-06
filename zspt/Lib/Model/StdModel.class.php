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
						$mv['pmjnm']=$mv['mjnm'];
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

	##########
	public function addBBB($all){
		$info=collectinfo(__METHOD__,'$all',array($all));
		if(isset($all)===false){return createarrerr('error_code','all 不能为空',$info);}//防止NULL
		
		
    	$mdmk=$all['mdmk'];
    	$lowmdmk=strtolower($mdmk);$this->assign('lowmdmk',$lowmdmk);
    	$notself=$all['notself'];$this->assign('notself',$notself);
    	$transmean=$all['transmean'];$this->assign('transmean',$transmean);


    	$gid=$all['dfltvalue']['f_std_grdid'];$this->assign('gid',$gid);
    	
    	$id=0;$this->assign('id',$id);
    	$para=$all['para'];$this->assign('para',$para);
    	$jn_same=$all['jn_same'];
    	$jn=$all['jn'];
    	$no_update=$all['no_update'];$this->assign('no_update',$no_update);
    	$dfltvalue=$all['dfltvalue'];
    	$allowempty=$all['allowempty'];$this->assign('allowempty',$allowempty);
    	$splitmark=$all['splitmark'];$this->assign('splitmark',$splitmark);

    	$linkage=$all['linkage'];

    	$defaultls=$all['defaultls'];

    	$impactfactor=$all['impactfactor'];$this->assign('impactfactor',$impactfactor);

    	$g=M($splitmark);

    	if($id==0){$mo=$dfltvalue;$pattern='提交报名';}

    	if($defaultls){
	    	//甭管添加还是修改 zabojingua 属性必须要ls给好
	    	foreach ($para as $k => $v) {
				if(!in_array($k,$hide_cdt)&&strstr($k,'_')){//|tmp|f_pcls_usrid|usr   
					
					$tmp=explode('_', $k);
					$tmp=explode('id',$tmp[2]);
					$tmp=$tmp[0];//usr
					//联动中有这货就不能走常规路了
					if($linkage[$k]){
						$arr_display=array();
						//看看有哪些和他联动
						$str_lkg='1=1';
						//f_pcls_usrid    f_cls_sttid=>1
						foreach($linkage[$k] as $lkgk=>$lkgv){//f_
							//由于十有八九$lkgk[eg:f_bbb_grdid]借别人来限制自己的，所以需要把字段转化成自己看得懂的字段
							$tmp_lkgk=explode('_',$lkgk);$tmp_lkgk=$tmp_lkgk[0].'_'.$tmp.'_'.$tmp_lkgk[2];//f_usr_sttid
							$tmpnm=$tmp.'nm';
							if($lkgv==2){
								if($mo[$lkgk]){
									$go=$g->where($splitmark.'id'.'='.$mo[$lkgk])->find();
									$gnm=$go[$splitmark.'nm'];
									$tmp=$gnm.'_'.$tmp;
									$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$mo[$lkgk];
								}else{
									$str_lkg='1=2';break;//一票否决
								}
							}else if($lkgv==1){
								if($mo[$lkgk]){
									$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$mo[$lkgk];
								}else{
									$str_lkg='1=2';break;//一票否决
								}
							}else if($lkgv==0){
								if($mo[$lkgk]){
									$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$mo[$lkgk];
								}
							}
							
						}
						$tmp=M($tmp);
						$this->assign($k,$tmp->where($str_lkg)->order($tmpnm.' ASC')->select());
					}else{
						$tmp=M($tmp);
						$this->assign($k,$tmp->select());
					}
					
				}
			}
		}

    	if($id==0){$mo=$dfltvalue;$pattern='报名填写';}else{
    		$arr_mo=$this->getmoBBB($gid,$splitmark,$mdmk,$id,$para,$jn_same,$jn);$mo=$arr_mo['data'];$pattern='修改';
    	}
    	
    	$this->assign('mo',$mo);
    	$this->assign('moforjs',transforjs($mo));
    	$this->assign('ttl',$mo[$lowmdmk.'nm'].$pattern);
		
		return createarrok('ok',$mo,'',$info);
	}

	##########
	public function doadd($all){
		$info=collectinfo(__METHOD__,'$all',array($all));
		if(isset($all)===false){return createarrerr('error_code','all 不能为空',$info);}//防止NULL
		$pmj=D('Pmj');$stdxqpmj=D('Stdxqpmj');$stdxqpcls=D('Stdxqpcls');$stdxqdm=D('Stdxqdm');$dm=D('Dm');$stdxqdm=D('Stdxqdm');$xf=D('Xf');$zsf=D('Zsf');$xn=D('Xn');$cw=D('Cw');

		$get=$_GET;
		$mdmk=$all['mdmk'];

		$splitmark=$all['splitmark'];
   		
   		$lowmdmk=strtolower($mdmk);
		$mid=$lowmdmk.'id';
		
		$id=$get[$mid];
		$gid=$get['f_'.$lowmdmk.'_'.$splitmark.'id'];

		$g=M($splitmark);
		$go=$g->where($splitmark.'id='.$gid)->find();
		$gnm=$go[$splitmark.'nm'];
		$m=M($gnm.'_'.$lowmdmk);

		//提取专业信息
		$pmjid=$get['f_stdxqpmj_pmjid'];
		unset($get['f_stdxqpmj_pmjid']);
		$xqid=$get['f_stdxqpmj_xqid'];
		unset($get['f_stdxqpmj_xqid']);
		$arr_pmjo=$pmj->getmo($gid,$pmjid);$pmjo=$arr_pmjo['data'];
		
		$arr_stdaplno=$this->createstdaplno($gid,$pmjo['bxxsprex']);$stdaplno=$arr_stdaplno['data'];

		

		//修改信息
		$get['stdidcd']=strtoupper($get['stdidcd']);
		$get['stdno']='';
		$get['stdaplno']=$stdaplno;
		$get['f_std_statid']=5;
		$get['stdpw']=md5('11111111');
		$get['stdpertm']='';
		$get['stdertm']='';
		$get['stdicbc']='';
		$get['stdpnttm']='';
		$get['stdaddtm']=date('Y-m-d h:m:s',time());
		$get['stdmdftm']=date('Y-m-d h:m:s',time());
	
	
	////1根据判断是否有其他人注册过2判断stdidcd是否和生日吻合

		unset($get[$mid]);
		unset($get['_URL_']);

		$arr_stdo=$this->getmobystdidcd($gid,$get['stdidcd']);$stdo=$arr_stdo['data'];

		if($stdo){
			$pattern=3;//已经有了不能重复注册
		}else if(substr($get['stdidcd'], 6,8)!=str_replace('-','',$get['stdbtd'])){
			$pattern=4;//身份证和生日不符合
		}else if($id==0){
			$m->data($get)->add();
			$pattern=0;

			//添加成功后添加 专业数据 班级数据（占坑）  住宿数据  财务
			//1获取学生注册完的学生信息
			$arr_stdo=$this->getmobystdidcd($gid,$get['stdidcd']);$stdo=$arr_stdo['data'];
			$stdid=$stdo['stdid'];
			//赐予session
			session('stdidss',$stdid);
			//
			$stdxqpmj->add($gid,$stdid,$xqid,$pmjid);
			$stdxqpcls->add($gid,$stdid,$xqid,0);
			$arr_dmo=$dm->getmobybxxspredandsexid($pmjo['bxxsprex'],$get['f_std_sexid']);$dmo=$arr_dmo['data'];
			$stdxqdm->add($gid,$stdid,$xqid,$dmo['dmid']);
			$arr_xfo=$xf->getmo($gid,$get['f_std_sttid'],$pmjo['f_pmj_bxxsid'],$pmjo['f_pmj_ccid'],$pmjo['f_pmj_klid']);$xfo=$arr_xfo['data'];
			$arr_zsfo=$zsf->getmo($gid,$dmo['dmid']);$zsfo=$arr_zsfo['data'];
			$arr_xno=$xn->getmobygrdid($gid);$xno=$arr_xno['data'];
			$cw->add($gid,$xno['xnid'],$xqid,$stdid,$xfo['xfsm'],$xfo['jckwfsm'],$zsfo['zsfsm']);
		}else{
			$m->where($mid.'='.$id)->setField($get);
			$pattern=1;
		}
   		
		
		return createarrok('ok',$pattern,'',$info);
	}

	//############test
	public function createstdaplno($grdid,$bxxsprex){
		$info=collectinfo(__METHOD__,'$grdid,$bxxsprex',array($grdid,$bxxsprex));
		$grd=D('Grd');

		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];
		$std=M($grdo['grdnm'].'_std');
		$prex=$bxxsprex.$grdo['grdnm'];

		$stdo=$std->where("stdaplno LIKE '%".$prex."%'")->order('stdaplno DESC')->find();
		if($stdo){$stdaplnomax=$stdo['stdaplno'];}else{$stdaplnomax=$prex.'0000';}
		$last4=substr($stdaplnomax,-4);
		$last4=(int)$last4+1;

		$length=strlen((string)$last4);

		$bu_length=4-$length;//补length

		$stdaplno='';
		for($i=0;$i<$bu_length;$i++){
			$stdaplno=$stdaplno.'0';
		}
		$stdaplno=$bxxsprex.$grdo['grdnm'].$stdaplno.$last4;


		return createarrok('ok',$stdaplno,'',$info);
	}

	//############test
	public function getmobystdidcd($grdid,$stdidcd){
		$info=collectinfo(__METHOD__,'$gid,$stdidcd',array($grdid,$stdidcd));
		if(isset($grdid)===false){return createarrerr('error_code','grdid 不能为空',$info);}//防止NULL
		if(isset($stdidcd)===false){return createarrerr('error_code','stdidcd 不能为空',$info);}//防止NULL
		$grd=D('Grd');
		$arr_grdo=$grd->getmo($grdid);$grdo=$arr_grdo['data'];
		$std=M($grdo['grdnm'].'_std');

		$stdo=$std->where("stdidcd='".$stdidcd."'")->find();

		return createarrok('ok',$stdo,'',$info);
	}

	#########
	public function viewBBB($all){
		$info=collectinfo(__METHOD__,'$all',array($all));
		if(isset($all)===false){return createarrerr('error_code','all 不能为空',$info);}//防止NULL
		
		
    	
    	$mdmk=$all['mdmk'];
    	$lowmdmk=strtolower($mdmk);$this->assign('lowmdmk',$lowmdmk);

    	
    	
    	$gid=$_GET['gid'];$id=session('stdidss');
    	$para=$all['para'];$this->assign('para',$para);
    	$jn_same=$all['jn_same'];
    	$jn=$all['jn'];
    	$no_view=$all['no_view'];$this->assign('no_view',$no_view);
    	$splitmark=$all['splitmark'];


    	$arr_mo=$this->getmoBBB($gid,$splitmark,$mdmk,$id,$para,$jn_same,$jn);$mo=$arr_mo['data'];

    	$transmean=$all['transmean'];
    	foreach($mo as $k=>$v){
    		if(isset($transmean[$k])){
    			$mo[$k]=$transmean[$k][$mo[$k]];
    		}
    	}
    	
    	$this->assign('mo',$mo);
    	$this->assign('ttl',$mo[$lowmdmk.'nm']);
		
		return createarrok('ok',$data,'',$info);
	}

	###
	public function getmoBBB($gid,$splitmark,$mdmk,$id,$para,$jn_same,$jn){
		$info=collectinfo(__METHOD__,'$mdmk,$id,$para,$jn',array($mdmk,$id,$para,$jn));
		if(isset($mdmk)===false){return createarrerr('error_code','mdmk 不能为空',$info);}//防止NULL
		if(isset($id)===false){return createarrerr('error_code','id 不能为空',$info);}//防止NULL
		if(isset($para)===false){return createarrerr('error_code','para 不能为空',$info);}//防止NULL
		if(isset($jn)===false){return createarrerr('error_code','jn 不能为空',$info);}//防止NULL
		
		$lowmdmk=strtolower($mdmk);
		$g=M($splitmark);
		$go=$g->where($splitmark.'id='.$gid)->find();
		$gnm=$go[$splitmark.'nm'];

		$m=M($gnm.'_'.$lowmdmk);
		foreach($jn_same as $jnsmv){
			$m->join('tb_'.$gnm.'_'.$jnsmv);
		}

		foreach($jn as $jnv){$m->join($jnv);}
		$mo=$m->where($lowmdmk.'id='.$id)->find();
		 
		return createarrok('ok',$mo,'',$info);
	}
} 
?>