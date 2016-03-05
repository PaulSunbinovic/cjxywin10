<?php
class NBModel extends Action{
	//test
	//
	//############test
	public function getls($para,$mdmk,$jn,$fld,$cdt,$spccdt,$odr,$lmt,$hide_fld,$hide_cdt,$spccdtls,$odrls,$defaultls,$transmean){
		$info=collectinfo(__METHOD__,'$para,$mdmk,$jn,$fld,$cdt,$spccdt,$odr,$lmt,$hide_fld,$hide_cdt,$spccdtls,$odrls,$defaultls,$transmean',array($para,$mdmk,$jn,$fld,$cdt,$spccdt,$odr,$lmt,$hide_fld,$hide_cdt,$spccdtls,$odrls,$defaultls,$transmean));

		if(isset($para)===false){return createarrerr('error_code','para 不能为空',$info);}
		if(isset($mdmk)===false){return createarrerr('error_code','mdmk 不能为空',$info);}
		if(isset($jn)===false){return createarrerr('error_code','jn 不能为空',$info);}
		if(isset($fld)===false){return createarrerr('error_code','fld 不能为空',$info);}
		if(isset($cdt)===false){return createarrerr('error_code','cdt 不能为空',$info);}
		if(isset($spccdt)===false){return createarrerr('error_code','spccdt 不能为空',$info);}
		if(isset($odr)===false){return createarrerr('error_code','odr 不能为空',$info);}
		if(isset($lmt)===false){return createarrerr('error_code','lmt 不能为空',$info);}
		if(isset($hide_fld)===false){return createarrerr('error_code','hide_fld 不能为空',$info);}
		if(isset($hide_cdt)===false){return createarrerr('error_code','hide_cdt 不能为空',$info);}

		$this->assign('para',$para);$this->assign('mdmk',$mdmk);$this->assign('fld',$fld);$this->assign('cdt',$cdt);$this->assign('odr',$odr);$this->assign('spccdt',$spccdt);$this->assign('lmt',$lmt);$this->assign('hide_fld',$hide_fld);$this->assign('hide_cdt',$hide_cdt);$this->assign('spccdtls',$spccdtls);$this->assign('odrls',$odrls);$this->assign('lowmdmk',strtolower($mdmk)); $this->assign('defaultls',$defaultls);$this->assign('transmean',$transmean);$this->assign('linkage',$linkage);


		

		//先搞定针对哪个数据
		$mdmk=strtolower($mdmk);
		$m=M($mdmk);
		foreach($jn as $jnv){$m->join($jnv);}
		$fld_str='';$thls=array();
		for($i=0;$i<count($fld);$i++){
			if(!in_array($fld[$i],$hide_fld)){array_push($thls, $para[$fld[$i]]);}
			if($i==0){$fld_str=$fld[$i];}else{$fld_str=$fld_str.','.$fld[$i];}
		}
		$m->field($fld_str);$this->assign('thls',$thls);
		$cdt_str='1=1';


		//对于cdt无论是有还是没有都必须从para中剃掉hide的属性，然后剩下的统一判断是否需要给ls
		if($defaultls==1){
			foreach ($para as $k => $v) {
				if(!in_array($k,$hide_cdt)&&strstr($k,'_')){
					$tmp=explode('_', $k);
					$tmp=explode('id',$tmp[2]);
					$tmp=$tmp[0];$tmp=M($tmp);
					$this->assign($k,$tmp->select());
					
				}
			}
		}

		foreach($cdt as $cdtvk=>$cdtvv){
			if(strstr($cdtvk,'_')){
				$thiscdt=$cdtvk.'='.$cdtvv;
			}else if(isset($transmean[$cdtvk])){
				$thiscdt=$cdtvk.'='.$cdtvv;
			}else{$thiscdt=$cdtvk." LIKE '%".$cdtvv."%'";}
			$cdt_str=$cdt_str.' AND '.$thiscdt;
		}
		//为防止没有spccdt依然会产生()因此如果没有就干脆不搞了，当然没有spccdtls 自然也不会设置spccdt 自然也不会有下面的数据了
		if($spccdt){
			foreach($spccdt as $spccdtv){$cdt_str=$cdt_str.' AND ('.$spccdtls[$spccdtv][0].') ';}
		}
		$m->where($cdt_str);

		//此时已经可以确定多少条了
		$m_forcount=clone $m;
		$count=$m_forcount->count();

		//分页
		import('ORG.Util.Page');
		$page=new Page($count,$lmt);//后台管理页面默认一页显示N条记录
		$page->setConfig('prev', "&laquo; 上一页");//上一页
		$page->setConfig('next', '下一页 &raquo;');//下一页
		$page->setConfig('first', '&laquo; 首页');//第一页
		$page->setConfig('last', '末页 &raquo;');//最后一页
		$page->setConfig('theme','共%totalPage%页/%totalRow%%header% %first% %upPage%  %linkPage%  %downPage% %end%');
		//设置分页回调方法
		$show=$page->show();

		$show=str_replace("<a>", "&nbsp;<a>", $show);
		$show=str_replace("</a>", "</a>&nbsp;", $show);
		$show=str_replace("<span>", "&nbsp;<span>", $show);
		$show=str_replace("</span>", "</span>&nbsp;", $show);
		
		$this->assign('page',$show);
		//为防止没有odr依然会产生()因此如果没有就干脆不搞了，当然没有odrls 自然也不会设置odr 自然也不会有下面的数据了
		if($odr){
			$odr_str='';
			$i=0;foreach($odr as $odrvk=>$odrvv){if($i!=0){$odr_str=$odr_str.',';}$odr_str=$odr_str.$odrvk.' '.$odrvv;$i++;}
			$m->order($odr_str);
		}

		$this->assign('pagestart',$page->firstRow);
		$m->limit($page->firstRow.','.$page->listRows);

		$mls=$m->select();
		
		

		
		
		// //处理page管理
		// $sum=$m_clone->count();//共多少条
		// $pagenum=floor($sum/$lmt)+1;//共多少页
		// $nowpage=$pagestart/$lmt; //当前第几页
		// if($nowpage==0){$prev='no';$first='no';}else{$prev=$nowpage-1;$first=0;}
		// if($nowpage==$pagenum-1){$next='no';$last='no';}else{$next=$nowpage+1;$last=$pagenum-1;}
		
		// $page['sum']=$sum;$page['pagenum']=$pagenum;$page['nowpage']=$nowpage;$page['prev']=$prev;$page['next']=$next;$page['first']=$first;$page['last']=$last;$page['lmt']=$lmt;
		
		// $this->assign('page',$page);//不管是ajax不用还是 首次查询要用，我都assign了
				
		return createarrok('ok',$mls,'',$info);
	}
	
	#####
	public function processget($get){
		$info=collectinfo(__METHOD__,'$get',array($get));

		$arr_fld=array();$arr_cdt=array();$arr_spccdt=array();$arr_odr=array();
		foreach ($get as $key => $value) {
			//fld
			if(strstr($key,'nb_fld')){
				$fldls=explode('-',$value);
				for($i=1;$i<count($fldls)-1;$i++){
					array_push($arr_fld,$fldls[$i]);
				}
			}
			//cdt
			if(strstr($key,'nb_cdt')){
				$k=explode('_nb_cdt', $key)[0];
				$arr_cdt[$k]=$value;
			}
				
			//spccdt
			if(strstr($key,'nb_spccdt')){
				array_push($arr_spccdt,$value);
			}
			//odr
			if(strstr($key,'nb_odr')){
				$k=explode('_nb_odr', $key)[0];
				$arr_odr[$k]=$value;
			}
		}
		$lmt=$get['nb_lmt'];

		$get=array();
		$get['fld']=$arr_fld;$get['cdt']=$arr_cdt;$get['spccdt']=$arr_spccdt;$get['odr']=$arr_odr;$get['lmt']=$lmt;
		
		return createarrok('ok',$get,'',$info);
	}

	######################################################
	######################################################
	######################################################
	######################################################
	//############test
	public function getlsBBB($para,$mdmk,$splitmark,$jn_same,$multicorrect,$jn,$fld,$cdt,$spccdt,$odr,$lmt,$hide_fld,$hide_cdt,$spccdtls,$odrls,$defaultls,$transmean,$linkage,$impactfactor){
		$info=collectinfo(__METHOD__,'$para,$mdmk,$splitmark,$jn_same,$multicorrect,$jn,$fld,$cdt,$spccdt,$odr,$lmt,$hide_fld,$hide_cdt,$spccdtls,$odrls,$defaultls,$transmean,$linkage,$impactfactor',array($para,$mdmk,$splitmark,$jn_same,$multicorrect,$jn,$fld,$cdt,$spccdt,$odr,$lmt,$hide_fld,$hide_cdt,$spccdtls,$odrls,$defaultls,$transmean,$linkage,$impactfactor));

		if(isset($para)===false){return createarrerr('error_code','para 不能为空',$info);}
		if(isset($mdmk)===false){return createarrerr('error_code','mdmk 不能为空',$info);}
		if(isset($jn)===false){return createarrerr('error_code','jn 不能为空',$info);}
		if(isset($fld)===false){return createarrerr('error_code','fld 不能为空',$info);}
		if(isset($cdt)===false){return createarrerr('error_code','cdt 不能为空',$info);}
		if(isset($spccdt)===false){return createarrerr('error_code','spccdt 不能为空',$info);}
		if(isset($odr)===false){return createarrerr('error_code','odr 不能为空',$info);}
		if(isset($lmt)===false){return createarrerr('error_code','lmt 不能为空',$info);}
		if(isset($hide_fld)===false){return createarrerr('error_code','hide_fld 不能为空',$info);}
		if(isset($hide_cdt)===false){return createarrerr('error_code','hide_cdt 不能为空',$info);}

		$this->assign('para',$para);$this->assign('mdmk',$mdmk);$this->assign('fld',$fld);$this->assign('cdt',$cdt);$this->assign('odr',$odr);$this->assign('spccdt',$spccdt);$this->assign('lmt',$lmt);$this->assign('hide_fld',$hide_fld);$this->assign('hide_cdt',$hide_cdt);$this->assign('spccdtls',$spccdtls);$this->assign('odrls',$odrls);$this->assign('lowmdmk',strtolower($mdmk)); $this->assign('defaultls',$defaultls);$this->assign('transmean',$transmean);$this->assign('impactfactor',$impactfactor);$this->assign('splitmark',$splitmark);

		$g=M($splitmark);//$grd
		$cdt_cross=$this->crossequal($multicorrect);		

		//先搞定针对哪个数据
		$mdmk=strtolower($mdmk);

		$gls=$g->order($splitmark.'nm DESC')->select();

		$selectgid=$cdt['f_'.$mdmk.'_'.$splitmark.'id'];
		$p=$_GET['p'];if(!$p){$p=1;}
		$start=($p-1)*$lmt+1;$over=$p*$lmt;
		$nwmark=0;
		$arr_rslt=array();$sum=0;
		foreach($gls as $gv){
			$gid=$gv[$splitmark.'id'];
			//判断是否需要遍历,只有 没有设定好gid和  设置好的gid并且对上了
			if(!$selectgid||($selectgid&&$gid==$selectgid)){
				$gnm=$gv[$splitmark.'nm'];
				//先看下总数大概多少
				$m=M($gnm.'_'.$mdmk);

				foreach($jn_same as $jnsmv){
					$m->join('tb_'.$gnm.'_'.$jnsmv);
				}

				foreach($jn as $jnv){$m->join($jnv);}
				$fld_str='';$thls=array();
				for($i=0;$i<count($fld);$i++){
					if(!in_array($fld[$i],$hide_fld)){array_push($thls, $para[$fld[$i]]);}
					if($i==0){$fld_str=$fld[$i];}else{$fld_str=$fld_str.','.$fld[$i];}
				}
				$m->field($fld_str);$this->assign('thls',$thls);
				$cdt_str='1=1';

				$str_cdt_cross=$this->crossequal($cdt_cross);
				if($str_cdt_cross){$str_cdt=$str_cdt.' '.$str_cdt_cross;}

				

				foreach($cdt as $cdtvk=>$cdtvv){
					if(strstr($cdtvk,'_')){
						$thiscdt=$cdtvk.'='.$cdtvv;
					}else if(isset($transmean[$cdtvk])){
						$thiscdt=$cdtvk.'='.$cdtvv;
					}else{$thiscdt=$cdtvk." LIKE '%".$cdtvv."%'";}
					$cdt_str=$cdt_str.' AND '.$thiscdt;
				}
				//为防止没有spccdt依然会产生()因此如果没有就干脆不搞了，当然没有spccdtls 自然也不会设置spccdt 自然也不会有下面的数据了
				if($spccdt){
					foreach($spccdt as $spccdtv){$cdt_str=$cdt_str.' AND ('.$spccdtls[$spccdtv][0].') ';}
				}
				$m->where($cdt_str);

				if($odr){
					$odr_str='';
					$i=0;foreach($odr as $odrvk=>$odrvv){if($i!=0){$odr_str=$odr_str.',';}$odr_str=$odr_str.$odrvk.' '.$odrvv;$i++;}
					$m->order($odr_str);
				}

				//此时已经可以确定多少条了
				$m_forcount=clone $m;
				$count=$m_forcount->count();

				//先是判断起始，然后是判断结束
				//先得到他的区间
				$nwstart=$nwmark+1;
				$nwover=$nwmark+$count;
				$nwmark=$nwover;//记录新起点
				$sum=$sum+$count;
				//先看起点是否落在这里头
				if($start>$nwover){
					continue;
				}else if($start<$nwstart){
					$lmt_left=0;
					
				}else{
					$lmt_left=$start-$nwstart;
				}
				if($over<$nwstart){
					continue;//理论上不能往下算了，直接BREAK，但是因为想继续获得下一个阵列的总数，不得不CONTINUE，反正下面的也会一路continue直到底的
				}else if($over>$nwover){
					$lmt_right=$nwover-$nwstart;
					
				}else{
					$lmt_right=$over-$nwstart;
				}
				$mls=$m->limit($lmt_left.','.($lmt_right-$lmt_left+1))->select();
				$arr_rslt=array_merge($arr_rslt, $mls);
			}
			
		}

		//对于cdt无论是有还是没有都必须从para中剃掉hide的属性，然后剩下的统一判断是否需要给ls
		if($defaultls==1){
			foreach ($para as $k => $v) {
				if(!in_array($k,$hide_cdt)&&strstr($k,'_')){
					
					$tmp=explode('_', $k);
					$tmp=explode('id',$tmp[2]);
					$tmp=$tmp[0];
					//联动中有这货就不能走常规路了
					if($linkage[$k]){
						$arr_display=array();
						//看看有哪些和他联动
						$str_lkg='1=1';
						foreach($linkage[$k] as $lkgk=>$lkgv){
							//由于十有八九$lkgk[eg:f_bbb_grdid]借别人来限制自己的，所以需要把字段转化成自己看得懂的字段
							$tmp_lkgk=explode('_',$lkgk);$tmp_lkgk=$tmp_lkgk[0].'_'.$tmp.'_'.$tmp_lkgk[2];
							$tmpnm=$tmp.'nm';
							if($lkgv==2){
								if($cdt[$lkgk]){
									$go=$g->where($splitmark.'id'.'='.$cdt[$lkgk])->find();
									$gnm=$go[$splitmark.'nm'];
									$tmp=$gnm.'_'.$tmp;
									$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$cdt[$lkgk];
								}else{
									$arr_display=array();break;
								}
							}else if($lkgv==1){
								if($cdt[$lkgk]){
									$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$cdt[$lkgk];
								}else{
									$arr_display=array();break;
								}
							}else if($lkgv==0){
								if($cdt[$lkgk]){
									$str_lkg=$str_lkg.' AND '.$tmp_lkgk.'='.$cdt[$lkgk];
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
				

		//分页
		import('ORG.Util.Page');
		$page=new Page($sum,$lmt);//后台管理页面默认一页显示N条记录
		$page->setConfig('prev', "&laquo; 上一页");//上一页
		$page->setConfig('next', '下一页 &raquo;');//下一页
		$page->setConfig('first', '&laquo; 首页');//第一页
		$page->setConfig('last', '末页 &raquo;');//最后一页
		$page->setConfig('theme','共%totalPage%页/%totalRow%%header% %first% %upPage%  %linkPage%  %downPage% %end%');
		//设置分页回调方法
		$show=$page->show();

		$show=str_replace("<a>", "&nbsp;<a>", $show);
		$show=str_replace("</a>", "</a>&nbsp;", $show);
		$show=str_replace("<span>", "&nbsp;<span>", $show);
		$show=str_replace("</span>", "</span>&nbsp;", $show);
		
		$this->assign('page',$show);
		//为防止没有odr依然会产生()因此如果没有就干脆不搞了，当然没有odrls 自然也不会设置odr 自然也不会有下面的数据了
		
		$this->assign('pagestart',$page->firstRow);
		
		$mls=$arr_rslt;
		
		

		return createarrok('ok',$mls,'',$info);
	}
	//交叉相等，目的是 A=B A=C B=C
	public function crossequal($arr){
		$arrequal=array();
        $cnt=count($arr);
        for($i=0;$i<$cnt;$i++){
            for($j=$i+1;$j<$cnt;$j++){
                array_push($arrequal, $arr[$i].'='.$arr[$j]);
            }
        }
        $str='';
        for($i=0;$i<count($arrequal);$i++){
            if($i==0){$str='('.$arrequal[$i];}else if($i==count($arrequal)-1){$str=$str.' AND '.$arrequal[$i].')';}else{$str=$str.' AND '.$arrequal[$i];}
        }
        return $str;
	}


	

} 
?>