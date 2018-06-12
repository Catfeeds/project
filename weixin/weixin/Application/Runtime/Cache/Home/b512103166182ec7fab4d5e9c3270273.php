<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<title>审核员专区</title>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/weixin/weixin/Public/mui/css/mui.css" rel="stylesheet" type="text/css"/>
<link href="/weixin/weixin/Public/mui/css/icons-extra.css" rel="stylesheet" type="text/css"/>
<script src="/weixin/weixin/Public/mui/js/mui.js"></script>
<script src="/weixin/weixin/Public/mui/js/laytpl.js"></script>
<script src="/weixin/weixin/Public/mui/fun/js.fun.js"></script>
<script src="/weixin/weixin/Public/mui/fun/mui.fun.js"></script>
<script src="/weixin/weixin/Public/mui/js/app.js"></script>
<script type="text/javascript">
	laytpl.config({min: true,cache: true,open: '{{',close: '}}'});
</script>
<style type="text/css">
	/** {font-family:cursive;}*/
</style>
	</head>
	<body>
		<!--下拉刷新容器-->
		
		<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
			<div class="mui-scroll">
				<!--数据列表-->
				<div class="mui-card">
					<ul id="list" class="mui-table-view jump"></ul>
				</div>
			</div>
		</div>
		
		<script id="list-tpl" type="text/html">
			{{# d.forEach(function(item){ }}
				<li class="mui-table-view-cell">
					<a class="mui-navigate-right url" data-exuid="{{item.id}}">{{item.date}}月　(总分:{{item.day}})</a>
				</li>
			{{# }) }}
		</script>
		<script type="text/javascript">
			var search = {};search.page=1;
			mui.init({
				pullRefresh: {
					container: "#pullrefresh", //下拉刷新容器标识，querySelector能定位的css选择器均可，比如：id、.class等
					down: {
						height: 50, //可选,默认50.触发下拉刷新拖动距离,
						auto: true, //可选,默认false.首次加载自动下拉刷新一次
						contentdown: "下拉可以刷新", //可选，在下拉可刷新状态时，下拉刷新控件上显示的标题内容
						contentover: "释放立即刷新", //可选，在释放可刷新状态时，下拉刷新控件上显示的标题内容
						contentrefresh: "正在刷新...", //可选，正在刷新状态时，下拉刷新控件上显示的标题内容
						callback: function() {createFragment(this);}
					}
				}
			});
			
			mui('.jump').on('tap','.url',function()
			{
				var exuid = this.getAttribute('data-exuid');
				var url   = '<?php echo U("Kaohe/examine_user_info",array("exuid"=>"getexuid"));?>';
				    url   = url.replace(/getexuid/, exuid);
				mui.openWindow(url,'examine_user_info');
			});

			function createFragment(self)
			{
				mui.ajax("<?php echo U('Kaohe/getexamine_user');?>",
				{
					data    :{page:search.page},
					dataType:'json',//服务器返回json格式数据
					type    :'post',//HTTP请求类型
					timeout:10000,//超时时间设置为10秒；
					success:function(data)
					{
						data = data.results;
						if(data.length<1){return self.endPulldownToRefresh(true);}search.page++;
						var item = document.getElementById('list');
						laytpl(document.getElementById('list-tpl').innerHTML).render(data, function(html)
						{
							setTimeout(function()
							{
								item.innerHTML = html+item.innerHTML;
								self.endPulldownToRefresh(false);
							}, 500);
						});
					}
				});		
			}
		</script>
	</body>

</html>