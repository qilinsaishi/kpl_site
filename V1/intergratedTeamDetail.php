﻿<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$reset = $_GET['reset']??0;
$tid = $_GET['tid']??0;
if($tid<=0)
{
    render404($config);
}
$data = [
    "intergratedTeam"=>[$tid,"reset"=>$reset],
    "intergratedTeamList"=>["page"=>1,"page_size"=>12,"game"=>$config['game'],"fields"=>'tid,team_name,logo',"except_team"=>$tid,"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_team_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>14,"type"=>"1,2,3,5"],
    "currentPage"=>["name"=>"team","id"=>$tid,"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
$return["intergratedTeam"]['data']['redirect'] = json_decode($return["intergratedTeam"]['data']['redirect'],true);
if(isset($return["intergratedTeam"]['data']['redirect']['tid']) && $return["intergratedTeam"]['data']['redirect']['tid']>0)
{
    renderIntergratedTeam($config,$return["intergratedTeam"]['data']['redirect']['tid']);
    die();
}
elseif(isset($return["intergratedTeam"]['data']['redirect']['team_id']) && $return["intergratedTeam"]['data']['redirect']['team_id']>0)
{
    //return $this->getTeamInfo($totalTeam['redirect']['team_id'],0,$get_data,$force);
}
if(!isset($return["intergratedTeam"]['data']['tid']) || $return["intergratedTeam"]['data']['game'] != $config['game'] )
{
    render404($config);
}
else
{
    $data3 = [
        "keywordMapList"=>["fields"=>"content_id","source_type"=>"team","source_id"=>$return["intergratedTeam"]['data']['intergrated_id_list'],"page_size"=>100,"content_type"=>"information","list"=>["page_size"=>5,"fields"=>"id,title,create_time"]],
    ];
    $return3 = curl_post($config['api_get'],json_encode($data3),1);

}
if(count($return3["keywordMapList"]["data"]??[])==0)
{
    $data2 = [
        "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>5,"type"=>"1,2,3,5"],
    ];
    $return2 = curl_post($config['api_get'],json_encode($data2),1);
    $connectedInformationList = $return2["informationList"]["data"];
}
else
{
    $connectedInformationList = $return3["keywordMapList"]["data"];
}
if($reset>0)
{
    echo "refreshed";
    die();
}
?>
<head>
    <meta charset="UTF-8" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $return['intergratedTeam']['data']['team_name'];?>电子竞技俱乐部_<?php echo $return['intergratedTeam']['data']['team_name'];?>战队_<?php echo $return['intergratedTeam']['data']['team_name'];?>电竞俱乐部成员介绍-<?php echo $config['site_name'];?></title>
    <meta name="description" content="<?php echo strip_tags($return['intergratedTeam']['data']['description']??"");?>">
    <meta name=”Keywords” Content=”<?php echo $return['intergratedTeam']['data']['team_name'];?>电子竞技俱乐部,<?php
    if(substr_count($return['intergratedTeam']['data']['team_name'],"战队")==0){echo $return['intergratedTeam']['data']['team_name'].'战队,';}?><?php echo $return['intergratedTeam']['data']['team_name'];?>电竞俱乐部成员介绍″>
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
    <div class="container">
        <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
        <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
        <div class="nav">
            <ul>
                <?php generateNav($config,"team");?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="head_h"></div>
<div class="container">
    <div class="dq_wz"><a href="<?php echo $config['site_url'];?>"><?php echo $config['game_name'];?>首页</a> > <a href="<?php echo $config['site_url'];?>/teams/">战队列表</a> > <?php echo $return['intergratedTeam']['data']['team_name'];?></div>
    <div class="zd_js">
        <div class="row">
            <div class="col-lg-2 col-4">
                <div class="t_p"><img src="<?php echo  strlen($return['intergratedTeam']['data']['logo'])>=10 ?$return['intergratedTeam']['data']['logo']:$return['defaultConfig']['data']['default_team_img']['value'];?>"></div>
            </div>
            <div class="col-lg-10 col-8">
                <div class="w_z">
                    <div class="x_m"><?php echo $return['intergratedTeam']['data']['team_name'];?></div>
                    <div class="j_s">
                        全称：<?php echo $return['intergratedTeam']['data']['team_full_name'];?><br>
                        英文名：<?php echo $return['intergratedTeam']['data']['en_name'];?><br>
                        <?php
                        if(count($return['intergratedTeam']['data']['race_stat'])>0){echo '游戏战绩：'.implode('/',$return['intergratedTeam']['data']['race_stat']);}?></div>
                    <div class="j_j"><?php echo htmlspecialchars_decode($return['intergratedTeam']['data']['description']);?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="zd_cy">
        <div class="sy_bt">
            <div class="b_t">战队成员</div>
            <div class="clear"></div>
        </div>
        <div class="mx_tj">
            <ul class="row">
                <?php
                foreach($return['intergratedTeam']['data']['playerList'] as $playerInfo)
                {
                    ?>
                    <li class="col-lg-2 col-4">
                        <div class="n_r"><a href="<?php echo $config['site_url']; ?>/player/<?php echo $playerInfo['pid'];?>" title="<?php echo $playerInfo['player_name']?>" target="_blank">
                                <div class="t_p">
                                    <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                                        <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" src="<?php echo strlen($playerInfo['logo'])>10 ? $playerInfo['logo']:$return['defaultConfig']['data']['default_player_img']['value'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                                    <?php }else{?>
                                        <img src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                                    <?php }?>
                                </div>
                                <div class="w_z">
                                    <div class="x_m"><?php echo $playerInfo['player_name']?></div>
                                    <div class="j_s">位置：<?php echo $playerInfo['position']?></div>
                                </div>
                            </a></div>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
    <div class="sy_zh">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="sy_bt">
                    <div class="b_t">战队相关资讯</div>
                    <div class="clear"></div>
                </div>
                <div class="ny_nr">
                    <div class="rm_zx">
                        <ul>
                            <?php
                            if(count($connectedInformationList)>0)
                            {
                                foreach($connectedInformationList as $key => $value) {?>
                                    <li>
                                    <div class="s_j"><?php echo substr($value['create_time'],0,10);?></div>
                                    <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a>
                                    </li>
                                <?php }}else{ ?>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="sy_bt">
                    <div class="b_t">相关战队推荐</div>
                    <div class="m_r">
                        <div class="bg"></div>
                        <a href="<?php echo $config['site_url'];?>/teams/">MORE +</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="ny_nr">
                    <div class="rm_zd">
                        <ul class="row">
                            <?php
                            foreach($return["intergratedTeamList"]['data'] as $type => $team)
                            {?>
                                <li class="col-4">
                                    <div class="n_r"><a href="<?php echo $config['site_url'];?>/team/<?php echo $team['tid'];?>">
                                            <div class="t_b"><img src="<?php echo $team['logo'];?>"></div>
                                            <div class="w_z"><?php echo $team['team_name'];?></div>
                                        </a></div>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="zd_tw">
        <div class="sy_bt">
            <div class="b_t"><?php echo $return['intergratedTeam']['data']['team_name'];?>最新资讯</div>
            <div class="m_r">
                <div class="bg"></div>
                <a href="<?php echo $config['site_url'];?>/newslist/1">MORE +</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="zx_nr">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <div class="tw_lb">
                        <ul class="row">
                            <?php $i=1;
                            foreach($return["informationList"]['data'] as  $info)
                            { if($i<=6){?>
                                <li class="col-4">
                                    <div class="t_p">
                                        <a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $info['id'];?>"><img src="<?php echo $info['logo'];?>"></a>
                                        </div>
                                </li>
                            <?php }$i++;}?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="xw_lb">
                        <ul>
                            <?php $i=1;
                            foreach($return["informationList"]['data'] as  $info)
                            { if($i>6){?>
                                <li>
                                    <div class="s_j"><?php echo substr($info['create_time'],0,10);?></div>
                                    <a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $info['id'];?>"><?php echo $info['title'];?></a>
                                </li>
                            <?php }$i++;}?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sy_yl">
        <div class="sy_bt">
            <div class="b_t">友情链接</div>
            <div class="clear"></div>
        </div>
        <div class="lj_nr">
            <?php
            foreach($return['links']['data'] as $linksInfo)
            {   ?>
                <a title = "<?php echo $linksInfo['name'];?>" href="<?php echo $linksInfo['url'];?>" target="_blank"><?php echo $linksInfo['name'];?></a>
            <?php }?>
        </div>
    </div>
</div>
<div class="banquan">
    <?php renderCertification();?>
</div>
<div class="fh_top"><src="<?php echo $config['site_url'];?>/imagesfh_top.png"></div>
</body>
</html>