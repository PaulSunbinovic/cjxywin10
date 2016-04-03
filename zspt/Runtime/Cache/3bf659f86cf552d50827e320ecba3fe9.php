<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<!-- 避免IE使用兼容模式 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo ($title); ?></title>
<script src="__PUBLIC__/etc/jquery.js"></script>
<script src="__PUBLIC__/etc/jquery-migrate-1.1.0.min.js"></script>


<!-- bootstrap -->
<link href="__PUBLIC__/etc/btstp3/css/bootstrap.css" rel="stylesheet">
<link href="data:text/css;charset=utf-8," data-href="__PUBLIC__/etc/btstp3/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="__PUBLIC__/etc/btstp3/css/patch.css" rel="stylesheet">
<link href="__PUBLIC__/etc/btstp3/css/docs.css" rel="stylesheet">
<script src="__PUBLIC__/etc/btstp3/js/ie-emulation-modes-warning.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Favicons -->
<link rel="apple-touch-icon" href="__PUBLIC__/ICON/apple-touch-icon.png">
<link rel="icon" href="__PUBLIC__/ICON/favicon.ico">
<script>var __app__='__APP__';var __url__='__URL__';var __public__='__PUBLIC__';</script>
<script type='text/javascript' src='__PUBLIC__/etc/cmn/cmn.js'></script>
<link href="__PUBLIC__/etc/cmn/cmn.css" rel="stylesheet">
<!--以上是公共部分，接下来是私有部分-->

</head>

<body>

<!-- head包usr.js -->
<script type="text/javascript" src='__PUBLIC__/JS/admin/usrhd.js'></script>

<script type="text/javascript">
var hdllgin='__APP__/Usr/loginin';
var hdllgot='__APP__/Usr/loginout';
var app_path='__APP__';
</script>
<header  class="navbar navbar-fixed-top navbar-inverse" id='divhd' style='margin-bottom: 0px;background-color: #000;height:80px;border:0px;border-radius: 0;background-color: #5cb85c;'>
  <div style='padding-left: 40px;padding-right: 40px'>
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a href="#" class="navbar-brand" style='color: #fff;height: 80px;line-height: 60px;padding-top:10px;padding-bottom: 10px;'><img alt="Brand" src="__PUBLIC__/img/cjlu/cjlu.png" style="height:60px"></a>-->
      <a href="#" class="navbar-brand" style='color: #fff;height: 80px;line-height: 60px;padding-top:10px;padding-bottom: 10px'>中国计量学院&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;继续教育学院、成人教育学院</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" style='height: 80px;line-height: 50px'>
      <ul class="nav navbar-nav navbar-right" style='height: 80px;line-height: 50px'>
					
			<li style='height: 80px;line-height: 50px'>
				<a  href='__APP__' style="color: #fff;height:80px;line-height: 50px">首页</a>
			</li>

			<li style='height: 80px;line-height: 50px'>
				<a href='http://www.cjlu.edu.cn' style="color: #fff;height:80px;line-height: 50px">学校主页</a>
			</li>	

			
			
			
				
			
		</ul>
    </nav>
  </div>
  
</header>


 

<div class='nopadding entity container' style='margin-top:30px'>
		
	<div class='col-md-12 nopadding'>
		<div class='col-md-12' style='height: 40px;line-height: 40px;font-size: 18px;border-bottom: 1px solid #ccc'>
	<div class='pull-left cursorpoint' id='showhideright' style='display:none'><i class='glyphicon glyphicon-menu-right'></i>&nbsp;</div>
	<div class='pull-left'><?php echo ($ttl); ?></div>
</div>
		<div class='col-md-12 nopadding'>
			<script>
	var doupdate='__URL__/doupdate';
	var dolinkage='__URL__/dolinkage';
	var obj=new Object();
	var addormdf="<?php echo ($id); ?>";
	obj["<?php echo ($lowmdmk); ?>"+"id"]="<?php echo ($id); ?>";
	obj["f_"+"<?php echo ($lowmdmk); ?>"+"_"+"<?php echo ($splitmark); ?>"+'id']="<?php echo ($gid); ?>";
	
</script>
<!--table部分-->
<div class='col-md-12' style='padding-top: 20px;'>

	<!--#######################-->
	<style>
	.mingxi table{margin-left:50px;border-spacing:0;padding:0;background-color:#f4f7f3;margin-top:20px;margin-bottom:20px;}
	.mingxi table td{border:1px #dff0d8 solid; padding:2px 5px;}
	.mingxi input{border:1px solid #ccc}
	.mingxi select{border:1px solid #ccc}
	</style>
			
	<div class='mingxi'>
	专业信息：<input type="hidden" id='f_std_sttid' value="1">
	<table>
	<tr>
	<td>
	年级：
	</td>
	<td>
		<select id='f_std_grdid'>
			<?php if(is_array($f_std_grdid)): $i = 0; $__LIST__ = $f_std_grdid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['grdid']); ?>"><?php echo ($vo['grdnm']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
	</td>
	<td>
	办学形式：
	</td>
	<td>
	<select id='f_pmj_bxxsid' >
		<option value='0'>无</option>
		<?php if(is_array($f_pmj_bxxsid)): $i = 0; $__LIST__ = $f_pmj_bxxsid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['bxxsid']); ?>"><?php echo ($vo['bxxsnm']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	</td>
	
	<td><input type='hidden' id='f_stdxqpcls_pclsid' value='0' /></td>
	
	<td><p style='color:#3c763d'>*专业：</p></td>
	<td colspan=9>
	<select id='f_stdxqpmj_pmjid'>
		<option value='0'>无</option>
		<?php if(is_array($f_stdxqpmj_pmjid)): $i = 0; $__LIST__ = $f_stdxqpmj_pmjid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['mjid']); ?>"><?php echo ($vo['mjnm']); ?>（<?php echo ($vo['mjdsc']); ?>）</option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	
	</td>
	</tr>
	</table>
	</div>
	
	<div class='mingxi'>
	基本信息：
	<table>
	<tr>
	<td><p style='color:#3c763d'>*姓名：</p></td><td><input type='text' id='stdnm'/></td>
	<td>
	<p style='color:#3c763d'>*性别：</p>
	</td>
	<td>
	<select id='f_std_sexid'>
		<option value='0'>无</option>
		<?php if(is_array($f_std_sexid)): $i = 0; $__LIST__ = $f_std_sexid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['sexid']); ?>"><?php echo ($vo['sexnm']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	
	</td>
	<td>
	<p style='color:#3c763d'>*民族</p>
	</td>
	<td>
	<select id='f_std_rcid'>
		<option value='0'>无</option>
		<?php if(is_array($f_std_rcid)): $i = 0; $__LIST__ = $f_std_rcid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['rcid']); ?>"><?php echo ($vo['rcnm']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	
	</td>
	<td>
	<p style='color:#3c763d'>*政治面貌</p>
	</td>
	<td>
	<select id='f_std_zzmmid'>
		<option value='0'>无</option>
		<?php if(is_array($f_std_zzmmid)): $i = 0; $__LIST__ = $f_std_zzmmid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['zzmmid']); ?>"><?php echo ($vo['zzmmnm']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	</td>
	<td rowspan=4>
	<div>
	<!-- file start -->
	 <link rel="stylesheet" href="__PUBLIC__/etc/FileUpload/uploadify/uploadify.css">
	 <script type="text/javascript" src='__PUBLIC__/etc/FileUpload/uploadify/uploadify.js'></script>
	 <script type="text/javascript" src="__PUBLIC__/etc/FileUpload/uploadify/swfobject.js"></script>
	<script type="text/javascript">
	var file_path='__PUBLIC__/etc/FileUpload';
	var hdlupload="__APP__/FileUpload/upload/issml/y/wjj/std-jn-tmp";////注意
	var upload_path="__ROOT__/Uploads/std/tmp";
	</script>
	<script type="text/javascript" src='__PUBLIC__/etc/FileUpload/int.js'></script>
	<div>
	<img src="<?php echo ($mo['stdpt']); ?>" alt=""  class='img-thumbnail'  style="width:100px;"  id='imgg'/>
	</div>
	<div style="width:80px; height:26px; overflow:hidden;"><input type="file"  name="photo1" id="uploadify"/></div>
	<!-- 隐藏系统所需的用户upt -->
	<input type='hidden'  id='stdpt' value="<?php echo ($mo['stdpt']); ?>">
	<!-- file over -->
	</div>
	</td>
	</tr>
	<tr>
	<td><p style='color:#3c763d'>*籍贯：</p></td><td><input type='text' name='stdnp' value="<?php echo ($mo['stdnp']); ?>" id='stdnp'/></td>
	<td>文理科：</td>
	<td>
	<select id='stdsol'>
	<option value='无'>无</option>
	<option value='文科'>文科</option>
	<option value='理科'>理科</option>
	</select>
	</td>
	<td>
	学历
	</td>
	<td>
	<select id='f_std_xlid'>
		<option value='0'>无</option>
		<?php if(is_array($f_std_xlid)): $i = 0; $__LIST__ = $f_std_xlid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['xlid']); ?>"><?php echo ($vo['xlnm']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	</td>
	<td>高考成绩：</td><td><input type='text' id='stdcee'/></td>
	</tr>
	<tr>
	<td>毕业学校：</td><td colspan=3><input  type='text' id='stdsog' style='width:330px'/></td>
	<td><p style='color:#3c763d'>*身份证号码：</p></td><td colspan=3><input  type='text' id='stdidcd' style='width:330px'/></td>
	</tr>
	<tr>
	<td><p style='color:#3c763d'>*手机号码：</p></td><td><input  type='text' id='stdcp' /></td>
	<td>固话：</td><td><input  type='text' id='stdtlp' /></td>
	<td><p style='color:#3c763d'>*出生日期：</p></td><td><script type="text/javascript" src="__PUBLIC__/etc/DTPK/jddate/adddate.js"></script><input type='text' id='stdbtd' onclick="SelectDate(this,'yyyy-MM-dd')" readonly /></td>
	<td>QQ：</td><td><input type='text' id='stdqq'/></td>
	</tr>
	<tr>
	<td><p style='color:#3c763d'>*家长一关系：</p></td><td><input type='text' id='stdrlta' placeholder='例如：父子，母子，爷爷等'/></td>
	<td><p style='color:#3c763d'>*家长一姓名：</p></td><td><input type='text' id='stdrltanm'/></td>
	<td><p style='color:#3c763d'>*家长一单位：</p></td><td><input type='text' id='stdrltaocpt'/></td>
	<td><p style='color:#3c763d'>*家长一手机号：</p></td><td colspan=2><input type='text' id='stdrltacp'/></td>
	</tr>
	<tr>
	<td>家长二关系：</td><td><input type='text' id='stdrltb' placeholder='例如：父子，母子，爷爷等'/></td>
	<td>家长二姓名：</td><td><input type='text' id='stdrltbnm'/></td>
	<td>家长二单位：</td><td><input type='text' id='stdrltbocpt'/></td>
	<td>家长二手机号：</td><td colspan=2><input type='text' id='stdrltbcp'/></td>
	</tr>
	<tr>
	<td>爱好：</td><td><input type='text' id='stdhb'/></td>
	<td><p style='color:#3c763d'>*家庭地址：</p></td><td colspan=3><input type='text' id='stdads' style='width:330px'/></td>
	<td>邮政编码：</td><td colspan=2><input type='text' id='stdpst'/></td>
	</tr>
	<tr>
	
	<td>推荐人姓名：</td><td colspan=2><input type='text' id='stdrcmdnm'/></td>
	<td>推荐人手机号：</td><td colspan=3><input type='text' id='stdrcmdcp'/></td>
	<td colspan="2"></td>
	</tr>
	<input type="hidden" id='f_std_statid' value='0' >
	
	
	</table>
	<p style='color:#f00'>注：*号标记的必须填写</p>
	</div>
	
	<a class='btn btn-success btn-lg' id='update'>提交报名</a>


<script>
//自身参数，初始数据
var para=new Object();
var selfpara=new Array();
var origindata=new Object();

<?php  foreach($para as $k=>$v){ if(!in_array($k, $notself)){ ?>
para["<?php echo ($k); ?>"]="<?php echo ($v); ?>";
selfpara.push("<?php echo ($k); ?>");
origindata["<?php echo ($k); ?>"]="<?php echo ($moforjs[$k]); ?>";
<?php  } } ?>

//不用管的，也不用显示的
var no_update=new Array();
<?php  foreach($no_update as $nuv){ ?>
no_update.push("<?php echo ($nuv); ?>");
<?php  } ?>
//zabojin的属性里面在显示中，允许空的
var allowempty=new Array();
<?php  foreach($allowempty as $aev){ ?>
allowempty.push("<?php echo ($aev); ?>");
<?php  } ?>
//transmean
var transmeank=new Array();
<?php  foreach($transmean as $tmvk=>$tmvv){ ?>
transmeank.push("<?php echo ($tmvk); ?>");
<?php  } ?>

//#########
$(function(){
	$('#update').click(function(){

		//首先把相关的参数数据聚集起来，把自身更新需要的参数以及变动的数据进行传输
		//由于第一个往往是id所以，就不去考虑了
		//先判断是否为空
		for(var i=1;i<selfpara.length;i++){
			var key=selfpara[i];var tmp=$('#'+key);
			//如果是允许空的，就不用考虑他有没有空的事情了；反之不在这里头，就要考虑了
			if(no_update.indexOf(key)==-1&&allowempty.indexOf(key)==-1){var tagname=tmp.get(0).tagName;
				if(tagname=='INPUT'&&$.trim(tmp.val())==''){
					alert(para[key]+'不能为空');tmp.focus();return;
				}else if(transmeank.indexOf(key)==-1&&tagname=='SELECT'&&$.trim(tmp.val())=='0'){
					alert(para[key]+'未选择');tmp.focus();return;
				}
			}
			
		}
		//然后判断哪些是有变动的，变动的数值需要提交修改，没有变动的则直接不用接后台了
		//其中添加需要全盘给上，修改只用给变量就行
		if(addormdf!=0){
			var flag_change=0;
			for(var i=1;i<selfpara.length;i++){
				//排除掉不用管的
				var key=selfpara[i];var tmp=$('#'+key);var valuenow=$.trim(tmp.val());
				if(no_update.indexOf(key)==-1){
					if(valuenow!=origindata[key]){
						flag_change=1;
						obj[key]=valuenow;
					}
				}
			}
			if(flag_change==0){alert('没有任何信息改变');return;}
		}else{
			for(var i=1;i<selfpara.length;i++){
				var key=selfpara[i];var tmp=$('#'+key);var valuenow=$.trim(tmp.val());
				if(no_update.indexOf(key)==-1){
					obj[key]=valuenow;
				}
			}
		}
		

		$.ajax({
            'type': 'GET',
            'url':doupdate,
            'async':false,  
            'contentType': 'application/json',
            'data': obj,
            'dataType': 'json',
            'success': function(data) {
            	var str='';
            	if(data['pattern']=='0'){str='添加';}else{str='修改';}
            	alert(str+'成功！点击返回');
            	window.location.href=document.referrer;
                console.log("success");
            },
            'error':function() {
                console.log("error");
            }
        });
	})
})
</script>

<script>

$(function(){
  //记录
  var ipf=new Array();
  <?php foreach($impactfactor as $ifv){ ?>
    ipf.push("<?php echo ($ifv); ?>");
  <?php } ?>
  <?php foreach($impactfactor as $ifv){ ?>
    $('#'+"<?php echo ($ifv); ?>").change(function(){
      var obj=new Object();
      obj['trigger']="<?php echo ($ifv); ?>";
      for(var i=0;i<ipf.length;i++){
        obj[ipf[i]]=$('#'+ipf[i]).val();
      }
      $.ajax({
          'type': 'GET',
          'url':dolinkage,
          'async':false,  
          'contentType': 'application/json',
          'data': obj,
          'dataType': 'json',
          'success': function(data) {
            for(var i=0;i<data.length;i++){
              var aim=data[i]['aim'];
              var str="<option value='0'>无</option>";
              if(data[i]['ls']){
	              for(var j=0;j<data[i]['ls'].length;j++){
	                str=str+"<option value='"+data[i]['ls'][j][data[i]['prex']+'id']+"'>"+data[i]['ls'][j][data[i]['prex']+'nm']+"</option>"
	              }
	          }
              $('#'+aim).html(str);
            }
          },
          'error':function() {
            console.log("error");
          }
      });
    })
  <?php } ?>
})

</script>
		</div>
		
	</div>
</div>
<div class='clearfix'></div>

<footer class="bs-docs-footer" style='margin-top:0px'>
  <div class="container">				
		<p>Designed by <a href="#" target="_blank">Paul Sunbinovic</a></p><p>&copy; 2012-<?php echo date('Y',time()); ?> 中国计量大学继续教育学院 信息发展部自行研发.All Rights Reserved</p><p>浙江省杭州市下沙高教园区学源街258号</p><p>联系方式:0571-86835789 E-mail:sunbinovic@163.com </p>
	</div> <!-- /container -->
</footer>
<script  type="text/javascript" src="__PUBLIC__/pblc/gotop/gotop.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/pblc/gotop/gotop.css" media="all"/>

                




<!-- bootstrap -->
<script src="__PUBLIC__/etc/btstp3/js/bootstrap.js"></script>
<script src="__PUBLIC__/etc/btstp3/js/docs.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="__PUBLIC__/etc/btstp3/js/ie10-viewport-bug-workaround.js"></script>
<script src='__PUBLIC__/etc/init.js'></script>


</body>
</html>