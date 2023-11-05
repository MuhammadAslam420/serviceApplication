<div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12 d-flex widget-path widget-service">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user">
                                <div class="home-userhead">
                                    <div class="home-usercount">
                                        <span><img src="{{ asset('assets/imgs/user.svg') }}" alt="img"></span>
                                        <h6>User</h6>
                                    </div>
                                    <div class="home-useraction">
                                        <a class="delete-table bg-white" href="javascript:void(0);"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu" data-popper-placement="bottom-end">
                                            <li>
                                                <a href="user-list.html" class="dropdown-item"> View</a>
                                            </li>
                                            <li>
                                                <a href="edit-user.html" class="dropdown-item"> Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="home-usercontent">
                                    <div class="home-usercontents">
                                        <div class="home-usercontentcount">
                                            <img src="{{ asset('assets/imgs/arrow-up.svg') }}" alt="img" class="me-2">
                                            <span class="counters" data-count="{{ $users }}">{{ $users }}</span>
                                        </div>
                                        <h5> All Users</h5>
                                    </div>
                                    <div class="homegraph">
                                        <img src="{{ asset('assets/imgs/graph1.png') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex widget-path widget-service">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user home-provider">
                                <div class="home-userhead">
                                    <div class="home-usercount">
                                        <span><img src="{{ asset('assets/imgs/user-circle.svg') }}" alt="img"></span>
                                        <h6>Providers</h6>
                                    </div>
                                    <div class="home-useraction">
                                        <a class="delete-table bg-white" href="javascript:void(0);"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu" data-popper-placement="bottom-end">
                                            <li>
                                                <a href="user-providers.html" class="dropdown-item"> View</a>
                                            </li>
                                            <li>
                                                <a href="edit-provider.html" class="dropdown-item"> Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="home-usercontent">
                                    <div class="home-usercontents">
                                        <div class="home-usercontentcount">
                                            <img src="{{ asset('assets/imgs/arrow-up.svg') }}" alt="img" class="me-2">
                                            <span class="counters" data-count="{{ $providers }}">{{ $providers }}</span>
                                        </div>
                                        <h5> All Providers</h5>
                                    </div>
                                    <div class="homegraph">
                                        <img src="{{ asset('assets/imgs/graph2.png') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex widget-path widget-service">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user home-service">
                                <div class="home-userhead">
                                    <div class="home-usercount">
                                        <span><img src="{{ asset('assets/imgs/service.svg') }}" alt="img"></span>
                                        <h6>Service</h6>
                                    </div>
                                    <div class="home-useraction">
                                        <a class="delete-table bg-white" href="javascript:void(0);"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu" data-popper-placement="bottom-end">
                                            <li>
                                                <a href="services.html" class="dropdown-item"> View</a>
                                            </li>
                                            <li>
                                                <a href="edit-service.html" class="dropdown-item"> Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="home-usercontent">
                                    <div class="home-usercontents">
                                        <div class="home-usercontentcount">
                                            <img src="{{ asset('assets/imgs/arrow-up.svg') }}" alt="img" class="me-2">
                                            <span class="counters" data-count="{{ $services }}">{{ $services }}</span>
                                        </div>
                                        <h5> Available Services</h5>
                                    </div>
                                    <div class="homegraph">
                                        <img src="{{ asset('assets/imgs/graph3.png') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex widget-path widget-service">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user home-subscription">
                                <div class="home-userhead">
                                    <div class="home-usercount">
                                        <span><img src="{{ asset('assets/imgs/money.svg') }}" alt="img"></span>
                                        <h6>Subscription</h6>
                                    </div>
                                    <div class="home-useraction">
                                        <a class="delete-table bg-white" href="javascript:void(0);"
                                            data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu" data-popper-placement="bottom-end">
                                            <li>
                                                <a href="membership.html" class="dropdown-item"> View</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item"> Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="home-usercontent">
                                    <div class="home-usercontents">
                                        <div class="home-usercontentcount">
                                            <img src="{{ asset('assets/imgs/arrow-up.svg') }}" alt="img" class="me-2">
                                            <span class="counters" data-count="{{ $subscriptions }}">{{ $subscriptions
                                                }}</span>
                                        </div>
                                        <h5> Total Subscriptions</h5>
                                    </div>
                                    <div class="homegraph">
                                        <img src="{{ asset('assets/imgs/graph4.png') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-12 d-flex  widget-path">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user">
                                <div class="home-head-user">
                                    <h2>Revenue</h2>
                                </div>
                                <div class="chartgraph">
                                    <div id="chart-view"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12 d-flex  widget-path">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user">
                                <div class="home-head-user">
                                    <h2>Booking Summary</h2>
                                    
                                </div>
                                <div class="chartgraph">
                                    <div id="chart-booking"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12 d-flex  widget-path">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user">
                                <div class="home-head-user">
                                    <h2>Income</h2>
                                    
                                </div>
                                <div class="chartgraph">
                                    <div id="chart-incomes"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6s col-sm-6 col-12 d-flex widget-path">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user">
                                <div class="home-head-user home-graph-header">
                                    <h2>Booking Statistics</h2>
                                    <a href="{{ route('admin.bookings') }}" class="btn btn-viewall">View All<img
                                            src="{{ asset('assets/imgs/arrow-right.svg') }}" class="ms-2" alt="img"></a>
                                </div>
                                <div class="chartgraph">
                                    <div class="row align-items-center">
                                        <div class="col-lg-9 col-sm-6">
                                            <div id="chart-bar"></div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="bookingstatus">
                                                <ul>
                                                    <li class="process-success">
                                                        <span></span>
                                                        <h6>Completed</h6>
                                                    </li>
                                                    <li class="process-warning">
                                                        <span></span>
                                                        <h6>Confirmed</h6>
                                                    </li>
                                                    <li class="process-info">
                                                        <span></span>
                                                        <h6>Pending</h6>
                                                    </li>
                                                    <li class="process-danger">
                                                        <span></span>
                                                        <h6>Cancelled</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12 d-flex widget-path">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user">
                                <div class="home-head-user home-graph-header">
                                    <h2>Top Services</h2>
                                    <a href="services.html" class="btn btn-viewall">View All<img
                                            src="{{ asset('assets/imgs/arrow-right.svg') }}" class="ms-2" alt="img"></a>
                                </div>
                                <div class="table-responsive datatable-nofooter">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Service</th>
                                                <th>Category</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i = 1;
                                            @endphp
                                            @forelse ($top_services as $service)

                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    <a href="{{ route('service_detail',['slug'=>$service->slug]) }}"
                                                        class="table-imgname">
                                                        <img src="{{ asset('assets/imgs/services/default') }}/{{ $service->image }}"
                                                            class="me-2" alt="img">
                                                        <span>{{ $service->title }}</span>
                                                    </a>
                                                </td>
                                                <td>{{ $service->cat->name }}</td>
                                                <td>{{ $service->price }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <div>
                                                    <img src="{{ asset('assets/imgs/no-record.jpeg') }}" class="me-2"
                                                        alt="img">

                                                </div>

                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 d-flex widget-path">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-user">
                                <div class="home-head-user home-graph-header">
                                    <h2>Top Providers</h2>
                                    <a href="user-providers.html" class="btn btn-viewall">View All<img
                                            src="{{ asset('assets/imgs/arrow-right.svg') }}" class="ms-2" alt="img"></a>
                                </div>
                                <div class="table-responsive datatable-nofooter">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Provider Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $n = 1;
                                            @endphp
                                            @forelse ($top_providers as $key=>$provider)

                                            <tr>
                                                <td>{{ $n++ }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="table-profileimage">
                                                        <img src="{{ asset('assets/imgs') }}/{{ $provider->profile_photo_path }}"
                                                            class="me-2" alt="img">
                                                        <span>{{ $provider->name }}</span>
                                                    </a>
                                                </td>
                                                <td><a href=# class="__cf_email__">{{ $provider->email }}</a></td>
                                                <td>{{ $provider->mobile }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <div>
                                                    <img src="{{ asset('assets/imgs/no-record.jpeg') }}" class="me-2"
                                                        alt="">
                                                </div>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 widget-path">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="home-user">
                                <div class="home-head-user home-graph-header">
                                    <h2>Recent Booking</h2>
                                    <a href="{{ route('admin.bookings') }}" class="btn btn-viewall">View All<img
                                            src="{{ asset('assets/imgs/arrow-right.svg') }}" class="ms-2" alt="img"></a>
                                </div>
                                <div class="table-responsive datatable-nofooter">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Booking Time</th>
                                                <th>Date</th>
                                                <th>User</th>
                                                <th>Service</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i =1;
                                            @endphp
                                            @foreach($recent_bookings as $booking)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $booking->booking_time }}</td>
                                                <td>{{ \Carbon\Carbon::parse($booking->create_at)->isoFormat("MMM Do YYYY") }}</td>
                                               
                                                <td>
                                                    <a href="{{ asset('assets/imgs') }}/{{ $booking->user->profile_photo_path }}" class="table-profileimage">
                                                        <img src="{{ asset('assets/imgs') }}/{{ $booking->user->profile_photo_path }}" class="me-2"
                                                            alt="img">
                                                        <span>{{ $booking->user->name }}</span>
                                                    </a>
                                                </td>
                                                <td>
                                                   @foreach($booking->bookingItems as $item)
                                                   <a href="{{ route('service_detail',['slug'=>$item->service->slug]) }}" class="table-imgname">
                                                    <img src="{{ asset('assets/imgs/services/default') }}/{{ $item->service->image }}"
                                                        class="me-2" alt="img">
                                                    <span>{{ $item->service->title }}</span>
                                                    </a>
                                                    @endforeach
                                                </td>
                                                <td>{{ $booking->total }}</td>
                                                <td>
                                                    <h6 class="badge-pending">{{ $booking->bookingstatus }}</h6>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    'use strict';

$(document).ready(function() {

	


	// Column chart
    if($('#chart-view').length > 0 ){
    	      
        var options = {
    series: [{
        name: 'Revenue',
        data: @json($monthlyData->values()),
        colors: ['#4169E1']
    }],
    chart: {
        height: 350,
        type: 'area',
    },
    fill: {
        colors: ['#4169E1'],
        type: 'gradient',
        gradient: {
            shade: 'dark',
            type: "horizontal",
            shadeIntensity: 0.1,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.5,
            opacityTo: 0.5,
            stops: [0, 50, 100],
            colorStops: []
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: 1,
        curve: 'smooth',
        dashArray: [0, 8, 5],
        opacityFrom: 0.5,
        opacityTo: 0.5,
        colors: ['#4169E1'],
    },
    xaxis: {
        type: 'category',
        categories: @json($monthlyData->keys())
    },
    tooltip: {
    },
};


};

var chart = new ApexCharts(document.querySelector("#chart-view"), options);
chart.render();

    // Column chart
    if($('#chart-booking').length > 0 ){
      
      var columnCtx = document.getElementById("chart-booking"),
    	columnConfig = {
    		colors: ['#4169E1'],
    		series: [
    			{
    			name: "Received",
    			type: "column",
    			data: @json($monthly->values())
    			}
    		],
    		chart: {
    			type: 'bar',
    			fontFamily: 'Poppins, sans-serif',
    			height: 350,
    			toolbar: {
    				show: false
    			}
    		},
    		plotOptions: {
    			bar: {
    				horizontal: false,
    				columnWidth: '60%',
    				endingShape: 'rounded'
    			},
    		},
    		dataLabels: {
    			enabled: false
    		},
    		stroke: {
    			show: true,
    			width: 2,
    			colors: ['transparent']
    		},
    		xaxis: {
    			categories: @json($monthly->keys())
    		},
    		yaxis: {
    			title: {
    				text: 'No (Numbers)'
    			}
    		},
    		fill: {
    			opacity: 1
    		},
    		tooltip: {
    			y: {
    				formatter: function (val) {
    					return "No " + val + " Numbers"
    				}
    			}
    		}
    	};
    	var columnChart = new ApexCharts(columnCtx, columnConfig);
    	columnChart.render();
    }
    
    if($('#chart-bar').length > 0 ){
    	   
      var options = {
        series:[
            @foreach($statusCounts as $status)
            {{ $status }},
            @endforeach
        ],
        chart: {
        width: 300,
        type: 'pie',
      },
      labels: ['Pending', 'Confirmed', 'Completed','Cancelled'],
      color:[' #FEC001','#1BA345','#0081FF', '#a663cc' ],
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 300
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
      };

      var chart = new ApexCharts(document.querySelector("#chart-bar"), options);
      chart.render();
    
    }
    if($('#chart-incomes').length > 0 ){
      var options = {
        series: [{
        name: 'series1',
        data: @json($profit->values())
      }],
        chart: {
        height: 350,
        type: 'area',
      },
      fill: {
        colors: [' #4169E1'],
        type: 'gradient',
        gradient: {
          type: "horizontal",
          shadeIntensity: 0.1,
          gradientToColors: undefined, 
          inverseColors: true,
          opacityFrom: 0.5,
          opacityTo: 0.5,
          stops: [0, 50, 100],
          colorStops: []
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth'
      },
      xaxis: {
        type: 'Month',
        categories: @json($profit->keys())
      },
      tooltip: {
       
      },
      };

      var chart = new ApexCharts(document.querySelector("#chart-incomes"), options);
      chart.render();
    
    
    }

    
});
</script>
@endpush