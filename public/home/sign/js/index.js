$(()=>{
    var progress = function progress() {               
        var o = {};
        o.regxs = [];
        o.inputPassword = $('#password');
        // o.surePass = $('#sure_pass');
        o.items = $('.progress_item').find('.item_bar');
        o.progressWord = $('.item_word');

        o.regxs.push(/[^a-zA-Z0-9_]/g);
        o.regxs.push(/[a-zA-Z]/g);
        o.regxs.push(/[0-9]/g);

        o.inputPassword.on('keyup', function() {
            var val = this.value;
            var len = val.length;
            var sec = 0;
            if (len >= 8) {
                // 至少八个字符
                for (var i = 0; i < o.regxs.length; i++) {
                    if (val.match(o.regxs[i])) {
                        sec++;
                    }
                }
            }
            var result = sec / o.regxs.length * 100;

            if (result > 0 && result <= 50) {
                o.showItem(0, '低');
            } else if (result > 50 && result < 100) {
                o.showItem(1, '中');
            } else if (result == 100) {
                o.showItem(2, '高');
            } else if (result === 0) {
                o.showItem(-1, '');
            }
        });

        // o.surePass.on('change', function() {
        //     var val = this.value;
        //     var len = val.length;
        //     if (len >= 8) {
        //         var nextstep = $('.submit>button');
        //         nextstep.on('click',function(e){
        //             var val = $('#password').val();
        //             // var len = val.length;
        //             var sureval = $('#sure_pass').val();
        //             e.preventDefault(); 
        //             if(sureval.length>=8){
        //             if(val === sureval){
        //                     location.href = 'http://localhost/lunghealth_biotech_c/sign/login-1.html';
        //                 }else{
        //                     alert('两次密码不一致，请重新输入！')
        //                 } 
        //             } 
                    
        //         })
        //     }            
        // });

        var nextstep = $('.submit>button');
        nextstep.on('click',function(e){
            e.preventDefault();
            var passInput = $('#password').val();
            var surePass = $('#sure_pass').val();
            var userName = $('#user_name').val();
            var testName = /^[\u4e00-\u9fa5]{2,}$/;
            var testPass = /^\w{8,16}$/;
            if(testName.test(userName)){
                if(testPass.test(passInput)){
                    if(passInput === surePass){
                        
                         $.ajax({
                            type:"get",
                            url:"../public/data/index/getIndexProducts.php",
                            dataType:"json",
                            beforeSend:function(xhr){
                                console.log("向 data/index/getIndexProducts.php 发送 get 请求");
                            },
                            complete:function(xhr,statusCode){
                                console.log("向 data/index/getIndexProducts.php 发送 get 请求 —— 完成, 状态码:"+statusCode);
                            },
                            success:function(output){
                                console.log("向 data/index/getIndexProducts.php 发送 get 请求 —— 成功！");
                            },
                            error:function(){
                                console.log("向 data/index/getIndexProducts.php 发送 get 请求 —— 请求出错!");
                            }
                        });
                        location.href = 'http://localhost/lunghealth_biotech_c/sign/login-1.html';
                    }else{
                        alert('两次密码不一致，请重新输入');
                    }
                }else{
                    $('#password').focus();
                }
            }else{
                // alert('用户名不符合规则，请重新输入');
                $('#user_name').focus();
            }
        })
        

        o.showItem = function(key, word) {
            if (key !== -1) {
                o.items.each(function(index, el) {
                    if (index <= key) {
                        $(this).css({
                            visibility: 'visible'
                        });
                        if (index === 0) {
                            $(this).parent().addClass('low');
                        }
                        if (index === 1) {
                            $(this).parent().addClass('center');
                        }
                        if (index === 2) {
                            $(this).parent().addClass('high');
                        }
                    } else {
                        $(this).css({
                            visibility: 'hidden'
                        });
                    }
                });
            } else {
                o.items.each(function(index, el) {
                    $(this).css({
                        visibility: 'visible'
                    });
                    $(this).parent().removeClass('low');
                    $(this).parent().removeClass('center');
                    $(this).parent().removeClass('high');
                });
            }
            o.progressWord.text(word);
        };
    };
    progress();

   
})

