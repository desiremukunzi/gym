<script >
        // predefined ranges
        var start = moment();
        var end = moment();

        $('#kt_daterangepicker_6').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',

            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            $('#kt_daterangepicker_6 .form-control').val( start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        });

        $(document).ready(function() {
            var chartContainer = KTUtil.getByID('kt_chart_daily_sales_2');

            if (!chartContainer) {
                return;
            }

            var chartData = {
                labels: ["Kigali", "Northern Province", "Southern Province", "Eastern Province", "Western Province"],
                datasets: [{
                    //label: 'Dataset 1',
                    backgroundColor: KTApp.getStateColor('success'),
                    data: [
                        {{ $number_stats->kigali }}, {{ $number_stats->north }}, {{ $number_stats->south }}, {{ $number_stats->east }}, {{ $number_stats->west }}
                    ]
                }, {
                    //label: 'Dataset 2',
                    backgroundColor: '#f3f3fb',
                    data: [
                        {{ $number_stats->kigali }}, {{ $number_stats->north }}, {{ $number_stats->south }}, {{ $number_stats->east }}, {{ $number_stats->west }}
                    ]
                }]
            };

            var chart = new Chart(chartContainer, {
                type: 'bar',
                data: chartData,
                options: {
                    title: {
                        display: false,
                    },
                    tooltips: {
                        intersect: false,
                        mode: 'nearest',
                        xPadding: 10,
                        yPadding: 10,
                        caretPadding: 10
                    },
                    legend: {
                        display: false
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    barRadius: 4,
                    scales: {
                        xAxes: [{
                            display: false,
                            gridLines: false,
                            stacked: true
                        }],
                        yAxes: [{
                            display: false,
                            stacked: true,
                            gridLines: false
                        }]
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    }
                }
            });

var container = KTUtil.getByID('kt_chart_order_statistics_2');

            if (!container) {
                return;
            }

            var MONTHS = ['Kigali', 'North', 'South', 'East', 'West'];

            var color = Chart.helpers.color;
            var barChartData = {
                labels: ['Kigali', 'North', 'South', 'East', 'West'],
                datasets : [
                    {
                        fill: true,
                        //borderWidth: 0,
                        backgroundColor: color(KTApp.getStateColor('brand')).alpha(0.6).rgbString(),
                        borderColor : color(KTApp.getStateColor('brand')).alpha(0).rgbString(),

                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 12,
                        pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                        pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                        pointHoverBackgroundColor: KTApp.getStateColor('brand'),
                        pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.1).rgbString(),

                        data: [{{ $number_stats->kigali }}, {{ $number_stats->north }}, {{ $number_stats->south }}, {{ $number_stats->east }}, {{ $number_stats->west }}]
                    },

                ]
            };

            var ctx = container.getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: barChartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: false,
                    scales: {
                        xAxes: [{
                            categoryPercentage: 0.35,
                            barPercentage: 0.70,
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            },
                            gridLines: false,
                            ticks: {
                                display: true,
                                beginAtZero: true,
                                fontColor: KTApp.getBaseColor('shape', 3),
                                fontSize: 13,
                                padding: 10
                            }
                        }],
                        yAxes: [{
                            categoryPercentage: 0.35,
                            barPercentage: 0.70,
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: 'Value'
                            },
                            gridLines: {
                                color: KTApp.getBaseColor('shape', 2),
                                drawBorder: false,
                                offsetGridLines: false,
                                drawTicks: false,
                                borderDash: [3, 4],
                                zeroLineWidth: 1,
                                zeroLineColor: KTApp.getBaseColor('shape', 2),
                                zeroLineBorderDash: [3, 4]
                            },
                            ticks: {
                                max: 70,
                                stepSize: 10,
                                display: true,
                                beginAtZero: true,
                                fontColor: KTApp.getBaseColor('shape', 3),
                                fontSize: 13,
                                padding: 10
                            }
                        }]
                    },
                    title: {
                        display: false
                    },
                    hover: {
                        mode: 'index'
                    },
                    tooltips: {
                        enabled: true,
                        intersect: false,
                        mode: 'nearest',
                        bodySpacing: 5,
                        yPadding: 10,
                        xPadding: 10,
                        caretPadding: 0,
                        displayColors: false,
                        backgroundColor: KTApp.getStateColor('brand'),
                        titleFontColor: '#ffffff',
                        cornerRadius: 4,
                        footerSpacing: 0,
                        titleSpacing: 0
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 5,
                            bottom: 5
                        }
                    }
                }
            });








            var table = $('#kt_table_1_2');

            // begin first table
            table.DataTable({
                responsive: true,
                columnDefs: [
                    {
                        targets: 7,
                        render: function(data, type, full, meta) {
                            var status = {
                                0: {'title': 'Pending', 'class': 'kt-badge--warning'},
                                1: {'title': 'Canceled', 'class': ' kt-badge--danger'},
                                2: {'title': 'Success', 'class': ' kt-badge--success'},
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
                        },
                    },
                    {
                        targets: 1,
                        render: function(data, type, full, meta) {
                            var status = {
                                1: {'title': 'Transport Fee', 'state': 'danger'},
                                2: {'title': 'Market Fee', 'state': 'primary'},
                                3: {'title': 'Cleaning Fee', 'state': 'success'},
                                4: {'title': 'Fine Fee', 'state': 'brand'},
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
                                '<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
                        },
                    },
                ],

                initComplete: function() {


                    $("#kt_table_1_2_length").prepend('<div class="dropdown dropdown-inline"><button type="button" class="btn btn-label-success btn-sm btn-bold dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flaticon-more-1"></i> </button> <div class="dropdown-menu dropdown-menu-right"> <ul class="kt-nav"> <li class="kt-nav__section kt-nav__section--first"> <span class="kt-nav__section-text">Export Tools</span> </li> <li class="kt-nav__item"> <a href="#" class="kt-nav__link" id="export_print"> <i class="kt-nav__link-icon la la-print"></i> <span class="kt-nav__link-text">Print</span> </a> </li> <li class="kt-nav__item"> <a href="#" class="kt-nav__link" id="export_copy"> <i class="kt-nav__link-icon la la-copy"></i> <span class="kt-nav__link-text">Copy</span> </a> </li> <li class="kt-nav__item"> <a href="#" class="kt-nav__link" id="export_excel"> <i class="kt-nav__link-icon la la-file-excel-o"></i> <span class="kt-nav__link-text">Excel</span> </a> </li> <li class="kt-nav__item"> <a href="#" class="kt-nav__link" id="export_csv"> <i class="kt-nav__link-icon la la-file-text-o"></i> <span class="kt-nav__link-text">CSV</span> </a> </li> <li class="kt-nav__item"> <a href="#" class="kt-nav__link" id="export_pdf"> <i class="kt-nav__link-icon la la-file-pdf-o"></i> <span class="kt-nav__link-text">PDF</span> </a> </li> </ul> </div> </div> &nbsp;&nbsp;&nbsp;') }
            });





        });
</script>