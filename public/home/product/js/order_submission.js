$(()=>{
    var t = $("#order_submission").find(".plus").parent().find("input"),
        i = Number(t.val()),     
        o = $(".sub_describe").find(".price").data("price"),
        a = $(".sub_describe").find("a"),
        p = $(".total_price").find("span").find(".total_input"),
        c = $(".total_money"),
        n = $(".discount_price"),
        d = $(".discount_price").val(),
        b = $(".bottom_price"),
        j = Number(o*i).toFixed(2);
        p.val(j);
        c.text(j);
        $(".sub_describe").find(".price").text('￥'+o);

    $("#order_submission").find(".plus").click(function(n){
        i += 1,t.val(i),
        j = Number(o*i).toFixed(2),
        p.val(j),c.text("￥"+j),
        b.text("￥" +Number(o*i-d).toFixed(2));
    });
    $("#order_submission").find(".reduce").click(function(n){
        i<=1?t.val(1):(i-=1,t.val(i)),
        j = Number(o*i).toFixed(2),
        p.val(j),c.text("￥"+j),
        b.text("￥" +Number(o*i-d).toFixed(2));
    });
    n.on('keyup',function(){
        b.text("￥" +Number(o*i-$(this).val()).toFixed(2));
    })

})
