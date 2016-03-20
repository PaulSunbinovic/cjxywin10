<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	header("Content-Type:text/html; charset=utf-8");
    	$atc=D('Atc');

    	//寻找文章
    	//寻找announce
    	$arr=$atc->getmls(1,1,'');
    	$atcls_anc=$arr['data'];
    	$this->assign('atcls_anc',$atcls_anc);
    	//寻找dnmc
    	$arr=$atc->getmls(1,2,'');
    	$atcls_dnmc=$arr['data'];
    	$this->assign('atcls_dnmc',$atcls_dnmc);
    	//寻找函授夜大
    	$arr=$atc->getmls(1,'',15);
    	$atcls_hsyd=$arr['data'];
    	$this->assign('atcls_hsyd',$atcls_hsyd);
    	//寻找继续教育
    	$arr=$atc->getmls(1,'',16);
    	$atcls_jxjy=$arr['data'];
    	$this->assign('atcls_jxjy',$atcls_jxjy);
    	//寻找自考助学
    	$arr=$atc->getmls(1,'',17);
    	$atcls_zkzx=$arr['data'];
    	$this->assign('atcls_zkzx',$atcls_zkzx);
    	//寻找党群活动
    	$arr=$atc->getmls(1,'',18);
    	$atcls_dqhd=$arr['data'];
    	$this->assign('atcls_dqhd',$atcls_dqhd);
    	//寻找教工之窗
    	$arr=$atc->getmls(1,'',19);
    	$atcls_jgzc=$arr['data'];
    	$this->assign('atcls_jgzc',$atcls_jgzc);
    	//寻找学生风采
    	$arr=$atc->getmls(1,'',20);
    	$atcls_xsfc=$arr['data'];
    	$this->assign('atcls_xsfc',$atcls_xsfc);
    	//寻找资讯热点
    	$arr=$atc->getmls(1,'',21);
    	$atcls_zxrd=$arr['data'];
    	$this->assign('atcls_zxrd',$atcls_zxrd);


    	
    	$this->assign('title',C('title'));
		$this->display('index');
    }
}