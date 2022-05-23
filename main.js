$(document).ready(function(){
    var stt = 0;
    starImg = $("img.silde:first").attr("stt")
    endImg = $("img.slide:last").attr("stt")
    $("img.slide").each(function(){
        if($(this).is(':visible'))
            stt = $(this).attr("stt");
    });
    $("#phai").click(function(){
        if(stt == endImg){
            stt = -1;
        }
        phai = ++stt;
        $("img.slide").hide();
        $("img.slide").eq(phai).show();
    });
    $("#trai").click(function(){
        if(stt==0){
            stt=endImg;
            trai = stt++
        }
        trai = --stt;
        $("img.slide").hide();
        $("img.slide").eq(trai).show();
    });
    setInterval(function(){
        $("#phai").click();
    },6000);
});