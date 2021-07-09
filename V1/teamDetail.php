<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$team_id = $_GET['team_id']??0;
$reset = $_GET['reset']??0;
if($team_id<=0)
{
    render404($config);
}
$data = [
    "totalTeamInfo"=>[$team_id,"reset"=>intval($reset)],
    "totalTeamList"=>["page"=>1,"page_size"=>12,"game"=>$config['game'],"source"=>"scoregg","fields"=>'team_id,team_name,logo,team_history',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "keywordMapList"=>["fields"=>"content_id","site"=>$config['site_id'],"source_type"=>"team","source_id"=>$team_id,"page_size"=>100,"content_type"=>"information","list"=>["page_size"=>6,"fields"=>"id,title,site_time"]],
    "informationList"=>["site"=>$config['site_id'],"page"=>1,"page_size"=>14,"type"=>"1,3,5,6,7"],
    "currentPage"=>["name"=>"team","id"=>$team_id,"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
if($reset>0)
{
    echo "refreshed";
    die();
}
if(!isset($return["totalTeamInfo"]['data']['team_id']) || $return["totalTeamInfo"]['data']['game'] != $config['game'] )
{
    render404($config);
}
$return['totalTeamInfo']['data']['race_stat'] = json_decode($return['totalTeamInfo']['data']['race_stat']??"",true)??[];
if(count($return["keywordMapList"]["data"])==0)
{
    $data2 = [
        "informationList"=>["site"=>$config['site_id'],"page"=>1,"page_size"=>6,"type"=>"1,3,5,6,7"],
    ];
    $return2 = curl_post($config['api_get'],json_encode($data2),1);
    $connectedInformationList = $return2["informationList"]["data"];
}
else
{
    $connectedInformationList = $return["keywordMapList"]["data"];
}
if(substr($return['totalTeamInfo']['data']['description'],0,1)=='"' && substr($return['totalTeamInfo']['data']['description'],-1)=='"')
{
    $return['totalTeamInfo']['data']['description'] = json_decode($return['totalTeamInfo']['data']['description'],true);
}
?>
<head>
    <meta charset="UTF-8" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $return['totalTeamInfo']['data']['team_name'];?>电子竞技俱乐部_<?php echo $return['totalTeamInfo']['data']['team_name'];?>战队_<?php echo $return['totalTeamInfo']['data']['team_name'];?>电竞俱乐部成员介绍-<?php echo $config['site_name'];?></title>
    <meta name="description" content="<?php echo strip_tags($return['totalTeamInfo']['data']['description']);?>">
    <meta name="Keywords" Content="<?php echo $return['totalTeamInfo']['data']['team_name'];?>电子竞技俱乐部,<?php
    if(substr_count($return['totalTeamInfo']['data']['team_name'],"战队")==0){echo $return['totalTeamInfo']['data']['team_name'].'战队,';}?><?php echo $return['totalTeamInfo']['data']['team_name'];?>电竞俱乐部成员介绍">
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
    <div class="dq_wz"><a href="<?php echo $config['site_url'];?>"><?php echo $config['game_name'];?>首页</a> > <a href="<?php echo $config['site_url'];?>/teamlist/">战队列表</a> > <?php echo $return['totalTeamInfo']['data']['team_name'];?></div>
    <div class="zd_js">
        <div class="row">
            <div class="col-lg-2 col-4">
                <div class="t_p"><img src="<?php echo $return['totalTeamInfo']['data']['logo'];?>"></div>
            </div>
            <div class="col-lg-10 col-8">
                <div class="w_z">
                    <div class="x_m"><?php echo $return['totalTeamInfo']['data']['team_name'];?></div>
                    <div class="j_s">
                        英文名：<?php echo $return['totalTeamInfo']['data']['en_name'];?><br>
                        <?php
                        if(is_array($return['totalTeamInfo']['data']['race_stat']) && count($return['totalTeamInfo']['data']['race_stat'])>0){echo '游戏战绩：'.implode('/',$return['totalTeamInfo']['data']['race_stat']);}?></div>
                    <div class="j_j"><?php echo htmlspecialchars_decode($return['totalTeamInfo']['data']['description']);?></div>
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
                foreach($return['totalTeamInfo']['data']['playerList'] as $playerInfo)
                {
                    ?>
                    <li class="col-lg-2 col-4">
                        <div class="n_r"><a href="<?php echo $config['site_url']; ?>/playerdetail/<?php echo $playerInfo['player_id'];?>" title="<?php echo $playerInfo['player_name']?>" target="_blank">
                                <div class="t_p">
                                    <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                                        <img lazyload="true" src="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" data-original="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
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
                                    <div class="s_j"><?php echo date("Y-m-d",strtotime($value['site_time']));?></div>
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
                        <a href="<?php echo $config['site_url'];?>/teamlist/">MORE +</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="ny_nr">
                    <div class="rm_zd">
                        <ul class="row">
                            <?php
                            foreach($return["totalTeamList"]['data'] as $type => $team)
                            {?>
                                <li class="col-4">
                                    <div class="n_r"><a href="<?php echo $config['site_url'];?>/teamdetail/<?php echo $team['team_id'];?>">
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
            <div class="b_t"><?php echo $return['totalTeamInfo']['data']['team_name'];?>最新资讯</div>
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
                                    <div class="s_j"><?php echo date("Y-m-d",strtotime($info['site_time']));?></div>
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