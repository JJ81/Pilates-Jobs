<?php
require_once('./autoload.php');
require_once('./commons/config.php');
require_once('./commons/utils.php');
require_once('./commons/session.php');

?>
<!doctype html>
<html lang="ko">
<head>

<?php require_once('./inc/head.php') ;?>

<title>Yoga</title>
</head>

<body>

<div class="loader"></div>

<!--cookie-->
<!-- <div class="cookie">
        <div class="container">
          <div class="clearfix">
            <span>Please note this website requires cookies in order to function correctly, they do not store any specific information about you personally.</span>
            <div class="f-right"><a href="#" class="button button-type-3 button-orange">Accept Cookies</a><a href="#" class="button button-type-3 button-grey-light">Read More</a></div>
          </div>
        </div>
      </div>-->

<!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->
<div id="wrapper" class="wrapper-container">
    <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->
    <nav id="mobile-advanced" class="mobile-advanced"></nav>

    <?php require_once ('./inc/header.php');?>

    <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
<!--    <div class="breadcrumbs-wrap">-->
<!--        <div class="container">-->
<!--            <h1 class="page-title">Classic Blog</h1>-->
<!--            <ul class="breadcrumbs">-->
<!--                <li><a href="index.html">Home</a></li>-->
<!--                <li>Blog</li>-->
<!--                <li>Classic</li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
    <!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
    <div id="content" class="page-content-wrap">
        <div class="container">
            <div class="row">
                <main id="main" class="col-lg-8 col-md-12">

                    <div class="content-element5">

                        <div class="entry-box">

                            <!-- Entry -->
                            <div class="entry">

                                <div class="label-top">Featured</div>

                                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                <div class="thumbnail-attachment">
                                    <a href="#"><img src="./assets/images/698x442_img1.jpg" alt=""></a>
                                    <div class="entry-label">News</div>
                                </div>

                                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                <div class="entry-body">

                                    <h5 class="entry-title"><a href="#">이와 같이 알림과 소식이 전달됩니다. </a></h5>
                                    <div class="entry-meta">

                                        <time class="entry-date" datetime="2018-12-21">2018-12-21 posted</time>
                                        <span>by</span>
                                        <a href="#" class="entry-cat">Admin</a>
                                    </div>
                                    <p>새로운 소식을 전달합니다. 새로운 소식을 전달합니다. 새로운 소식을 전달합니다. 새로운 소식을 전달합니다. 새로운 소식을 전달합니다. 새로운 소식을 전달합니다. </p>
                                    <div class="flex-row justify-content-between">
                                        <a href="#" class="btn btn-small btn-style-4">더보기</a>
                                        <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                    </div>

                                </div>

                            </div>

                            <!-- Entry -->
                            <div class="entry">

                                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                <div class="thumbnail-attachment">
                                    <div class="carousel-type-2 var3">
                                        <div class="owl-carousel" data-max-items="1">
                                            <img src="./assets/images/698x442_img2.jpg" alt="">
                                            <img src="./assets/images/698x442_img3.jpg" alt="">
                                            <img src="./assets/images/698x442_img4.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="entry-label">Practice</div>
                                </div>

                                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                <div class="entry-body">

                                    <h5 class="entry-title"><a href="#">요가로 체중 감량하기</a></h5>
                                    <div class="entry-meta">

                                        <time class="entry-date" datetime="2018-12-21">2018-12-21 posted</time>
                                        <span>by</span>
                                        <a href="#" class="entry-cat">Admin</a>

                                    </div>
                                    <p>핫요가로 이제부터 당신의 체중을 관리해보세요. 핫요가로 이제부터 당신의 체중을 관리해보세요. 핫요가로 이제부터 당신의 체중을 관리해보세요. 핫요가로 이제부터 당신의 체중을 관리해보세요. 핫요가로 이제부터 당신의 체중을 관리해보세요. </p>
                                    <div class="flex-row justify-content-between">
                                        <a href="#" class="btn btn-small btn-style-4">더보기</a>
                                        <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                    </div>

                                </div>

                            </div>

                            <!-- Entry -->
                            <div class="entry">
                                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                <div class="thumbnail-attachment testimonial-holder style-2">

                                    <div class="blockquote-holder testimonial">
                                        <blockquote class="align-center">
                                            <p>OOO업체가 당신의 정보를 알람하였습니다. 관심 회사를 확인해보세요.</p>
                                            <div class="author">John McCoist</div>
                                        </blockquote>
                                        <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                        <div class="entry-body">

                                            <div class="flex-row justify-content-between">

                                                <div class="entry-meta">

                                                    <time class="entry-date" datetime="2018-11-18">2018-11-18 posted</time>
                                                    <span>by</span>
                                                    <a href="#" class="entry-cat">Admin</a>

                                                </div>

                                                <a href="#" class="entry-icon"><i class="licon-share"></i></a>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- Entry -->
                            <div class="entry">

                                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                <div class="thumbnail-attachment">

                                    <div class="link-attachment">
                                        <div class="link-wrap">
                                            <a href="#" class="link">OOO님이 당신 회사에 관심을 표시했습니다.</a>
                                        </div>
                                        <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                        <div class="entry-body">
                                            <div class="flex-row justify-content-between">
                                                <div class="entry-meta">
                                                    <time class="entry-date" datetime="2018-11-18">2018-11-18 posted</time>
                                                    <span>by</span>
                                                    <a href="#" class="entry-cat">Admin</a>
                                                </div>
                                                <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Entry -->
                            <div class="entry">

                                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                <div class="thumbnail-attachment">
                                    <a href="#"><img src="./assets/images/698x442_img5.jpg" alt=""></a>
                                    <div class="entry-label">Tips</div>
                                </div>

                                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                <div class="entry-body">

                                    <h5 class="entry-title"><a href="#">한 조각의 피자의 열량은 당신의 체중과 어떠한 상관관계가 있는가?</a></h5>
                                    <div class="entry-meta">

                                        <time class="entry-date" datetime="2018-12-21">2018-12-21 posted</time>
                                        <span>by</span>
                                        <a href="#" class="entry-cat">Admin</a>

                                    </div>
                                    <p>비단 한조각의 피자가 당신의 인생을 송두리째 망가뜨릴 수 있는 엄청난 열량을 보유하고 있다고 하더라도 그 모든 열량이 당신의 지방 조직에 축적되지는 않습니다..</p>
                                    <div class="flex-row justify-content-between">
                                        <a href="#" class="btn btn-small btn-style-4">더보기</a>
                                        <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                    </div>

                                </div>

                            </div>

                            <!-- Entry -->
                            <div class="entry">

                                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                <div class="thumbnail-attachment">
                                    <div class="responsive-iframe">

                                        <iframe src="https://www.youtube.com/embed/oX6I6vs1EFs?rel=0&amp;showinfo=0&amp;autohide=2&amp;controls=0&amp;playlist=J2Y_ld0KL-4&amp;enablejsapi=1"></iframe>

                                    </div>
                                    <div class="entry-label">Video</div>
                                </div>

                                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                <div class="entry-body">

                                    <h5 class="entry-title"><a href="#">매일매일 영상으로 요가선생님을 만나보아요</a></h5>
                                    <div class="entry-meta">

                                        <time class="entry-date" datetime="2018-12-02">2018-12-02 posted</time>
                                        <span>by</span>
                                        <a href="#" class="entry-cat">Admin</a>

                                    </div>
                                    <p>홈트레이닝이 요즘 부쩍 늘어나면서 간단하게 영상을 보면서 시간을 쪼개어 운동에 시간을 투자하시는 분들이 늘어나고 있는 추세입니다...</p>
                                    <div class="flex-row justify-content-between">
                                        <a href="#" class="btn btn-small btn-style-4">더보기</a>
                                        <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                    </div>

                                </div>

                            </div>

                            <!-- Entry -->
                            <div class="entry">

                                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                <div class="thumbnail-attachment">
                                    <div class="audio-frame">
                                        <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/142827697&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
                                    </div>
                                </div>

                                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                <div class="entry-body">
                                    <h5 class="entry-title"><a href="#">왜 요가가 모두에게 적절한 운동이 되는가?</a></h5>
                                    <div class="entry-meta">
                                        <time class="entry-date" datetime="2018-10-28">2018-10-28</time>
                                        <span>posted by</span>
                                        <a href="#" class="entry-cat">Admin</a>
                                    </div>
                                    <p>요가는 남녀노소 불문하고 누구나 쉽게 배우고 따라할 수가 있습니다. 너무 어려운 아사나를 따라하기보다 자신에게 맞는 아사나를 골라 배우시는 것이 좋습니다.</p>
                                    <div class="flex-row justify-content-between">
                                        <a href="#" class="btn btn-small btn-style-4">더보기</a>
                                        <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Entry -->
                            <div class="entry">

                                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                <div class="thumbnail-attachment">
                                    <div class="responsive-iframe">
                                        <iframe src="https://player.vimeo.com/video/169730736?title=0&amp;byline=0&amp;portrait=0&amp;color=dedede"></iframe>
                                    </div>
                                    <div class="entry-label">Video</div>
                                </div>

                                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                <div class="entry-body">
                                    <h5 class="entry-title"><a href="#">행복한 하루를 찾는 3가지 중요한 방법</a></h5>
                                    <div class="entry-meta">

                                        <time class="entry-date" datetime="2018-12-21">2018-12-21</time>
                                        <span>posted by</span>
                                        <a href="#" class="entry-cat">Admin</a>

                                    </div>
                                    <p>당신에게 있어서 가장 소중한 것을 무엇인가요? 모두의 인생은 소중합니다. 당신이 소중한 존재이기에 행복한 하루하루를 보내기에 충분합니다. 자 그럼 그 방법을...</p>
                                    <div class="flex-row justify-content-between">
                                        <a href="#" class="btn btn-small btn-style-4">더보기</a>
                                        <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Entry -->
                            <div class="entry">
                                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                <div class="thumbnail-attachment video-holder">
                                    <a href="https://player.vimeo.com/video/169730736?title=0&amp;byline=0&amp;portrait=0&amp;color=dedede" class="video-btn" data-fancybox="video"></a>
                                    <img src="./assets/images/698x390_img1.jpg" alt="">
                                    <div class="entry-label">Video</div>
                                </div>

                                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                <div class="entry-body">
                                    <h5 class="entry-title"><a href="#">임신을 한 여성에게 가장 좋은 요가 자세 8가지 추천</a></h5>
                                    <div class="entry-meta">
                                        <time class="entry-date" datetime="2018-12-21">2018-12-21</time>
                                        <span>posted by</span>
                                        <a href="#" class="entry-cat">Admin</a>
                                    </div>
                                    <p>요가는 좋은 운동임에 분명하지만, 사람의 환경와 상황에 따라서 가장 좋은 자세가 있습니다. 그 자세를 잘 응용하면 좀 더 윤택한 삶이 가능해집니다 임산부를 위한 요가 이제부터 함께 알아볼까요?</p>
                                    <div class="flex-row justify-content-between">
                                        <a href="#" class="btn btn-small btn-style-4">더보기</a>
                                        <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="pagination">
                        <li><a href="#" class="prev-page"></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#" class="next-page"></a></li>
                    </ul>

                </main>

                <?php require_once ('./inc/aside.php');?>

            </div> <!-- // end row -->
        </div> <!-- // end container -->
    </div> <!-- // end content -->
    <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->

    <?php require_once ('./inc/footer.php');?>
    <?php require_once ('./popup/sign.php');?>
    <?php require_once ('./popup/login.php');?>
</div>

<!-- - - - - - - - - - - - end Wrapper - - - - - - - - - - - - - - -->
<?php require_once ('./inc/tail.php');?>

</body>
</html>