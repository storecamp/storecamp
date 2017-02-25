<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->

<script src="{{ asset('custom_vendors/jQuery/jQuery-2.1.4.min.js') }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- StoreCamp App -->
<script src="{{ asset('/js/admin.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/fastclick/lib/fastclick.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('plugins/plyr/dist/plyr.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('custom_vendors/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('custom_vendors/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('custom_vendors/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- date-range-picker -->
<script src="{!! asset('plugins/moment/min/moment-with-locales.min.js') !!}"></script>
<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/lib/fastclick.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/bower-jquery-sparkline/dist/jquery.sparkline.retina.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('custom_vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('custom_vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('plugins/chart.js/Chart.js') }}"></script>
<script src="{{ asset('plugins/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.js') }}"></script>
<script src="{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/dist/summernote.min.js') }}"></script>
<script src="{{asset('plugins/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

<!-- Page script -->
<script>
    APP_URL = {!! json_encode(url('/')) !!};
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
//        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

        //Date picker
        $('.simple_date').datepicker({
            autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    });

    $('#flash-overlay-modal').modal();
    $('body > h1').remove();

    $(".modal-wide").on("show.bs.modal", function() {
        var height = $(window).height() - 200;
        $(this).find(".modal-body").css({"max-height": height, "min-height": 500});
    });
    toastr.options = {
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script src="{{asset("js/modules.js")}}"></script>
<a data-toggle="modal" style="display: none" href="#generic" class="hidden modal-auto-Trigger">Trigger Modal</a>