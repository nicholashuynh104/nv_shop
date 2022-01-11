@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thống kê doanh thu tháng
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">

                    <div class="position-center">
                        <form >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thống kê theo tháng của năm :</label>
                                <input type="text" name="year" class="year"  placeholder="Tên danh mục">
                            </div>

                            <button type="submit"  class="btn btn-info view-sales">Xem doanh thu</button>
                        </form>

                        <div id="curve_chart" style="width: 900px; height: 500px"></div>

                       <!--  @if(isset($data))-->
                       <div id="chart"></div>
                            <script type="text/javascript">

                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);
                                var record={!! ($data) !!};

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable(
                                        record
                                    );
                                    var options = {
                                        title: 'Doanh thu',
                                        curveType: 'function',
                                        legend: { position: 'bottom' }
                                    };
                                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                    chart.draw(data, options);
                                }
                            </script>

                            

                        <!-- @endif -->
                    </div>

                </div>
            </section>

        </div>
<script type="text/javascript">
    $(document).on('click','.view-sales',function(){

            var year = $('.year').val();
            alert(year);
           

            

            $.ajax({
                url:"{{url('/select-sales')}}", // gửi tới url này
                method:"POST",                     // phương thức post 
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                data:{year:year},
                
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    console.log(data);
                    $('.chart').html(data);
                   
                    // $('#chart').html('<span style="color:red">Thêm video thành công</span>');

                    


                }
            });
        });

</script>
@endsection
