修改记录
2015.9.8-----------------------------------------------
【bug修复】修复了因为DEBUG设置为0后产生的$_GET['DEBUG']中DEBUG为定义的问题
@zbzytech 这个问题只是在./framework/core.php中解决了 在别的地方未发现问题 看情况

【bug修复】部分函数缺少参数 如?c=file_list
/?c=export 中ksrot() 要求数组 而$data 为空时会带来BUG

control\enterprise 中$prod_check如非修改则会反应到前端不是数组

2015.9.9----------------------------------------------
【bug修复】部分函数缺少参数 如?c=file_list
?c=contract&a=edit&eid=1 的einfo.htm 页面中

admin\control\assess 函数中

【bug修复】评定一阶段证书问题

admin\control\assess\edit中 函数中 一阶段证书出现问题 将1002注释掉来默认一阶段不出证书

2015.9.14----------------------------------------------

【样式修改】符合中规要求样式
【功能】添加在线客服功能
