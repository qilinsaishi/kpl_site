﻿ <!DOCTYPE html>
 <?php
 require_once "function/init.php";
 $data = [
     //"matchList"=>["page"=>1,"page_size"=>9],
     //"totalTeamList"=>["page"=>1,"page_size"=>12,"game"=>$config['game'],"source"=>"cpseo","fields"=>'team_id,team_name,logo,team_history'],
     "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"]],
     "links"=>["site_id"=>$config['site_id'],"page"=>1,"page_size"=>6],
     //"totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8,"source"=>"cpseo","fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
     //"infoList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>9,"type"=>"1,2,3,5"],
     //"straList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"4"],
     "currentPage"=>["name"=>"index"]
 ];
 $return = curl_post($config['api_get'],json_encode($data),1);
 print_R($return['heroList']);
 die();
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
          <?php generateNav($config,"info");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="">王者荣耀首页</a> > 英雄列表</div>
  <div class="yx_lb">
    <div class="sy_bt">
      <div class="b_t">王者荣耀角色设定</div>
      <div class="m_r">
        <div class="bg"></div>
        <a href="yingxiongliebiao.html">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="yx_nr">
      <div class="row">
        <div class="yx_lx">
          <div class="hd">
            <ul>
              <li>战士</li>
              <li>坦克</li>
              <li>法师</li>
              <li>刺客</li>
              <li>射手</li>
              <li>辅助</li>
            </ul>
          </div>
        </div>
        <div class="yx_zs">
          <div class="bd">
            <ul class="row">
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
            </ul>
            <ul class="row">
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
            </ul>
            <ul class="row">
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
            </ul>
            <ul class="row">
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
            </ul>
            <ul class="row">
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
            </ul>
            <ul class="row">
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
            </ul>
            <ul class="row">
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t1.jpg"></div>
                  <div class="w_z">马可波罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t2.jpg"></div>
                  <div class="w_z">公孙离</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t3.jpg"></div>
                  <div class="w_z">后裔</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t9.jpg"></div>
                  <div class="w_z">鲁班七号</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t10.jpg"></div>
                  <div class="w_z">伽罗</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t11.jpg"></div>
                  <div class="w_z">蒙犽</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t4.jpg"></div>
                  <div class="w_z">孙尚香</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t5.jpg"></div>
                  <div class="w_z">百里守约</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t6.jpg"></div>
                  <div class="w_z">李元芳</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t7.jpg"></div>
                  <div class="w_z">狄仁杰</div>
                </a></div>
              </li>
              <li>
                <div class="n_r"><a href="">
                  <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/t8.jpg"></div>
                  <div class="w_z">黄忠</div>
                </a></div>
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
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
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
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">明星选手</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="mx_tj">
            <ul class="row">
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a1.png"></div>
                  <div class="w_z">
                    <div class="x_m">Doinb</div>
                    <div class="j_s">位置：中单</div>
                    <div class="j_s">所属战队：FPX</div>
                  </div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a2.png"></div>
                  <div class="w_z">
                    <div class="x_m">huanfeng</div>
                    <div class="j_s">位置：中单</div>
                    <div class="j_s">所属战队：SN</div>
                  </div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a3.png"></div>
                  <div class="w_z">
                    <div class="x_m">Rookie</div>
                    <div class="j_s">位置：ADC</div>
                    <div class="j_s">所属战队：IG</div>
                  </div>
                </a></div>
              </li>
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
    <div class="lj_nr"><a href="" target="_blank">VSPN电视</a><a href="" target="_blank">斗鱼直播</a><a href="" target="_blank">王者人生</a><a href="" target="_blank">微信游戏</a></div>
  </div>
</div>
<div class="banquan">
  <?php renderCertification();?>
</div>
<div class="fh_top"><img src="<?php echo $config['site_url'];?>/images/fh_top.png"></div>
</body>
</html>