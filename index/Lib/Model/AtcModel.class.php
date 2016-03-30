<?php
class AtcModel extends Action{
	//test
	//
	//############test
	public function getmls($atcps,$atctype,$bdid){
		$info=collectinfo(__METHOD__,'$atcps,$atctype,$bdid',array($atcps,$atctype,$bdid));
		$tree=D('Tree');$bd=D('Bd');

		$str_where='1=1';
		if($atcps){$str_where=$str_where.' AND atcps='.$atcps;}
		if($atctype){if($atctype==1){$str_where=$str_where.' AND atcanc=1';}else if($atctype==2){$str_where=$str_where.' AND atcdnmc=1';}}
		if($bdid){
			$arr_bdls=$bd->getmlsbyodr('bdodr ASC');$bdls=$arr_bdls['data'];
		  	$bdidls=$tree->unlimitedForListID($bdls,$bdid,'bdid','bdnm','bdpid','bdodr');
		  	array_push($bdidls,$bdid);

		  	$str_bd='(1=2';
		  	foreach($bdidls as $bdidv){$str_bd=$str_bd.' OR bdid='.$bdidv;}
		  	$str_bd=$str_bd.')';

		  	$str_where=$str_where.' AND '.$str_bd;
		}
		
		$atc=M('atc');
		$atcls=$atc->join('tb_bd ON f_atc_bdid=bdid')->where($str_where)->order('atctp DESC,atcmdftm DESC')->limit('0,8')->select();
		$atclsnw=array();
    	foreach($atcls as $atcv){
    		$tm=$atcv['atcmdftm'];
    		$str=strtotime($tm);
    		$tm=date('Y/m/d',$str);
    		$atcv['tm']=$tm;
    		array_push($atclsnw,$atcv);
    	}
		
		return createarrok('ok',$atclsnw,'',$info);
	}

	public function getmo($atcid){
		$info=collectinfo(__METHOD__,'$atcid',array($atcid));
		if(isset($atcid)===false){return createarrerr('error_code','atcid 不能为空',$info);}//防止NULL
		
		$atc=M('atc');
		$atco=$atc->join('tb_bd ON f_atc_bdid=bdid')->where('atcid='.$atcid)->find();

		
		return createarrok('ok',$atco,'',$info);
	}

	public function addatccnt($origincnt,$atcid){
		$info=collectinfo(__METHOD__,'$origincnt,$atcid',array($origincnt,$atcid));
		if(isset($origincnt)===false){return createarrerr('error_code','origincnt 不能为空',$info);}//防止NULL
		if(isset($atcid)===false){return createarrerr('error_code','atcid 不能为空',$info);}//防止NULL

		$atc=M('atc');
		$nwcnt=$origincnt+1;
		$dt=array('atccnt'=>$nwcnt);
		$atc->where('atcid='.$atcid)->setField($dt);

		return createarrok('ok',$nwcnt,'',$info);
	}

	public function getmlsbyquery($cdt,$lmt){
		$info=collectinfo(__METHOD__,'$cdt,$lmt',array($cdt,$lmt));
		if(isset($cdt)===false){return createarrerr('error_code','cdt 不能为空',$info);}//防止NULL
		if(isset($lmt)===false){return createarrerr('error_code','lmt 不能为空',$info);}//防止NULL
		
		$atc=M('atc');
		$where='atcps=1 AND '.$cdt;

		$count=$atc->where($where)->count();

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
		$atcls=$atc->join('tb_bd ON f_atc_bdid=bdid')->where($where)->order('atctp DESC,atcmdftm DESC')->limit($page->firstRow.','.$page->listRows)->select();

		$atclsnw=array();
		foreach($atcls as $atcv){
    		$tm=$atcv['atcmdftm'];
    		$str=strtotime($tm);
    		$tm=date('Y/m/d',$str);
    		$atcv['tm']=$tm;
    		array_push($atclsnw,$atcv);
    	}


		return createarrok('ok',$atclsnw,'',$info);
	}


	public function getmlsbyfocus(){
		$info=collectinfo(__METHOD__,'',array());
		
		$atc=M('atc');
		$atcls=$atc->where('atcps=1 AND atccv IS NOT NULL AND atcdnmc=1')->order('atctp DESC,atcmdftm DESC')->limit('0,4')->select();
		$atclsnw=array();
    	foreach($atcls as $atcv){
    		$tm=$atcv['atcmdftm'];
    		$str=strtotime($tm);
    		$tm=date('Y/m/d',$str);
    		$atcv['tm']=$tm;
    		array_push($atclsnw,$atcv);
    	}
		
		return createarrok('ok',$atclsnw,'',$info);
	}
	

} 
?>