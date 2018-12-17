<div class="personal_left">
    <div>
        <img src="{{asset('home/images/user.png')}}" alt="">
        <p>北京中科生仪</p>
    </div>
    <div>
    <ul id="menu">
        <li>
            <i class="icon-data"></i>
            <a href="{{url('/personal')}}">个人资料</a>
            {{--@php echo $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];@endphp--}}
        </li>
        <li>
            <i class="icon-password"></i>
            <a href="{{url('/update-pass')}}">修改密码</a>
        </li>
        <li>
            <i class="icon-sign"></i>
            <a href="{{url('/order-record')}}">我的订单</a>
        </li>
        <li>
            <i class="fa fa-cloud-download"></i>
            <a href="{{url('/download')}}">模板下载</a>
        </li>
    </ul>
    </div>
</div>


<script src="{{asset('/home/public/js/lib/jquery-1.12.3.js')}}"></script>
<script>
    var url=location.href;
    console.log(url);
    var ur;
    var a;
   var lis = $('#menu>li');
   lis.on('click',function(){
        ur = 'http://'+$(this).find('a').attr('href');
       // if (ur===url) {
           // $(this).addClass('active');
           // $(this).siblings().remove('active');
            a=$(this).index();
           return a;
       // }
       // $(this).addClass('active');
       // $(this).siblings().remove('active');

   });
    // console.log(a);
</script>
