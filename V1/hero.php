﻿ <!DOCTYPE html>
<html lang="zh-CN">
 <?php
 $hero_id = $_GET['hero_id'];
 if($hero_id<=0)
 {
     render404($config);
 }
 require_once "function/init.php";

 $data = [
     "kplHero"=>[$hero_id],
     "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
     "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
     "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>3,"source"=>"scoregg","fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
     "keywordMapList"=>["fields"=>"content_id","site"=>$config['site_id'],"game"=>$config['game'],"source_type"=>"hero","source_id"=>$hero_id,"page_size"=>100,"content_type"=>"information","list"=>["page_size"=>13,"type"=>4,"fields"=>"id,title,logo,type,site_time"]],
     "currentPage"=>["name"=>"hero","id"=>$hero_id,"site_id"=>$config['site_id']]
 ];
 $return = curl_post($config['api_get'],json_encode($data),1);
 if(!isset($return["kplHero"]['data']['hero_id']))
 {
     render404($config);
 }
 $connectedInformationList = $return["keywordMapList"]["data"];
 ?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $config['game_name'];?><?php echo $return['kplHero']['data']['cn_name'].$return['kplHero']['data']['hero_name'];?>介绍_<?php echo $return['kplHero']['data']['cn_name'].$return['kplHero']['data']['hero_name'];?>攻略-<?php echo $config['site_name'];?></title>
    <?php $desctiption = mb_str_split($return['kplHero']['data']['description'],200);
    if(strlen($desctiption)<10){$desctiption = "";}?>
    <meta name="description" content="<?php echo $desctiption;?>">
    <meta name="Keywords" Content="<?php echo $return['kplHero']['data']['hero_name'];?>,<?php echo $config['game_name'];?><?php echo $return['kplHero']['data']['hero_name'];?>">
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
    <div class="container">
        <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
        <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
        <div class="nav">
            <ul>
                <?php generateNav($config,"hero");?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>"><?php echo $config['game_name'];?>首页</a> > <a href="<?php echo $config['site_url'];?>/herolist/">英雄介绍</a> > <?php echo $return['kplHero']['data']['hero_name'];?></div>
  <div class="yx_js">
    <div class="row">
      <div class="col-lg-7 col-12">
        <div class="t_p t_p_hero">
        <!-- <img src="/images/ceshi3.jpg" alt="" class="t_p_img1"> -->
         <img src="<?php echo $return['kplHero']['data']['logo'];?>" class="t_p_img1">  
        </div>
      </div>
      <div class="col-lg-5 col-12">
        <div class="w_z">
          <div class="x_m"><?php echo $return['kplHero']['data']['hero_name'];?></div>
          <div class="j_s">
            <ul>
              <li><span>位置</span><?php echo $config['hero_type'][$return['kplHero']['data']['type']]?></li>
                <?php $t = array_combine(array_column($return['kplHero']['data']['stat'],"name"),array_column($return['kplHero']['data']['stat'],"value"));
                foreach($config['hero_stat_list'] as $type => $stat_name){
                ?>
                    <li><span><?php echo $stat_name;?></span><div class="x_n"><em><img src="<?php echo $config['site_url']?>/images/sc<?php echo $type;?>.png"></em><i style="width:<?php echo $t[$stat_name];?>%;"></i></div></li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="yx_gs">
    <div class="sy_bt">
      <div class="b_t">英雄故事</div>
      <div class="clear"></div>
    </div>
    <div class="gs_nr"><?php echo $return['kplHero']['data']['story'];?>
    <div class="clear"></div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-7 col-12">
        <div class="sy_bt">
          <div class="b_t">英雄技能</div>
          <div class="clear"></div>
        </div>
        <div class="ny_nr">
          <div class="jn_js">
            <div class="hd">
              <ul>
                  <?php foreach($return['kplHero']['data']['skill_list'] as $skill){?>
                      <li><img src="<?php echo $skill['killImg']?>"></li>
                  <?php }?>
              </ul>
            </div>
            <div class="bd">
                <?php foreach($return['kplHero']['data']['skill_list'] as $skill){?>
                    <div class="n_r">
                        <h3><?php echo $skill['name'];?></h3>
                        <h4>冷却值：<?php echo $skill['cooling'];?>&nbsp;&nbsp;&nbsp;消耗：<?php echo $skill['consume'];?></h4>
                        <p><?php echo $skill['skillDesc'];?></p>
                    </div>
                <?php }?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-12">
        <div class="sy_bt">
          <div class="b_t">英雄推荐铭文</div>
          <div class="clear"></div>
        </div>
        <div class="ny_nr">
          <div class="mw_dp">
            <div class="row">
                <?php foreach($return['kplHero']['data']['inscription_tips']['sugglistIds'] as $tip){?>
                    <div class="col-4">
                        <img src="<?php echo $tip['logo'];?>">
                        <h3><?php echo $tip['inscription_name'];?></h3>
                        <p><?php echo $tip['description'];?></p>
                    </div>
                <?php }?>
            </div>
            <div class="j_g"><?php echo $return['kplHero']['data']['inscription_tips']['suggTips'];?></div>
          </div>
        </div>
      </div> 
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-7 col-12">
        <div class="sy_bt">
          <div class="b_t">英雄关系</div>
          <div class="clear"></div>
        </div>
        <div class="xy_nr">
          <div class="yx_gx">
            <div class="hd">
              <ul class="row">
                  <?php foreach($config['hero_tips'] as $type_name) {?>
                      <li class="col-4"><?php echo $type_name;?></li>
                  <?php }?>
              </ul>
            </div>
            <div class="bd clearfix">
                <?php foreach($config['hero_tips'] as $type => $type_name) {?>
                    <div class="n_r clearfix">
                        <div class="t_x">
                            <ul>
                                <?php foreach($return['kplHero']['data']['hero_tips'][$type] as $key => $tip_hero){?>
                                    <li <?php if($key==0){?>class="on"<?php }?>><img src="<?php echo $tip_hero['logo']?>"></li>
                                <?php }?>
                            </ul>
                        </div>
                        <div class="w_z">
                            <?php foreach($return['kplHero']['data']['hero_tips'][$type] as $key => $tip_hero){?>
                              <!-- <p <?php if($key==0){?>class="dk branddesc"<?php }else{?>class="branddesc"<?php }?>><?php echo $tip_hero['desc']?></p> -->
                              <p <?php if($key==0){?>class="dk"<?php }?>><?php echo $tip_hero['desc']?>
                            </p>
                            <?php }?>
                        </div>
                    </div>
                <?php }?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-12">
        <div class="sy_bt">
          <div class="b_t">明星玩家</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/playerlist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xy_nr">
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
  <div class="zd_tw">
    <div class="sy_bt">
      <div class="b_t">英雄攻略</div>
      <div class="m_r">
        <div class="bg"></div>
          <a href="<?php echo $config['site_url'];?>/strategylist/1">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="zx_nr">
      <div class="row">
        <div class="col-lg-7 col-12">
          <div class="tw_lb">
            <ul class="row">
                <?php
                if(count($connectedInformationList)>0)
                {
                    $i = 1;
                    foreach($connectedInformationList as $key => $value) {
                        if($i<=6){?>
                            <li class="col-4">
                                <div class="t_p"><a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank">
                                        <img src="<?php echo $value['logo'];?>"></a></div>
                            </li>
                        <?php }$i++;}}else{?>
                <?php }?>
            </ul>
          </div>
        </div>
        <div class="col-lg-5 col-12">
          <div class="xw_lb">
            <ul>
                <?php
                $i = 1;
                foreach($connectedInformationList as $key => $value) {
                    if($i>6){?>
                        <li>
                            <div class="s_j"><?php echo substr($value['site_time'],0,10);?></div>
                            <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a>
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
<div class="fh_top"><img src="<?php echo $config['site_url']?>/images/fh_top.png"></div>
<script>
  //图片自适应大小
function setImgWidthHeight() {
    var maxwidth = 770;
    var maxheight = 314;
    var img = new Image();
    img.src = $(".t_p_img1").attr("src");
    // 初始化高度和宽度
    $(".t_p_img1").width(img.width);
    $(".t_p_img1").height(img.height);
    //高度和宽度设置
    //设置div的宽度/高度比值
    var di = maxwidth / maxheight
    var ii = img.width / img.height
    if(ii=1){
      $(".t_p_img1").height(maxheight);
      $(".t_p_img1").width(maxheight);
    }
    if (img.width > maxwidth && di > ii) {
        //那就把图片的直接设置为div的最大宽度
        $(".t_p_img1").height(maxheight);
        // 再判断高度
        //div的最大宽度/图片的实际宽度，求出比值
        var i = maxheight / img.height;
        var ih = i * img.width; // 计算高度的缩放比例
        if (ih > maxwidth) {
            // 如果走到这里则图片会被拉伸
            $(".t_p_img1").widht(maxwidth);
        } else {
            $(".t_p_img1").width(ih);
        }
    }
    else {
        if (img.height > maxheight) {
            if (di - ii > 0) {
                $(".t_p_img1").height(maxheight);
                // 再判断宽度
                var i = maxheight / img.height;
                var iw = i * img.width;
                if (iw > maxwidth) {
                    $(".t_p_img1").width(maxwidth);
                } else {
                    $(".t_p_img1").width(iw);
                }
            }
        }
    }
}
//调用需要在img加载完，否则会出现长和宽都是0的情况：
$(function () {
    $('.t_p_img1').load(function () {

        // 加载完成    
        setImgWidthHeight();
    });
});
</script>
</body>
</html>