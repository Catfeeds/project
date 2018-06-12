<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>客服留言</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- basic styles -->
		<link href="/weixin/weixin/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/weixin/weixin/Public/assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/weixin/weixin/Public/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!-- page specific plugin styles -->
		<!-- fonts -->
		<!-- ace styles -->
		<link rel="stylesheet" href="/weixin/weixin/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/weixin/weixin/Public/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/weixin/weixin/Public/assets/css/ace-skins.min.css" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/weixin/weixin/Public/assets/css/ace-ie.min.css" />
		<![endif]-->
		<!-- inline styles related to this page -->
		<!-- ace settings handler -->
		<script src="/weixin/weixin/Public/assets/js/ace-extra.min.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="/weixin/weixin/Public/assets/js/html5shiv.js"></script>
		<script src="/weixin/weixin/Public/assets/js/respond.min.js"></script>
		<![endif]-->		<!-- basic scripts -->
		<!--[if !IE]> -->
		<script src="/weixin/weixin/Public/assets/js/jquery.min.js"></script>
		<!-- <![endif]-->
		<!--[if IE]>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='/weixin/weixin/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->
		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='/weixin/weixin/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/weixin/weixin/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/weixin/weixin/Public/assets/js/bootstrap.min.js"></script>
		<script src="/weixin/weixin/Public/assets/js/typeahead-bs2.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="/weixin/weixin/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/weixin/weixin/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
		<!-- ace scripts -->
		<script src="/weixin/weixin/Public/assets/js/ace-elements.min.js"></script>
		<script src="/weixin/weixin/Public/assets/js/ace.min.js"></script>
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
	</head>

	<body>
		<div class="main-container" id="main-container">
			<div class="space-4"></div>
			<div class="space-4"></div>
			<div class="main-container-inner">
				<div class="main-content">
					<!-- <div class="breadcrumbs" id="breadcrumbs">
						<form class="form-search">
							<table>
								<tr>
									<td>搜索</td>
									<td><input type="text" placeholder="Search ..." /></td>
								</tr>
							</table>
						</form>
					</div> -->
					<div class="page-content">

						<div class="row">
							<div class="col-xs-12" style="margin-left:9%;">
								<!-- PAGE CONTENT BEGINS -->
								<form id="form" class="form-horizontal" role="form" method="post" action="<?php echo U('Other/kefuliuyan');?>" >
									<input type="hidden" name="sub" value="1">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="name"> 姓名 </label>
										<div class="col-sm-9">
											<input type="text" name="name" id="name" value="<?php echo ($results["name"]); ?>"  class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tel"> 联系方式 </label>
										<div class="col-sm-9">
											<input type="text" name="tel" id="tel" value="<?php echo ($results["tel"]); ?>"  class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="space-4"></div>

									<div>
										<label for="content">内容</label>
										<textarea id="content" name="content" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; height: 60px; width: 83.3333%; margin: 0px -0.208333px 0px 0px;resize: vertical;"><?php echo ($results["content"]); ?></textarea>
									</div>

									
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
											&nbsp;&nbsp;
											<button class="btn btn-info">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>
										</div>
									</div>

								</form>
							</div><!-- /.col -->
						</div><!-- /.row -->

					</div>
				</div>
			</div><!-- /.main-content-inner -->
		</div><!-- /.main-container -->
	</body>
	<script src="/weixin/weixin/Public/style/js/Enterprises/shenqingrenzheng.js" type="text/javascript" charset="utf-8"></script>
</html>