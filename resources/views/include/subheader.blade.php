<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Dashboard </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="/country" class="kt-subheader__breadcrumbs-link">
                Country Level </a>
            @isset($province)
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="/province/{{$province}}" class="kt-subheader__breadcrumbs-link">
                    {{$province}}</a>
            @endisset
            @isset($district)
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="/district/{{$district}}" class="kt-subheader__breadcrumbs-link">
                    {{$district}}</a>
            @endisset
            @isset($sector)
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="#" class="kt-subheader__breadcrumbs-link">
                    {{$sector}}</a>
            @endisset

        </div>
    </div>


    <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">

            <form class="row">
                <div class="col-md-4">
                    <select class="form-control kt-select2" id="kt_select2_1" name="category">
                        <option value="0" @if(request('category') == 0 )  selected @endif >All Types of Fees</option>
                        <option value="1" @if(request('category') == 1 )  selected @endif >Transport Fee</option>
                        <option value="2" @if(request('category') == 2 )  selected @endif >Market Fee</option>
                        <option value="3" @if(request('category') == 3 )  selected @endif >Cleaning Fee</option>
                        <option value="4" @if(request('category') == 4 )  selected @endif >Fine Fee</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <div class='input-group' id='kt_daterangepicker_6'>
                        <input type='text' class="form-control" name="daterange" readonly placeholder="Select date range"
                               style="background: #e1e3ec"
                               value="{{ request('daterange', date('d/m/Y') . ' - ' . date('d/m/Y')) }}"/>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <button class="btn kt-subheader__btn-primary">
                        <i class="flaticon2-refresh"></i>
                        Filter
                    </button>
                </div>


            </form>
        </div>
    </div>


</div>


@push('end_scripts')
    <script>

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
        }, function (start, end, label) {
            $('#kt_daterangepicker_6 .form-control').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        });

        $(document).ready(function () {
            var chartContainer = KTUtil.getByID('kt_chart_daily_sales_2');

            if (!chartContainer) {
                return;
            }
        });

    </script>
@endpush
