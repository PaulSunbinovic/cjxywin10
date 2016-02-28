<?php
// 本类由系统自动生成，仅供测试用途
class TestAction extends Action {
    public function test(){
    	header("Content-Type:text/html; charset=utf-8");
		$str='aaa bbb';
		$str=urlencode($str);
		$url='localhost/xxx/admin.php/Test/monihoutai/str/'.$str;
		url2arr($url,'');
    }
    public function monihoutai(){
    	$str=$_GET['str'];echo $str.'111';
    }
    public function setath(){
        $md=M('md');$ath=M('ath');
        $mdls=$md->select();
        foreach($mdls as $mdv){
            $dt=array(
                'f_ath_rlid'=>1,
                'f_ath_mdid'=>$mdv['mdid'],
                'atha'=>0,
                'athd'=>0,
                'athm'=>0,
                'athv'=>0,
                'aths'=>0
                );
            $ath->data($dt)->add();
        }
    }
    public function deleteMOKUAIWENZI(){
        $md=M('md');
        $mdls=$md->select();

        foreach($mdls as $mdv){
            $mdid=$mdv['mdid'];$mdnm=$mdv['mdnm'];
            if( strstr($mdnm,'模块')){
                $tmp=explode('模块',$mdnm);
                $dt=array('mdnm'=>$tmp[0]);
                $md->where('mdid='.$mdid)->setField($dt);
            }
        }
    }
    public function tilianmj(){
        $mj2013=M('2013_mj');$mj2014=M('2014_mj');$mj2015=M('2015_mj');
        $mj=M('mj');$mjmap=M('mjmap');
        #################
        $mjls=$mj2013->select();
        foreach($mjls as $mjv){
            //判断mj数据库是否有这个
            $count=$mj->where("mjnm='".$mjv['mjnm']."'")->count();
            if($count==0){
                $dt=array('mjnm'=>$mjv['mjnm']);
                $mj->data($dt)->add();
            }
            $mjo=$mj->where("mjnm='".$mjv['mjnm']."'")->find();
            $dt=array('year'=>'2013','oldmjid'=>$mjv['mjid'],'oldmjnm'=>$mjv['mjnm'],'nwmjid'=>$mjo['mjid'],'nwmjnm'=>$mjo['mjnm']);
            $mjmap->data($dt)->add();
        }
        #################
        $mjls=$mj2014->select();
        foreach($mjls as $mjv){
            //判断mj数据库是否有这个
            $count=$mj->where("mjnm='".$mjv['mjnm']."'")->count();
            if($count==0){
                $dt=array('mjnm'=>$mjv['mjnm']);
                $mj->data($dt)->add();
            }
            $mjo=$mj->where("mjnm='".$mjv['mjnm']."'")->find();
            $dt=array('year'=>'2014','oldmjid'=>$mjv['mjid'],'oldmjnm'=>$mjv['mjnm'],'nwmjid'=>$mjo['mjid'],'nwmjnm'=>$mjo['mjnm']);
            $mjmap->data($dt)->add();
        }
        #################
        $mjls=$mj2015->select();
        foreach($mjls as $mjv){
            //判断mj数据库是否有这个
            $count=$mj->where("mjnm='".$mjv['mjnm']."'")->count();
            if($count==0){
                $dt=array('mjnm'=>$mjv['mjnm']);
                $mj->data($dt)->add();
            }
            $mjo=$mj->where("mjnm='".$mjv['mjnm']."'")->find();
            $dt=array('year'=>'2015','oldmjid'=>$mjv['mjid'],'oldmjnm'=>$mjv['mjnm'],'nwmjid'=>$mjo['mjid'],'nwmjnm'=>$mjo['mjnm']);
            $mjmap->data($dt)->add();
        }

    }

}