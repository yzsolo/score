$(function(){


  $('#judges-submit').click(function(){
        var inputLength = $('.input-small').length;
        var result = 0;
        var v =0;
        //alert(inputLength)
        var judge_number = $(".judge_number").html();
        var athlete_number = $(".athlete_number").html();
         // alert(athlete_number);
        for(var i=0; i<inputLength; i++){
        v = parseFloat($('.input-small').eq(i).val());
        result += v;
        }
        result = result.toFixed(2);
        // document.write(result);
        // document.write("<br>");
        // document.write(judge_number);
        // document.write(athlete_number);
        if(result!="")
        {
          //alert("wrong!");
              $.ajax({

                    type:"POST",
                    url:getRootPath()+"/index.php/console/accepted_score",
                    data:
                    {
                      judge_number:judge_number,
                      result:result,
                      athlete_number:athlete_number
                    },
                    success:function(){
                      //alert("success");
                      
                       for(var j=0;j<inputLength; j++){
                      $(".input-small").eq(j).val("");
                    }

                    }
                    
              })
        }
        else{
                alert("发送内容为空！");
        }

})

  
  /*  var id = $("#hero-unit p").html();
    alert(id);*/
  var move = setInterval(function(){
        $.ajax({
              type:"POST",
              url:getRootPath()+"/index.php/console/athlete_info",
              success:function(msg){
                    var message = eval(msg);
                    $("#hero-unit h1").eq(0).html(message[0].name);
                    $("#hero-unit img").attr("src",message[0].photo);
                    $("#hero-unit p[name='judges_p2']").html("姓名：" + message[0].name);
                    $("#hero-unit p[name='judges_p3']").html("学校：" + message[0].school);
                    $("#hero-unit p[name='judges_p4']").html("主题：" + message[0].lecture);
                    $("#hero-unit p[name='judges_p5']").html("座右铭：" + message[0].motto);
                    $("#hero-unit p[name='judges_p1']").html("选手信息：" + message[0].info);
                    $("#myModalLabel").html(message[0].name);
                    $(".athlete_number").html(message[0].number);
                    $(".stu_num").html(message[0].number);
                    //screen_info  start
                    $('#screen_num strong').html(message[0].number + "号参赛选手");
                    $("p[name='screen_p1']").html("姓名：" + message[0].name);
                    $("p[name='screen_p2']").html("学校：" + message[0].school);
                    $("p[name='screen_p3']").html("主题：" + message[0].lecture);
                    $("p[name='screen_p4']").html("座右铭：" + message[0].motto);
                    //screen_info  end
                    //judges_tercher start
                    //judges_teacher end
                    //fin_score  start
                    //fin_score  end
              }
        })
  },1000)

  var move1 = setInterval(function(){
        $.ajax({
            type:"POST",
            url:getRootPath()+"/index.php/console/judges_flag",
            success:function(result){
              if(result == 1){
                // alert("开始");
                // window.location.reload()
                $("#page_one").show();
                $("#page_two").hide();
                $("#page_three").hide();
                $("#judge-score").hide();
                $(".load_js").html("")

              }
              else if(result == 2){
                // alert("评分");
                 $("#page_two").show();
                 $("#page_one").hide();
                 $("#page_three").hide();
                 $("#judge-score").show();
                
              }
              else if(result == 3){
                // alert("得分");
                $("#page_three").show();
                $("#page_two").hide();
                $("#page_one").hide();
                $("#judge-score").hide();
                $("#container_judge > ul").empty();
              }
            }
        })
  },1000)


var i=0;
var move2 = setInterval(function(){
    var cur_num = $(".stu_num").html();
      $.ajax({
            type:"POST",
            url:getRootPath()+"/index.php/console/athlete_score",
            async:true,
            success:function(imge){
                var mess = eval(imge);
                // alert(mess[i].sperker_number);
                var stu_num = mess[i].sperker_number;
                    if(cur_num*1 == stu_num*1)
                    {
                        $("#judge_score").after('<ul class="thumbnails" id="thumbnails"><li class="span2"><div class="thumbnail"><img data-src="holder.js/300x200" alt="" src="'+mess[i].ju_photo+'"><h3>'+mess[i].ju_name+'</h3><span class="label label-info" id="pic">已打分'+mess[i].score+'</span></div></li></ul>');
                        i++;
                    }
                    else{
                        i++;
                    }                  
                }
            })
  },2000)


// var move3 = setInterval(function(){
//         $.ajax({
//             type:"POST",
//             url:getRootPath()+"/index.php/console/athlete_score_fin",
//             success:function(result){
//              var mesa = eval(result);
//              $("maxscore").html(mesa[0].max_score);
//              $("minscore").html(mesa[0].min_score);
//              $("finscore").html(mesa[0].fin_score);
//             }
//         })
//   },1000)

function getRootPath() //得到网站的根目录
  { 
    var strFullPath=window.document.location.href; 
    var strPath=window.document.location.pathname; 
    var pos=strFullPath.indexOf(strPath); 
    var prePath=strFullPath.substring(0,pos); 
    var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
    return(prePath+postPath); 
  } 
})