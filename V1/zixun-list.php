﻿ <!DOCTYPE html>
<html lang="zh-CN">
 <?php
 require_once "function/init.php";
 $info['page']['page_size'] = 10;
 $info['type'] = $_GET['type']??"info";
 $page = $_GET['page']??1;
 if($page==''){
     $page=1;
 }
 $zxtype=($info['type']!="info")?"/strategylist":"/newslist";
 $data = [
     "totalTeamList"=>["page"=>1,"page_size"=>12,"game"=>$config['game'],"source"=>"scoregg","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
     "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
     "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>"scoregg","fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
     "informationList"=>["game"=>$config['game'],"page"=>$page,"page_size"=>$info['page']['page_size'],"type"=>$info['type']=="info"?"1,2,3,5":"4","fields"=>"*"],
     "currentPage"=>["name"=>"infoList","type"=>$zxtype,"page"=>$page,"page_size"=>$info['page']['page_size'],"site_id"=>$config['site_id']]
 ];
 $return = curl_post($config['api_get'],json_encode($data),1);
 if(count($return["informationList"]['data'])==0)
 {
     render404($config);
 }
 $info['page']['total_count'] = $return['informationList']['count'];
 $info['page']['total_page'] = intval($return['informationList']['count']/$info['page']['page_size']);
 ?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $config['game_name'];?>最新<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>_<?php echo $config['game_name'];?>电竞头条-<?php echo $config['site_name'];?></title>
    <?php if($info['type']=="info"){?>
        <meta name="description" content="<?php echo $config['site_name'];?>提供<?php echo $config['game_name'];?>最新<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>，了解<?php echo $config['game_name'];?>电子竞技头条<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>，尽在<?php echo $config['site_name'];?>。">
    <?php }else{?>
        <meta name="description" content="<?php echo $config['site_name'];?>提供<?php echo $config['game_name'];?>游戏攻略，众多大神玩家为您介绍最新版本下<?php echo $config['game_name'];?>新玩法。">
    <?php }?>
    <meta name=”Keywords” Content=”<?php echo $config['game_name'];?>最新<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>,<?php echo $config['game_name'];?>电竞<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>″>
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
    <div class="container">
        <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
        <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
        <div class="nav">
            <ul>
                <?php
                $type = $info['type']=="info" ?"info":"stra";
                generateNav($config, $type);
                ?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>"><?php echo $config['game_name'];?>首页</a> > <a href="<?php echo $config['site_url']; ?><?php echo ($info['type']!="info")?"/strategylist/":"/newslist/";?>"><?php echo $config['game_name'];?><?php echo ($info['type']!="info")?"游戏攻略":"游戏资讯";?></a></div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="zx_nr">
          <div class="zx_lb">
            <ul>
                <?php foreach($return['informationList']['data'] as $key => $value) {?>
                    <li class="row">
                        <div class="col-lg-2 col-5">
                            <div class="t_p"><a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>"><img src="<?php echo $value['logo'];?>"></a></div>
                        </div>
                        <div class="col-lg-10 col-7">
                            <div class="w_z">
                                <h3><a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a></h3>
                                <p><?php echo strip_tags(html_entity_decode($value['content'])); ?></p>
                                <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>" class="m_r">read more +</a>
								<span><?php echo substr((($value["type"]==2)?$value['site_time']:$value['create_time']),0,10);?></span> 
                            </div>
                        </div>
                    </li>
                <?php }?>
            </ul>
          </div>
          <div class="page">
              <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$zxtype); ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">热门战队</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/teamlist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="rm_zd">
            <ul class="row">
                <?php
                foreach($return["totalTeamList"]['data'] as $type => $team)
                {?>
                    <li class="col-6">
                        <div class="n_r"><a href="<?php echo $config['site_url'];?>/teamdetail/<?php echo $team['team_id'];?>">
                                <div class="t_b"><img src="<?php echo $team['logo'];?>"></div>
                                <div class="w_z"><?php echo $team['team_name'];?></div>
                            </a></div>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
        <div class="sy_bt">
          <div class="b_t">热门选手</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/playerlist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr">
          <div class="rm_xs">
            <ul class="row">
                <?php
                foreach($return["totalPlayerList"]['data'] as $type => $player)
                {?>
                    <li class="col-4">
                        <div class="t_p"><a href="<?php echo $config['site_url'];?>/playerdetail/<?php echo $player['player_id'];?>">
                                <img src="<?php echo $player['logo'];?>">
                                <div class="w_z"><?php echo $player['player_name'];?></div>
                            </a></div>
                    </li>
                <?php }?>
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
        <?php }?>    </div>
  </div>
</div>
<div class="banquan">
  <?php renderCertification();?>
</div>
<div class="fh_top"><img src="<?php echo $config['site_url'];?>/images/fh_top.png"></div>
</body>
</html>