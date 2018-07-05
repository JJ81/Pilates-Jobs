<aside id="sidebar" class="col-lg-4 col-md-12">


    <div class="widget">
        <h6 class="widget-title">공지사항</h6>
        <ul>
            <?php for($i=0,$size=count($notice);$i<$size;$i++){ ?>
            <li>
                <a href="#"><?php echo $notice[$i]['title']; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>
    
    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <form class="search-form">-->
<!--            <input type="text" placeholder="검색어 입력" />-->
<!--            <button type="submit"><i class="licon-magnifier"></i></button>-->
<!--        </form>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">인기 카테고리</h6>-->
<!--        <ul class="custom-list style-2">-->
<!--            <li><a href="#">요가</a></li>-->
<!--            <li><a href="#">요가용품</a></li>-->
<!--            <li><a href="#">필라테스</a></li>-->
<!--            <li><a href="#">다이어트</a></li>-->
<!--        </ul>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!---->
<!--        <h6 class="widget-title">최신 글</h6>-->
<!---->
<!--        <div class="entry-box entry-small style-2">-->
<!---->
<!--            <!-- - - - - - - - - - - - - - Entry - - - - - - - - - - - - - - - - -->
<!--            <div class="entry">-->
<!---->
<!--                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
<!--                <div class="thumbnail-attachment">-->
<!--                    <a href="#"><img src="./assets/images/100x78_img1.jpg" alt=""></a>-->
<!--                </div>-->
<!---->
<!--                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
<!--                <div class="entry-body">-->
<!---->
<!--                    <h6 class="entry-title"><a href="#">Mauris Accumsan Nulla Vel Diam</a></h6>-->
<!--                    <div class="entry-meta">-->
<!---->
<!--                        <time class="entry-date" datetime="2018-11-18">November 18, 2018</time>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--            <!-- - - - - - - - - - - - - - Entry - - - - - - - - - - - - - - - - -->
<!--            <div class="entry">-->
<!---->
<!--                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
<!--                <div class="thumbnail-attachment">-->
<!--                    <a href="#"><img src="./assets/images/100x78_img2.jpg" alt=""></a>-->
<!--                </div>-->
<!---->
<!--                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
<!--                <div class="entry-body">-->
<!---->
<!--                    <h6 class="entry-title"><a href="#">Ut Pharetra Augue Nec Augue</a></h6>-->
<!--                    <div class="entry-meta">-->
<!---->
<!--                        <time class="entry-date" datetime="2018-12-21">Dec 21, 2018, 07:00 AM</time>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--            <!-- - - - - - - - - - - - - - Entry - - - - - - - - - - - - - - - - -->
<!--            <div class="entry">-->
<!---->
<!--                <!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
<!--                <div class="thumbnail-attachment">-->
<!--                    <a href="#"><img src="./assets/images/100x78_img3.jpg" alt=""></a>-->
<!--                </div>-->
<!---->
<!--                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
<!--                <div class="entry-body">-->
<!---->
<!--                    <h6 class="entry-title"><a href="#">Donec Eget Tellus Non Erat Lacinia Fermentum</a></h6>-->
<!--                    <div class="entry-meta">-->
<!---->
<!--                        <time class="entry-date" datetime="2018-11-18">November 18, 2018</time>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!---->
<!--        <h6 class="widget-title">페이스북</h6>-->
<!---->
<!--        <div id="fb-root"></div>-->
<!--        <script>(function(d, s, id) {-->
<!--                var js, fjs = d.getElementsByTagName(s)[0];-->
<!--                if (d.getElementById(id)) return;-->
<!--                js = d.createElement(s); js.id = id;-->
<!--                js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=앱아이디';-->
<!--                fjs.parentNode.insertBefore(js, fjs);-->
<!--            }(document, 'script', 'facebook-jssdk'));</script>-->
<!---->
<!--        <div class="fb-page" data-href="https://www.facebook.com/jcorporationtech/" data-width="300" data-height="205" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>-->
<!---->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">태그</h6>-->
<!--        <div class="tagcloud">-->
<!--            <a href="#">요가</a>-->
<!--            <a href="#">요가복</a>-->
<!--            <a href="#">미용</a>-->
<!--            <a href="#">다이어트</a>-->
<!--            <a href="#">필라테스</a>-->
<!--        </div>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">추천 영상</h6>-->
<!--        <div class="responsive-iframe content-element3">-->
<!--            <iframe src="https://player.vimeo.com/video/169730736?title=0&amp;byline=0&amp;portrait=0&amp;color=dedede"></iframe>-->
<!--        </div>-->
<!--        <a href="#" class="btn btn-small btn-style-4">View All Videos</a>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">최근 트윗</h6>-->
<!--        <div id="twitter" class="twitter"></div>-->
<!--        <a href="#" class="btn btn-small tweet-btn"><i class="icon-twitter"></i>Follow Us</a>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">달력</h6>-->
<!--        <div class="widget-calendar">-->
<!--            <div class="owl-carousel" data-max-items="1">-->
<!--                <div class="item">-->
<!--                    <div class="calendar-wrap">-->
<!--                        <table>-->
<!--                            <tr>-->
<!--                                <!--titles for td-->
<!--                                <th colspan="7">December 2018</th>-->
<!--                            </tr>-->
<!--                            <tr class="days">-->
<!--                                <td>M</td>-->
<!--                                <td>T</td>-->
<!--                                <td>W</td>-->
<!--                                <td>T</td>-->
<!--                                <td>F</td>-->
<!--                                <td>S</td>-->
<!--                                <td>S</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>1</td>-->
<!--                                <td>2</td>-->
<!--                                <td>3</td>-->
<!--                                <td>4</td>-->
<!--                                <td>5</td>-->
<!--                                <td class="link">-->
<!--                                    <a href="#">6</a>-->
<!--                                </td>-->
<!--                                <td>7</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>8</td>-->
<!--                                <td class="link">-->
<!--                                    <a href="#">9</a>-->
<!--                                </td>-->
<!--                                <td>10</td>-->
<!--                                <td>11</td>-->
<!--                                <td>12</td>-->
<!--                                <td>13</td>-->
<!--                                <td>14</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td class="link">-->
<!--                                    <a href="#">15</a>-->
<!--                                </td>-->
<!--                                <td>16</td>-->
<!--                                <td>17</td>-->
<!--                                <td>18</td>-->
<!--                                <td class="link current">-->
<!--                                    <a href="#">20</a>-->
<!--                                </td>-->
<!--                                <td>20</td>-->
<!--                                <td>21</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>22</td>-->
<!--                                <td>23</td>-->
<!--                                <td class="link">-->
<!--                                    <a href="#">24</a>-->
<!--                                </td>-->
<!--                                <td>25</td>-->
<!--                                <td>26</td>-->
<!--                                <td>27</td>-->
<!--                                <td>28</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>29</td>-->
<!--                                <td>30</td>-->
<!--                                <td class="next-month">1</td>-->
<!--                                <td class="next-month">2</td>-->
<!--                                <td class="next-month">3</td>-->
<!--                                <td class="next-month">4</td>-->
<!--                                <td class="next-month">5</td>-->
<!--                            </tr>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="item">-->
<!--                    <div class="calendar-wrap">-->
<!--                        <table>-->
<!--                            <tr>-->
<!--                                <!--titles for td-->
<!--                                <th colspan="7">November 2018</th>-->
<!--                            </tr>-->
<!--                            <tr class="days">-->
<!--                                <td>M</td>-->
<!--                                <td>T</td>-->
<!--                                <td>W</td>-->
<!--                                <td>T</td>-->
<!--                                <td>F</td>-->
<!--                                <td>S</td>-->
<!--                                <td>S</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>1</td>-->
<!--                                <td>2</td>-->
<!--                                <td>3</td>-->
<!--                                <td>4</td>-->
<!--                                <td>5</td>-->
<!--                                <td>6</td>-->
<!--                                <td>7</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>8</td>-->
<!--                                <td class="link">-->
<!--                                    <a href="#">9</a>-->
<!--                                </td>-->
<!--                                <td>10</td>-->
<!--                                <td class="link current">-->
<!--                                    <a href="#">11</a>-->
<!--                                </td>-->
<!--                                <td>12</td>-->
<!--                                <td>13</td>-->
<!--                                <td>14</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td class="link">-->
<!--                                    <a href="#">15</a>-->
<!--                                </td>-->
<!--                                <td>16</td>-->
<!--                                <td>17</td>-->
<!--                                <td>18</td>-->
<!--                                <td>19</td>-->
<!--                                <td class="link">-->
<!--                                    <a href="#">20</a>-->
<!--                                </td>-->
<!--                                <td>21</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>22</td>-->
<!--                                <td>23</td>-->
<!--                                <td class="link">-->
<!--                                    <a href="#">24</a>-->
<!--                                </td>-->
<!--                                <td>25</td>-->
<!--                                <td>26</td>-->
<!--                                <td>27</td>-->
<!--                                <td>28</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>29</td>-->
<!--                                <td>30</td>-->
<!--                                <td>31</td>-->
<!--                                <td class="next-month">1</td>-->
<!--                                <td class="next-month">2</td>-->
<!--                                <td class="next-month">3</td>-->
<!--                                <td class="next-month">4</td>-->
<!--                            </tr>-->
<!--                        </table>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <a href="#" class="calendar-month">« Nov</a>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">당신만을 위한 알림</h6>-->
<!--        <div class="event-box">-->
<!--            <div class="entry">-->
<!--                <div class="event-date">nov<span>18</span></div>-->
<!--                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
<!--                <div class="entry-body">-->
<!--                    <h6 class="entry-title"><a href="#">Saluting the Sun - A Hands - On Assist Workshop</a></h6>-->
<!--                    <div class="our-info vr-type">-->
<!--                        <div class="info-item">-->
<!--                            <i class="licon-clock3"></i>-->
<!--                            <div class="wrapper">-->
<!--                                <span>12:00 AM - 5:00 PM</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="info-item">-->
<!--                            <i class="licon-map-marker"></i>-->
<!--                            <div class="wrapper">-->
<!--                                <span>8901 Marmora Road, Glasgow, D04 89GR</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="entry">-->
<!---->
<!--                <div class="event-date">nov<span>22</span></div>-->
<!---->
<!--                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
<!--                <div class="entry-body">-->
<!---->
<!--                    <h6 class="entry-title"><a href="#">The Art of Awakening</a></h6>-->
<!--                    <div class="our-info vr-type">-->
<!---->
<!--                        <div class="info-item">-->
<!--                            <i class="licon-clock3"></i>-->
<!--                            <div class="wrapper">-->
<!--                                <span>12:00 AM - 5:00 PM</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="info-item">-->
<!--                            <i class="licon-map-marker"></i>-->
<!--                            <div class="wrapper">-->
<!--                                <span>8901 Marmora Road, Glasgow, D04 89GR</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="entry">-->
<!---->
<!--                <div class="event-date">nov<span>29</span></div>-->
<!---->
<!--                <!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
<!--                <div class="entry-body">-->
<!---->
<!--                    <h6 class="entry-title"><a href="#">200Hr Vinyasa Ashtanga Yoga Teacher Training</a></h6>-->
<!--                    <div class="our-info vr-type">-->
<!---->
<!--                        <div class="info-item">-->
<!--                            <i class="licon-clock3"></i>-->
<!--                            <div class="wrapper">-->
<!--                                <span>12:00 AM - 5:00 PM</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="info-item">-->
<!--                            <i class="licon-map-marker"></i>-->
<!--                            <div class="wrapper">-->
<!--                                <span>8901 Marmora Road, Glasgow, D04 89GR</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--        <a href="#" class="btn btn-small btn-style-4">More Events</a>-->
<!---->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!---->
<!--        <h6 class="widget-title">최근 코멘트</h6>-->
<!--        <ul class="info-links comment-type">-->
<!--            <li><a href="#" class="author">admin</a> on <a href="#">Post With SoundCloud</a></li>-->
<!--            <li><a href="#" class="author">이왕진</a> on <a href="#">Featured Post With Image</a></li>-->
<!--            <li><a href="#" class="author">홍길동 </a> on <a href="#">Post With Vimeo Video</a></li>-->
<!--            <li><a href="#" class="author">admin</a> on <a href="#">Post With SoundCloud</a></li>-->
<!--            <li><a href="#" class="author">이재준</a> on <a href="#">Featured Post With Image</a></li>-->
<!--        </ul>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">최근 활동</h6>-->
<!--        <ul class="custom-list style-2">-->
<!--            <li><a href="#">November 2018</a></li>-->
<!--            <li><a href="#">October 2018</a></li>-->
<!--            <li><a href="#">September 2018</a></li>-->
<!--            <li><a href="#">August 2018</a></li>-->
<!--            <li><a href="#">July 2018</a></li>-->
<!--        </ul>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!---->
<!--        <h6 class="widget-title">협력사</h6>-->
<!--        <div class="mad-custom-select">-->
<!--            <select data-default-text="Please select">-->
<!--                <option value="Option 1">요가용품1</option>-->
<!--                <option value="Option 2">요가용품2</option>-->
<!--                <option value="Option 3">요가용품3</option>-->
<!--            </select>-->
<!--        </div>-->
<!---->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">From Instagram</h6>-->
<!--        <div id="instafeed" class="instagram-feed insta-small" data-instagram="6"></div>-->
<!--        <a href="#" class="btn btn-small"><i class="icon-instagram-5"></i>Follow Us on 인스타그램</a>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!---->
<!--        <h6 class="widget-title">뉴스레터 Sign Up</h6>-->
<!--        <p>지금 구독하세요. 최근 소식을 메일로 보내드립니다.</p>-->
<!---->
<!--        <form id="newsletter2" class="newsletter">-->
<!--            <input type="email" name="newsletter-email" placeholder="Enter your email address">-->
<!--            <button type="submit" data-type="submit" class="btn btn-big btn-style-3">Sign Up</button>-->
<!--        </form>-->
<!---->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">메타 정보</h6>-->
<!--        <ul class="custom-list style-2">-->
<!--            <li><a href="#">Log in</a></li>-->
<!--            <li><a href="#">Entries RSS</a></li>-->
<!--            <li><a href="#">Comments RSS</a></li>-->
<!--            <li><a href="#">WordPress.org</a></li>-->
<!--        </ul>-->
<!--    </div>-->

    <!-- Widget -->
<!--    <div class="widget">-->
<!--        <h6 class="widget-title">인기 단어</h6>-->
<!--        <p>#요가 #다이이트 #체중감량 #구직 #운동 </p>-->
<!---->
<!--    </div>-->

</aside>