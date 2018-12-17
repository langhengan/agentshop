$(()=>{
    var changeMsg = function changeMsg(){
        var $toggleSpan = $('.personal_bar>.change_msg');
        $toggleSpan.on('click', function() {
            setButtonStatus();
        });
        function setButtonStatus() {
            var modifyShow = $('.personal_right>.msg_modify');
            var msgShow = $('.personal_right>.personal_msg');
            var tip = $('.change_msg>u');
            if(modifyShow.hasClass('am_active')){
                modifyShow.removeClass('am_active').addClass('am_hidden');
                msgShow.removeClass('am_hidden').addClass('am_active');
                tip.text('修改资料');
            }else{
                msgShow.removeClass('am_active').addClass('am_hidden');
                modifyShow.removeClass('am_hidden').addClass('am_active');
                tip.text('暂不修改');
            }
        }
    }
    changeMsg();

    var imgPreview = function imgPreview(){
        var imgs = $('.img_show>div:nth-child(2)>img');
        var imgss = $('.sub_img>div:nth-child(2)>img');
        var imgBig = $('.fade');
        var imgClose = $('.close');
        imgs.on('click',function(){
            bullet($(this).attr('src'));
        })
        imgss.on('click',function(){
            bullet($(this).attr('src'));
        });
        imgClose.on('click',function(){
            $(this).parent().addClass('am_hidden');
        });
        function bullet(src){
            $('.fade').find('img').attr('src',src);
            imgBig.removeClass('am_hidden');
        }  
    }
    imgPreview();

    var subImg = function subImg(){
        var delIco = $('.sub_img>.img_con>i');
        var imgHtml = `<div class="add_img text-center">
                                    <span class="">+</span>
                                    <input type="file" class="file" accept="image/*">
                                </div>`;
        delIco.on('click',function(){
            var truthBeTold = window.confirm("确定删除当前图片重新上传？")
            if(truthBeTold){
                $(this).parent().html(imgHtml); 
                var choseIn = $('.add_img>input.file');
                choseIn.on('change',function(){
                    var filePath = $(this).val(),        
                    //获取到input的value，里面是文件的路径    		
                    fileFormat = filePath.substring(filePath.lastIndexOf(".")).toLowerCase(),    
                    src = window.URL.createObjectURL(this.files[0]);
                    var addHtml =`<img src="${src}" alt="">
                                            `;
                    if( !fileFormat.match(/.png|.jpg|.jpeg/) ) {    	
                        error_prompt_alert('上传错误,文件格式必须为：png/jpg/jpeg');   
                            return;          }   
                    var maxSize = 2*1024*1024;
                    var fileSize = $(this).context.files[0].size;
                    // 上传图片大小不得大于2M
                    if(fileSize>maxSize){
                        alert('文件最大不能超过2M');
                        return false;
                    }
                    $(this).parent().append(addHtml); 
                    var reChose = $('.add_img>i.fa');
                    var reImg = $('.add_img>img');
                    
                    reImg.on('click',function(){
                        var src = $(this).attr('src');
                        $('.fade').find('img').attr('src',src);
                        $('.fade').removeClass('am_hidden');
                    });

                    // reChose.on('click',function(){
                    //     $(this).prev().remove();
                    //     $(this).parent().find('input').val('');
                    //     $(this).remove();
                    // });
                });
            }    
        })
    }
    subImg();
})