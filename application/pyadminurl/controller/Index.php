<?php
namespace app\pyadminurl\controller;
use think\Controller;
use think\Request;
use think\Session;
use think\Db;

class Index extends Common
{

     public function index()
     {
     	// 分配菜单数据
	    //  $nav_data = Db::name('admin_nav')->order('sort asc')->select(); 
		//  $nav_data = $this->getTreeData($nav_data,'level');

		//  $nav_data = '';
		//  $this->assign('nav_data',$nav_data);

     	 return view();
     }
      

     //会员统计 
     public function member()
     {
   
      //柱状图和折线图原始模板
     	$array = 
     	[
				'tooltip' => ['trigger'=>'axis'],
				'legend' => ['data' => ['注册会员','活跃会员']],
				'toolbox' => 
					[
					  'show' => true,
						'feature' =>
						[
					        'mark' => ['show' => true],
							'dataView' => ['show'=>true,'readOnly'=>false],
							'magicType' => ['show'=>true,'type'=>['line','bar']],
							'restore' => ['show'=>true],
							'saveAsImage' => ['show'=>true]
						 ]
					],
			'calculable' => true,
			'xAxis' => ['type'=>'category','data'=>['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']],
			'yAxis' => ['type'=>'value','splitArea'=>['show'=>true]],
			'series' => 
			[
             
	             ['name' => '注册会员',
	             'type' => 'bar',
	             'data' => [1,21,12,1,142,432,235,1234,14,3,412,41]
	             ],
	             ['name' => '活跃会员',
	             'type' => 'bar',
	             'data' => [1,212,122,11,1421,4312,2315,12134,114,13,4112,141]
	             ]
			]
			
     	];

        //得到年份 
        $time = time();
		$year = floor(date("Y",$time));
		$register = []; $login = [];
		for($i=1;$i<=12;$i++)
		{

			//得到每个月开始和结束的时间戳
			$date = $year."-".$i;
			$first =strtotime(date('Y-m-01', strtotime($date)));
			$last = strtotime(date('Y-m-t', strtotime($date)));
			//echo $first .'-'. $last ."<br/>";
			//得到每个月的注册会员
		    $register[] = Db::name('member')->where('reg_time','between',$first.','.$last)
		                                    ->count();
		    //得到每个月的登陆会员
		    $login[] = Db::name('member')->where('last_login_time','between',$first.','.$last)
		                                    ->count();
	    }
       
        //将数据写入模板中

        unset($array['series']);
        $array['series'] =
		[
	     
	         ['name' => '注册会员',
	         'type' => 'bar',
	         'data' => $register
	         ],
	         ['name' => '活跃会员',
	         'type' => 'bar',
	         'data' => $login
	         ]
		];
      return json($array);
       
     }


     //充值提现统计
     public function money()
     {
   
        //柱状图和折线图原始模板
     	$array = 
     	[
				'tooltip' => ['trigger'=>'axis'],
				'legend' => ['data' => ['成功充值','成功提现']],
				'toolbox' => 
					[
					  'show' => true,
						'feature' =>
						[
					        'mark' => ['show' => true],
							'dataView' => ['show'=>true,'readOnly'=>false],
							'magicType' => ['show'=>true,'type'=>['line','bar']],
							'restore' => ['show'=>true],
							'saveAsImage' => ['show'=>true]
						 ]
					],
			'calculable' => true,
			'xAxis' => ['type'=>'category','data'=>['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']],
			'yAxis' => ['type'=>'value','splitArea'=>['show'=>true]],
			'series' => 
			[
             
	             ['name' => '充值',
	             'type' => 'bar',
	             'data' => [1,21,12,1,142,432,235,1234,14,3,412,41]
	             ],
	             ['name' => '提现',
	             'type' => 'bar',
	             'data' => [1,212,122,11,1421,4312,2315,12134,114,13,4112,141]
	             ]
			]
			
     	];

        //得到年份 
        $time = time();
		$year = floor(date("Y",$time));
		$register = []; $login = [];
		for($i=1;$i<=12;$i++)
		{

			//得到每个月开始和结束的时间戳
			$date = $year."-".$i;
			$first =strtotime(date('Y-m-01', strtotime($date)));
			$last = strtotime(date('Y-m-t', strtotime($date)));
			//echo $first .'-'. $last ."<br/>";
			//得到每个月的注册会员
		    $recharge[] = Db::name('order_recharge')->where('pay_time','between',$first.','.$last)
		                                    ->sum('amount');
		    //得到每个月的登陆会员
		    $withdraw[] = Db::name('withdraw')->where('pay_time','between',$first.','.$last)
		                                    ->sum('amount');
	    }
       
        //将数据写入模板中

        unset($array['series']);
        $array['series'] =
		[
	     
	         ['name' => '成功充值',
	         'type' => 'line',
	         'data' => $recharge
	         ],
	         ['name' => '成功提现',
	         'type' => 'line',
	         'data' => $withdraw
	         ]
		];
      return json($array);
     }

     //订单统计
     public function order()
     {
        //柱状图和折线图原始模板
     	$array = 
     	[
			'tooltip' => ['trigger'=>'axis'],
			'legend' => ['data' => ['成交订单','成交金额']],
			'toolbox' => 
				[
				  'show' => true,
					'feature' =>
					[
				        'mark' => ['show' => true],
						'dataView' => ['show'=>true,'readOnly'=>false],
						'magicType' => ['show'=>true,'type'=>['line','bar']],
						'restore' => ['show'=>true],
						'saveAsImage' => ['show'=>true]
					 ]
				],
			'calculable' => true,
			'xAxis' => ['type'=>'category','data'=>['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']],
			'yAxis' => ['type'=>'value','splitArea'=>['show'=>true]],
			'series' => 
			[
             
	             ['name' => '成交订单',
	             'type' => 'bar',
	             'data' => [1,21,12,1,142,432,235,1234,14,3,412,41]
	             ],
	             ['name' => '成交金额',
	             'type' => 'bar',
	             'data' => [1,212,122,11,1421,4312,2315,12134,114,13,4112,141]
	             ]
			]
			
     	];

        //得到年份 
        $time = time();
		$year = floor(date("Y",$time));
		for($i=1;$i<=12;$i++)
		{

			//得到每个月开始和结束的时间戳
			$date = $year."-".$i;
			$first =strtotime(date('Y-m-01', strtotime($date)));
			$last = strtotime(date('Y-m-t', strtotime($date)));
			//echo $first .'-'. $last ."<br/>";
		    //得到每个月的成交订单数
		    $order_amount[] = Db::name('order_goods')->where('create_time','between',$first.','.$last)->where('status','1')->count();
		    //得到每个月的订单金额
		    $order_paid[] = Db::name('order_goods')->where('create_time','between',$first.','.$last)->where('status','1')->sum('paid');
	    }
       
        //将数据写入模板中

        unset($array['series']);
        $array['series'] =
		[
	     
	         ['name' => '成交订单',
	         'type' => 'line',
	         'data' => $order_amount
	         ],
	         ['name' => '成交金额',
	         'type' => 'line',
	         'data' => $order_paid
	         ]
		];
      return json($array);
     }

     public function yj_test(){
     	header("Content-type:text/html;charset=utf-8");
     	$str = "AM——敌法师
AXE——斧王
BANE——痛苦之源  
BB——刚背兽  
BH——赏金猎人   
BM——兽王 
BONE——骷髅弓箭手 
BR——育母蜘蛛 
BS——血魔 
CHEN——圣骑士
CM——水晶室女
CK——混沌骑士
CW——半人马酋长
CENT——半人马酋长
DIRGE——不朽尸王
DK——龙骑士
DP——死亡先知
DR——黑暗游侠
DS——黑暗贤者
EH——魅惑魔女
Enig——谜团
ES——撼地神牛
FUR——先知
FV——虚空假面
GA——炼金术士
GC——发条
Goblin——哥布林工程师
Hus——神灵武士
JUGG——剑圣
KAEL——召唤师
KOTL——光之守卫
KUNKKA——船长
LD——德鲁伊
LICH——巫妖
LINA——秀逗魔导士
LION——恶魔巫师
LOA——地狱领主
Lucifer——末日守卫
LUNA——月之骑士
LYC——狼人
MAG——半人猛犸
MEDUSA——蛇发女妖
MEEPO——地卜师
MOR——变体精灵
N'aix——食尸鬼
NA——地穴刺客
NAGA——娜迦海妖
NEC——死灵法师
NS——暗夜魔王
NW——地穴编织者
OD——黑耀毁灭者
OK——全能骑士
OM——食人魔魔法师
PA——幻影刺客
PANDA——熊猫酒仙
PL——幻影长矛手
PL——深渊领主
POM——月之女祭司
PUCK——精灵龙
PUDGE——屠夫
PUGNA——遗忘法师
QOP——痛苦女王
RAZOR——闪电幽魂
SA——隐形刺客
SB——裂魂人
SF——影魔
SG——鱼人守卫
SIL——沉默术士
SK——沙王
Sniper——矮人火枪手
SNK——骷髅王
SP——暗影牧师
SPE——幽鬼
SS——暗影萨满
STORM——风暴之灵
SVEN——流浪剑客
TA——圣堂刺客
TB——灵魂守卫
TC——牛头人酋长
TH——潮汐猎人
THD——双头龙
TINY——山岭巨人
TK——地精修补匠
TS——受折磨的灵魂
TW——巨魔战将
UW——熊战士
VENO——剧毒术士
VIP——冥界亚龙
VIS——死灵飞龙
VS——复仇之魂
WD——巫医
WL——术士
WR——风行者
ZEUS——众神之王";
	$arr = explode("\n", $str);
		foreach ($arr as $k => $v) {
			$name_arr = explode('——', $v);
			$alias = $name_arr[0];
			$name = trim($name_arr[1]);
			//$list = Db::name('steam_category')->where('title',$name)->find();
			//dump($list);exit;
			Db::name('steam_category')->where('title',$name)->update(['alias' => $alias]);
		}
		dump('ojbk');exit;
    }
}

