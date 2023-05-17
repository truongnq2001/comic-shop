@extends('layouts.master')
@section('title', 'Liên hệ - Comic Shop')
@section('content')

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                        <p>Hãy để lại tin nhắn chúng tôi sẽ liên hệ với bạn.</p>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên" required data-error="Vui lòng nhập tên của bạn">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Email" id="email" class="form-control" name="name" required data-error="Vui lòng nhập email của bạn">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="name" placeholder="Tiêu đề" required data-error="Vui lòng nhập tiêu đề">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Nội dung" rows="4" data-error="Vui lòng viết nội dung" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="button">Gửi</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left" style="background: url(../images/background-conan.jpg) no-repeat center !important; background-size: cover !important;">
                        <h2>THÔNG TIN LIÊN HỆ</h2>
                        <p>Comic Shop là website bán truyện tranh uy tín nhất Việt Nam hiện nay. Chúng tôi sẽ đem đến cho bạn nhiều truyện tranh với các thể loại đa dạng. Nếu bạn muốn hợp tác vui lòng liên hệ với chúng tôi bằng các thông tin dưới đây.</p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Địa chỉ: 123 đường ABC phường A
                                    Quận B, TP. Hà Nội</p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Điện thoại: +84-123 456 789</p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: comicshop@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

    


    <!-- <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script> -->
@endsection