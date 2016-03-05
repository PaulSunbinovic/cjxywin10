<?php
// 本类由系统自动生成，仅供测试用途
class PmjAction extends Action {

	
	//预设  para一般自身的所有以及扩展的zabojingua东西
	//聚合
    private $all=array(
    	'mdmk'=>'Pmj',//NB
  		'ttl'=>'当年排专业',
      'splitmark'=>'grd',//拆分标志是splitmark//同时splitmark肯定是其中的一项，一般只为一项
      'jn_same'=>array(),//join 相同的splitmark对应的 比如 类似于 JOIN tb_2013_stdxqcls
      //'multicorrect'=>array('f_stdxqcls_xqid','f_stdxqdm_xqid'),//多值校准，应用场景是join了连续几个差不多的tb比方说是stdxqcls stdxqdm，而他们又有字段是相关的，只有字段等于才有意义的，这样的 他们的耦合以后有一些是没用的数据，只有f_stdxqcls_xqid=f_stdxqdm_xqid一致的才合法有效，说白了目前也只有stdxqcls用到了。。。
      'multicorrect'=>array(),

  		'jn'=>array('tb_grd ON f_pmj_grdid=grdid','tb_bxxs ON f_pmj_bxxsid=bxxsid','tb_cc ON f_pmj_ccid=ccid','tb_kl ON f_pmj_klid=klid','tb_xxxs ON f_pmj_xxxsid=xxxsid','tb_zsfw ON f_pmj_zsfwid=zsfwid','tb_xz ON f_pmj_xzid=xzid','tb_mj ON f_pmj_mjid=mjid'),//NB
      //自己的全部+f的显示的东西
  		'para'=>array('pmjid'=>'PMJID','f_pmj_grdid'=>'年级','grdnm'=>'年级名称','f_pmj_bxxsid'=>'办学形式','bxxsnm'=>'办学形式名称','f_pmj_ccid'=>'层次','ccnm'=>'层次名称','f_pmj_klid'=>'科类','klnm'=>'科类名称','f_pmj_xxxsid'=>'学习形式','xxxsnm'=>'学习形式名称','f_pmj_zsfwid'=>'招生范围','zsfwnm'=>'招生范围名称','f_pmj_xzid'=>'学制','xznm'=>'学制年限','pmjdm'=>'专业代码','f_pmj_mjid'=>'专业','mjnm'=>'专业名称','pmjbbzs'=>'是否本部招生'),//NB
  		//抛去不是zabojin的属性针对para
      'notself'=>array('grdnm','bxxsnm','ccnm','klnm','xxxsnm','zsfwnm','zxnm','mjnm'),
       ##########modify 添加修改中不需要展示和理会的属性 针对para
      'no_update'=>array('pmjid','grdnm','bxxsnm','ccnm','klnm','xxxsnm','zsfwnm','zxnm','mjnm'),
      #####update的时候允许为空的值 针对zabojin刨掉不然显示的update字段后
      'allowempty'=>array('pmjdm'),

      'hide_fld'=>array('pmjid','f_pmj_grdid','f_pmj_bxxsid','f_pmj_ccid','f_pmj_klid','f_pmj_xxxsid','f_pmj_grdid','f_pmj_zsfwid','f_pmj_xzid','f_pmj_mjid'),//NB
      'hide_cdt'=>array('pmjid','grdnm','bxxsnm','ccnm','klnm','xxxsnm','zsfwnm','zxnm','mjnm'),//NB
  		
    //   'spccdtls'=>array('spccdt_0'=>array('bbbid<>0','bbbID不为0【废话只是测试】')),
  		// 'odrls'=>array('bbbnm'),
    //   'spccdt_dflt'=>array('spccdt_0'),
    //   'odr_dflt'=>array('bbbnm'=>'ASC'),

      'spccdtls'=>array(),//NB
      'odrls'=>array(),//NB
      'spccdt_dflt'=>array(),//NB
      'odr_dflt'=>array(),//NB
      //hide的fld必须有，他们虽然不显示但是必须选择，这样才能在第一次进入query的时候，隐藏属性可以被调用，特别是id和fid
  		'fld_dflt'=>array('pmjid','f_pmj_grdid','grdnm','f_pmj_bxxsid','bxxsnm','f_pmj_ccid','ccnm','f_pmj_klid','klnm','f_pmj_xxxsid','xxxsnm','f_pmj_zsfwid','zsfwnm','f_pmj_xzid','xznm','pmjdm','f_pmj_mjid','mjnm','pmjbbzs'),//NB
  		'cdt_dflt'=>array(),//NB
  		
  		'lmt_dflt'=>10,//NB
  		
  		'defaultls'=>1,//默认枚举//NB
  		##########view
  		'no_view'=>array('pmjid','f_pmj_grdid','f_pmj_bxxsid','f_pmj_ccid','f_pmj_klid','f_pmj_xxsid','f_pmj_grdid','f_pmj_zsfwid','f_pmj_xzid','f_pmj_mjid'),
	   
      #########删除提醒
      'deleteconfirm'=>'确定要删除此条记录？',
      #####转义
      'transmean'=>array('xznm'=>array('2.5'=>'2.5','3'=>'3','5'=>'5'),'pmjbbzs'=>array('0'=>'否','1'=>'是')),//NB
      #####默认值
      'dfltvalue'=>array('pmjbbzs'=>'0'),
      ####这里新建对照表 也就是联动机制，谁被谁影响，用户select效果极佳
      ###example
      'linkage'=>array(),
      ########这里是谁影响谁，用在AJAX联动 效果极佳
      'impactfactor'=>array(),
      
    	);

    //公版
    public function query(){
    	header("Content-Type:text/html; charset=utf-8");
    	$pb=D('PB');
    	$pb->queryBBB($this->all);
      $this->display('CmnBBB:query');
  
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
    	$pb=D('PB');
    	$pb->updateBBB($this->all);
		  $this->display('CmnBBB:update');
   	}

   	//公版
   	public function doupdate(){
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
      $pb=D('PB');
      $arr=$pb->dolinkage($this->all);
      
      $data=$arr['data'];
      
      $this->ajaxReturn($data,'json');
    }

}