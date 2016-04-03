<?php
// 本类由系统自动生成，仅供测试用途
class ZsszAction extends Action {

	
	//预设  para一般自身的所有以及扩展的zabojingua东西
	//聚合
    private $all=array(
    	'mdmk'=>'Zssz',//NB
  		'ttl'=>'招生设置',
  		'jn'=>array('tb_grd ON f_zssz_grdid=grdid','tb_xq ON f_zssz_xqid=xqid'),//NB
      //自己的全部+f的显示的东西
  		'para'=>array('zsszid'=>'zsszID','f_zssz_grdid'=>'年级','grdnm'=>'年级名称','f_zssz_xqid'=>'学期','xqnm'=>'学期名称','zsszop'=>'招生是否开始','zsszjztm'=>'截止时间','zsszxnltm'=>'当年小年龄时间'),//NB
  		//抛去不是zabojin的属性针对para
      'notself'=>array('grdnm','xqnm'),
       ##########modify 添加修改中不需要展示和理会的属性 针对para
      'no_update'=>array('zsszid','grdnm','xqnm'),
      #####update的时候允许为空的值 针对zabojin刨掉不然显示的update字段后
      'allowempty'=>array(),

      'hide_fld'=>array('zsszid','f_zssz_grdid','f_zssz_xqid'),//NB
      'hide_cdt'=>array('zsszid','grdnm','xqnm'),//NB
  		
    //   'spccdtls'=>array('spccdt_0'=>array('aaid<>0','aaID不为0【废话只是测试】')),
  		// 'odrls'=>array('aanm'),
    //   'spccdt_dflt'=>array('spccdt_0'),
    //   'odr_dflt'=>array('aanm'=>'ASC'),

      'spccdtls'=>array(),//NB
      'odrls'=>array(),//NB
      'spccdt_dflt'=>array(),//NB
      'odr_dflt'=>array(),//NB
      //hide的fld必须有，他们虽然不显示但是必须选择，这样才能在第一次进入query的时候，隐藏属性可以被调用，特别是id和fid
  		'fld_dflt'=>array('zsszid','f_zssz_grdid','grdnm','f_zssz_xqid','xqnm','zsszop','zsszjztm','zsszxnltm'),//NB
  		'cdt_dflt'=>array(),//NB
  		
  		'lmt_dflt'=>10,//NB
  		
  		'defaultls'=>1,//默认枚举//NB
  		##########view
  		'no_view'=>array('zsszid','f_zssz_grdid','f_zssz_xqid'),
	   
      #########删除提醒
      'deleteconfirm'=>'确定要删除此条记录？',
      #####转义
      'transmean'=>array('zsszop'=>array('0'=>'否','1'=>'是')),//NB
      #####默认值
      'dfltvalue'=>array(),
      
    	);

    //公版
    public function query(){
    	header("Content-Type:text/html; charset=utf-8");
    	$pb=D('PB');
    	$pb->query($this->all);
      $this->display('Cmn:query');
  
    }
    
    //公版
    public function view(){
    	header("Content-Type:text/html; charset=utf-8");
    	$pb=D('PB');
    	$pb->view($this->all);
		  $this->display('Cmn:view');
    }
   
   	//公版
   	public function update(){
   		header("Content-Type:text/html; charset=utf-8");
    	$pb=D('PB');
    	$pb->update($this->all);
		  $this->display('Cmn:update');
   	}

   	//公版
   	public function doupdate(){
   		header("Content-Type:text/html; charset=utf-8");
   		$pb=D('PB');
   		$arr_pattern=$pb->doupdate($this->all);
   		$data['pattern']=$arr_pattern['pattern'];

   		$this->ajaxReturn($data,'json');
   	}

   	//公版
   	public function dodelete(){
   		header("Content-Type:text/html; charset=utf-8");
   		$pb=D('PB');
   		$pb->dodelete($this->all);
  		
   		$this->ajaxReturn($data,'json');
   	}

}