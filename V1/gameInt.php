 <!DOCTYPE html>
 <?php
 require_once "function/init.php";
 $data = [
     "totalTeamList"=>["page"=>1,"page_size"=>15,"game"=>$config['game'],"source"=>$config['source'],"rand"=>1,"fields"=>'team_id,team_name,logo',"cacheWith"=>"currentPage"],
     "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"]],
     "links"=>["site_id"=>$config['site_id'],"page"=>1,"page_size"=>6],
     "heroList"=>["dataType"=>"kplHeroList","page"=>1,"page_size"=>1000,"cacheWith"=>"currentPage","fields"=>"hero_id,hero_name,logo,type"],
     "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>3,"source"=>$config['source'],"fields"=>'player_id,position,player_name,logo,team_id',"rand"=>1,"cacheWith"=>"currentPage"],
     "straList"=>["dataType"=>"informationList","page"=>1,"page_size"=>8,"type"=>4],
     "gameConfig"=>$config['game'],
     "currentPage"=>["name"=>"gameInt","site_id"=>$config['site_id']]
 ];
 foreach($config['information_type_map'] as $type => $mapInfo)
 {
     $data["informationList_".$type] =  ["dataType"=>"informationList","page"=>1,"page_size"=>6,"type"=>$type];
 }
 $return = curl_post($config['api_get'],json_encode($data),1);
 ?>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="这是一个信息很完整的<?php echo $config['game_name'];?>游戏资讯站">
<meta name="keywords" content="<?php echo $config['game_name'];?>">
<title><?php echo $config['game_name'];?>-游戏介绍</title><?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
  <div class="container">
      <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
    <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
    <div class="nav">
      <ul>
          <?php generateNav($config,"game");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>"><?php echo $config['game_name'];?>首页</a> > 游戏介绍</div>
  <div class="yx_jj">
    <div class="sy_bt">
      <div class="b_t">热门英雄</div>
      <div class="clear"></div>
    </div>
    <div class="jj_nr">
      <div class="row">
        <div class="col-lg-5 col-12">
          <div class="t_p"><img src="<?php echo $return['gameConfig']['data']['logo'];?>"></div>
        </div>
        <div class="col-lg-7 col-12">
          <div class="w_z"><?php echo $return['gameConfig']['data']['description'];?><br>
              <?php echo $return['gameConfig']['data']['content'];?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="yx_lb">
    <div class="sy_bt">
      <div class="b_t"><?php echo $config['game_name']?>角色设定</div>
      <div class="m_r">
        <div class="bg"></div>
          <a href="<?php echo $config['site_url'];?>/herolist/">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="yx_nr">
      <div class="row">
        <div class="yx_lx">
          <div class="hd">
            <ul>
              <?php foreach($config['hero_type'] as $type => $type_name) {?>
                  <li><?php echo $type_name;?></li>
              <?php }?>
            </ul>
          </div>
        </div>
        <div class="yx_zs">
          <div class="bd">
              <?php foreach($config['hero_type'] as $type => $type_name) {?>
                  <ul class="row">
                      <?php foreach($return['heroList']['data'] as $hero) {
                          if($hero['type']==$type){?>
                      <li>
                          <div class="n_r"><a href="<?php echo $config['site_url'];?>/herodetail/<?php echo $hero['hero_id'];?>">
                                  <div class="t_b"><img src="<?php echo $hero['logo'];?>"></div>
                                  <div class="w_z"><?php echo $hero['hero_name'];?></div>
                              </a></div>
                      </li>
                      <?php }}?>
                  </ul>
              <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">热门战队</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/teamlist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
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
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">明星选手</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/playerList/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="mx_tj">
            <ul class="row">
                <?php
                foreach($return["totalPlayerList"]['data'] as $type => $player)
                {?>
                    <li class="col-4">
                        <div class="n_r"><a href="<?php echo $config['site_url'];?>/playerdetail/<?php echo $player['player_id'];?>">
                                <div class="t_p"><img src="<?php echo $player['logo'];?>"></div>
                                <div class="w_z">
                                    <div class="x_m"><?php echo $player['player_name'];?></div>
                                    <div class="j_s">位置：<?php echo $player['position'];?></div>
                                    <div class="j_s">所属战队：<?php echo $player['team_info']['team_name']??"未知";?></div>
                                </div>
                            </a></div>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">最新资讯</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/newsList/1">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="zx_zx">
            <div class="hd">
              <ul class="row">
                  <?php  foreach($config['information_type_map'] as $type => $mapInfo){?>
                      <li class="col-3"><span><?php echo $mapInfo['type_name']?></span></li>
                  <?php }?>
              </ul>
            </div>
            <div class="bd">
                <?php  foreach($config['information_type_map'] as $type => $mapInfo){?>
                    <div class="n_r">
                        <?php $informationList = $return["informationList_".$type]['data'];
                        $i = 1;
                        foreach($informationList as $key => $info)
                        { if($i==1){?>
                        <div class="d_b"><a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $info['id'];?>"><?php echo $info['title'];?></a></div><ul>
                            <?php }else{?>
                                <li>
                                <span><?php echo $mapInfo['sub_name'];?></span>
                                <div class="s_j"><?php echo substr($info['create_time'],0,10);?></div>
                                <a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $info['id'];?>"><?php echo $info['title'];?></a>
                                </li><?php }$i++;}?>

                        </ul>
                    </div>
                <?php }?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">游戏攻略</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/strategylist/1">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="yx_gl">
            <ul>
                <?php  foreach($return['straList']['data'] as $type => $info){?>
                    <li>
                        <span>视频</span>
                        <div class="s_j"><?php echo substr($info['create_time'],0,10);?></div>
                        <a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $info['id'];?>"><?php echo $info['title'];?></a>
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