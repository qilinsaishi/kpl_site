 <!DOCTYPE html>
<html lang="zh-CN">
 <?php
 require_once "function/init.php";
 $info['page']['page_size'] = 30;
 $page = $_GET['page']??1;
 if($page==''){
     $page=1;
 }
 $data = [
     //"teamList"=>["dataType"=>"totalTeamList","page"=>$page,"page_size"=>$info['page']['page_size'],"game"=>$config['game'],"source"=>"scoregg","fields"=>'team_id,team_name,logo'],
     "intergratedTeamList"=>["page"=>$page,"page_size"=>$info['page']['page_size'],"fields"=>'tid,team_name,logo',"game"=>$config['game'],"cache_time"=>86400*7],
     "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_team_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
     "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
     "hotPlayerList"=>["dataType"=>"intergratedPlayerList","game"=>$config['game'],"page"=>1,"page_size"=>8,"fields"=>'pid,position,player_name,logo,team_id',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
     "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>6,"type"=>"1,2,3,5"],
     "currentPage"=>["name"=>"intergratedTeamList","page"=>$page,"page_size"=>$info['page']['page_size'],"site_id"=>$config['site_id']]
 ];
 $return = curl_post($config['api_get'],json_encode($data),1);
 $info['page']['total_count'] = $return['intergratedTeamList']['count'];
 $info['page']['total_page'] = ceil($return['intergratedTeamList']['count']/$info['page']['page_size']);

 ?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $config['game_name'];?>战队_<?php echo $config['game_name'];?>电子竞技战队-<?php echo $config['site_name'];?></title>
    <meta name="description" content="<?php echo $config['site_name'];?>提供完善的<?php echo $config['game_name'];?>战队信息及<?php echo $config['game_name'];?>电子竞技俱乐部赛事信息资讯及数据分析内容解读。">
    <meta name=”Keywords” Content=”<?php echo $config['game_name'];?>战队,<?php echo $config['game_name'];?>电竞战队,<?php echo $config['game_name'];?>电子竞技俱乐部″>
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
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>"><?php echo $config['game_name'];?>首页</a> > 战队列表</div>
  <div class="zd_lb">
    <div class="sy_bt">
      <div class="b_t"><?php echo $config['game_name'];?>战队列表</div>
      <div class="clear"></div>
    </div>
    <div class="zd_nr">
      <ul class="row">
          <?php
          foreach($return['intergratedTeamList']['data'] as $teamInfo)
          {   ?>
              <li>
                  <div class="n_r"><a href="<?php echo $config['site_url']; ?>/team/<?php echo $teamInfo['tid'];?>" title="<?php echo $teamInfo['team_name'];?>">
                          <div class="t_b">
                              <?php if(isset($return['defaultConfig']['data']['default_team_img'])){?>
                                  <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_team_img']['value'];?>" src="<?php echo $teamInfo['logo'];?>" title="<?php echo $teamInfo['team_name'];?>" />
                              <?php }else{?>
                                  <img src="<?php echo $teamInfo['logo'];?>" title="<?php echo $teamInfo['team_name'];?>" />
                              <?php }?></div>
                          <div class="w_z"><?php echo $teamInfo['team_name'];?></div>
                      </a></div>
              </li>
          <?php }?>
      </ul>
      <div class="page">
          <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$config['site_url']."/teams"); ?>
      </div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">热门选手</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/players/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="ny_nr">
          <div class="rm_xs">
            <ul class="row">
                <?php
                foreach($return["hotPlayerList"]['data'] as $type => $player)
                {?>
                    <li class="col-3">
                        <div class="t_p"><a href="<?php echo $config['site_url'];?>/player/<?php echo $player['pid'];?>">
                                <img src="<?php echo $player['logo'];?>">
                                <div class="w_z"><?php echo $player['player_name'];?></div>
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