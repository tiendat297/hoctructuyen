@include('client.layouts.botton')

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="usow0W5c"></script>
<div id="mainBody">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li><a href="products.html">Products</a> <span class="divider">/</span></li>
                    <li class="active">product Details</li>
                </ul>
                <div class="row">
                    @foreach ($data as $courses_detail)
                    <div id="gallery" class="span7">

                        <iframe width="690" height="460" src="https://www.youtube.com/embed/{{ $courses_detail -> video_thuml }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div id="differentview" class="moreOptopm carousel slide">

                        </div>

                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <span class="btn"><i class="icon-envelope"></i></span>
                                <span class="btn"><i class="icon-print"></i></span>
                                <span class="btn"><i class="icon-zoom-in"></i></span>
                                <span class="btn"><i class="icon-star"></i></span>
                                <span class="btn"><i class=" icon-thumbs-up"></i></span>
                                <span class="btn"><i class="icon-thumbs-down"></i></span>
                            </div>
                        </div>
                    </div>



                    <div class="span5">
                        	<span class="badge badge-info"><h3>{{ $courses_detail -> name }}</h3>	</span>
                        <style type="text/css">
                            .button,.span {
                                  text-align: center;

                                }
                            </style>

                        <hr class="soft" />
                        <span class="badge badge-warning" ><h4>{{ number_format($courses_detail->price_sale, 0) }} vnđ  <strike>{{ number_format($courses_detail->price_root, 0) }} đ </strike> </h4> </span>

                        <hr class="soft" />



                        <h4>100+ Bài viết chuyên môn</h4>

                        <hr class="soft clr" />
                        <p>

                            <i class="icon-shopping-cart"></i>Thời lượng: <b>04 giờ 01 phút</b> <br>
                            <i class="icon-book"></i> Giáo trình: <b> {{ number_format($data2, 0) }} bài giảng </b><br>
                            <i class=" icon-thumbs-up"></i> Sở hữu khóa học <b>Trọn Đời</b><br>
                            <i class="icon-shopping-cart"></i> Cấp chứng nhận hoàn thành

                        </p>
                        <a @if (Auth::check()) class="btn btn-primary btn-large"  href="{{ url('addcart',['id'=>$courses_detail ->id]) }}" @else
                            class="btn btn-primary" href="#login" role="button" data-toggle="modal"@endif >
                             MUA KHÓA HỌC<i class=" icon-shopping-cart"></i> </a>
                        <br class="clr" />
                        <a href="#" name="detail"></a>
                        <hr class="soft" />
                    </div>

                    <div class="span7">

                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                <span class="badge badge-success"><h4 ><i class="icon-pencil"></i> GIỚI THIỆU KHÓA HỌC </h4> </span>


                                <h4><i class="icon-user"></i> ĐỐI TƯỢNG HỌC</h4>
                                <ul>
                                    <li>Học sinh, sinh viên thích âm nhạc và có năng khiếu về nhạc</li>
                                    <li>Nhân viên văn phòng sau những giờ làm việc mệt mỏi</li>
                                    <li>Học để luyện thi vào nhạc viện</li>
                                </ul>

                                <h4><i class="icon-book"></i> NỘI DUNG CHÍNH</h4>

                                <p>
                                    {{ $courses_detail -> description }}
                                </p>

                                <h4><i class="icon-flag"></i> LỢI ÍCH SAU KHÓA HỌC</h4>
                                <p>
                                    {{ $courses_detail -> after_courses }}
                                </p>
                                <p>
                                    Dù việc học chơi một loại nhạc cụ có thể khá thử thách đối với bạn, cũng đừng vì vậy mà bỏ cuộc sớm
                                    vì nó đem lại cho bạn nhiều lợi ích tuyệt vời. Một trong những tố chất quan trọng của một nhạc sĩ là tính kỉ luật.
                                    Bạn phải luyện tập hàng ngày ngay cả khi bạn không muốn, có vậy thì bạn mới thành thục trong việc chơi loại nhạc cụ ấy.
                                    Chính việc phải luyện tập hằng ngày rèn cho bạn tính kỉ luật đấy. Ngoài ra bạn còn bắt buộc phải tập trung 100% để tập đàn
                                    guitar thì mới hiệu quả vậy nên sẽ tạo ra thói quen tốt cho bạn khi làm bất cứ việc gì khác.
                                </p>
                                @endforeach
                                <span class="badge badge-success"> <h4 ><i class="icon-user"></i>THÔNG TIN GIẢNG VIÊN </h4> </span>

                                    @foreach ($data4 as $giangvien )
                                <div>
                                    <div>
                                    <img class="anh" style="width:200px; height:200px;" src="assets\admin\images\{{ $giangvien -> images }}" alt=""/>
                                    <style type="img/css">
                                       .anh {
    border-radius:50%;
    -moz-border-radius:50%;
    -webkit-border-radius:50%;
    }

                                    </style>
                                    <h6>Giảng viên: <b> {{ $giangvien -> hoten }} </b></h6>
                                    </div>
                                    <div>
                                    <p> {{ $giangvien -> description }}
                                    </p>
                                    </div>
                                    </div>
                                    @endforeach
                            </div>
                            <h4><i class="icon-book"></i>BÌNH LUẬN TỪ HỌC VIÊN</h4>
                            <!-- Load Facebook SDK for JavaScript -->


<!-- Your embedded comments code -->
<div class="fb-comments" data-href="https://www.facebook.com/haketuguitar/posts/3058117434296720" data-width="650" data-numposts="10"></div>



                            <div class="tab-pane fade" id="profile">
                                <div id="myTab" class="pull-right">
                                    <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i
                                                class="icon-list"></i></span></a>
                                    <a href="#blockView" data-toggle="tab"><span
                                            class="btn btn-large btn-primary"><i
                                                class="icon-th-large"></i></span></a>
                                </div>
                                <br class="clr" />
                                <hr class="soft" />
                                <div class="tab-content">

                                    <div class="tab-pane active" id="blockView">
                                        <ul class="thumbnails">
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.html"><img
                                                            src="themes/images/products/10.jpg" alt="" /></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p>
                                                            Lorem Ipsum is simply dummy text.
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn"
                                                                href="product_details.html"> <i
                                                                    class="icon-zoom-in"></i></a> <a class="btn"
                                                                href="#">Add to <i
                                                                    class="icon-shopping-cart"></i></a> <a
                                                                class="btn btn-primary" href="#">&euro;222.00</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </li>




                                        </ul>
                                        <hr class="soft" />
                                    </div>
                                </div>
                                <br class="clr">
                            </div>
                        </div>
                    </div>
                    <div class="span5">
                        <ul id="productDetail" class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Thông tin khóa học</a></li>
                            <li><a href="#profile" data-toggle="tab">Khóa học liên quan</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                <h4>Chi tiết khóa học</h4>
                                <table class="table " border="0">
                                    <tbody>
                             @foreach ($data3 as $chapter)
                                        <tr class="techSpecRow">
                                            <th colspan="2"><h4>CHƯƠNG {{ $chapter -> sort_chapter }}: {{ $chapter -> name_chapter }}</h4></th>
                                        </tr>
                                        <style type="text/css">
                                            th {
                                                  text-align: center;
                                                  color:#0097e6;
                                                }
                                            </style>


                                    @foreach ($chapter -> baihoc as $baihoc )

                                        <tr class="techSpecRow">
                                            <td class="techSpecTD2">  {{ $baihoc -> name }}</td>
                                        </tr>
                                    @endforeach
                            @endforeach
                                    </tbody>
                                </table>


                            </div>
                            <div class="tab-pane fade" id="lienquan">
                                <div id="myTab" class="pull-right">
                                    <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i
                                                class="icon-list"></i></span></a>
                                    <a href="#blockView" data-toggle="tab"><span
                                            class="btn btn-large btn-primary"><i
                                                class="icon-th-large"></i></span></a>
                                </div>
                                <br class="clr" />
                                <hr class="soft" />
                                <div class="tab-content">

                                    <div class="tab-pane active" id="blockView">
                                        <ul class="thumbnails">
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.html"><img
                                                            src="themes/images/products/10.jpg" alt="" /></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p>
                                                            Lorem Ipsum is simply dummy text.
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn"
                                                                href="product_details.html"> <i
                                                                    class="icon-zoom-in"></i></a> <a class="btn"
                                                                href="#">Add to <i
                                                                    class="icon-shopping-cart"></i></a> <a
                                                                class="btn btn-primary" href="#">&euro;222.00</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </li>




                                        </ul>
                                        <hr class="soft" />
                                    </div>
                                </div>
                                <br class="clr">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('client.layouts.footer')
