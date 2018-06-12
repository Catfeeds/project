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
	/** {font-family:cursive;}*/
</style>
		<script src="/weixin/weixin/Public/bootstrap/js/jquery.min.js" type="text/javascript"></script>
		<style type="text/css">
			.content-header {
				height: 10rem;
				background: url(/weixin/weixin/Public/mui/images/back-user-center.png);
				background-size: cover;
			}
			
			
			.content-header .mui-table-view-cell:after,
			.content-content .mui-table-view-cell:after {
				background-color: rgba(0, 0, 0, 0)
			}
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-transparent">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		</header>

		<div class="mui-content">
			<div class="content-header">
				<div class="mui-row">
					<div class="mui-col-sm-12 mui-col-xs-12 mui-text-left">
						<h2 style="padding: 2rem;margin: 0;">
							<?php echo ($username); ?>您好<br/>
							以下是您今天的审核任务和签到记录
						</h2>
					</div>
				</div>
			</div>
			<div class="content-content">
				<div class="mui-card">
					<?php if(is_array($shenherenwu)): $i = 0; $__LIST__ = $shenherenwu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-card-header">
							<div class="mui-left"><?php echo ($vo["ep_name"]); ?></div>
							<button type="button" class="mui-btn mui-btn-primary mui-btn-outlined mui-right qiandao" data-eid="<?php echo ($vo["eid"]); ?>" data-tid="<?php echo ($vo["tid"]); ?>" data-pid="<?php echo ($vo["pid"]); ?>">
								签到
							</button>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div class="content-footer">
				<h4 style="height: 30px;text-align: center;background: #f5f5f5;line-height: 30px;">签到记录</h4>
				<div>
					<?php if(is_array($qiandaodlist)): $i = 0; $__LIST__ = $qiandaodlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-card">
							<div class="mui-card-header"><?php echo ($vo["ep_name"]); ?></div>
							<div class="mui-card-content">
								<div class="mui-card-content-inner">
									<p>签到时间：<?php echo ($vo["qd_datetime"]); ?></p>
									<p>签到位置：<?php echo ($vo["qd_addr"]); ?>附近</p>
								</div>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
		</div>
	</body>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
		mui.init();
		wx.config({
		     debug: false
		    ,appId:     "<?php echo ($weAutoInfo["appId"]); ?>"       //公众号的唯一标识
		    ,timestamp: "<?php echo ($weAutoInfo["timestamp"]); ?>"   //生成签名的时间戳
		    ,nonceStr:  "<?php echo ($weAutoInfo["nonceStr"]); ?>"    //签名的随机串
		    ,signature: "<?php echo ($weAutoInfo["signature"]); ?>"   //签名
		    ,jsApiList: ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','hideMenuItems','showMenuItems','hideAllNonBaseMenuItem','showAllNonBaseMenuItem','translateVoice','startRecord','stopRecord','onRecordEnd','playVoice','pauseVoice','stopVoice','uploadVoice','downloadVoice','chooseImage','previewImage','uploadImage','downloadImage','getNetworkType','openLocation','getLocation','hideOptionMenu','showOptionMenu','closeWindow','scanQRCode','chooseWXPay','openProductSpecificView','addCard','chooseCard','openCard']
		});
		$(function()
		{
			$(".qiandao").on('tap', function(event)
			{
				var params = {'pid':$(this).data('pid'),'tid':$(this).data('tid'),'eid':$(this).data('eid')};
			  	wx.getLocation({
			      	success: function (res) {
				        console.log(params);
				        $.ajax({
				          	 type: "POST"
				          	,async:false
				          	,url: "<?php echo U('ajax/qiandao');?>"
				          	,data:{"location":res,"params":params}
				          	,dataType: "json"
				          	,success: function(e)
				          	{
			          			if( e.errorCode==0 ){
			          				alert('签到成功');
			          				wx.closeWindow();
			          			}else
			          			{
			          				alert( e.errorStr );
			          			}
				            }
				        });
			      	},
			      	cancel: function (res) {
			        	alert('用户拒绝授权获取地理位置');
			      	}
			    });
		  	});
		})
	</script>
</html>