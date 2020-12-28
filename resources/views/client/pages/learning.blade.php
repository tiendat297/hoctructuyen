@include('client.layouts.botton')
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
                    <div id="gallery video" class="span7 data ">

                        <div id="video_watch">
                        <div  class="moreOptopm carousel slide differentview">

                            <iframe width="100%" height="400px" src="https://www.youtube.com/embed/@foreach($data2 as $thuml){{ $thuml -> video_thuml }}@endforeach?controls=0&amp;start=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        </div>


                        <div class="tab-pane fade active in" id="div_cmmt">
                            <h4>THẢO LUẬN KHÓA HỌC </h4>


                            <div class="controls">
                            <textarea class="input-xlarge span7" name="binhluan" id="binhluan" rows="7" style="height:65px"></textarea>
                          </div>
                          <button  style="padding-right:0" class="badge badge-success"> <h4 >Đăng thảo luận </h4> </button>

                        </div>




                    </div>

                    <div class="span5">
                        <ul id="productDetail" class="nav nav-tabs">

                            <li><a href="#tailieu" style="color: #0097e6" data-toggle="tab">NỘI DUNG BÀI GIẢNG</a></li>

                            <li><a  href="#ds" style="color: #0097e6" data-toggle="tab">DANH SÁCH BÀI HỌC</a></li>

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="ds">


                                <table class="table " border="0">
                                    <tbody>
                                        <tr class="techSpecRow">

                                        </tr>
                                        <style type="text/css">
                                            th,b {
                                                  text-align: center;
                                                  color:#0097e6;
                                                }
                                            </style>

                                            @foreach ($data as $chapter)
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
                                            <td class="techSpecTD2"><a ><i class="icon-print"></i>  {{ $baihoc -> name }}  </a> </td>
                                            <td><a onclick="event.preventDefault();hoc({{ $baihoc -> id }} )"><span class="btn btn-small btn-success">Học</span></a></td>

                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>



                            </div>
                            <div class="tab-pane fade active in" id="tailieu">

                                <p><b>Hướng Dẫn Cơ Bản Về Ngón Tay, Phím Đàn Và Dây Đàn Guitar</b></p>


                                <p>Tôi sẽ giới thiệu 3 hệ thống đánh số cho guitar, bao gồm cả hệ thống sử dụng cho ngón tay của bạn, cho các phím đàn và cho dây đàn guitar. Bài học này trông có vẻ dễ, nhưng đây là một bài học quan trọng. Biết và hiểu kĩ các hệ thống này sẽ giúp bạn hoàn thành tất cả các hướng dẫn học đàn guitar trong tương lai nhanh hơn rất nhiều.



                                Các Ngón Tay</p>
                                <img src="assets\admin\images\Huong-dan-hoc-dan-guitar-co-ban-6.jpg" alt=""/>


                                <p>Ngón trỏ của bạn được biểu thị là ngón đầu tiên, ngón giữa là ngón thứ hai, ngón đeo nhẫn là ngón thứ ba, và ngón út là ngón thứ tư của bạn. Điều này nghe có vẻ đơn giản, nhưng khi bạn bắt đầu đọc các sơ đồ hợp âm, âm giai, tab và bản nhạc, bạn sẽ phải biết ngay lập tức cần sử dụng ngón tay nào.

                                 hướng dẫn học đàn guitar cơ bản 6

                                Phím Đàn</p>


                                <p>Các phím đàn (fret) trên guitar là những dải kim loại được đặt dọc theo fretboard. Phím đầu tiên là dải kim loại gần nhất với đầu (headstock) của cần đàn, và bắt đầu đếm số thứ tự từ đó.

                                 hướng dẫn học đàn guitar cơ bản 7

                                Dây Đàn</p>

                                <img src="assets\admin\images\Huong-dan-hoc-dan-guitar-co-ban-8.jpg" alt=""/>
                                <p>Hầu hết mọi người nghĩ rằng dây đàn gần họ nhất, dây dày nhất, là dây đầu tiên của cây đàn guitar, nhưng ngược lại mới chính xác. Dây gần sàn nhà nhất, dây mỏng nhất, là dây đàn đầu tiên. Dây tiếp theo, dây mỏng thứ nhì, là dây thứ hai, và tiếp tục như thế. Chỉ cần lưu ý rằng dây mỏng nhất của cây đàn là dây đầu tiên, và dây dày nhất là dây thứ sáu.

                                 hướng dẫn học đàn guitar cơ bản 8

                                Nếu một người thầy dạy guitar bảo bạn đặt ngón tay của bạn vào phím đầu tiên, bạn sẽ dò đến phím đầu tiên và đặt ngón tay của bạn ngay sau phím đó. Nếu là phím thứ năm trên dây đầu tiên bằng ngón tay đầu tiên, bạn sẽ đặt ngón tay trỏ của bạn đằng sau phím thứ năm trên dây mỏng nhất.</p>


                            </div>


                        </div>
                    </div>


                    <div class="span7">


                    </div>
                    <div id="binhluan" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h3>Bình luận</h3>
                        </div>
                        <div class="modal-body" id="div_comment">
                          <form id="fr_binhluan" class="form-horizontal loginFrm"    method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}
                              <div class="control-group">
                                <input type="text"  placeholder="" parsley-trigger="change" readonly=""  name="learn_id">
                              </div>
                            <div class="control-group">
                              <input type="text"  placeholder="Nội dung bình luận" parsley-trigger="change" required="" name="comment">
                            </div>


                            <div class="control-group">
                          <button type="button" class="btn btn-success " onclick="event.preventDefault();insert_comment()">Bình luận</button>
                          <button class="btn" data-dismiss="modal"  aria-hidden="true">Close</button>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('client.layouts.footer')
<script>
    function hoc(id){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
        url:'hoc/' + id,

        contentType: false,
        processData: false,
        method: 'get',
    }).done(function(data){
        console.log(data);
        $('.data').html(data);

    }).fail(function(data){

    })
    }
</script>
<script>
     function comment(id){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

        $("#fr_binhluan input[name=learn_id]").val(id);
        $('#binhluan').modal('show');



    }
</script>
<script>
    function insert_comment(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $.ajax({
            url: 'insert_comment',
            data: new FormData($("#div_comment form")[0]),
            contentType: false,
            processData: false,
            method: 'post',

        }).done(function(data){
            alert("thành công");
        })
     }

</script>


