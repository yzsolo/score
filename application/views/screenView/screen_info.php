<body>
  <!-- page1 start-->
<div class="container well" id="page_one">
  <div class="stu_num"></div>
  <div class="load_js"></div>
  <div class="span12 text-left text-success" id="screen_num"><h2><small><strong>号参赛选手</strong></small></h2></div>
  <div class="span3">
        <img data-src="holder.js/150x100" id="screen_img" class="img-rounded" src="img/1.jpg" style="width:200px;height:250px;"alt="">
  </div>
  <div class="span4" style="margin-top:15px;">
        <blockquote>
              <p name="screen_p1">姓名：</p>
        </blockquote>
        <!-- <blockquote>
              <p name="screen_p2">学校：</p>
        </blockquote> -->
        <blockquote>
              <p name="screen_p3">主题：</p>
        </blockquote>
        <blockquote>
              <p name="screen_p4"></p>
              <small>Someone famous <cite title="Source Title">Source Title</cite></small>
        </blockquote>
  </div>
  <div class="span4">
        <div class="row" style="font-size:90px;">                                   
                          <div id="min1">0</div>
                          <div id="min"></div>
                          <div id="point">:</div>
                          <div id="sec1">0</div>
                          <div id="sec2"></div>
        </div>
  </div>
  <input type="button" value = "s" class="start" style="border:0px solid #eee;color:#edd;"/>
  <input type="button" value = "e" class="end"  style="border:0px solid #eee;color:#edd;"/>
  <input type="button" value = "r" class="reset_time" style="border:0px solid #eee;color:#edd;"/>
  </div>
  <!-- page1 end -->
<!-- page2 start -->
<div class="container" id="page_two" style="display:none;">
    <div class="container" id="container_judge">
      <div class="row" id="judge_score">
        <h2>评委打分状态：</h2>
      </div>
    </div>
  </div>
<!-- page2 end -->
<!-- page3 start -->
<div class="container well" id="page_three" style="display:none;">
    <div class="row">     
        <ul class="thumbnails" id="thumbnails">
          <li class="span3">
            <div class="thumbnail" id="three_img">
            <img data-src="holder.js/150x100" class="img-rounded" alt="" src="img/2.jpg">
              <h3>rale teacher</h3>
            </div>
          </li>
        </ul>
      <div class="score_list" id="judge_score_list" style="float:left;width:420px;height:400px;margin-left:10px;">
        <table class="table table-condensed">
        </table>     
      </div>
      <div class="max_min" style="width:250px;height:200px;float:left; margin-left:20px;margin-top:-17px;">
        <h3>去掉最高分：<label class="label label-important" style="height:30px;font-size:25px;line-height:30px;" id="maxscore"></label></h3>
        <h3>去掉最低分：<label class="label label-info" style="height:30px;font-size:25px;line-height:30px;" id="minscore"></label></h3>
        <h3>最终得分：<label class="label label-success" style="height:30px;font-size:25px;line-height:30px;" id="finscore"></label></h3>
      </div>
    </div>
</div>
<!-- page3 end -->
  </body>
 