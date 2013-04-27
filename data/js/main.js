$(function(){
  // $("#page_one").hide();
  // $("#page_two").hide();
  // $("#page_three").hide();
  // function time(){
  //       minute = 5;
  //       second =0;
  //       $("#min").html(minute);
  //       $("#sec2").html(second);
  //       setinter=setInterval(run,1000);
  //     }

$(".start").click(function(){
      minute = 8;
      second =0;
      $("#min").html(minute);
      $("#sec2").html(second);
      setinter=setInterval(run,1000);
})
$(".end").click(function(){
      clearInterval(setinter);
})
$(".reset_time").click(function(){
      $("#min").html("");
      $("#sec2").html("");
      $("#sec1").css("display","block");
})
function run(){
      if(!second){
          minute -=1;
          second = 60;
          $("#sec1").css("display","none");
      }else if(second<=10){
          $("#sec1").css("display","block");
      }
      second -=1;
      $("#min").html(minute);
      $("#sec2").html(second);
      if(second ==0 && minute ==0){
            clearInterval(setinter);
      }
}



var i=0;
var messlen;
var move2 = setInterval(function(){
    var cur_num = parseInt($(".stu_num").html());
        // alert(cur_num);
      $.ajax({
            type:"POST",
            url:getRootPath()+"/index.php/console/athlete_score",
            async:true,
            data:{spknum:cur_num},
            success:function(imge){
                // console.log(imge);
                var mess = $.parseJSON(imge);
                var is_next;
                 // console.log(mess);
                if( mess.is_next == undefined ) {
                    messlen = mess.length;
                    // console.log(messlen);
                   is_next = mess[0].is_next;
                    // console.log(is_next);
                    // $judge_score = $("#judge_score");     

                    if( i < messlen ){
                        $node = ("<ul class='thumbnails' id='thumbnails'><li class='span2'><div class='thumbnail'><img data-src='holder.js/300x200' alt='' src='"+mess[i].ju_photo+"'><h3>"+mess[i].ju_name+"</h3><span class='label label-info' id='pic'>已打分</span></div></li></ul>");
                        $('#judge_score').after($node);
                        i++;
                    } else {
                        i = messlen;
                    }
                        // console.log(i);
                        
                }else{
                        is_next = mess.is_next;
                } 
                  if(is_next == 1 ) {
                            i = 0;
                        
                  } 
                }
            })
  },2000)

// $("#num1").focus(function(){
//   $(".warning").css('display','none');
// })


  $('#judges-submit').click(function(){
        result = $(".input-large").val();
        var judge_number = $(".judge_number").html();
        var athlete_number = $(".athlete_number").html();    
        if(result>100){
              alert("数字过大");
              $("#num1").val("");
        }
        else if(result<0)
        {
              alert("数字过小");
              $("#num1").val("");
        }
        else{
              if(confirm("确认提交？"))
              { 
                      // alert("确认");
                    // $(".warning").css('display','none');
                    // var result = 0;
                    
                    if(isNaN(result)){
                          alert("填写错误。");
                          $("#num1").val("");
                          $(".warning").css('display','block');
                    }else{
                          result = parseFloat(result);
                    }
                    result = result.toFixed(2);
                    if(result!=""){
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
                                      $("#num1").val("");
                                  }          
                          })
                    }
                    else{
                          alert("发送内容为空！");
                    }

              }
              else{
                    // alert("否认");
                    $("#num1").val("");
                    $(".warning").css('display','block');
              }
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
              // console.log(result);
              if(result == 1){
                // alert("开始");
               // window.location.reload()
                sleep = true;
                $("#page_one").show();
                $("#page_two").hide();
                $("#page_three").hide();
                $("#judge-score").hide();
                $(".load_js").html("")
                var ul_length = $("#container_judge > ul").length;
                for(var j = 0;j<ul_length;j++){
                  $("#container_judge > ul").eq(j).remove();
                }
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
                // $("#container_judge > ul").remove();
                var ul_length = $("#container_judge > ul").length;
                for(var j = 0;j<ul_length;j++){
                  $("#container_judge > ul").eq(j).remove();
                }
              }
            }
        })
  },1000)

// function empty_kbt(){
//   $(".key_borad_text").empty();
// }
// $(".key_borad_input").click(function(){
//   // alert(document.fromCharCode(46));
//     var content = $(this).val()*1;
//     $(".key_borad_text").append(content);
//   })
// $(".key_borad_reset").click(function(){
//   empty_kbt();
// })
// $(".key_borad_submit").click(function(){
//   var val = $(".key_borad_text").val();
//   if(isNaN(val)){
//     alert("Not a number");
//     empty_kbt();
//   }
//   else{
//     if(confirm("是否确认提交？")){
//       empty_kbt();
//       return true;
//     }
//     else{
//       empty_kbt();
//       return false;
//     }
//   }
// })


var move3 = setInterval(function(){
        $.ajax({
            type:"POST",
            url:getRootPath()+"/index.php/console/athlete_score_fin",
            success:function(result){
             var mesa = $.parseJSON(result);
             // alert(mesa.max_score);
            $("#maxscore").html(mesa.max_score);
            $("#minscore").html(mesa.min_score);
            $("#finscore").html(mesa.fin_score);
            }
        })
  },1000)


// if(sleep == true) {

//     minute = 5;
//     second = 0;
//     sleep = false ;
// }



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