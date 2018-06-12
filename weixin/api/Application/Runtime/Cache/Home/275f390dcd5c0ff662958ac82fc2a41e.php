<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>1111</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<!-- basic styles -->
		<link href="/lin/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/lin/Public/assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/lin/Public/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!-- page specific plugin styles -->
		<!-- fonts -->
		<!-- ace styles -->
		<link rel="stylesheet" href="/lin/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/lin/Public/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/lin/Public/assets/css/ace-skins.min.css" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/lin/Public/assets/css/ace-ie.min.css" />
		<![endif]-->
		<!-- inline styles related to this page -->
		<!-- ace settings handler -->
		<script src="/lin/Public/assets/js/ace-extra.min.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="/lin/Public/assets/js/html5shiv.js"></script>
		<script src="/lin/Public/assets/js/respond.min.js"></script>
		<![endif]-->
		<!-- basic scripts -->
		<!--[if !IE]> -->
		<script src="/lin/Public/assets/js/jquery.min.js"></script>
		<!-- <![endif]-->
		<!--[if IE]>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='/lin/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->
		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='/lin/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/lin/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/lin/Public/assets/js/bootstrap.min.js"></script>
		<script src="/lin/Public/assets/js/typeahead-bs2.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="/lin/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/lin/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
		<!-- ace scripts -->
		<script src="/lin/Public/assets/js/ace-elements.min.js"></script>
		<script src="/lin/Public/assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
				  { "bSortable": false }
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				};

				//退出
				$("#loginout").click(function(event) {
					$.ajax({
			             type: "POST",
			             url: "../Ajax/loginOut",
			             data: {},
			             dataType: "json",
			             success: function(data){
			                         if(data.errorCode==0){
			                         	window.location.href="<?php echo U('Login/index');?>"; 
			                         }else{
			                         	alert(data.errorStr);
			                         }
			                      }
			         });
				});
			})
		</script>
		<script src="/lin/Public/style/js/user/list.js" type="text/javascript"></script>
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
	try{ace.settings.check('navbar' , 'fixed')}catch(e){}
</script>

<div class="navbar-container" id="navbar-container">
	<div class="navbar-header pull-left">
		<a href="#" class="navbar-brand">
			<small>
				<i class="icon-leaf"></i>
				中标华信
			</small>
		</a><!-- /.brand -->
	</div><!-- /.navbar-header -->

	<div class="navbar-header pull-right" role="navigation">
		<ul class="nav ace-nav">
			<!-- <li class="purple">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="icon-bell-alt icon-animated-bell"></i>
					<span class="badge badge-important">8</span>
				</a>

				<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
					<li class="dropdown-header">
						<i class="icon-warning-sign"></i>
						8 条未读消息
					</li>

					<li>
						<a href="#">
							<div class="clearfix">
								<span class="pull-left">
									<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
									新评论
								</span>
								<span class="pull-right badge badge-info">+12</span>
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							查看所有
							<i class="icon-arrow-right"></i>
						</a>
					</li>
				</ul>
			</li> -->

			<li class="light-blue">
				<a data-toggle="dropdown" href="#" class="dropdown-toggle">
					<img class="nav-user-photo" src="/lin/Public/assets/avatars/user.jpg" />
					<span class="user-info">
						<small>欢迎,</small>
						<?php echo session('userInfo.user');?>
					</span>

					<i class="icon-caret-down"></i>
				</a>

				<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
					<!-- <li>
						<a href="#">
							<i class="icon-cog"></i>
							设置
						</a>
					</li>
					<li class="divider"></li> -->
					<li id='loginout'>
						<a href="javascript:void(0)">
							<i class="icon-off"></i>
							退出
						</a>
					</li>
				</ul>
			</li>
		</ul><!-- /.ace-nav -->
	</div><!-- /.navbar-header -->
</div><!-- /.container -->
		</div>
		
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
	try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="icon-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="icon-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="icon-group"></i>
			</button>

			<button class="btn btn-danger">
				<i class="icon-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- #sidebar-shortcuts -->
<?php echo ($Menu); ?>

<div class="sidebar-collapse" id="sidebar-collapse">
	<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
</div>

<script type="text/javascript">
	try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
				</div>
				<div class="main-content">

					<div class="page-content">
						<div class="page-header">
							<h1>
								微信管理
								<small>
									<i class="icon-double-angle-right"></i>
									微信配置
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="#" method="post" class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="Username"> 用户名 </label>
										<div class="col-sm-8">
											<input type="text" id="Username" value="<?php echo session('userInfo.user');?>" disabled placeholder="Username" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="AppID"> AppID </label>
										<div class="col-sm-8">
											<input type="text" id="AppID" name='appID' value="<?php echo ($detail["appid"]); ?>"  placeholder="AppID" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="AppSecret"> AppSecret </label>
										<div class="col-sm-8">
											<input type="text" id="AppSecret" name='appSecret' value="<?php echo ($detail["appsecret"]); ?>"  placeholder="AppSecret" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="space-4"></div>
									<div class="space-4"></div>
									<div class="space-4"></div>
									<div class="space-4"></div>
									<div class="space-4"></div>
									

									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="URL"> 回调URL </label>
										<div class="col-sm-8">
											<input type="text" id="URL" name='url' value="<?php echo ($detail["url"]); ?>"  placeholder="URL" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="Token"> Token </label>
										<div class="col-sm-8">
											<input type="text" id="Token" name='token' value="<?php echo ($detail["token"]); ?>"  placeholder="Token" class="col-xs-10 col-sm-5" />
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="EncodingAESKey"> EncodingAESKey </label>
										<div class="col-sm-8">
											<input type="text" id="EncodingAESKey" name='encodingAESKey' value="<?php echo ($detail["encodingaeskey"]); ?>"  placeholder="EncodingAESKey" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="type" style='padding-top:10px'> 消息加解密方式 </label>
										<div class="radio col-sm-8">
											<label>
												<input name="type" value="1" type="radio" class="ace" <?php if($detail["type"] == 1): ?>checked<?php endif; ?> />
												<span class="lbl"> 明文模式 </span>
											</label>

											<label>
												<input name="type" value="2" type="radio" class="ace" <?php if($detail["type"] == 2): ?>checked<?php endif; ?> />
												<span class="lbl"> 兼容模式 </span>
											</label>

											<label>
												<input name="type" value="3" type="radio" class="ace" <?php if($detail["type"] == 3): ?>checked<?php endif; ?> />
												<span class="lbl"> 安全模式（推荐） </span>
											</label>
										</div>
									</div>


									<div class="space-4"></div>
									<div class="space-4"></div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-4 col-md-8">
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
											&nbsp; &nbsp; &nbsp;
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>
										</div>
									</div>
								</form>
							</div>
					</div><!-- /.page-content -->

				</div><!-- /.main-content -->
		</div><!-- /.main-container -->
	</body>
	
</html>