$(()=>{
    //放大镜: 
    var Plus = function Plus(){
        var mImg = document.getElementById("mImg"),
            lgDiv = document.getElementById("largeDiv"),
            itemUl = $('.spec-scroll>.items>ul>li>img');

        lgDiv.style.backgroundImage = "url("+mImg.src+")";

        itemUl.on('mouseover',function(e){
            e=e||window.event;
            var tar=e.target||e.srcElement;
            if(tar.nodeName==="IMG"){
                mImg.src=tar.src;
                lgDiv.style.backgroundImage
                    ="url("+tar.src+")";
                $(this).parent().siblings().find('img').removeClass('active');
                $(this).addClass('active');
            }
        })

        var mask=document.getElementById("mask"),
            sMask=document.getElementById("superMask");
        sMask.onmouseover=function(){
            mask.style.display="block";
            lgDiv.style.display="block";
        }
        sMask.onmouseout=function(){
            mask.style.display="none";
            lgDiv.style.display="none";
        }
        var MSIZE=200,MAX=200;
        sMask.onmousemove=function(e){
            var left=e.offsetX-MSIZE/2,
                    top=e.offsetY-MSIZE/2;
            if(left<0)left=0;else if(left>MAX)left=MAX;
            if(top<0)top=0; else if(top>MAX)top=MAX;
            mask.style.left=left+"px";
            mask.style.top=top+"px";
            lgDiv.style.backgroundPosition
                =-left*2+"px "+(-top*2)+"px"
        }
    }
    Plus();
    var imgMove = function imgMove(){
        var itemUl = $('.items>ul');
        var imgCount = $('.items>ul>li').length;
        var liWidth = 64, moved = 0;
        var prevImg = $('.prev'), nextImg = $('.next');
        itemUl.css({
            width : imgCount * liWidth + "px"
        })
        if(imgCount<=5){
            prevImg.addClass('disabled');
            nextImg.addClass('disabled');
        }
        nextImg.on('click',function(){
            if(!$(this).hasClass("disabled")){
                moved++;
                itemUl.css({
                    left : -moved * liWidth + "px"
                }) 
                prevImg.removeClass('disabled');
                if(moved==imgCount-5){
                    $(this).addClass('disabled');
                }    
            }
        });
        prevImg.on('click',function(){
            if(!$(this).hasClass("disabled")){
                moved--;
                itemUl.css({
                    left : -moved * liWidth + "px"
                })
                nextImg.removeClass('disabled');
                if(moved==0){
                    $(this).addClass('disabled');
                }   
            }
        })
    }
    imgMove();
})