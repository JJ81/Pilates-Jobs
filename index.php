<?php
require_once('./autoload.php');
require_once('./commons/config.php');
require_once('./commons/utils.php');
require_once('./commons/session.php');


use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

// 1. 구인정보 모두 가져오기
$job_query=
    "select `cji`.*, `cbi`.`business_name` as `branch_name`, `cbi`.`address` as `branch_address`, " .
    "`cm`.`business_name`, `cm`.`homepage`, `cm`.`business_number`, `cm`.`email`, `cm`.`description`  " .
    "from `cms_job_info` as `cji` " .
    "left join `cms_business_info` as `cbi` " .
    "on `cbi`.`id` = `cji`.`branch` " .
    "left join `cms_member` as `cm` " .
    "on `cm`.`id` = `cbi`.`cm_id` order by `cji`.`id` desc;";
$job=$db->query($job_query);


// 2. 공지사항 최근 조회 10개
$notice_list_query=
    "select * from `cms_board_notice` " .
    "where `active` is true " .
    "order by `id` desc " .
    "limit 0, 10;";
$notice=$db->query($notice_list_query);

// 3. 이벤트 최근 10개
$event_list_query=
    "select * from `cms_board_event` " .
    "where `active` is true " .
    "order by `id` desc " .
    "limit 0, 10;";
$event=$db->query($event_list_query);



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

<!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->
<div id="wrapper" class="wrapper-container">
    <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->
    <nav id="mobile-advanced" class="mobile-advanced"></nav>

    <?php require_once ('./inc/header.php');?>

    <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
    <div id="content" class="page-content-wrap">
        <div class="container">
            <div class="row">
                <main id="main" class="col-lg-8 col-md-12">
                    <div class="job-info-area">
                        <h2 class="section-title bold">이벤트</h2>
                        <ul class="notice-wrp">
                            <?php for($i=0,$size=count($event);$i<$size;$i++){ ?>
                                <li class="notice-list">
                                    <a href="#event" class="notice-link">
                                        <?php echo $event[$i]['title']; ?>
                                        <i class="ico ico_arrow_right"></i>
                                    </a>
                                    <div class="notice-desc">
                                        <?php echo $event[$i]['contents']; ?>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div style="border: 1px dotted #ddd;height: 1px;"></div>

                    <div class="job-info-area">
                        <h2 class="section-title bold">구인 정보</h2>
                        <div>
                            <!-- loop -->
                            <?php for($i=0,$size=count($job);$i<$size;$i++){ ?>
                            <div class="job-info-box">
                                <h3 class="clearfix">
                                    <?php echo $job[$i]['business_name']; ?>
                                </h3>
                                <div>
                                    지역: <?php echo $job[$i]['branch_address']; ?>
                                    <span class="split">|</span>
                                    급여: <?php echo $job[$i]['salary']; ?>
                                    <span class="split">|</span>
                                    근무시간: <?php echo $job[$i]['job_time']; ?>
                                    <span class="split">|</span>
                                    근무형태: <?php echo $job[$i]['job_type']; ?>
                                    <span class="split">|</span>
                                    직책: <?php echo $job[$i]['position']; ?>

                                    <div class="job-info-bottom">
                                        <a href="#none" class="link-more-company-info js-more-info">더보기</a>
                                        <a href="#" class="btn-job-apply" data-job-id="<?php echo $job[$i]['id']; ?>">지원하기</a>
                                    </div>

                                    <div class="hidden-info-company">
                                        <div><strong>상세 정보</strong></div>
                                        <div>
                                            상호 : <?php echo $job[$i]['business_name']; ?>
                                            <span class="split">|</span>
                                            사업자번호: <?php echo $job[$i]['business_number']; ?>
                                            <span class="split">|</span>
                                            이메일: <a href="mailto:<?php echo $job[$i]['email']; ?>"><?php echo $job[$i]['email']; ?></a>
                                            <span class="split">|</span>
                                            홈페이지: <a href="<?php echo $job[$i]['homepage']; ?>" target="_blank"><?php echo $job[$i]['homepage']; ?></a>
                                            <span class="split">|</span>
                                            연락처: <a href="tel:<?php echo $job[$i]['phone']; ?>">
                                                <?php if(empty($_SESSION['role']) or $_SESSION['role'] == 'U'){?>
                                                    ***-****-****
                                                <?php } else { ?>
                                                    <?php echo $job[$i]['phone']; ?>
                                                <?php } ?>
                                            </a>
                                            <p style="white-space: pre-line;"><?php echo $job[$i]['description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- // loop -->
                        </div>
                    </div>

                    <div style="border: 1px dotted #ddd;height: 1px;"></div>

                    <div class="content-element5">
                        <h2 class="section-title bold">필라하우스 소식</h2>
                       <div class="entry-box">
                            <?php for($i=0,$size=count($blog);$i<$size;$i++){ ?>
                                <?php if($blog[$i]['blog_type'] == 'T'){ ?>
                                    <!-- Entry ( Simple type) -->
                                    <div class="entry">
<!--                                        <div class="label-top">Featured</div>-->
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
                                                <a href="#" class="btn btn-small btn-style-4 js-more-blog-info">더보기</a>
<!--                                                <a href="#" class="entry-icon"><i class="licon-share"></i></a>-->
                                            </div>
                                        </div>
                                        <div class="blog-contents-info"><?php echo $blog[$i]['contents']; ?></div>
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
                                                <a href="#" class="btn btn-small btn-style-4 js-more-blog-info">더보기</a>
<!--                                                <a href="#" class="entry-icon"><i class="licon-share"></i></a>-->
                                            </div>
                                        </div>

                                        <div class="blog-contents-info"><?php echo $blog[$i]['contents']; ?></div>
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
<script>
    var noticeLink = $('.notice-link');
    var btnApply = $('.btn-job-apply');
    var btnMoreInfo = $('.js-more-info');
    var btnMoreBlog = $('.js-more-blog-info');

    noticeLink.bind('click', function (e) {
        e.preventDefault();

        var target=$(this).next();

        if(target.hasClass('active')){
            target.css('display', 'none');
            target.removeClass('active');
            $(this).children('.ico').removeClass('ico_arrow_down').addClass('ico_arrow_right');
        }else{
            target.css('display', 'block');
            target.addClass('active');
            $(this).children('.ico').addClass('ico_arrow_down').removeClass('ico_arrow_right');
        }
    });

    btnApply.bind('click', function (e) {
        e.preventDefault();

        var formData = new FormData();
        var config = {};

        var data = $(this).attr('data-job-id');

        if(!data){
            alert('잘못된 접근입니다.');
            return;
        }

        formData.append('job_id', data);

        axios.post('<?php echo ROOT;?>response/res_apply_job.php', formData, config)
            .then(function (res) {
                // console.log(res);
                if(res.data.success){
                    alert(res.data.msg);
                }else{
                    alert(res.data.msg);
                }
            })
            .catch(function (err) {
                alert('지원처리가 실패되었습니다. 잠시 후에 다시 시도해주세요.');
                console.error(err);
            });
    });

    btnMoreInfo.bind('click', function (e){
        e.preventDefault();
        console.log('more');
        var target=$(this).parent().next();

        if(target.hasClass('active')){
            target.css('display', 'none');
            target.removeClass('active');
        }else{
            target.css('display', 'block');
            target.addClass('active');
        }
    });

    btnMoreBlog.bind('click', function(e){
        e.preventDefault();
        var target=$(this).parent().parent().next();
        if(target.hasClass('active')){
            target.css('display', 'none');
            target.removeClass('active');
        }else{
            target.css('display', 'block');
            target.addClass('active');
        }
    });

</script>


</body>
</html>