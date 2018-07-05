<?php
require_once('./autoload.php');
require_once('./commons/config.php');
require_once('./commons/utils.php');
require_once('./commons/session.php');


use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

// 1. 구인 정보 모두 출력
// TODO 구인정보 출력 및 입력 양식이 필요함.


// 2. 공지사항 최근 조회 10개
$notice_list_query=
    "select * from `cms_board_notice` " .
    "where `active` is true " .
    "order by `id` desc " .
    "limit 0, 10;";
$notice=$db->query($notice_list_query);

// 3. 이벤트 최근 10개



// 4. 블로그글 최근 10개
$blog_list_query=
    "select * from `cms_board_blog` " .
    "where `active` is true " .
    "order by `id` desc " .
    "limit 0, 10;";
$blog=$db->query($blog_list_query);








$db=null;
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

                            <?php for($i=0,$size=count($blog);$i<$size;$i++){ ?>
                                <?php if($blog[$i]['blog_type'] == 'T'){ ?>
                                    <!-- Entry ( Simple type) -->
                                    <div class="entry">
                                        <div class="label-top">Featured</div>
                                        <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                        <div class="thumbnail-attachment">
                                            <a href="#"><img src="<?php echo ROOT;?>upload/<?php echo $blog[$i]['thumbnail']; ?>" alt="" /></a>
                                            <div class="entry-label">News</div>
                                        </div>
                                        <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                        <div class="entry-body">
                                            <h5 class="entry-title">
                                                <a href="#"><?php echo $blog[$i]['title']; ?></a>
                                            </h5>
                                            <div class="entry-meta">

                                                <time class="entry-date" datetime="<?php echo $blog[$i]['created_dt']; ?>"><?php echo $blog[$i]['created_dt']; ?> posted</time>
                                                <span>by</span>
                                                <a href="#" class="entry-cat">관리자</a>
                                            </div>
<!--                                            <p>새로운 소식을 전달합니다. 새로운 소식을 전달합니다. 새로운 소식을 전달합니다. 새로운 소식을 전달합니다. 새로운 소식을 전달합니다. 새로운 소식을 전달합니다. </p>-->
                                            <div class="flex-row justify-content-between">
                                                <a href="#" class="btn btn-small btn-style-4">더보기</a>
                                                <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else if($blog[$i]['blog_type'] == 'V'){?>
                                    <!-- Entry video type -->
                                    <div class="entry">
                                        <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
                                        <div class="thumbnail-attachment">
                                            <div class="responsive-iframe">

                                                <iframe src="https://www.youtube.com/embed/<?php echo $blog[$i]['video']; ?>?rel=0&amp;showinfo=0&amp;autohide=2&amp;controls=0&amp;playlist=J2Y_ld0KL-4&amp;enablejsapi=1"></iframe>

                                            </div>
                                            <div class="entry-label">Video</div>
                                        </div>

                                        <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                                        <div class="entry-body">

                                            <h5 class="entry-title">
                                                <a href="#"><?php echo $blog[$i]['title']; ?></a>
                                            </h5>
                                            <div class="entry-meta">

                                                <time class="entry-date" datetime="<?php echo $blog[$i]['created_dt']; ?>"><?php echo $blog[$i]['created_dt']; ?> posted</time>
                                                <span>by</span>
                                                <a href="#" class="entry-cat">관리자</a>

                                            </div>
<!--                                            <p>홈트레이닝이 요즘 부쩍 늘어나면서 간단하게 영상을 보면서 시간을 쪼개어 운동에 시간을 투자하시는 분들이 늘어나고 있는 추세입니다...</p>-->
                                            <div class="flex-row justify-content-between">
                                                <a href="#" class="btn btn-small btn-style-4">더보기</a>
                                                <a href="#" class="entry-icon"><i class="licon-share"></i></a>
                                            </div>

                                        </div>

                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
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