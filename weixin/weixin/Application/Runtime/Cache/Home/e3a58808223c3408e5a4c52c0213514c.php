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
		<div id="list" class="mui-content mui-scroll-wrapper">
			<div class="mui-scroll">
				<!--数据列表-->
				<ul id='list-content' class="mui-table-view mui-table-view-chevron jump"></ul>
			</div>
		</div>
		<script id='list-tpl' type="text/html">
			{{# d.forEach(function(item){ }}
				<li class="mui-table-view-cell href" url="<?php echo U('shenheyuan/tongzhi_detail');?>" params="id={{item.id}}">
					<a href="" class="mui-navigate-right">{{item.title}}</a>
				</li>
			{{# }) }}
		</script>
		<script type="text/javascript">
			var search = {};search.page=1;
			mui.init({
				pullRefresh: {
					container: "#list", //下拉刷新容器标识，querySelector能定位的css选择器均可，比如：id、.class等
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
			
			function createFragment(self)
			{
				mui.ajax('<?php echo U("index/getindex_list");?>',
				{
					data:search,
					type:'get',//HTTP请求类型
					timeout:5000,//超时时间设置为10秒；
					dataType:'json',
					success:function(data)
					{
						if(data.errorCode>0)
						{
							self.endPulldownToRefresh(true);return mui.toast(data.errorStr);
						}
						if(data.results.length<1){return self.endPulldownToRefresh(true);}
						search.page++;
						var item = document.getElementById('list-content');
						laytpl(document.getElementById('list-tpl').innerHTML).render(data.results, function(html)
						{

							item.innerHTML = item.innerHTML+html;
							self.endPulldownToRefresh(false);
						});
					},
					error:function(xhr){self.endPulldownToRefresh(false);mui.toast('网络超时');}
				});	
			}
		</script>
	</body>

</html>