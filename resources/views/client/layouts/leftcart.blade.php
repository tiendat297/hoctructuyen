<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="{{ 'cart' }}"><img src="assets/client/themes/images/ico-cart.png" alt="cart">{{ Cart::count() }} KHÓA HỌC <span class="badge badge-warning pull-right">{{ Cart::total() }} vnđ</span></a></div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        <li ><a href="{{ url('group_courses',['id'=>1]) }}">GUiTAR CLASSIC</a>

        </li>
        <li ><a href="{{ url('group_courses',['id'=>3]) }}">GUITAR AUCOUSTIC </a>

        </li>

        <li ><a href="{{ url('group_courses',['id'=>4]) }}">GUITAR DÀNH CHO NGƯỜI MỚI </a></li>


        <li><a href="{{ url('group_courses',['id'=>5]) }}">GUITAR NÂNG CAO</a></li>
        <li><a href="{{ url('group_courses',['id'=>6]) }}">KHÓA HỌC MIỄN PHÍ</a></li>

    </ul>
    <br/>

    <ul id="sideManu" class="nav nav-tabs nav-stacked">
            <li class="subMenu "><a  style="color: #0097e6">QUẢN LÝ GIAO DỊCH</a>

            </li>
            <li><a href="{{ 'mycourses' }}">KHÓA HỌC CỦA TÔI</a></li>
            <li ><a><i class="fa fa-briefcase"></i>LỊCH SỬ HỌC TẬP </a>

            </li>
            <li class="subMenu"><a>THÔNG BÁO</a>
            </li>
            <li class="subMenu "><a style="color: #0097e6">QUẢN LÝ TÀI KHOẢN</a>

            </li>
            <li><a href="{{ 'profile' }}">THÔNG TIN TÀI KHOẢN</a></li>
            <li><a href="{{ 'logout' }}">ĐĂNG XUẤT</a></li>

        </ul>
        <div class="thumbnail">
            <img src="assets/client/themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
            <div class="caption">
              <h5>Payment Methods</h5>
            </div>
          </div>

</div>



