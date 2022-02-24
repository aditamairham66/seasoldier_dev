@extends('crudbooster::admin_template')

@section('content')
    <header class="page-header">
        <h4 class="page-title">Dashboard</h4>
    </header>

    <div class="row">
        <div class="col-lg-4 col-xs-12">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Email Subscribe</p>
                                <h4 class="card-title">{{ $total_subscribe }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xs-12">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Contact Us</p>
                                <h4 class="card-title">{{ $total_contact_us }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xs-12">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-map-signs"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Regional Request</p>
                                <h4 class="card-title">{{ $total_regional_request }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Visitor Statistics</div>
                        <form method="GET" class="card-tools">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <input name="year" type="number" class="form-control form-control-sm" id="year"
                                        placeholder="Masukan Tahun" value="{{ $year }}" max="{{ date('Y') }}">
                                </li>
                                <li class="nav-item">
                                    <select name="month" class="form-control form-control-sm" id="smallSelect">
                                        <option value="1" @if ($month == '1') selected @endif>
                                            Januari
                                        </option>
                                        <option value="2" @if ($month == '2') selected @endif>
                                            Februari
                                        </option>
                                        <option value="3" @if ($month == '3') selected @endif>
                                            Maret
                                        </option>
                                        <option value="4" @if ($month == '4') selected @endif>
                                            April
                                        </option>
                                        <option value="5" @if ($month == '5') selected @endif>
                                            Mei
                                        </option>
                                        <option value="6" @if ($month == '6') selected @endif>
                                            Juni
                                        </option>
                                        <option value="7" @if ($month == '7') selected @endif>
                                            Juli
                                        </option>
                                        <option value="8" @if ($month == '8') selected @endif>
                                            Agustus
                                        </option>
                                        <option value="9" @if ($month == '9') selected @endif>
                                            September
                                        </option>
                                        <option value="10" @if ($month == '10') selected @endif>
                                            Oktober
                                        </option>
                                        <option value="11" @if ($month == '11') selected @endif>
                                            November
                                        </option>
                                        <option value="12" @if ($month == '12') selected @endif>
                                            Desember
                                        </option>
                                    </select>
                                </li>
                                <li class="nav-item">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
                        <canvas id="visitorChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('bottom')
    <script src="{{ asset('vendor/backend/azzara/js/plugin/chart.js/chart.min.js') }}"></script>
    <script>
        $('div.page-header').remove();
        $('div.page-category').remove();

        let ctx = document.getElementById('visitorChart').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $statistic_label !!}, //["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Total Visitor ",
                    borderColor: '#177dff',
                    pointBackgroundColor: 'rgba(23,125,125, 0.2)',
                    pointRadius: 0,
                    backgroundColor: 'rgba(23,125,125, 0.1)',
                    legendColor: '#177dff',
                    fill: true,
                    borderWidth: 2,
                    data: {!! $statistic_data !!}, //[154, 184, 175, 203, 210, 231, 240, 278, 252, 312, 320, 374]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                layout: {
                    padding: {
                        left: 15,
                        right: 15,
                        top: 15,
                        bottom: 15
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "500",
                            beginAtZero: false,
                            maxTicksLimit: 5,
                            padding: 20
                        },
                        gridLines: {
                            drawTicks: false,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            zeroLineColor: "transparent"
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "500"
                        }
                    }]
                }
            }
        });
    </script>
@endpush
