<?php

$base_config = [
    'site_name'=>"麒麟赛事",
    'api_url'=>'http://dev_lol_api.querylist.cn',//api站点URL
    'site_url'=>'http://dev.lol_info.com',//本站URl
    'game_name'=>"王者荣耀",
    'game'=>"kpl",
    'site_id'=>3,
    'source'=>"cpseo",
    'information_type_map'=>
        [
            3=>["type_name"=>"赛事战报","sub_name"=>"战报"],
            1=>["type_name"=>"竞游八卦","sub_name"=>"八卦"],
            2=>["type_name"=>"游戏公告","sub_name"=>"公告"],
            6=>["type_name"=>"最新活动","sub_name"=>"活动"],
        ],
    'hero_type' => [
        1=>'战士',
        2=>'法师',
        3=>'坦克',
        4=>'刺客',
        5=>'射手',
        6=>'辅助',
    ],
    'hero_stat_list' =>[
        1=>'生存能力',
        2=>'攻击伤害',
        3=>'技能效果',
        4=>'上手难度',
    ],
    'hero_tips' =>[
        'mate'=>"最佳搭档",
        'suppressed'=>"压制英雄",
        'suppress'=>"被压制英雄",
    ],
];

$additional_config = [
    'site_description'=> $base_config['site_name'].'致力于服务广大'.$base_config['game_name'].'玩家，为'.$base_config['game_name'].'玩家提供丰富的'.$base_config['game_name'].'游戏攻略、'.$base_config['game_name'].'电子竞技赛事资讯、数据分析及内容解读。',
    'api_get' => $base_config['api_url']."/get"
];
return array_merge($base_config,$additional_config);