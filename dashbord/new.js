
  var p1= document.getElementById("btns");
   
var p2= document.getElementsByClassName("links");
 
/*
 if(document.body.clientWidth>=998){
     console.log("hi anas");
 
    let box = document.querySelector('.links');


        let width = box.offsetWidth;
        if(width>72){
  
  p1.onclick=function(){
    
     $('.links').toggleClass("linss"),
     $('.dbt').toggleClass("dbtl"),
     $('.logo img').toggleClass('loim'),
     $('.logo span').toggleClass('loim'),
     $('li a i').toggleClass('liai'),
     $(' ul li a.active:before ').toggleClass('liabe');
  
 }

}
else if (width=72){

  p1.onclick=function(){
    
     $('.links').removeClass("linss"),
     $('#btns').removeClass("dbtl"),
     $('.logo img').removeClass('loim'),
     $('.logo span').removeClass('loim'),
     $('li a i').removeClass('liai'),
     $(' ul li a.active:before ').removeClass('liabe');
   
 }

}
   
  };*/
   let box = document.querySelector('.links');
        let width = box.offsetWidth;
         p1.onclick=function(){
           
   if(width=72 ){
      
    $('.links').toggleClass("linss"),
     $('.dbt').toggleClass("dbtl"),
     $('.logo img').toggleClass('loim'),
     $('.logo span').toggleClass('loim'),
     $('li a i').toggleClass('liai'),
     $(' ul li a.active:before ').toggleClass('liabe');
    
    };
    
}

$(document).ready(function(){
  $(".delete").click(function(){
    return confirm("Are you sure ?");
  });
});
/*
$('.stores select option').click(function(){
    $(this).addClass('selected').siblings('option').removeClass('selected');

});*/


$('.stores select').change(function(){
    $(this).siblings().removeClass('selected');
});

