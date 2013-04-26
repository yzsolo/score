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

// $("#time_start"    ).click(function(){
//   var time_start = 5;
//   $.ajax({
//     type:"POST",
//     url:
//     data:{
//       time_start:time_start
//     }
//     success:function(){

//     }
//   })
// })

// $("#time_end").click(function(){
//   var time_end = 6;
//   $.ajax({
//     type:"POST",
//     url:
//     data:{
//       time_end:time_end
//     }
//     success:function(){
      
//     }
//   })                                 
// })
// var flags;
// var time_move = setInterval(function(){
//     $.ajax({
//           type:"POST",
//           url:getRootPath()+"/index.php/console/judge_clock",
//           success:function(resu){
//                 flags = resu*1;
//                 if(flags == 5){
                  
//                     minute = 5;
//                     second =0;
//                     $("#min").html(minute);
//                     $("#sec2").html(second);
//                     setinter=setInterval(run,1000);

//                     var k = 8;
//                     $.ajax({
//                         type:"POST",
//                         url:getRootPath()+"/index.php/console/judge_clock",
//                         data:{data:k},
//                         success:function(result){
//                           // flags = result;
//                           console.log(result);
//                         }
//                     })
//                 }else if(flags == 6){
//                   clearInterval(setinter);
//                 }else{
//                     return true;
//                 }
//       }
//     })
//   },10000)
  


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
                    console.log(is_next);
                    // $judge_score = $("#judge_score");     

                    if( i < messlen ){
                        $node = ("<ul class='thumbnails' id='thumbnails'><li class='span2'><div class='thumbnail'><img data-src='holder.js/300x200' alt='' src='"+mess[i].ju_photo+"'><h3>"+mess[i].ju_name+"</h3><span class='label label-info' id='pic'>已打分"+mess[i].score+"</span></div></li></ul>");
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



  $('#judges-submit').click(function(){
        // var inputLength = $('.input-small').length;
        var result = 0;
        // var v =0;
        var judge_number = $(".judge_number").html();
        var athlete_number = $(".athlete_number").html();
         // alert(athlete_number);
        // for(var i=0; i<inputLength; i++){
        // v = parseFloat($('.input-small').eq(i).val());
        // result += v;
        // }
        result = $(".input-small").val();
        // result += 0;
        // alert(result);
        if(isNaN(result)){
          alert("填写错误。");
          $("#num1").val("");
        }else{
          result = parseFloat(result);
        }
        result = result.toFixed(2);
        if(result!="")
        {
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
                      
                       // for(var j=0;j<inputLength; j++){
                      $("#num1").val("");
                    // }

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


if(sleep == true) {

    minute = 5;
    second = 0;
    sleep = false ;
}

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