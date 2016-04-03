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
<header class="navbar navbar-fixed-top navbar-inverse" id='divhd' style='margin-bottom: 0px;background-color: #000;height:80px;opacity:.6;*filter:alpha(opacity=60);'>
  <div style='padding-left: 40px;padding-right: 40px'>
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand" style='color: #fff;height: 80px;line-height: 60px;padding-top:10px;padding-bottom: 10px;'><!--<img alt="Brand" src="__PUBLIC__/img/cjlu/cjlu.png" style="height:60px"></a>
      <a href="#" class="navbar-brand" style='color: #fff;height: 80px;line-height: 60px;padding-top:10px;padding-bottom: 10px'>-->中国计量学院&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;继续教育学院招生平台</a>
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

 

<div class='col-md-12 nopadding entity'>
	<div class='col-md-2 nopadding' style='background-color: #fff;' id='left'>
	<div class='col-md-12' style='height: 40px;line-height: 40px;font-size: 18px;'>
		<div class='pull-left'>项目</div><div class='pull-right cursorpoint' id='showhideleft'><i class='glyphicon glyphicon-menu-left'></i>&nbsp;</div>
	</div>
	<div class='clearfix'></div>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

		<?php if(is_array($lbls)): $i = 0; $__LIST__ = $lbls;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lbv): $mod = ($i % 2 );++$i;?><div class="panel panel-info">
		    <div class="panel-heading" role="tab" id="heading<?php echo ($lbv['lbid']); ?>">
		      <h4 class="panel-title">
		        <a <?php echo ($lbv['a']); ?> data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo ($lbv['lbid']); ?>" aria-expanded="<?php echo ($lbv['b']); ?>" aria-controls="collapse<?php echo ($lbv['lbid']); ?>">
		          <?php echo ($lbv['lbnm']); ?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapse<?php echo ($lbv['lbid']); ?>" class="panel-collapse collapse <?php echo ($lbv['c']); ?>" role="tabpanel" aria-labelledby="heading<?php echo ($lbv['lbid']); ?>">
		      <div class="panel-body">
		        <?php if(is_array($lbv['mdls'])): $i = 0; $__LIST__ = $lbv['mdls'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mdv): $mod = ($i % 2 );++$i;?><a href="__APP__/<?php echo ($mdv['mdmk']); ?>/query" class="btn btn-<?php echo ($mdv['cls']); ?> btn-block"><?php echo ($mdv['mdnm']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
		      </div>
		    </div>
		  </div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>
	
	<div class='col-md-10 nopadding right' id='right'>
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
<div class='col-md-12' style='padding-top: 20px'>
	<!--开始-->
	<table class='table table-hover table-striped table-bordered'>
		<tbody>
			<?php foreach($para as $k=>$v){ if(!in_array($k, $no_update)){ ?>
			<tr><td><?php echo ($v); ?></td><td>
			<?php if(strstr($k, '_')){ ?>
			<select id='<?php echo ($k); ?>'>
				<option value='0'>无</option>
				<?php  $tmp=explode('_', $k);$tmp=explode('id',$tmp[2]);$tmp=$tmp[0]; ?>
				<?php if(is_array($$k)): $i = 0; $__LIST__ = $$k;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo $v[$tmp.'id'] ?>"><?php echo $v[$tmp.'nm'] ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<?php }else if(isset($transmean[$k])){ ?>
			<select id='<?php echo ($k); ?>'>
				<?php foreach($transmean[$k] as $v=>$dsc){ ?>
				<option value="<?php echo ($v); ?>"><?php echo ($dsc); ?></option>
				<?php } ?>
			</select>
			<?php }else{ ?>
			<input id='<?php echo ($k); ?>'>
			<?php } ?>
			<script>var k="<?php echo ($k); ?>";var v="<?php echo ($moforjs[$k]); ?>";if(k.indexOf('_')!=-1&&v==''){$('#'+k).val('0');}else{$('#'+k).val(v);}</script>
			</td></tr>
			<?php } } ?>
		</tbody>
	</table>
	<a class='btn btn-primary' id='update'><?php if($id==0){ ?>添加<?php }else{ ?>修改<?php } ?></a>
</div>

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