@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row page-title align-items-center">
        <div class="col-sm-4 col-xl-6">
            <h4 class="mb-1 mt-0">Dashboard Summary</h4>
        </div>
        <div class="col-sm-8 col-xl-6">
            <form class="form-inline float-sm-right mt-3 mt-sm-0">
                <div class="btn-group">
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item notify-item">
                            <i data-feather="mail" class="icon-dual icon-xs mr-2"></i>
                            <span>Email</span>
                        </a>
                        <a href="#" class="dropdown-item notify-item">
                            <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                            <span>Print</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item notify-item">
                            <i data-feather="file" class="icon-dual icon-xs mr-2"></i>
                            <span>Re-Generate</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- content -->
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Today
                                Revenue</span>
                            <h2 class="mb-0">$2189</h2>
                        </div>
                        <div class="align-self-center">
                            <div id="today-revenue-chart" class="apex-charts"></div>
                            <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> 10.21%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Product
                                Sold</span>
                            <h2 class="mb-0">1065</h2>
                        </div>
                        <div class="align-self-center">
                            <div id="today-product-sold-chart" class="apex-charts"></div>
                            <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> 5.05%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">New
                                Customers</span>
                            <h2 class="mb-0">11</h2>
                        </div>
                        <div class="align-self-center">
                            <div id="today-new-customer-chart" class="apex-charts"></div>
                            <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> 25.16%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">New
                                Visitors</span>
                            <h2 class="mb-0">750</h2>
                        </div>
                        <div class="align-self-center">
                            <div id="today-new-visitors-chart" class="apex-charts"></div>
                            <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> 5.05%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- stats + charts -->
    <div class="row">
        <div class="col-xl-12">
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>
    </div>

    <!-- PROGRAM & REALIZATION PBJ OPEX -->
    <div class="row mt-4">
        <div class="col-xl-6">
            <figure class="highcharts-figure">
                <div id="pbj-opex"></div>
            </figure>
        </div>
        <div class="col-xl-6">
            <figure class="highcharts-figure">
                <div id="pbj-capex"></div>
            </figure>
        </div>
    </div>

    <!-- MONITORING PENGADAAN 2022 -->
    <div class="row mt-4">
        <div class="col-xl-6">
            <figure class="highcharts-figure">
                <div id="pengadaan"></div>
            </figure>
        </div>
        <div class="col-xl-6">
            <figure class="highcharts-figure">
                <div id="pengadaan-pie"></div>
            </figure>
        </div>
    </div>

    <!-- PROSES PENGADAAN 2022 -->
    <div class="row mt-4">
        <div class="col-xl-12">
            <figure class="highcharts-figure">
                <div id="proses-pengadaan"></div>
            </figure>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    // PROGRAM & REALIZATION
    var seriesData = [];
    seriesData.push({
        name: "Program",
        data: [28, 21],
        url: "{{ route('task.approval') }}"
    });
    seriesData.push({
        name: "Realization",
        data: [19, 10],
        url: "{{ route('task.approval') }}"
    });
    Highcharts.chart('container', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Program and Realization'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['OPEX', 'CAPEX'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' total'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            var point = this;

                            if (point.url) {
                                window.open(point.url);
                            } else if (point.series.userOptions.url) {
                                window.open(point.series.userOptions.url);
                            }
                        }
                    }
                }

            }

        },
        series: seriesData
    });

    // PROGRAM & REALIZATION PBJ OPEX
    Highcharts.chart('pbj-opex', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Program & Realization PBJ (OPEX)'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'CUS',
                'CFH',
                'CTI',
                'CTP',
                'CTS',
                'COC',
                'COH',
                'COS',
                'COT',
                'COLA',
                'KERETA BANDARA',
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: ' Jumlah Pengadaan'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} value</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Program',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6]

        }, {
            name: 'Realization',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6]

        }]
    });

    // PROGRAM & REALIZATION PBJ CAPEX
    Highcharts.chart('pbj-capex', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Program & Realization PBJ (CAPEX)'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'CUS',
                'CFH',
                'CTI',
                'CTP',
                'CTS',
                'COC',
                'COH',
                'COS',
                'COT',
                'COLA',
                'KERETA BANDARA',
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: ' Jumlah Pengadaan'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} value</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Program',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6]

        }, {
            name: 'Realization',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6]

        }]
    });

    // MONITORING PENGADAAN BAR
    Highcharts.chart('pengadaan', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Monitoring & Pengadaan 2022'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['Penunjukan Langsung', 'Pemilihan Langsung', 'Pelelangan Terbuka'],
            title: {
                text: 'PBJ Sarana'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' total'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Penunjukan Langsung',
            data: [18, 1, 18]
        }, {
            name: 'Pemilihan Langsung',
            data: [133, 156, 200]
        }, {
            name: 'Pelelangan Terbuka',
            data: [133, 156, 200]
        }]
    });

    // MONITORING PENGADAAN PIE
    Highcharts.chart('pengadaan-pie', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Nilai Kontrak'
        },
        subtitle: {
            text: ''
        },

        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: '%'
            }
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: "Browsers",
            colorByPoint: true,
            data: [{
                    name: "PBJ Sarana",
                    y: 62.74,
                    drilldown: "PBJ Sarana"
                },
                {
                    name: "PBJ Non Sarana",
                    y: 10.57,
                    drilldown: "PBJ Non Sarana"
                }
            ]
        }],
    });

    // PROSES PENGADAAN
    Highcharts.chart('proses-pengadaan', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'center',
            text: 'Monitoring Pengadaan Sarana & Non Sarana'
        },
        subtitle: {
            align: 'left',
            text: ''
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: "Browsers",
            colorByPoint: true,
            data: [{
                    name: "Chrome",
                    y: 62.74,
                    drilldown: "Chrome"
                },
                {
                    name: "Firefox",
                    y: 10.57,
                    drilldown: "Firefox"
                },
                {
                    name: "Internet Explorer",
                    y: 7.23,
                    drilldown: "Internet Explorer"
                },
                {
                    name: "Safari",
                    y: 5.58,
                    drilldown: "Safari"
                },
                {
                    name: "Edge",
                    y: 4.02,
                    drilldown: "Edge"
                },
                {
                    name: "Opera",
                    y: 1.92,
                    drilldown: "Opera"
                },
                {
                    name: "Other",
                    y: 7.62,
                    drilldown: null
                }
            ]
        }],
        drilldown: {
            breadcrumbs: {
                position: {
                    align: 'right'
                }
            },
            series: [{
                    name: "Chrome",
                    id: "Chrome",
                    data: [
                        [
                            "v65.0",
                            0.1
                        ],
                        [
                            "v64.0",
                            1.3
                        ],
                        [
                            "v63.0",
                            53.02
                        ],
                        [
                            "v62.0",
                            1.4
                        ],
                        [
                            "v61.0",
                            0.88
                        ],
                        [
                            "v60.0",
                            0.56
                        ],
                        [
                            "v59.0",
                            0.45
                        ],
                        [
                            "v58.0",
                            0.49
                        ],
                        [
                            "v57.0",
                            0.32
                        ],
                        [
                            "v56.0",
                            0.29
                        ],
                        [
                            "v55.0",
                            0.79
                        ],
                        [
                            "v54.0",
                            0.18
                        ],
                        [
                            "v51.0",
                            0.13
                        ],
                        [
                            "v49.0",
                            2.16
                        ],
                        [
                            "v48.0",
                            0.13
                        ],
                        [
                            "v47.0",
                            0.11
                        ],
                        [
                            "v43.0",
                            0.17
                        ],
                        [
                            "v29.0",
                            0.26
                        ]
                    ]
                },
                {
                    name: "Firefox",
                    id: "Firefox",
                    data: [
                        [
                            "v58.0",
                            1.02
                        ],
                        [
                            "v57.0",
                            7.36
                        ],
                        [
                            "v56.0",
                            0.35
                        ],
                        [
                            "v55.0",
                            0.11
                        ],
                        [
                            "v54.0",
                            0.1
                        ],
                        [
                            "v52.0",
                            0.95
                        ],
                        [
                            "v51.0",
                            0.15
                        ],
                        [
                            "v50.0",
                            0.1
                        ],
                        [
                            "v48.0",
                            0.31
                        ],
                        [
                            "v47.0",
                            0.12
                        ]
                    ]
                },
                {
                    name: "Internet Explorer",
                    id: "Internet Explorer",
                    data: [
                        [
                            "v11.0",
                            6.2
                        ],
                        [
                            "v10.0",
                            0.29
                        ],
                        [
                            "v9.0",
                            0.27
                        ],
                        [
                            "v8.0",
                            0.47
                        ]
                    ]
                },
                {
                    name: "Safari",
                    id: "Safari",
                    data: [
                        [
                            "v11.0",
                            3.39
                        ],
                        [
                            "v10.1",
                            0.96
                        ],
                        [
                            "v10.0",
                            0.36
                        ],
                        [
                            "v9.1",
                            0.54
                        ],
                        [
                            "v9.0",
                            0.13
                        ],
                        [
                            "v5.1",
                            0.2
                        ]
                    ]
                },
                {
                    name: "Edge",
                    id: "Edge",
                    data: [
                        [
                            "v16",
                            2.6
                        ],
                        [
                            "v15",
                            0.92
                        ],
                        [
                            "v14",
                            0.4
                        ],
                        [
                            "v13",
                            0.1
                        ]
                    ]
                },
                {
                    name: "Opera",
                    id: "Opera",
                    data: [
                        [
                            "v50.0",
                            0.96
                        ],
                        [
                            "v49.0",
                            0.82
                        ],
                        [
                            "v12.1",
                            0.14
                        ]
                    ]
                }
            ]
        }
    });
</script>
@endpush