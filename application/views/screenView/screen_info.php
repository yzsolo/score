<script type="text/javascript">
      $(document).ready(function(){
        // var a =  1;
        //  minute = 5;
        //  second =0;
        // $("#min").html(minute);
        // $("#sec2").html(second);
        // var setinter=setInterval(run,1000);
        // function run(){
        //     if(!second){
        //         minute -=1;
        //         second = 60;
        //         $("#sec1").css("display","none");
        //     }else if(second<=10){
        //         $("#sec1").css("display","block");
        //     }
        //     second -=1;
        //     $("#min").html(minute);
        //     $("#sec2").html(second);
        //     if(second ==0 && minute ==0){
        //           clearInterval(setinter);
        //       }
        // }

        // setInterval(function(){
        //   if(a != current_stu){
        //         minute = 5;
        //         second = 0;
        //         a == current_stu;
        //   }
        // },1000)   


      //   var move1 = setInterval(function(){
      //   var current_stu = $(".stu_num").html();
      //   if(a == current_stu){
      //     // clearInterval(move1);
      // }
      // else{
      //     clearInterval(setinter);
      //     minute = 5;
      //     second = 0;
      //     $("#min").html(minute);
      //     $("#sec2").html(second);
      //     if(second<=10){
      //           $("#sec1").css("display","block");
      //       }
      //     a = current_stu;
      //     setInterval(run,1000);
      //     clearInterval(move1);
      // }
      // },1000)
        })
  </script>
  <style type="text/css" media="screen">
  #min1,#min,#point,#sec1,#sec2{
      float:left;
      position:relative;
      margin-top:25px;
      margin-left:2px;
     }
  #box{
    background-color:#999;
    font-size:100px;
  }
    
  </style>
</head>
<body>
  <!-- page1 start-->
<div class="container well" id="page_one" style="'display',none">
  <div class="stu_num"></div>
  <div class="load_js"></div>
  <div class="span12 text-left text-success" id="screen_num"><h2><small><strong>一号参赛选手</strong></small></h2></div>
  <div class="span3">
        <img data-src="holder.js/200x200" class="img-rounded" src="img/1.jpg" style="width:200px;height:250px;"alt="">
  </div>
  <div class="span4" style="margin-top:15px;">
        <blockquote>
              <p name="screen_p1">姓名：彭慧星</p>
        </blockquote>
        <blockquote>
              <p name="screen_p2">学校：中南民族大学</p>
        </blockquote>
        <blockquote>
              <p name="screen_p3">主题：一头会飞翔的猪</p>
        </blockquote>
        <blockquote>
              <p name="screen_p4">apple fallin love with me,everything is alrightfor you.</p>
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
  </div>
  <!-- page1 end -->
<!-- page2 start -->
<div class="row" id="page_two" style="'display',none">
    <div class="container" id="container_judge">
      <div class="row" id="judge_score">
        <h1>评委正在打分哦~~</h1>
      </div>
     <!--  <ul class="thumbnails" id="thumbnails">
        <li class="span2">
          <div class="thumbnail">
          <img data-src="holder.js/300x200" alt="" src="img/2.jpg">
            <h3>rale teacher</h3>
          <span class="label label-info" id="pic">已打分</span>
          </div>
        </li>
      </ul> -->
    </div>
  </div>
<!-- page2 end -->
<!-- page3 start -->
<div class="container" id="page_three" style="'display',none">
    <div class="row">
      
        <ul class="thumbnails" id="thumbnails">
          <li class="span3">
            <div class="thumbnail">
            <img data-src="holder.js/300x200" alt="" src="img/2.jpg">
              <h3>rale teacher</h3>
            </div>
          </li>
        </ul>
        <h3>去掉最高分：<label class="label label-important" style="height:30px;font-size:25px;line-height:30px;" id="maxscore">99.99</label></h3>
        <h3>去掉最低分：<label class="label label-info" style="height:30px;font-size:25px;line-height:30px;" id="minscore">99.99</label></h3>
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;最终得分：<label class="label label-success" style="height:30px;font-size:25px;line-height:30px;" id="finscore">99.99</label></h3>
      
    </div>

  </div>
<!-- page3 end -->
  </body>
 