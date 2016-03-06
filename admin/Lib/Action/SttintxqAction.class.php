<?php
// 本类由系统自动生成，仅供测试用途
class SttintxqAction extends Action {

	
	//预设  para一般自身的所有以及扩展的zabojingua东西
	//聚合
    private $all=array(
    	'mdmk'=>'Sttintxq',//NB
  		'ttl'=>'站点首学期',
      'splitmark'=>'grd',//拆分标志是splitmark//同时splitmark肯定是其中的一项，一般只为一项
      'jn_same'=>array(),//join 相同的splitmark对应的 比如 类似于 JOIN tb_2013_stdxqcls
      //'multicorrect'=>array('f_stdxqcls_xqid','f_stdxqdm_xqid'),//多值校准，应用场景是join了连续几个差不多的tb比方说是stdxqcls stdxqdm，而他们又有字段是相关的，只有字段等于才有意义的，这样的 他们的耦合以后有一些是没用的数据，只有f_stdxqcls_xqid=f_stdxqdm_xqid一致的才合法有效，说白了目前也只有stdxqcls用到了。。。
      'multicorrect'=>array(),

  		'jn'=>array('tb_grd ON f_sttintxq_grdid=grdid','tb_stt ON f_sttintxq_sttid=sttid','tb_xq ON f_sttintxq_xqid=xqid'),//NB
      //自己的全部+f的显示的东西
  		'para'=>array('sttintxqid'=>'STDINTXQID','f_sttintxq_grdid'=>'年级','grdnm'=>'年级名称','f_sttintxq_sttid'=>'站点','sttnm'=>'站点名称','f_sttintxq_xqid'=>'首学期','xqnm'=>'首学期名称','sttintxqyes'=>'是否改名第X学期'),//NB
  		//抛去不是zabojin的属性针对para
      'notself'=>array('grdnm','sttnm','xqnm'),
       ##########modify 添加修改中不需要展示和理会的属性 针对para
      'no_update'=>array('sttintxqid','grdnm','sttnm','xqnm'),
      #####update的时候允许为空的值 针对zabojin刨掉不然显示的update字段后
      'allowempty'=>array(),

      'hide_fld'=>array('sttintxqid','f_sttintxq_grdid','f_sttintxq_sttid','f_sttintxq_xqid'),//NB
      'hide_cdt'=>array('sttintxqid','grdnm','sttnm','xqnm'),//NB
  		
    //   'spccdtls'=>array('spccdt_0'=>array('bbbid<>0','bbbID不为0【废话只是测试】')),
  		// 'odrls'=>array('bbbnm'),
    //   'spccdt_dflt'=>array('spccdt_0'),
    //   'odr_dflt'=>array('bbbnm'=>'ASC'),

      'spccdtls'=>array(),//NB
      'odrls'=>array(),//NB
      'spccdt_dflt'=>array(),//NB
      'odr_dflt'=>array(),//NB
      //hide的fld必须有，他们虽然不显示但是必须选择，这样才能在第一次进入query的时候，隐藏属性可以被调用，特别是id和fid
  		'fld_dflt'=>array('sttintxqid','f_sttintxq_grdid','grdnm','f_sttintxq_sttid','sttnm','f_sttintxq_xqid','xqnm','sttintxqyes'),//NB
  		'cdt_dflt'=>array(),//NB
  		
  		'lmt_dflt'=>10,//NB
  		
  		'defaultls'=>1,//默认枚举//NB
  		##########view
  		'no_view'=>array('sttintxqid','f_sttintxq_grdid','f_sttintxq_sttid','f_sttintxq_xqid'),
	   
      #########删除提醒
      'deleteconfirm'=>'确定要删除此条记录？',
      #####转义
      'transmean'=>array('sttintxqyes'=>array('0'=>'否','1'=>'是')),//NB
      #####默认值
      'dfltvalue'=>array('sttintxqyes'=>1),
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