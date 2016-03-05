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
    public function chongshipmj(){
        $pmj2013=M('2013_pmj');$pmj2014=M('2014_pmj');$pmj2015=M('2015_pmj');
        $mj=M('mj');
        #################
        $pmjls=$pmj2013->select();
        foreach($pmjls as $pmjv){
           $pmjid=$pmjv['pmjid'];
           $mjo=$mj->where("mjnm='".$pmjv['mjnm']."'")->find();
           $dt=array('f_pmj_mjid'=>$mjo['mjid']);
           $pmj2013->where('pmjid='.$pmjid)->setField($dt);
        }
        #################
        $pmjls=$pmj2014->select();
        foreach($pmjls as $pmjv){
           $pmjid=$pmjv['pmjid'];
           $mjo=$mj->where("mjnm='".$pmjv['mjnm']."'")->find();
           $dt=array('f_pmj_mjid'=>$mjo['mjid']);
           $pmj2014->where('pmjid='.$pmjid)->setField($dt);
        }
        #################
        $pmjls=$pmj2015->select();
        foreach($pmjls as $pmjv){
           $pmjid=$pmjv['pmjid'];
           $mjo=$mj->where("mjnm='".$pmjv['mjnm']."'")->find();
           $dt=array('f_pmj_mjid'=>$mjo['mjid']);
           $pmj2015->where('pmjid='.$pmjid)->setField($dt);
        }
        

    }
    public function testsql(){
        header("Content-Type:text/html; charset=utf-8");
        //SELECT * FROM (SELECT * FROM tb_2013_bbb UNION ALL SELECT * FROM tb_2014_bbb) AS total WHERE f_bbb_cccid=2
        // $std=M('2013_std');
        // $stdls=$std->join('LEFT JOIN tb_2013_stdxqcls ON stdid=f_stdxqcls_stdid')->where('stdid=282')->select();
        $std=M('2014_std');
        // $ls=$bbb->execute('SELECT * FROM (SELECT * FROM tb_2013_bbb LEFT JOIN tb_2013_ccc ON f_bbb_cccid=cccid UNION ALL SELECT * FROM tb_2014_bbb LEFT JOIN tb_2014_ccc ON f_bbb_cccid=cccid ) AS total WHERE f_bbb_cccid=2');

      //   $ls=$bbb
      // ->union('SELECT * FROM tb_2014_bbb LEFT JOIN tb_2014_ccc ON f_bbb_cccid=cccid',true)
      // ->union('SELECT * FROM tb_2015_bbb LEFT JOIN tb_2015_ccc ON f_bbb_cccid=cccid',true)->where('f_bbb_cccid=1')
      // ->select();
      // p($ls);die;
        $stdls=$std->join('INNER JOIN tb_2014_stdxqcls ON stdid=f_stdxqcls_stdid')->select();
        p($stdls);die;
    }

    public function crossequal(){
        $arr=array('A','B','C');
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
        p($str);

    }

}