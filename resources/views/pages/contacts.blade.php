@extends('layout')
@section('content')

    <!-- breadcrumbs area start -->
   \        <div class="home-hello-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="f-title text-center">
                            <h3 class="title text-uppercase">About Us</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($contact as $key =>$cont)
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="about-page-cntent">
                            <h3>Fanpage</h3>
                            <!-- <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="HNUHmaAl"></script>
                            <div class="fb-page" data-href="https://www.facebook.com/NPShop-169287846929596/" data-tabs="timeline" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/NPShop-169287846929596/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/NPShop-169287846929596/">NPShop</a></blockquote>
                            </div> -->
                            {!!$cont->info_fanpage!!}
                            
                            
                       
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                         <div class="about-page-cntent">
                            <h3>Bản đồ :</h3>

                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.232428814673!2d106.80161941474981!3d10.869918392258157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2sUniversity%20of%20Information%20Technology%20VNU-HCM!5e0!3m2!1sfr!2s!4v1608659547055!5m2!1sfr!2s" width="500" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                             {!!$cont->info_map!!}
                        </div>
                    </div>
                    @endforeach
                </div>
           <!--      <div class="row" style="margin-top: 50px">
                    <div class="col-md-12">
                        <div class="f-title text-center">
                            <h3 class="title text-uppercase">Liên hệ với chúng tôi</h3>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- hello about end -->
        <!-- service about start -->
        <div class="our-services-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="f-title text-center">
                            <h3 class="title text-headss">Liên hệ với chúng tôi</h3>
                        </div>
                    </div>
                </div><!-- End .row -->
                <div class="row text-center">
                    <div class="our-services-inner">
                        <div class="col-sm-6">
                            <div class="single-service">
                                <p><i class="fa fa-star"></i></p>
                                <h4>Hot Line : 0961961045</h4>
                                <p></p>
                            </div><!-- End .single-service -->
                        </div><!-- End .col-sm-4 -->
                        <div class="col-sm-6">
                            <div class="single-service">
                                <p><i class="fa fa-heart"></i></p>
                                <h4>HỖ TRỢ KHÁCH HÀNG</h4>
                                <p></p>
                            </div><!-- End .single-service -->
                        </div><!-- End .col-sm-4 -->
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="our-services-inner">
                 
                        <div class="col-sm-6">
                            <div class="single-service">
                                <p><i class="fa fa-eye"></i></p>
                                <h4>HỖ TRỢ KHÁCH HÀNG</h4>
                                <p></p>
                            </div><!-- End .single-service -->
                        </div><!-- End .col-sm-4 -->
                        <div class="col-sm-6">
                            <div class="single-service">
                                <p><i class="fa fa-comments-o"></i></p>
                                <h4>HỖ TRỢ KHÁCH HÀNG</h4>
                                <p></p>
                            </div><!-- End .single-service -->
                        </div><!-- End .col-sm-4 -->
                    </div><!-- End .our-services-inner -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>
        <!-- service about end -->
        <!-- meet about start -->
        <div class="home-our-team">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="f-title text-center">
                            <h3 class="title text-uppercase">Meet the team</h3>
                        </div>
                    </div><!-- End .col-md-12 -->
                </div><!-- End .row -->
                <div class="row">
                    <div class="col-md-6 col-sm-8">
                        <div class="item-team text-center">
                            <div class="team-info">
                                <div class="team-img">
                                    <img src="{{url('/public/frontend/images/tranphu.jpg')}}" class="img-responsive" alt="team1" style="width: 50px;height: 350px;">
                                    <div class="mask">
                                        <div class="mask-inner" style="font-size: 20px">
                                            <a href="https://www.facebook.com/profile.php?id=100010368674436"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Lê Đình Vũ</h3>
                            <h4>PHP Developer</h4>
                        </div><!-- End .item-team -->
                    </div><!-- End .col-sm-3 -->
                    <div class="col-md-6 col-sm-8">
                        <div class="item-team text-center">
                            <div class="team-info">
                                <div class="team-img">
                                    <img src="{{url('/public/frontend/images/nhat.jpg')}}" class="img-responsive" alt="team2" style="width: 50px;height: 350px;">
                                    <div class="mask">
                                        <div class="mask-inner" style="font-size: 20px">
                                            <a href="https://www.facebook.com/vietnhat.huynh.7/"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Huỳnh Việt Nhật</h3>
                            <h4>PHP Developer</h4>
                        </div><!-- End .item-team -->
                    </div><!-- End .col-sm-3 -->
             
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>

  <!--  <div class="row">

                    <div class="col-md-6" >
                      <h4>Thôn tin liên hệ</h4>
                      <p>Địa chỉ 1: UIT Đại học CNTT</p>
                      <p>Địa chỉ 2: GÒ VẤP TPHCM</p>
                      <p>Địa chỉ 3: Đồng Xoài Bình Phước</p>
                      <p>SĐT : 0961961045</p>
                      <p>Fanpage : <a target="_blank" href="https://www.facebook.com/NPShop-169287846929596/">NPSHOP</a></p>
                      <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="HNUHmaAl"></script>
                    
                    <div class="fb-page" data-href="https://www.facebook.com/NPShop-169287846929596/" data-tabs="timeline" data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/NPShop-169287846929596/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/NPShop-169287846929596/">NPShop</a></blockquote>
                    </div>
                    </div>
                   
                    <div class="col-md-6">

                        <div class="contact-us-area">
                         
                         
                        
                        </div>                  
                    </div>    
    </div> -->
@endsection
