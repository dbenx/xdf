$(function () {
  //导航专业列表
  $('.nav-zy').stop().hover(function () {
    $(this).stop().animate({'height':'560px'});
  },function () {
    $(this).stop().animate({'height':'60px'});
  })
  // 轮播
  jQuery(".fullSlide").slide({
    titCell: ".hd ul",
    mainCell: ".bd ul",
    autoPage: true,
    effect: "fold",
    autoPlay: true,
    trigger: "click",
    //mouseOverStop: false,
    interTime: 4000,
    startFun: function () {
      var timer = jQuery(".fullSlide .timer");
      timer.stop(true, true).animate({"width": "0%"}, 0).animate({"width": "100%"}, 4000);
    }
  });

  // 火热报名
  jQuery(".zyright").slide({mainCell: ".bd ul", autoPlay: true, effect: "topMarquee", vis: 17, interTime: 50});
  //tabs标签切换函数
  //点击切换
  function tabsC(tabTit, on, tabCon) {
    $(tabTit).children(':first').addClass(on);
    $(tabCon).children(':first').show().siblings().hide();
    $(tabTit).children().click(function () {
      $(this).addClass(on).siblings().removeClass(on);
      var index = $(tabTit).children().index(this);
      $(tabCon).children().eq(index).stop().show().siblings().hide();
    });
  }
  //名师
  tabsC('.ms-title', 'on', '.ms-con');
  //专业 升学班/就业班
  tabsC('.zytabt', 'on', '.zytabc');

  //滑动切换
  function tabs(tabTit, on, tabCon) {
    $(tabTit).children(':first').addClass(on);
    $(tabCon).children(':first').show().siblings().hide();
    $(tabTit).children().hover(function () {
      $(this).addClass(on).siblings().removeClass(on);
      var index = $(tabTit).children().index(this);
      $(tabCon).children().eq(index).stop().show().siblings().hide();
    });
  }
  //新闻栏目
  tabs('.news-title', 'on', '.news-con');
  //环境栏目
  tabs('.xyhd-title', 'on', '.xyhd-con');
  //环境列表
  tabs('.xyhd-right', 'on', '.xyhd-middle');
  //作品栏目
  tabs('.zp-title', 'on', '.zp-con')
//专业 升学班/就业班
  //tabs('.zytabt', 'on', '.zytabc');
  //合作单位和友链
  //tabs('.youlian-title', 'on', '.youlian-con');

//广告图片轮播
  var imgH = $('.pictop img').height();
  $('.pictop').height(imgH);
  // jQuery(".pictop").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true});
  var pictop = new Swiper('.pictop', {
    direction: 'vertical',
    slidesPerView : 1,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    loop: true,
  });

  var banji = new Swiper('.banji', {
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    loop: true,
  });

  var zsjh = new Swiper('.zsjh', {
    direction: 'vertical',
    slidesPerView : 5,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    loop: true,
  });

  var imgH = $('.picscroll img').height();
  $('.picscroll').height(imgH);
  var picscroll = new Swiper('.picscroll', {
    direction: 'vertical',
    slidesPerView : 1,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    loop: true,
  });


  //副轮播
  jQuery(".picScroll-top").slide({
    titCell: ".hd ul",
    mainCell: ".bd ul",
    autoPage: true,
    effect: "topLoop",
    autoPlay: true,
    vis: 3,
    trigger: "click",
    //loop: true
  });


//合作单位
  jQuery(".picMarquee-left").slide({
    mainCell: ".bd",
    autoPlay: true,
    effect: "leftMarquee",
    vis: 10,
    interTime: 30,
    trigger: "click"
  });


  //页底推荐专题
  $(".footer-tj-li-con .bd ul").append(
      "<li style='background:url(/style/images/tj-hot1.jpg) no-repeat center;'><a target='_blank' href='javascript:void(0);' onclick='swtClick()'  title='2022春季招生计划'></a></li>" +
      "<li style='background:url(/style/images/tj-hot2.jpg) no-repeat center;'><a target='_blank' href='javascript:void(0);' onclick='swtClick()'  title='短期创业'></a></li>" +
      "<li style='background:url(/style/images/tj-hot3.jpg) no-repeat center;'><a target='_blank' href='javascript:void(0);' onclick='swtClick()'  title='初中生'></a></li>"
  );
  jQuery(".footer-tj-li-con").slide({
    titCell: ".hd ul",
    mainCell: ".bd ul",
    autoPage: true,
    effect: "fold",
    autoPlay: true,
    trigger: "click",
    interTime: 4000,
  });

  $('.ybmleft_bar .close_btn').click(function () {
    $('.ybmleft_bar').toggleClass('ybmleft_bar_small');
  });

  $('.right_bar .close_btn').click(function () {
    $('.right_bar').toggleClass('right_bar_small');
  });


  //学子视频
  /*  $('.pl_btn').click(function () {
      $(this).parent().next('.video').fadeIn();
      $('video',this).trigger('play');
    });*/
  $('.xzsp li article').click(function () {
    $('video').trigger('pause');
    $(this).next('.video').fadeIn();
    $(this).next('.video').find('video').trigger('play');
  });
  $('.video').click(function(){
    $('video',this).trigger('pause');
    $(this).fadeOut();
  });
  $('.xzsp_close').click(function(){
    $(this).nextAll('video').trigger('pause');
    $(this).parents('.video').fadeOut();

  });
  $('.videobox').click(function(event){
    event.stopPropagation();
  });



});