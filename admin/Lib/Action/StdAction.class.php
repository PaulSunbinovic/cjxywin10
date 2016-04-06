<?php
// 本类由系统自动生成，仅供测试用途
class StdAction extends Action {

	
	//预设  para一般自身的所有以及扩展的zabojingua东西
	//聚合
    private $all=array(
    	'mdmk'=>'Std',//NB
  		'ttl'=>'学生',
      'splitmark'=>'grd',//拆分标志是splitmark//同时splitmark肯定是其中的一项，一般只为一项
      'jn_same'=>array('stdxqpmj ON stdid=f_stdxqpmj_stdid','stdxqpcls ON stdid=f_stdxqpcls_stdid','stdxqdm ON stdid=f_stdxqdm_stdid','pmj ON f_stdxqpmj_pmjid=pmjid','pcls ON f_stdxqpcls_pclsid=pclsid','cls ON f_pcls_clsid=clsid'),//join 相同的splitmark对应的 比如 类似于 JOIN tb_2013_stdxqcls
      //'multicorrect'=>array('f_stdxqcls_xqid','f_stdxqdm_xqid'),//多值校准，应用场景是join了连续几个差不多的tb比方说是stdxqcls stdxqdm，而他们又有字段是相关的，只有字段等于才有意义的，这样的 他们的耦合以后有一些是没用的数据，只有f_stdxqcls_xqid=f_stdxqdm_xqid一致的才合法有效，说白了目前也只有stdxqcls用到了。。。
      'multicorrect'=>array('f_stdxqpmj_xqid','f_stdxqpcls_xqid','f_stdxqdm_xqid'),

  		'jn'=>array('tb_xq ON f_stdxqpmj_xqid=xqid','tb_stt ON f_std_sttid=sttid','tb_grd ON f_std_grdid=grdid','tb_sex ON f_std_sexid=sexid','tb_rc ON f_std_rcid=rcid','tb_zzmm ON f_std_zzmmid=zzmmid','tb_xl ON f_std_xlid=xlid','tb_stat ON f_std_statid=statid','tb_bxxs ON f_pmj_bxxsid=bxxsid','tb_cc ON f_pmj_ccid=ccid','tb_kl ON f_pmj_klid=klid','tb_xxxs ON f_pmj_xxxsid=xxxsid','tb_zsfw ON f_pmj_zsfwid=zsfwid','tb_xz ON f_pmj_xzid=xzid','tb_mj ON f_pmj_mjid=mjid','tb_dm ON f_stdxqdm_dmid=dmid'),//NB
      //自己的全部+f的显示的东西
  		'para'=>array('stdid'=>'stdID','f_std_sttid'=>'站点','sttnm'=>'站点','f_std_grdid'=>'年级','grdnm'=>'年级','f_stdxqpmj_xqid'=>'学期','xqnm'=>'学期','f_pmj_bxxsid'=>'办学形式','bxxsnm'=>'办学形式','f_pmj_ccid'=>'层次','ccnm'=>'层次','f_pmj_klid'=>'科类','klnm'=>'科类','f_pmj_xxxsid'=>'学习形式','xxxsnm'=>'学习形式','f_pmj_zsfwid'=>'招生范围','zsfwnm'=>'招生范围','f_pmj_xzid'=>'学制','xznm'=>'学制','f_stdxqpmj_pmjid'=>'专业','mjnm'=>'专业','f_stdxqpcls_pclsid'=>'班级','clsnm'=>'班级','f_stdxqdm_dmid'=>'住宿','dmnm'=>'住宿','f_std_statid'=>'状态','statnm'=>'状态','stdaplno'=>'报名号','stdno'=>'学号','stdupfnctm'=>'上传财务时间','stdnm'=>'姓名','stdpw'=>'密码','stdpt'=>'照片','f_std_sexid'=>'性别','sexnm'=>'性别','f_std_rcid'=>'民族','rcnm'=>'民族','f_std_zzmmid'=>'政治面貌','zzmmnm'=>'政治面貌','stdnp'=>'籍贯','stdbtd'=>'出生年月','stdsol'=>'文理科','stdcee'=>'高考成绩','stdsog'=>'毕业学校','stdqq'=>'QQ','f_std_xlid'=>'学历','xlnm'=>'学历','stdidcd'=>'身份证号码','stdcp'=>'手机号码','stdrlta'=>'家长一','stdrltanm'=>'家长一姓名','stdrltaocpt'=>'家长一职业','stdrltacp'=>'家长一电话','stdrltb'=>'家长二','stdrltbnm'=>'家长二姓名','stdrltbocpt'=>'家长二职业','stdrltbcp'=>'家长二电话','stdhb'=>'好爱','stdpst'=>'邮编','stdads'=>'地址','stdmdftm'=>'修改时间','stdaddtm'=>'添加时间','stdtlp'=>'固话','stdpertm'=>'预录取时间','stdertm'=>'录取时间','stdicbc'=>'工行卡号','stdrcmdnm'=>'推荐人姓名','stdrcmdcp'=>'推荐人手机号','stdpnttm'=>'打印时间'),//NB
  		//抛去不是zabojin的属性针对para
      'notself'=>array('sttnm','grdnm','f_stdxqpmj_xqid','xqnm','f_pmj_bxxsid','bxxsnm','f_pmj_ccid','ccnm','f_pmj_klid','klnm','f_pmj_xxxsid','xxxsnm','f_pmj_zsfwid','zsfwnm','f_pmj_xzid','xznm','mjnm','f_stdxqpmj_pmjid','mjnm','f_stdxqpcls_pclsid','clsnm','f_stdxqdm_dmid','dmnm','sexnm','rcnm','zzmmnm','xlnm','statnm'),
       ##########modify 添加修改中不需要展示和理会的属性 针对para
      'no_update'=>array('stdid','sttnm','grdnm','xqnm','bxxsnm','ccnm','klnm','xxxsnm','zsfwnm','xznm','mjnm','clsnm','dmnm','statnm','sexnm','rcnm','zzmmnm','xlnm'),
      #####update的时候允许为空的值 针对zabojin刨掉不然显示的update字段后
      'allowempty'=>array('f_pmj_bxxsid','f_pmj_ccid','f_pmj_klid','f_pmj_xxxsid','f_pmj_zsfwid','f_pmj_xzid','stdaplno','stdno','stdupfnctm','stdsol','stdcee','stdsog','stdqq','f_std_xlid','stdcp','stdtlp','stdpertm','stdertm','stdicbc','stdrcmdnm','stdrcmdcp','stdpnttm'),

      'hide_fld'=>array('stdid','f_std_sttid','f_std_grdid','f_stdxqpmj_xqid','f_pmj_bxxsid','f_pmj_ccid','f_pmj_klid','f_pmj_xxxsid','f_pmj_zsfwid','f_pmj_xzid','f_stdxqpmj_pmjid','f_stdxqpcls_pclsid','f_stdxqdm_dmid','f_std_sexid','f_std_rcid','f_std_zzmmid','f_std_xlid','f_std_statid'),//NB
      'hide_cdt'=>array('stdid','sttnm','grdnm','xqnm','bxxsnm','ccnm','klnm','xxxsnm','zsfwnm','xznm','mjnm','clsnm','dmnm','sexnm','rcnm','zzmmnm','xlnm','statnm'),//NB
  		
    //   'spccdtls'=>array('spccdt_0'=>array('bbbid<>0','bbbID不为0【废话只是测试】')),
  		// 'odrls'=>array('bbbnm'),
    //   'spccdt_dflt'=>array('spccdt_0'),
    //   'odr_dflt'=>array('bbbnm'=>'ASC'),

      'spccdtls'=>array(),//NB
      'odrls'=>array('clsnm','mjnm','stdno'),//NB
      'spccdt_dflt'=>array(),//NB
      'odr_dflt'=>array('clsnm'=>'ASC','mjnm'=>'ASC','stdno'=>'ASC'),//NB
      //hide的fld必须有，他们虽然不显示但是必须选择，这样才能在第一次进入query的时候，隐藏属性可以被调用，特别是id和fid
  		'fld_dflt'=>array('stdid','f_std_sttid','sttnm','f_std_grdid','grdnm','f_stdxqpmj_xqid','xqnm','f_stdxqpmj_pmjid','f_pmj_bxxsid','bxxsnm','f_pmj_ccid','f_pmj_klid','f_pmj_xxxsid','f_pmj_zsfwid','f_pmj_xzid','mjnm','f_stdxqpcls_pclsid','clsnm','f_std_statid','statnm','f_stdxqdm_dmid','dmnm','stdno','stdnm','stdpt','f_std_sexid','f_std_rcid','f_std_zzmmid'),//NB
  		'cdt_dflt'=>array('f_std_statid'=>5),//NB
  		
  		'lmt_dflt'=>10,//NB
  		
  		'defaultls'=>1,//默认枚举//NB
  		##########view
  		'no_view'=>array('stdid','f_std_sttid','f_std_grdid','f_stdxqpmj_xqid','f_pmj_bxxsid','f_pmj_ccid','f_pmj_klid','f_pmj_xxxsid','f_pmj_zsfwid','f_pmj_xzid','f_stdxqpmj_pmjid','f_stdxqpcls_pclsid','f_stdxqdm_dmid','f_std_statid','stdpw','f_std_sexid','f_std_rcid','f_std_zzmmid','f_std_xlid'),
	   
      #########删除提醒
      'deleteconfirm'=>'确定要删除此条记录？',
      #####转义
      'transmean'=>array(),//NB
      #####默认值
      'dfltvalue'=>array(),
      ####这里新建对照表 也就是联动机制，谁被谁影响，用户select效果极佳
      ###example
      'linkage'=>array('f_stdxqpmj_pmjid'=>array('f_std_grdid'=>2,'f_pmj_bxxsid'=>0,'f_pmj_ccid'=>0,'f_pmj_klid'=>0,'f_pmj_xxxsid'=>0,'f_pmj_zsfwid'=>0,'f_pmj_xzid'=>0,'f_std_sttid'=>1),'f_stdxqpcls_pclsid'=>array('f_std_grdid'=>2,'f_stdxqpmj_xqid'=>1,'f_std_sttid'=>1)),//如果ccc的变换需要转换成2015_ccc 就是2  否则如果是1 非2情况下联动没有值，不允许下拉，3联动不造成下拉有无
      ########这里是谁影响谁，用在AJAX联动 效果极佳
      'impactfactor'=>array('f_std_sttid','f_std_grdid','f_stdxqpmj_xqid','f_pmj_bxxsid','f_pmj_ccid','f_pmj_klid','f_pmj_xxxsid','f_pmj_zsfwid','f_pmj_xzid'),
      
    	);

    //
    public function query(){
    	header("Content-Type:text/html; charset=utf-8");
    	$pb=D('PB');$usr=D('Usr');$xq=D('Xq');$grd=D('Grd');$stat=D('Stat');$std=D('Std');
      //需要改变一些参数
      $all=$this->all;
      //给出默认站点 默认年级（全部遍历确实太慢了） 默认学期 
      $arr_usro=$usr->getusrobyusrid(session('usridss'));$usro=$arr_usro['data'];
      $sttid=$usro['f_usr_sttid'];$all['cdt_dflt']['f_std_sttid']=$sttid;
      $arr_grdo=$grd->getgrdobydflt();$grdo=$arr_grdo['data'];
      $grdid=$grdo['grdid'];$all['cdt_dflt']['f_std_grdid']=$grdid;
      $arr_xqo=$xq->getxqobydq();$xqo=$arr_xqo['data'];
      $xqid=$xqo['xqid'];$all['cdt_dflt']['f_stdxqpmj_xqid']=$xqid;

    	$pb->queryBBB($all);

      //覆盖下stat列表
      $arr_statls=$stat->getstatlsbyjiaowu();$statls=$arr_statls['data'];
      $this->assign('f_std_statid',$statls);


      //专门针对联动初始值
      $get=$all['cdt_dflt'];
      $std->initlinkage($all,$get);

      $this->display('query');


  
    }
    
    //公版
    public function view(){
    	header("Content-Type:text/html; charset=utf-8");
    	$pb=D('PB');
    	$pb->viewBBB($this->all);
		  $this->display('CmnBBB:view');
    }
   
   	//公版
   	public function update(){
   		header("Content-Type:text/html; charset=utf-8");
    	$pb=D('PB');$std=D('Std');
    	$arr_mo=$pb->updateBBB($this->all);$mo=$arr_mo['data'];

      //专门针对联动初始值
      $get=$mo;
      $std->initlinkage($this->all,$get);

		  $this->display('CmnBBB:update');
   	}

   	//公版
   	public function doupdate(){p(111);die;
   		header("Content-Type:text/html; charset=utf-8");
   		$pb=D('PB');
   		$arr_pattern=$pb->doupdateBBB($this->all);
   		$data['pattern']=$arr_pattern['pattern'];

   		$this->ajaxReturn($data,'json');
   	}

   	//公版
   	public function dodelete(){
   		header("Content-Type:text/html; charset=utf-8");
   		$pb=D('PB');
   		$pb->dodeleteBBB($this->all);
  		
   		$this->ajaxReturn($data,'json');
   	}

    //公版
    public function dolinkage(){
      header("Content-Type:text/html; charset=utf-8");
      $std=D('Std');
      $arr=$std->dolinkage($this->all);
      
      $data=$arr['data'];
      
      $this->ajaxReturn($data,'json');
    }

}