@extends('layout')
@section('content')
    <script src="{{asset('public/frontend/filter/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('public/frontend/filter/js/jquery-ui.js')}}"></script>
    <script src="{{asset('public/frontend/filter/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('public/frontend/filter/css/bootstrap.min.css')}}">
    <link href = "{{asset('public/frontend/filter/css/jquery-ui.css')}}" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('public/frontend/filter/css/style.css')}}" rel="stylesheet">

       <div class="container">
        <div class="row">
            <br />
         <h2 align="center">Thương Hiệu Sản Phẩm</h2>
         <br />
        
            <div class="col-md-3">                              
                <div class="list-group">
                    <h3>Price</h3>
                    <input type="hidden" id="hidden_minimum_price"/>
                    <input type="hidden" id="hidden_maximum_price"/>
                    <p id="price_show">{{number_format($price_min,0,',','.')}}<sup> đ</sup> - {{number_format($price_max,0,',','.')}}<sup> đ</sup></p>
                    <div id="price_range"></div>
                </div>  
                 <div class="list-group">
                    <h3>sản phẩm</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
        
                    <?php

                              
                    foreach($category as $key => $cate_)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector category" value="{{$cate_->category_id}}"  > {{$cate_->category_name}}</label>
                    </div>
                    <?php
                    }

                    ?> 
                    </div>
                </div>          
                <div class="list-group">
                    <h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
        
                    <?php

                              
                    foreach($brand as $key => $bra)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="{{$bra->brand_id}}"> {{$bra->brand_name}}</label>
                    </div>
                    <?php
                    }

                    ?> 
                    </div>
                </div>
                <div class="list-group">
                    <h3>Màu sắc</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
        
               
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector color" value="1">Gold </label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector color" value="2">Black </label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector color" value="3">Silver </label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector color" value="0">Khác </label>
                    </div>
                
                    </div>
                </div>
               
               

            </div>

            <div class="col-md-9">
                <br />
                <div class="row filter_data">

                </div>
                  <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$all_product->links()!!}
                  </ul>
            </div>
        </div>

    </div>

    <style>
#loading
{
    text-align:center; 
    background: url('public/frontend/filter/loader.gif') no-repeat center; 
    height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();


        var brand = get_filter('brand');
        var color = get_filter('color');
        var category = get_filter('category');
          // alert(brand);

       
        
        $.ajax({
            url:'{{url('/fetch-data')}}',
            method:"POST",
            headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },   
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand,category:category,color:color},
            success:function(data){
                // alert(data);

                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
       
        range:true,
        min:{{$price_min}},
        max:{{$price_max}},
        values:[{{$price_min}}, {{$price_max}}],
        step:10000,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0].toLocaleString('vi', {style : 'currency', currency : 'VND'}) + ' - ' + ui.values[1].toLocaleString('vi', {style : 'currency', currency : 'VND'}));
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
  
@endsection