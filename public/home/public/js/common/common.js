$(function() {

  var isMobile = {
    Android: function() {
      return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
      return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
      return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
      return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
      return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
  };
  var isIE678 = function() {
      var browser = navigator.appName
      var b_version = navigator.appVersion
      var version = b_version.split(";");
      var trim_Version = version[1].replace(/[ ]/g, "");
      if (browser == "Microsoft Internet Explorer" && (trim_Version == "MSIE6.0" || trim_Version == "MSIE7.0" || trim_Version == "MSIE8.0")) {
        window.location.href = "/index/killid";
      } else if (browser == "Microsoft Internet Explorer" && trim_Version == "MSIE9.0") {
        $(function() {
          $(".input_txt_val").each(function() {
            var txtHolder = $(this).attr("placeholder")
            $(this).val(txtHolder).addClass("hint");
            console.log(txtHolder)
            $(this).focus(function() {
              if ($(this).val() == txtHolder) {
                $(this).val("").removeClass("hint");
              }
            }).blur(function() {
              if ($(this).val().trim() === "") {
                $(this).val(txtHolder).addClass("hint");
              }
            })
          })
        })
      }
    }

  /* 打开qq*/
  var openqq = function() {
    $('.icon-myqq').click(function() {
      window.open('http://wpa.qq.com/msgrd?v=3&uin=2160226134&site=qq&menu=yes&from=message&isappinstalled=0')
    })
  }

  /*下拉菜单*/
  var dropdown = function() {
    $('.navbar-nav').find('.dropdown').each(function(index, el) {
      $(this).click(function() {
        $(this).siblings('.dropdown').each(function(index, el) {
          $(this).find('.dropdown-menu').hide();
          $(this).removeClass('open');
        });

        if (!$(this).hasClass('open')) {
          $(this).addClass('open');
          $(this).find('.dropdown-menu').show();
        } else {
          $(this).removeClass('open')
          $(this).find('.dropdown-menu').hide();
        }
      })
    });
  }

  var slidContent = function() {
    var slidContentHeight = $('.slid__content').outerHeight();
    var stepWarpHeight = $('.step__warp').outerHeight();
    if (slidContentHeight > 700) {
      $('.slidNav').height(slidContentHeight);
    }
    if (stepWarpHeight > 700) {
      $('.slidNav').height(stepWarpHeight);

    }
  }

  openqq();
  dropdown();
  slidContent();
  isIE678();
})