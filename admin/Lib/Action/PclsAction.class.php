<?php
// 本类由系统自动生成，仅供测试用途
class PclsAction extends Action {

	
	//预设  para一般自身的所有以及扩展的zabojingua东西
	//聚合
    private $all=array(
    	'mdmk'=>'Pcls',//NB
  		'ttl'=>'排班级',
      'splitmark'=>'grd',//拆分标志是splitmark//同时splitmark肯定是其中的一项，一般只为一项
      'jn_same'=>array('cls ON f_pcls_clsid=clsid'),//join 相同的splitmark对应的 比如 类似于 JOIN tb_2013_stdxqcls
      //'multicorrect'=>array('f_stdxqcls_xqid','f_stdxqdm_xqid'),//多值校准，应用场景是join了连续几个差不多的tb比方说是stdxqcls stdxqdm，而他们又有字段是相关的，只有字段等于才有意义的，这样的 他们的耦合以后有一些是没用的数据，只有f_stdxqcls_xqid=f_stdxqdm_xqid一致的才合法有效，说白了目前也只有stdxqcls用到了。。。
      'multicorrect'=>array(),

  		'jn'=>array('tb_grd ON f_pcls_grdid=grdid','tb_xq ON f_pcls_xqid=xqid','tb_stt ON f_cls_sttid=sttid','tb_usr ON f_pcls_usrid=usrid'),//NB
      //自己的全部+f的显示的东西
  		'para'=>array('pclsid'=>'pclsID','f_pcls_grdid'=>'年级','f_cls_sttid'=>'站点','sttnm'=>'站点名称','grdnm'=>'年级名称','f_pcls_xqid'=>'学期','xqnm'=>'学期名称','f_pcls_clsid'=>'班级','clsnm'=>'班级名称','f_pcls_usrid'=>'用户','usrnn'=>'用户实名'),//NB
  		//抛去不是zabojin的属性针对para
      'notself'=>array('grdnm','f_cls_sttid','sttnm','xqnm','clsnm','usrnn'),
       ##########modify 添加修改中不需要展示和理会的属性 针对para
      'no_update'=>array('pclsid','grdnm','sttnm','xqnm','clsnm','usrnn'),
      #####update的时候允许为空的值 针对zabojin刨掉不然显示的update字段后
      'allowempty'=>array(),

      'hide_fld'=>array('pclsid','f_pcls_grdid','f_cls_sttid','f_pcls_xqid','f_pcls_clsid','f_pcls_usrid'),//NB
      'hide_cdt'=>array('pclsid','grdnm','sttnm','xqnm','clsnm','usrnn'),//NB
  		
    //   'spccdtls'=>array('spccdt_0'=>array('bbbid<>0','bbbID不为0【废话只是测试】')),
  		// 'odrls'=>array('bbbnm'),
    //   'spccdt_dflt'=>array('spccdt_0'),
    //   'odr_dflt'=>array('bbbnm'=>'ASC'),

      'spccdtls'=>array(),//NB
      'odrls'=>array('grdnm','xqnm','clsnm'),//NB
      'spccdt_dflt'=>array(),//NB
      'odr_dflt'=>array('grdnm'=>'DESC','xqnm'=>'DESC','clsnm'=>'DESC'),//NB
      //hide的fld必须有，他们虽然不显示但是必须选择，这样才能在第一次进入query的时候，隐藏属性可以被调用，特别是id和fid
  		'fld_dflt'=>array('pclsid','f_pcls_grdid','grdnm','f_cls_sttid','sttnm','f_pcls_xqid','xqnm','f_pcls_clsid','clsnm','f_pcls_usrid','usrnn'),//NB
  		'cdt_dflt'=>array(),//NB
  		
  		'lmt_dflt'=>10,//NB
  		
  		'defaultls'=>1,//默认枚举//NB
  		##########view
  		'no_view'=>array('pclsid','f_pcls_grdid','f_cls_sttid','f_pcls_xqid','f_pcls_clsid','f_pcls_usrid'),
	   
      #########删除提醒
      'deleteconfirm'=>'确定要删除此条记录？',
      #####转义
      'transmean'=>array(),//NB
      #####默认值
      'dfltvalue'=>array(),
      ####这里新建对照表 也就是联动机制，谁被谁影响，用户select效果极佳
      ###example
      'linkage'=>array('f_pcls_clsid'=>array('f_pcls_grdid'=>2),'f_pcls_usrid'=>array('f_cls_sttid'=>1)),//如果ccc的变换需要转换成2015_ccc 就是2  否则如果是1 非2情况下联动没有值，不允许下拉，3联动不造成下拉有无
      ########这里是谁影响谁，用在AJAX联动 效果极佳
      'impactfactor'=>array('f_pcls_grdid','f_cls_sttid'),
      
    	);

    //公版
    public function query(){
    	header("Content-Type:text/html; charset=utf-8");
    	$pb=D('PB');
    	$pb->queryBBB($this->all);
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
    	$pb=D('PB');
    	$pb->updateBBB($this->all);
		  $this->display('update');
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