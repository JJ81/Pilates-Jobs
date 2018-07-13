
<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

<header id="header" class="header sticky-header">

    <!-- searchform -->

    <div class="searchform-wrap">
        <div class="vc-child h-inherit">

            <form class="search-form">
                <button type="submit" class="search-button"></button>
                <div class="wrapper">
                    <input type="text" name="search" placeholder="Start typing...">
                </div>
            </form>

            <button class="close-search-form"></button>

        </div>
    </div>

    <!-- top-header -->

    <div class="top-header">
        <div class="container">
            <div class="flex-row align-items-center justify-content-between">
                <!-- logo -->
                <div class="logo-wrap">
                    <a href="/" class="logo">
                        <img src="./assets/images/main/img_logo_pila.jpg" alt="필라하우스" width="120" />
                    </a>
                </div>
                <!-- - - - - - - - - - - - / Mobile Menu - - - - - - - - - - - - - -->

                <!--main menu-->
                <div class="menu-holder">
                    <div class="menu-wrap">
                        <div class="nav-item">
                            <!-- - - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - - - -->
                            <nav id="main-navigation" class="main-navigation">
                                <ul id="menu" class="clearfix">
<!--                                    <li><a href="/">Home</a></li>-->
<!--                                    <li><a href="#">구직공고</a></li>-->
<!--                                    <li><a href="#">구인공고</a></li>-->
<!--                                    <li><a href="#">소식</a></li>-->
                                    <li><a href="/">메인</a></li>
                                    <li><a href="../mypage.php">내정보</a></li>
                                </ul>
                            </nav>
                            <!-- - - - - - - - - - - - - end Navigation - - - - - - - - - - - - - - - -->
                        </div>
                        <!-- search button -->
<!--                        <div class="search-holder"><button type="button" class="search-button"></button></div>-->

                        <?php if(empty($_SESSION['user'])) {?>
                        <!-- account button -->
<!--                        <button type="button" class="account popup-btn-login">로그인</button>-->
                            <a href="#" class="popup-btn-login">로그인</a>
                        <!-- shop button -->
                        <a href="#" class="btn btn-big btn-style-3 popup-btn-sign">회원가입</a>
                        <?php }else{ ?>
                        <a href="<?php echo ROOT;?>logout.php" class="btn btn-big btn-style-3">로그아웃</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->