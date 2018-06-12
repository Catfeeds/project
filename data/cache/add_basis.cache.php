<?php
$add_basis_array = array(
	'1' => array(
		'code' => '1',
		'name' => 'Q/E/S复杂的后勤条件，涉及到不止一座建筑物或一处工作地点，分散在2处的，增加审核人日0.5天，3~5处的，增加审核人日数1天，超过5处的可视情况增加审核人日数2天；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'2' => array(
		'code' => '2',
		'name' => 'Q/E/S雇员使用多种语言（在多数情况下需要翻译人员或妨碍审核员个人独立工作）增加审核人日数1天；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'3' => array(
		'code' => '3',
		'name' => 'Q/E/S相对于雇员数量，工作现场很大（例如伐木工地，森林，高尔夫球场），可视情况增加审核人日数20%；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'4' => array(
		'code' => '4',
		'name' => '管理体系不成熟、发生过事故或过往周期被暂停或撤销过',
		'type' => 'add_basis',
		'is_stop' => '1',
	),
	'5' => array(
		'code' => '5',
		'name' => 'Q法规要求高的（如《认证机构认证业务范围分类表》中所示的带“*”号的企业增加审核人日数10%；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'6' => array(
		'code' => '6',
		'name' => 'Q体系覆盖了高度复杂/高风险的过程或相对数量大的彼此不同的活动，原则上每多一个大类增加审核人日数0.5天；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'7' => array(
		'code' => '7',
		'name' => '相关方意见',
		'type' => 'add_basis',
		'is_stop' => '1',
	),
	'8' => array(
		'code' => '8',
		'name' => '需要访问临时场所，以确定拟认证管理体系中常设场所的活动',
		'type' => 'add_basis',
		'is_stop' => '1',
	),
	'9' => array(
		'code' => '9',
		'name' => '需要审核的场所包括夜班',
		'type' => 'add_basis',
		'is_stop' => '1',
	),
	'10' => array(
		'code' => '10',
		'name' => 'Q/E/S发生过重大质量/环境/安全事故，增加审核人日数30%；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'11' => array(
		'code' => '11',
		'name' => 'QMS认证包括设计开发，或生产的产品超过3种（类）以上，增加0.5个现场审核工作日，再每增加3种（类）另外增加0.5个审核工作日',
		'type' => 'add_basis',
		'is_stop' => '1',
	),
	'12' => array(
		'code' => '12',
		'name' => '针对再认证项目，公司总人数在10人以下，至少增加1人日，总人数在11-45人，至少增加0.5人日作为现场审核时间',
		'type' => 'add_basis',
		'is_stop' => '1',
	),
	'13' => array(
		'code' => '13',
		'name' => '暂停后恢复监督审核的，每个体系至少增加0.5人日',
		'type' => 'add_basis',
		'is_stop' => '1',
	),
	'14' => array(
		'code' => '14',
		'name' => 'Q/E/S在临时场所从事简单工作（如服务和/或安装），原则上每个被抽样的临时场所增加审核人日数0.5天；在临时场所从事复杂工作（如建筑工程），原则上每个被抽样的临时场所增加审核人日数1天；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'15' => array(
		'code' => '15',
		'name' => 'Q/E/S原则上每个被抽样的多场所增加审核人日数0.5天；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'16' => array(
		'code' => '16',
		'name' => 'Q/E/S由于初审基础人日数为平均值，对于超过每个员工人数范围的平均人数至最大人数区间的50%的员工人数，增加审核人日数0.5天；同一员工人数范围的再认证基础人日数不作调整；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'17' => array(
		'code' => '17',
		'name' => 'E对于核、核发电、大量有毒材料的贮存、公共行政管理、地方政府、提供环境敏感产品或服务的组织（如石棉制品的制造、拆船、使用大量化学危险品和有害生物细菌的实验等），在环境复杂程度一级的基础上增加审核人日数30%；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'18' => array(
		'code' => '18',
		'name' => 'E/S对于组织的主要活动中包含有复杂或特殊辅助活动的，增加审核人日数30%；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'19' => array(
		'code' => '19',
		'name' => 'Q产品或服务失效将引起巨大经济损失或引起生命危险；',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
	'20' => array(
		'code' => '20',
		'name' => '其他',
		'type' => 'add_basis',
		'is_stop' => '0',
	),
)
;?>