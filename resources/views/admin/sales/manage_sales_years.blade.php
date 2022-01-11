@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thống kê doanh thu các năm
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
                        <form role="form" action="{{URL::to('/manage-sales-years-post')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thống kê doanh thu :</label>
                                <input type="text" name="year"  value="2 (3,4,..) năm gần đây....">
                            </div>

                            <button type="submit"  class="btn btn-info">Xem doanh thu</button>
                        </form>

                        <br/>
                        @if(isset($data))

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

                            <div id="curve_chart" style="width: 900px; height: 500px"></div>

                        @endif
                    </div>

                </div>
            </section>

        </div>
@endsection
