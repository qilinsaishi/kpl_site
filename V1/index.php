 <!DOCTYPE html>
 <?php
 require_once "function/init.php";
 $data = [
     "slideImage"=>["dataType"=>"imageList","site_id"=>$config['site_id'],"flag"=>"index_slide_pic","page_size"=>20],
     "heroList"=>["dataType"=>"kplHeroList","page"=>1,"page_size"=>15,"rand"=>1,"cacheWith"=>"currentPage"],
     //"totalTeamList"=>["page"=>1,"page_size"=>12,"game"=>$config['game'],"source"=>"cpseo","fields"=>'team_id,team_name,logo,team_history'],
     //"tournament"=>["page"=>1,"page_size"=>8],
     "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"]],
     "links"=>["site_id"=>$config['site_id'],"page"=>1,"page_size"=>6],
     //"totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8,"source"=>"cpseo","fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
     //"infoList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>9,"type"=>"1,2,3,5"],
     //"straList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"4"],
     "currentPage"=>["name"=>"index"]
 ];
 $return = curl_post($config['api_get'],json_encode($data),1);
 ?>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
<title><?php echo $config['site_name'];?></title>
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
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="rm_zd">
            <ul class="row">
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a1.jpg"></div>
                  <div class="w_z">佛山GK</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a2.jpg"></div>
                  <div class="w_z">西安WE</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a3.jpg"></div>
                  <div class="w_z">KS.YTG</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a4.jpg"></div>
                  <div class="w_z">TTG.XQ</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a5.jpg"></div>
                  <div class="w_z">TSG</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a6.jpg"></div>
                  <div class="w_z">EDG.Y</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a7.jpg"></div>
                  <div class="w_z">FBP</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a8.jpg"></div>
                  <div class="w_z">SNS</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a9.jpg"></div>
                  <div class="w_z">AG超玩会</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a1.jpg"></div>
                  <div class="w_z">佛山GK</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a2.jpg"></div>
                  <div class="w_z">西安WE</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a3.jpg"></div>
                  <div class="w_z">KS.YTG</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a4.jpg"></div>
                  <div class="w_z">TTG.XQ</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a5.jpg"></div>
                  <div class="w_z">TSG</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a6.jpg"></div>
                  <div class="w_z">EDG.Y</div>
                </a></div>
              </li>
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
        <a href="">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="mx_tj">
      <ul class="row">
        <li>
          <div class="n_r"><a href="">
            <div class="t_p"><img src="images/a1.png"></div>
            <div class="w_z">
              <div class="x_m">Doinb</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：FPX</div>
            </div>
          </a></div>
        </li>
        <li>
          <div class="n_r"><a href="">
            <div class="t_p"><img src="images/a2.png"></div>
            <div class="w_z">
              <div class="x_m">huanfeng</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：SN</div>
            </div>
          </a></div>
        </li>
        <li>
          <div class="n_r"><a href="">
            <div class="t_p"><img src="images/a3.png"></div>
            <div class="w_z">
              <div class="x_m">Rookie</div>
              <div class="j_s">位置：ADC</div>
              <div class="j_s">所属战队：IG</div>
            </div>
          </a></div>
        </li>
        <li>
          <div class="n_r"><a href="">
            <div class="t_p"><img src="images/a4.png"></div>
            <div class="w_z">
              <div class="x_m">TheShy</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：IG</div>
            </div>
          </a></div>
        </li>
        <li>
          <div class="n_r"><a href="">
            <div class="t_p"><img src="images/a5.png"></div>
            <div class="w_z">
              <div class="x_m">梦客</div>
              <div class="j_s">位置：中单</div>
              <div class="j_s">所属战队：GK</div>
            </div>
          </a></div>
        </li>
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
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="zx_zx">
            <div class="hd">
              <ul class="row">
                <li class="col-3"><span>赛事战报</span></li>
                <li class="col-3"><span>竞游八卦</span></li>
                <li class="col-3"><span>游戏攻略</span></li>
                <li class="col-3"><span>电竞选手</span></li>
              </ul>
            </div>
            <div class="bd">
              <div class="n_r">
                <div class="d_b"><a href="">女枪为什么叫MF？具体是什么原因？</a></div>
                <ul>
                  <li>
                    <span>战报</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>战报</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>战报</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>战报</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>战报</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                </ul>
              </div>
              <div class="n_r">
                <div class="d_b"><a href="">女枪为什么叫MF？具体是什么原因？</a></div>
                <ul>
                  <li>
                    <span>八卦</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>八卦</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>八卦</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>八卦</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>八卦</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                </ul>
              </div>
              <div class="n_r">
                <div class="d_b"><a href="">女枪为什么叫MF？具体是什么原因？</a></div>
                <ul>
                  <li>
                    <span>攻略</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>攻略</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>攻略</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>攻略</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>攻略</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                </ul>
              </div>
              <div class="n_r">
                <div class="d_b"><a href="">女枪为什么叫MF？具体是什么原因？</a></div>
                <ul>
                  <li>
                    <span>电竞</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>电竞</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>电竞</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>电竞</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                  <li>
                    <span>电竞</span>
                    <div class="s_j">01-19</div>
                    <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">游戏攻略</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="yx_gl">
            <ul>
              <li>
                <span>视频</span>
                <div class="s_j">01-03</div>
                <a href="">[打野思路] 16.0玄策实战复盘教学</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">01-07</div>
                <a href="">TS暖阳FMVP英雄镜第一视角：世冠总决赛巅峰</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">01-30</div>
                <a href="">公爵自创玄策闪电鞭打法让你玄策不再迷茫</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">02-04</div>
                <a href="">8分钟掌握玄策18个操作技巧+8种自主练习技</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">02-04</div>
                <a href="">艾琳不再珍貴，入坑1270天的玩家告訴你，它才是珍寶！</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">02-04</div>
                <a href="">金牌百里玄策"光速爆头流”打野教学，6分钟1首殺</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">02-15</div>
                <a href="">TS暖阳FMVP英雄镜第一视角: 世冠总决赛巅峰</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">02-04</div>
                <a href="">8分钟掌握玄策18个操作技巧+8种自主练习技</a>
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
        <?php }?>
    </div>
  </div>
</div>
<div class="banquan">
  <div class="container">Copy@qulidianing.com</div>
</div>
<div class="fh_top"><img src="images/fh_top.png"></div>
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