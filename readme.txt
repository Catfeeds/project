数据库中添加sp_training表作为培训表存储信息
//左侧菜单在data~main_menu中声明为$left_nav，并在core.php及boot.php中被调用
//左侧菜单权限管理在core.php中完成
在$left_nav[main]中加入培训管理目录
//进行权限设置操作时，用户权限被写入sp_hr表的sys列中
//在main_menu中添加的节点会自动出现在左侧菜单及权限设置列表中，并遵从权限操作
//load函数在framework~import.php中，加载类并创建实例
//framework~cathe.fun.php中存储各种获取表单数值的函数
//数据读取路径：index.php=>left.php=>main_menu.php=>enterprise.php=>list.php=>enterprise.php=>edit.php
//批量导出excel由export_xls调用view~xls下的相应htm文件生成，由页面的button触发
//load函数定义在import.php下