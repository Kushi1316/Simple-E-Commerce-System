$(window).load(function () {
    $(".product-panel-body .thumbnail").each(function(){
        var img =$(this).find(".product-image"), 
        img_height = img.height();
      
        console.log(img_height);
        
        img.css("top","50%");
        img.css("margin-top","-"+img_height/2+"px");
        
        
        
    });
        
    
});