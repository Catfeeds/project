<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
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
	* {font-family:SimSun;}
</style>
		<script src="/weixin/weixin/Public/mui/js/mui.pullToRefresh.js"></script>
		<script src="/weixin/weixin/Public/mui/js/mui.pullToRefresh.material.js"></script>
		<style type="text/css">
			.mui-pull-bottom-wrapper{text-align: center;}
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">任务查询</h1>
		</header>
		<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<div class="mui-scroll" style="width: 100%;background: white;height: 3rem;">
						<a class="mui-control-item mui-active" href="#item1mobile" style="width: 50%;border-bottom: 4px solid rgba(0,0,0,0);">
							未完成
						</a>
						<a class="mui-control-item" href="#item2mobile" style="width: 50%;border-bottom: 4px solid rgba(0,0,0,0);">
							已完成
						</a>
					</div>
				</div>
				<div class="mui-slider-group">
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<div class="mui-scroll-list"></div>
							</div>
						</div>
					</div>
					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<div class="mui-scroll-list"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script id="list-tpl" type="text/html">
			{{# d.results.forEach(function(item){ }}
				<div class="mui-card">
					<div class="mui-card-header">{{item.ep_name}}</div>
					<div class="mui-card-content">
						<div class="mui-card-content-inner">
							<p>审核类型：{{d.audit_type[item.audit_type]}}</p>
							<p>审核员：{{item.name}} 组内身份：{{d.role[item.role]}}</p>
							<p>起止时间：{{item.taskbegindate}}/{{item.taskenddate}}</p>
						</div>
					</div>
				</div>
			{{# }) }}
		</script>
		<script type="text/javascript">
				var search = {};
				search.item1mobile = {page:'1',is_finish:'0'};
				search.item2mobile = {page:'1',is_finish:'1'};
				mui.init();
				mui.ready(function()
				{
					mui('.mui-scroll-wrapper').scroll({bounce: false,indicators: true,deceleration: mui.os.ios ? 0.003 : 0.0009});
					mui.each(document.querySelectorAll('.mui-slider-group .mui-scroll'), function(index, pullRefreshEl)
					{
						mui(pullRefreshEl).pullToRefresh(
						{
							up: {
							    auto: true, //自动执行一次上拉加载，可选；
							    show: false, //显示底部上拉加载提示信息，可选；
							    contentinit: '上拉显示更多', //可以上拉提示信息
							    contentdown: '上拉显示更多', //上拉结束提示信息
							    contentrefresh: '正在加载...', //上拉进行中提示信息
							    contentnomore: '没有更多数据了', //上拉无更多信息时提示信息
							    callback:function(){createFragment(this,index)}//上拉回调
							}
						});
					});

					function createFragment(self, index)
					{
						var itemname = false;
						switch (String(index))
						{
							case "0":itemname='item1mobile';break;
							case "1":itemname='item2mobile';break;
							default:return false;
						}
						if(itemname)
						{
							console.log(itemname,search);
							mui.ajax('<?php echo U("shenheyuan/getrenwuchaxun");?>',
							{
								data:search[itemname],
								type:'get',//HTTP请求类型
								timeout:5000,//超时时间设置为10秒；
								dataType:'json',
								success:function(data)
								{
									if(data.errorCode>0)
									{
										self.endPulldownToRefresh(true);return mui.toast(data.errorStr);
									}
									if(data.results.length<1){return self.endPullUpToRefresh(true);}
									search[itemname].page++;
									var item = document.getElementById(itemname).querySelector('.mui-scroll-list');	
									laytpl(document.getElementById('list-tpl').innerHTML).render(data, function(html)
									{

										item.innerHTML = html+item.innerHTML;
										self.endPullUpToRefresh();
									});
								},
								error:function(xhr){self.endPulldownToRefresh(false);mui.toast('网络超时');}
							});
						}				
					};
				});
		</script>
	</body>

</html>