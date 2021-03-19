 <!DOCTYPE html>
<html lang="zh-CN">
 <?php
 require_once "function/init.php";
 $player_id = $_GET['player_id']??0;
 if($player_id<=0)
 {
     render404($config);
 }
 $data = [
     "totalPlayerInfo"=>[$player_id],
     "totalTeamList"=>["page"=>1,"page_size"=>12,"game"=>$config['game'],"source"=>"scoregg","fields"=>'team_id,team_name,logo,team_history',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
     "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
     "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>6,"type"=>"1,2,3,5"],
     "keywordMapList"=>["fields"=>"content_id","game"=>$config['game'],"source_type"=>"player","source_id"=>$player_id,"page_size"=>100,"content_type"=>"information","list"=>["page_size"=>8,"fields"=>"id,title,create_time"]],
     "currentPage"=>["name"=>"player","id"=>$player_id,"site_id"=>$config['site_id']]
 ];
 $return = curl_post($config['api_get'],json_encode($data),1);
 if(!isset($return["totalPlayerInfo"]['data']['player_id']) || $return["totalPlayerInfo"]['data']['game'] != $config['game'] )
 {
     render404($config);
 }
 if(count($return["keywordMapList"]["data"])==0)
 {
     $data2 = [
         "keywordMapList"=>["fields"=>"content_id","game"=>$config['game'],"source_type"=>"team","source_id"=>$return['totalPlayerInfo']['data']['teamInfo']['team_id'],"page_size"=>100,"content_type"=>"information","list"=>["page_size"=>8,"fields"=>"id,title,create_time"]],
     ];
     $return2 = curl_post($config['api_get'],json_encode($data2),1);
     $connectedInformationList = $return2["keywordMapList"]["data"];
 }
 else
 {
     $connectedInformationList = $return["keywordMapList"]["data"];
 }

 $data3 = [
     "teamMateList"=>["dataType"=>"totalPlayerList","game"=>$config['game'],"page"=>1,"page_size"=>100,"fields"=>'player_id,player_name,logo,position',"team_id"=>$return['totalPlayerInfo']['data']['team_id']],
 ];
 $return3 = curl_post($config['api_get'],json_encode($data3),1);
 ?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $return['totalPlayerInfo']['data']['player_name'];?>个人资料_<?php echo $return['totalPlayerInfo']['data']['teamInfo']['team_name'];?><?php if(!in_array($return['totalPlayerInfo']['data']['position'],["","?"])){echo $return['totalPlayerInfo']['data']['position'];}?><?php echo $return['totalPlayerInfo']['data']['player_name'];?>信息简介-<?php echo $config['site_name']?></title>
    <meta name="description" content="<?php echo $return['totalPlayerInfo']['data']['player_name'];?><?php echo $return['totalPlayerInfo']['data']['player_name'];?>，真名为<?php echo $return['totalPlayerInfo']['data']['player_name'];?>，<?php echo $return['totalPlayerInfo']['data']['country'];?>人，<?php if(!in_array($return['totalPlayerInfo']['data']['position'],["","?"])){echo "在".$return['totalTeamInfo']['data']['team_name']."中长期打".$return['totalPlayerInfo']['data']['position'].".位置，";}?><?php if(count($return['totalPlayerInfo']['data']['playerList'])>0){echo "与".implode(",",array_column($return['totalPlayerInfo']['data']['playerList'],"player_name"))."为队友";}?>。">
    <meta name=”Keywords” Content=”<?php echo $return['totalPlayerInfo']['data']['player_name'];?>个人资料,<?php echo $return['totalPlayerInfo']['data']['teamInfo']['team_name'];?><?php if(!in_array($return['totalPlayerInfo']['data']['position'],["","?"])){echo $return['totalPlayerInfo']['data']['position'];}?><?php echo $return['totalPlayerInfo']['data']['player_name'];?>信息简介">
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
    <div class="container">
        <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
        <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
        <div class="nav">
            <ul>
                <?php generateNav($config,"player");?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>"><?php echo $config['game_name'];?>首页</a> > <a href="<?php echo $config['site_url'];?>/playerlist/">选手列表</a> > 选手详情</div>
  <div class="cy_js">
    <div class="row">
      <div class="col-lg-2 col-4">
        <div class="t_p"><img src="<?php echo $return['totalPlayerInfo']['data']['logo'];?>"></div>
      </div>
      <div class="col-lg-10 col-8">
        <div class="j_s">
          <div class="x_m"><?php echo $return['totalPlayerInfo']['data']['player_name'];?></div>
          <div class="j_j">中文名：<?php echo $return['totalPlayerInfo']['data']['cn_name'];?><br>
          英文名：<?php echo $return['totalPlayerInfo']['data']['en_name'];?><br>
              所属战队：<a href = '<?php echo $config['site_url']; ?>/teamdetail/<?php echo $return['totalPlayerInfo']['data']['teamInfo']['team_id'];?>'><?php echo $return['totalPlayerInfo']['data']['teamInfo']['team_name'];?></a><br>
              游戏位置：<?php echo $return['totalPlayerInfo']['data']['position'];?><br>
          ID：<?php echo $return['totalPlayerInfo']['data']['player_name'];?><br>
          个人简介：<?php echo $return['totalPlayerInfo']['data']['description'];?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="zd_cy">
    <div class="sy_bt">
    <div class="sy_bt">
      <div class="b_t">同队成员介绍</div>
      <div class="clear"></div>
    </div>
    <div class="mx_tj">
      <ul class="row">
          <?php
          foreach($return3["teamMateList"]['data'] as $type => $player)
          { if($player['player_id']!=$player_id){?>
              <li class="col-lg-2 col-4">
                  <div class="n_r"><a href="<?php echo $config['site_url'];?>/playerdetail/<?php echo $player['player_id'];?>">
                          <div class="t_p"><img src="<?php echo $player['logo'];?>"></div>
                          <div class="w_z">
                              <div class="x_m"><?php echo $player['player_name'];?></div>
                              <div class="j_s">位置：<?php echo $player['position'];?></div>
                          </div>
                      </a></div>
              </li>
          <?php }}?>
      </ul>
    </div>
  </div>
  <div class="zd_zx">
    <div class="sy_bt">
      <div class="b_t"><?php echo $return['totalPlayerInfo']['data']['player_name'];?>相关资讯</div>
      <div class="clear"></div>
    </div>
    <div class="zx_nr">
      <ul class="row">
          <?php
          if(count($connectedInformationList)>0)
          {
              foreach($connectedInformationList as $key => $value) {?>
                      <li class="col-lg-6 col-12">
                          <div class="n_r">
                              <span>视频</span>
                              <div class="s_j"><?php echo substr($value['create_time'],0,10);?></div>
                              <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a>
                          </div>
                      </li><?php }}else{ ?>
          <?php }?>
      </ul>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">最新资讯</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/newslist/1">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="ny_nr">
          <div class="rm_zx">
            <ul>
                <?php
                foreach($return["informationList"]['data'] as  $info)
                {?>
                    <li>
                        <div class="s_j"><?php echo substr($info['create_time'],0,10);?></div>
                        <a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $info['id'];?>"><?php echo $info['title'];?></a>
                    </li>
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
<div class="fh_top"><img src="<?php echo $config['site_url'];?>/images/fh_top.png"></div>
</body>
</html>