@extends('layout')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <nav aria-label="breadcrumb">
                              <ol class="breadcrumb" style="font-size: 18px">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item">{{$meta_title}}</li>
                              </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
		
	<div class="product-details-area">
		
		
		 
			<div class="container">
				@foreach($all_video as $key => $video)
				<div class="row">
                    <div class="col-md-12">
                        <div class="f-title text-center">
                            <h3 class="title text-uppercase" style="padding-top: 10px;">Video về Công ty</h3>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom" style="padding: 10px 0;">
								<a href="#">
									<img id="zoom1" src="{{asset('public/uploads/videos/'.$video->video_image)}}" alt="{{$video->video_title}}" data-zoom-image="img/product-details/ex-big-1-1.jpg" >
								</a>
							</div>
							
						</div>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							<div class="single-product">
								<div class="product-content">
									<h2 class="product-name"><a href="#">{{$video->video_title}}</a></h2>
									
									<div class="product-desc">
										<p>{{$video->video_desc}}</p>
									</div>
									   <button type="button" class="btn btn-primary watch-video" data-toggle="modal" data-target="#modalvideo" id="{{$video->video_id}}">
                                              Xem video
                                            </button>
								
								
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach	
			</div>
			
		</div>
         
	<ul class="pagination pagination-sm m-t-none m-b-none">
        {!!$all_video->links()!!}
   	</ul>                      
<div class="modal fade" id="modalvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   	<div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="video_title"></h4>
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       	<span aria-hidden="true">&times;</span>
                    </button>                               
            </div>
            <div class="modal-body">

                <div id="video_desc" ></div>
                <div id="video_link" ></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
           	</div>
        </div>
    </div>
</div>                      		
@endsection