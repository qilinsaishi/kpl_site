﻿ <!DOCTYPE html>
<html lang="zh-CN">
 <?php
 require_once "function/init.php";
 $player_id = $_GET['player_id']??0;
 $data = [
     "totalPlayerInfo"=>[$player_id],
     //"totalTeamList"=>["page"=>1,"page_size"=>6,"game"=>$config['game'],"source"=>"cpseo","fields"=>'team_id,team_name,logo,team_history',"rand"=>1,"cacheWith"=>"currentPage"],
     //"tournament"=>["page"=>1,"page_size"=>8],
     //"totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8,"source"=>"cpseo","fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
     //"defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"]],
     "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
     "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>6,"type"=>"1,2,3,5"],
     "keywordMapList"=>["fields"=>"content_id","game"=>$config['game'],"source_type"=>"player","source_id"=>$player_id,"page_size"=>100,"content_type"=>"information"],
     "currentPage"=>["name"=>"player","id"=>$player_id,"site_id"=>$config['site_id']]
 ];
 $return = curl_post($config['api_get'],json_encode($data),1);
 if(count($return["keywordMapList"]['data'])>0)
 {
     $data2 = [
         "informationList"=>["ids"=>array_column($return["keywordMapList"]['data'],"content_id"),"page_size"=>8,"fields"=>"id,title"]
     ];
     $return2 = curl_post($config['api_get'],json_encode($data2),1);
     $connectedInformationList = $return2["informationList"]["data"];
 }
 else
 {
     $connectedInformationList = [];
 }
 ?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <meta name="description" content="<?php echo $return['totalTeamInfo']['data']['team_name'];?><?php echo $return['totalPlayerInfo']['data']['player_name'];?>，真名为<?php echo $return['totalPlayerInfo']['data']['player_name'];?>，<?php echo $return['totalPlayerInfo']['data']['country'];?>人，<?php if(!in_array($return['totalPlayerInfo']['data']['position'],["","?"])){echo "在".$return['totalTeamInfo']['data']['team_name']."中长期打".$return['totalPlayerInfo']['data']['position'].".位置，";}?><?php if(count($return['totalPlayerInfo']['data']['playerList'])>0){echo "与".implode(",",array_column($return['totalPlayerInfo']['data']['playerList'],"player_name"))."为队友";}?>。">
    <meta name=”Keywords” Content=”<?php echo $return['totalPlayerInfo']['data']['player_name'];?>个人资料,<?php echo $return['totalTeamInfo']['data']['team_name'];?><?php if(!in_array($return['totalPlayerInfo']['data']['position'],["","?"])){echo $return['totalPlayerInfo']['data']['position'];}?><?php echo $return['totalPlayerInfo']['data']['player_name'];?>信息简介">
    <title><?php echo $return['totalPlayerInfo']['data']['player_name'];?>个人资料_<?php echo $return['totalPlayerInfo']['data']['teamInfo']['team_name'];?><?php if(!in_array($return['totalPlayerInfo']['data']['position'],["","?"])){echo $return['totalPlayerInfo']['data']['position'];}?><?php echo $return['totalPlayerInfo']['data']['player_name'];?>信息简介-<?php echo $config['site_name']?></title>
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
          游戏位置：<?php echo $return['totalPlayerInfo']['data']['position'];?><br>
          ID：<?php echo $return['totalPlayerInfo']['data']['player_name'];?><br>
          个人简介：<?php echo $return['totalPlayerInfo']['data']['description'];?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="zd_cy">
    <div class="sy_bt">
      <div class="b_t">同队成员介绍</div>
      <div class="m_r">
        <div class="bg"></div>
        <a href="">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="mx_tj">
      <ul class="row">
        <li class="col-lg-2 col-4">
          <div class="n_r"><a href="">
            <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a1.png"></div>
            <div class="w_z">
              <div class="x_m">Doinb</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：FPX</div>
            </div>
          </a></div>
        </li>
        <li class="col-lg-2 col-4">
          <div class="n_r"><a href="">
            <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a1.png"></div>
            <div class="w_z">
              <div class="x_m">Doinb</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：FPX</div>
            </div>
          </a></div>
        </li>
        <li class="col-lg-2 col-4">
          <div class="n_r"><a href="">
            <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a1.png"></div>
            <div class="w_z">
              <div class="x_m">Doinb</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：FPX</div>
            </div>
          </a></div>
        </li>
        <li class="col-lg-2 col-4">
          <div class="n_r"><a href="">
            <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a1.png"></div>
            <div class="w_z">
              <div class="x_m">Doinb</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：FPX</div>
            </div>
          </a></div>
        </li>
        <li class="col-lg-2 col-4">
          <div class="n_r"><a href="">
            <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a1.png"></div>
            <div class="w_z">
              <div class="x_m">Doinb</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：FPX</div>
            </div>
          </a></div>
        </li>
        <li class="col-lg-2 col-4">
          <div class="n_r"><a href="">
            <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a1.png"></div>
            <div class="w_z">
              <div class="x_m">Doinb</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：FPX</div>
            </div>
          </a></div>
        </li>
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
              $i = 1;
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
                        <a href="<?php echo $config['site_url'];?>/detail/<?php echo $info['id'];?>"><?php echo $info['title'];?></a>
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
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a1.jpg"></div>
                  <div class="w_z">佛山GK</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a2.jpg"></div>
                  <div class="w_z">西安WE</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a3.jpg"></div>
                  <div class="w_z">KS.YTG</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a4.jpg"></div>
                  <div class="w_z">TTG.XQ</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a5.jpg"></div>
                  <div class="w_z">TSG</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a6.jpg"></div>
                  <div class="w_z">EDG.Y</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a7.jpg"></div>
                  <div class="w_z">FBP</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a8.jpg"></div>
                  <div class="w_z">SNS</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a9.jpg"></div>
                  <div class="w_z">AG超玩会</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a1.jpg"></div>
                  <div class="w_z">佛山GK</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a2.jpg"></div>
                  <div class="w_z">西安WE</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a3.jpg"></div>
                  <div class="w_z">KS.YTG</div>
                </a></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sy_yl">
    <div class="sy_bt">
      <div class="b_t">友情链结</div>
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