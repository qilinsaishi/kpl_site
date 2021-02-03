﻿ <!DOCTYPE html>
<html lang="zh-CN">
 <?php
 require_once "function/init.php";
 $info['page']['page_size'] = 18;
 $info['type'] = $_GET['type']??"info";
 $page = $_GET['page']??1;
 if($page==''){
     $page=1;
 }
 $zxtype=($info['type']!="info")?"/strategylist":"/newslist";
 $data = [
     //"matchList"=>["page"=>1,"page_size"=>9],
    // "totalTeamList"=>["page"=>1,"page_size"=>6,"game"=>$config['game'],"source"=>"cpseo","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    // "tournament"=>["page"=>1,"page_size"=>8],
     //"defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"]],
     //"links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    // "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>9,"source"=>"cpseo","fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
     "informationList"=>["game"=>$config['game'],"page"=>$page,"page_size"=>$info['page']['page_size'],"type"=>$info['type']=="info"?"1,2,3,5":"4","fields"=>"*"],
     "currentPage"=>["name"=>"infoList","type"=>$zxtype,"page"=>$page,"page_size"=>$info['page']['page_size'],"site_id"=>$config['site_id']]
 ];
 $return = curl_post($config['api_get'],json_encode($data),1);
 $info['page']['total_count'] = $return['informationList']['count'];
 $info['page']['total_page'] = intval($return['informationList']['count']/$info['page']['page_size']);
 ?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
<title>70电竞</title>
<link rel="stylesheet" type="text/css" href="<?php echo $config['site_url'];?>/css/bootstrap.min.css" />
<!--[if lt IE 9]>
<script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?php echo $config['site_url'];?>/css/swiper.min.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['site_url'];?>/css/style.css" />
<script src="<?php echo $config['site_url'];?>/js/jquery-1.8.3.min.js" type="text/javascript" /></script>
<script src="<?php echo $config['site_url'];?>/js/jquery.SuperSlide.2.1.1.js" type="text/javascript" /></script>
<script src="<?php echo $config['site_url'];?>/js/main.js" type="text/javascript" /></script>
</head>

<body>
<div class="header">
  <div class="container">
    <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
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
  <div class="dq_wz"><a href="">王者荣耀首页</a> > 游戏资讯</div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="zx_nr">
          <div class="zx_lb">
            <ul>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw1.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw2.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw3.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw4.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw5.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw1.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw2.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw3.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw4.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="images/xw5.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="page">
            <a href=""><</a>
            <a href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href="">5</a>
            <a href="">></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">热门战队</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="rm_zd">
            <ul class="row">
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a1.jpg"></div>
                  <div class="w_z">佛山GK</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a2.jpg"></div>
                  <div class="w_z">西安WE</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a3.jpg"></div>
                  <div class="w_z">KS.YTG</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a4.jpg"></div>
                  <div class="w_z">TTG.XQ</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a5.jpg"></div>
                  <div class="w_z">TSG</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a6.jpg"></div>
                  <div class="w_z">EDG.Y</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a7.jpg"></div>
                  <div class="w_z">FBP</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a8.jpg"></div>
                  <div class="w_z">SNS</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a9.jpg"></div>
                  <div class="w_z">AG超玩会</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a1.jpg"></div>
                  <div class="w_z">佛山GK</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a2.jpg"></div>
                  <div class="w_z">西安WE</div>
                </a></div>
              </li>
              <li class="col-6">
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="images/a3.jpg"></div>
                  <div class="w_z">KS.YTG</div>
                </a></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="sy_bt">
          <div class="b_t">热门选手</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr">
          <div class="rm_xs">
            <ul class="row">
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="images/t1.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="images/t2.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="images/t3.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="images/t4.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="images/t5.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="images/t6.png">
                  <div class="w_z">名字</div>
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
    <div class="lj_nr"><a href="" target="_blank">VSPN电视</a><a href="" target="_blank">斗鱼直播</a><a href="" target="_blank">王者人生</a><a href="" target="_blank">微信游戏</a></div>
  </div>
</div>
<div class="banquan">
  <?php renderCertification();?>
</div>
<div class="fh_top"><img src="images/fh_top.png"></div>
</body>
</html>