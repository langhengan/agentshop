$(()=>{
    var bullet = function bullet(){
        var triggerSpan = $('.express_num>span.trigger_span');
        var closeType = $('.chose_type>span:last-child>a');
        var showType = $('.fade');
        triggerSpan.on('click',function(e){
            e.preventDefault();
            showType.css({
                display: 'block'
            });
        });
        closeType.on('click',function(e){
            e.preventDefault();
            showType.css({
                display: 'none'
            });
        })
    }
    bullet();

    // var invoiceType = function invoiceType(){
    //     var chooseType = $('.types>span');
    //     chooseType.on('click',function(){
    //         $(this).addClass('active').siblings().removeClass('active');
    //     })
    // }
    // invoiceType();
})