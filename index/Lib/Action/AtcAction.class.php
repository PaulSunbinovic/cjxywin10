<?php
class AtcAction extends Action {
    public function view(){
    	header("Content-Type:text/html; charset=utf-8");
    	//dingzhis
      	$environment=D('Environment');$atc=D('Atc');$tree=D('Tree');$bd=D('Bd');

        //$arr_usross=$environment->setenvironment($mdmk);$usross=$arr_usross['data'];
      
      	$atcid=$_GET['atcid'];
      	$arr_mo=$atc->getmo($atcid);$mo=$arr_mo['data'];

      	//先砍掉再说
      	// $arr_bdls=$bd->getmlsbyodr('bdodr ASC');$bdls=$arr_bdls['data'];
      	// $str=$tree->findF($bdls, $mo['f_atc_bdid'], 'bdid','bdnm','bdpid');
      	// $this->assign('tree',$str);
      	
      	//取而代之的是上方的高亮
      	$atctype=$_GET['atctype'];
      	if($atctype==1){
      		$atctype='tzgg';
      	}else if($atctype==2){
      		$atctype='yxdt';
      	}else{
      		$bdid=$mo['f_atc_bdid'];
      		switch ($bdid) {
      			case '15':
      				$atctype='hsdy';
      				break;
      			
      			case '16':
      				$atctype='jxjy';
      				break;

      			case '17':
      				$atctype='zkzx';
      				break;

      			case '18':
      				$atctype='dqhd';
      				break;
      			
      			case '19':
      				$atctype='jgzc';
      				break;

      			case '20':
      				$atctype='xsfc';
      				break;

      			case '21':
      				$atctype='zxrd';
      				break;	
      		}
      	}
      	$this->assign('atctype',$atctype);

      	//对文章内容进行小调整
      	$imgrule='/<img.*src=(\"|\')(.+)\1.*>/U';//图片规则
      	if (preg_match_all($imgrule,$mo['atcctt'],$quote)){
        	//p($quote);die;//$quote平时可以随意查看，有帮助，特别是$quoto[1]代表了啥，2代表了啥，0代表了啥
        	for($i=0;$i<count($quote[0]);$i++){
          	if(!preg_match("/icon_/", $quote[2][$i]))
          		$mo['atcctt']=str_replace($quote[0][$i], "<a href='".$quote[2][$i]."'>".$quote[0][$i].'</a>', $mo['atcctt']);
        	}
      	}

      	$arr_nwcnt=$atc->addatccnt($mo['atccnt'],$atcid);$nwcnt=$arr_nwcnt['data'];
      	$mo['atccnt']=$nwcnt;

     
      
      	$this->assign('mo',$mo);
      	$this->assign('ttl',$mo['atctpc']);

      	//dingzhio
      	$this->assign('title',C('title'));
	  	$this->display('view');
    }
}