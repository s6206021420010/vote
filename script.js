
var stat = $("#stat").html()
if(stat=="Private"){
  $("#pi").fadeIn(0)
  $("#pu").fadeOut(0)
}else{
  $("#pi").fadeOut(0)
  $("#pu").fadeIn(0)
}
$("#pi").click(function(){
  $("#pi").fadeOut(0)
  $("#pu").fadeIn()
})
$("#pu").click(function(){
  $("#pu").fadeOut(0)
  $("#pi").fadeIn()  
})

$("#set_ev").click(function(){
  alert(ck) 

})
///////////////////
$(document).ready(function(){
  $("#body").fadeIn(3000);
  $("#b_pass").click(function(){
    $("#pass").toggle(200);
  });
  $("#hd").click(function(){
    $("#bd").slideToggle("slow");
  });
  $("#img").mouseenter(function(){
    $("#dis").fadeIn()
    $("#text").fadeIn()
    $("#point").animate({left: '98'});

  });
  $("#img").mouseleave(function(){
    $("#dis").fadeOut()
    $("#text").fadeOut()

  });
  $("#img1").mouseenter(function(){
    $("#dis1").fadeIn()
    $("#point").animate({left: '347'});

  });
  $("#img1").mouseleave(function(){
    $("#dis1").fadeOut()
  });
  $("#img2").mouseenter(function(){
    $("#point").animate({left: '604'});
  });
  $("#btn").click(function(){
    alert("บันทำข้อมูลเรียบร้อย");
  });
  $("#rrr").click(function(){
    $("#p").fadeIn(1000);
    $("#m").html("<label id='m' for='sel1'>มหาวิทยาลัย</label>");
    $("#k").html("<label id='k'for='sel1'>คณะ</label>");
    $("#s").html("<label id='s'for='sel1' >สาขา</label>");
  });
  $("#rrr1").click(function(){
    $("#p").fadeIn(1000);
    $("#m").html("<label id='m' for='sel1'>บริษัท</label>");
    $("#k").html("<label id='k'for='sel1'>สาขา</label>");
    $("#s").html("<label id='s'for='sel1' >ฝ่าย</label>");

  });

});

function setblurCard(event_id) {
  console.log("setblurCard")
  $("#btn_vote_" + event_id).show();
  $("#img_bg_vote_" + event_id).addClass("image_blur")
}

function removeblurCard(event_id) {
    console.log("removeblurCard")
    $("#btn_vote_" + event_id).hide();
    $("#img_bg_vote_" + event_id).removeClass("image_blur")
}
