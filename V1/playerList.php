 <!DOCTYPE html>
<html lang="zh-CN">
 <?php
 require_once "function/init.php";
 $info['page']['page_size'] = 24;
 $page = $_GET['page']??1;
 if($page==''){
     $page=1;
 }
 $data = [
     "playerList"=>["dataType"=>"totalPlayerList","page"=>$page,"page_size"=>$info['page']['page_size'],"game"=>$config['game'],"source"=>$config['source'],"fields"=>'player_id,player_name,logo'],
     "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_player_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
     "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
     "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>12,"source"=>$config['source'],"fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
     "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>6,"type"=>"1,2,3,5"],
     "currentPage"=>["name"=>"playerList","page"=>$page,"page_size"=>$info['page']['page_size'],"site_id"=>$config['site_id']]
 ];
 $return = curl_post($config['api_get'],json_encode($data),1);
 $info['page']['total_count'] = $return['playerList']['count'];
 $info['page']['total_page'] = ceil($return['playerList']['count']/$info['page']['page_size']);
 ?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $config['game_name'];?>职业选手名单大全-<?php echo $config['site_name'];?></title>
    <meta name=”Keywords” Content=”<?php echo $config['game_name'];?>职业选手名单,<?php echo $config['game_name'];?>职业选手大全″>
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
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>"><?php echo $config['game_name'];?>首页</a> > 选手列表</div>
  <div class="xs_lb">
    <div class="sy_bt">
      <div class="b_t"><?php echo $config['game_name'];?>选手列表</div>
      <div class="clear"></div>
    </div>
    <div class="xs_nr">
      <ul class="row">
          <?php
          foreach($return['playerList']['data'] as $playerInfo)
          {   ?>
              <li>
                  <div class="t_p"><a href="<?php echo $config['site_url']; ?>/playerdetail/<?php echo $playerInfo['player_id'];?>" title="<?php echo $playerInfo['player_name'];?>">
                              <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                                  <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                              <?php }else{?>
                                  <img src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                              <?php }?>
                          <div class="w_z"><?php echo $playerInfo['player_name'];?></div>
                      </a></div>
              </li>
          <?php }?>
      </ul>
      <div class="page">
          <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$config['site_url']."/playerlist"); ?>
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
        <div class="ny_nr">
          <div class="rm_zd">
            <ul class="row">
                <?php
                foreach($return["teamList"]['data'] as $type => $team)
                {?>
                    <li class="col-4">
                        <div class="n_r"><a href="<?php echo $config['site_url'];?>/playerdetail/<?php echo $team['team_id'];?>">
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
          <div class="b_t">热门资讯</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
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