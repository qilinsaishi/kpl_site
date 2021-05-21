 <!DOCTYPE html>
 <?php
 require_once "function/init.php";
 $data = [
     "slideImage"=>["dataType"=>"imageList","site_id"=>$config['site_id'],"flag"=>"index_slide_pic","page_size"=>20],
     "heroList"=>["dataType"=>"kplHeroList","page"=>1,"page_size"=>15,"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
     "totalTeamList"=>["page"=>1,"page_size"=>15,"game"=>$config['game'],"source"=>"scoregg","rand"=>1,"fields"=>'team_id,team_name,logo',"cacheWith"=>"currentPage","cache_time"=>86400*7],
     "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
     "links"=>["site_id"=>$config['site_id'],"page"=>1,"page_size"=>6],
     "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>5,"source"=>"scoregg","fields"=>'player_id,position,player_name,logo,team_id',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
     "straList"=>["dataType"=>"informationList","page"=>1,"page_size"=>8,"type"=>4,"site"=>$config['site_id'],"fields"=>"id,game,title,logo,type,site_time,create_time"],
     "currentPage"=>["name"=>"index","site_id"=>$config['site_id'],"cache_time"=>86400*7]
 ];
 foreach($config['information_type_map'] as $type => $mapInfo)
 {
     $data["informationList_".$type] =  ["dataType"=>"informationList","page"=>1,"page_size"=>6,"type"=>$type,"site"=>$config['site_id'],"fields"=>"id,game,title,logo,type,site_time,create_time"];
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
    <title><?php echo $config['site_name'];?>_<?php echo $config['game_name'];?>电子竞技赛事资讯分析网</title>
    <meta name="description" content="<?php echo $config['site_description'];?>">
<meta name=”Keywords” Content=”<?php echo $config['site_name'];?>″>
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
  <div class="container">
    <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
    <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
    <div class="nav">
      <ul>
          <?php generateNav($config,"index");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="swiper-container pc_ban">
  <div class="swiper-wrapper">
      <?php
      foreach($return["slideImage"]['data'] as $type => $pic)
      {?>
          <div class="swiper-slide" style="background:url(<?php echo $pic['logo'];?>) no-repeat center / cover;"></div>
      <?php }?>
  </div>
  <div class="swiper-pagination"></div>
</div>
<div class="container">
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">热门英雄</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="<?php echo $config['site_url'];?>/herolist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="rm_yx">
            <ul class="row">
                <?php
                foreach($return["heroList"]['data'] as $type => $hero)
                {?>
                    <li>
                        <div class="n_r"><a href="<?php echo $config['site_url'];?>/herodetail/<?php echo $hero['hero_id'];?>">
                                <div class="t_b"><img src="<?php echo $hero['logo'];?>"></div>
                                <div class="w_z"><?php echo $hero['hero_name'];?></div>
                            </a></div>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
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
    </div>
  </div>
  <div class="sy_mx">
    <div class="sy_bt">
      <div class="b_t">明星选手</div>
      <div class="m_r">
        <div class="bg"></div>
        <a href="<?php echo $config['site_url'];?>/playerlist/">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="mx_tj">
      <ul class="row">
          <?php
          foreach($return["totalPlayerList"]['data'] as $type => $player)
          {?>
              <li>
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
                            <div class="s_j"><?php echo date("Y-m-d",strtotime($info['site_time'])+8*3600);?></div>
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
                        <div class="s_j"><?php echo date("Y-m-d",strtotime($info['site_time'])+8*3600);?></div>
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
<script type="text/javascript" src="js/swiper.min.js"></script> 
<script type="text/javascript">
  var galleryTop = new Swiper('.pc_ban', {
	pagination:'.swiper-pagination',
	paginationClickable: true,
	slideToClickedSlide: true,
	autoplayDisableOnInteraction:false,
	autoplay:6000,
	loop:true,
  });
</script>
</body>
</html>