$(function (){
    var t=$("#product_show__buy").find(".num__warp").find(".allNum"),
    i=Number(t.text()),
    o=$(".product_show__num--warp").find(".price"),
    a=$(".product_show__type--warp").find("a"),
    s=$(".product_show__add").find("a");
    $("#product_show__buy").find(".plus").click(function(n){
        i+=1,t.text(i),s.data("num",i)
    }),
    $("#product_show__buy").find(".reduce").click(function(n){
        i<=1?t.text(1):(i-=1,t.text(i)),
        s.data("num",i)
    }),
    a.each(function(t,i){$(this).click(function(t){
        var i=$(this).data("price"),
        n=$(this).data("productid"),
        a=$(this).data("goodsid");
        s.data("price",i),
        s.data("productid",n),
        s.data("goodsid",a),
        $(this).siblings().removeClass("active"),
        $(this).addClass("active"),
        o.text("￥"+i)})
    }),
    s.click(function(t){
        var i=$(this).parent(".product_show__add").data("price"),
        n=$(this).parent(".product_show__add").data("productid"),
        o=$(this).parent(".product_show__add").data("goodsid"),
        s=$(this).parent(".product_show__add").data("num");
        if(void 0===i){
            var d=a;
            i=d.data("price"),
            n=d.data("productid"),
            o=d.data("goodsid")
        }
        var e=Number((s*i).toFixed(2));
        console.log(i,n,s,e,o);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $.post("/cart/store",{price:i,product_id:n,num:s,allmony:e,goodsid:o},
        function(t){
           console.log(t);
            //JSON.parse(t).data;
          // window.location.href="/cart/index"
        })
    })
}())
