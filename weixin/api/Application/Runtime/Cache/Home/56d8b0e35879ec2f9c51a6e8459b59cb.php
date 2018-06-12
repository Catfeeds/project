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
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center col-xs-1">编号</th>
														<th class="center">账号</th>
														<th class="center">姓名</th>
														<th class="center">手机号</th>
														<th class="center">类型</th>
														<th class="center">操作</th>
													</tr>
												</thead>
														<tr>
															<td class="center col-xs-1">
																1
															</td>
															<td class="center">
																2
															</td>
															<td class="center">
																3
															</td>
															<td class="center">
																4
															</td>
															<td class="center">
																5
															</td>
															<td class="center">
																<div data-id='1' class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
																	<a class="green motai" style="-webkit-transition: all 0s;transition: all 0s;">
																		<i class="icon-pencil bigger-130 eid"></i>
																	</a>

																	<a class="red" style="-webkit-transition: all 0s;transition: all 0s;">
																		<i class="icon-trash bigger-130 del"></i>
																	</a>
																</div>
															</td>
														</tr>
											</table>
											<div class="visible-md center visible-lg hidden-sm hidden-xs action-buttons">
												<span style="float: right;margin-top:1%;margin-right: 15%;">
													<a class="" href="userAdd.php">
														<i class="icon-plus bigger-150"></i>
													</a>
												</span>
												<ul class="pagination" >
													
												</ul>
											</div>
									</div><!-- /span -->
								</div><!-- /row -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
		</div><!-- /.main-container -->
	</body>
	
</html>
<script>
	function dellist(id){
		$.ajax({
             type: "POST",
             url: "../../config/configAjax.php?event=userDel",
             data: {
             		 id:id
             	},
             dataType: "json",
             success: function(data){
                         if(data.status==0){
                         	location.reload();
                         }else{
                         	alert(data.msg);
                         }
                      }
        });
	}
</script>