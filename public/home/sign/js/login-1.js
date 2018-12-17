$(()=>{
    var thumbnailShow = function(){
        // 图片上传后缩略图预览效果
        var thumbnail = $('.file');
        thumbnail.on('change',function(){  	
            var filePath = $(this).val(),        
            //获取到input的value，里面是文件的路径    		
            fileFormat = filePath.substring(filePath.lastIndexOf(".")).toLowerCase(),    
            src = window.URL.createObjectURL(this.files[0]); 
            var picHtml = `<img src="${src}" alt="">`;
            var conHtml = `<div class="control text-center">
                                    <i class="fa fa-trash-o del"></i>
                                    <i class="fa fa-search-plus plus"></i>
                                </div>`;
            //转成可以在本地预览的格式    		    	
            // 检查是否是图片    	
            if( !fileFormat.match(/.png|.jpg|.jpeg/) ) {    	
                error_prompt_alert('上传错误,文件格式必须为：png/jpg/jpeg');      
                    return;          }   
            console.log($(this).context.files[0].size);
            var maxSize = 1*1024*1024;
            var fileSize = $(this).context.files[0].size;
            // 上传图片大小不得大于2M
            if(fileSize>maxSize){
                alert('文件最大不能超过1M');
                return false;
            } 
            $(this).next().prepend(picHtml);

            var imgCon = $(this).next().find('img');
            imgCon.on('mouseover',function(){
                $(this).parent().parent().append(conHtml);
                var del = $(this).parent().next().find('i.del');
                var plus = $(this).parent().next().find('i.plus');
                del.on('click',function(){
                    $(this).parent().parent().find('div.text-detail').find('img').remove();
                    $(this).parent().parent().find('input').val('');
                    $(this).parent().remove();
                })
                plus.on('click',function(){
                    $('.fade').css({
                        display:'block'
                    });
                    $('.fade').find('img').attr('src',src);
                    var closeI = $('.fade>.close');
                    closeI.on('click',function(){
                        $(this).parent().css({
                            display:'none'
                        })
                    })
                })
                $('.control').on('mouseleave',function(){
                    $(this).remove();
                })
            })
        });
    }
    thumbnailShow();
           
})