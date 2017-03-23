<script>
    APP_URL = {!! json_encode(url('/')) !!};
</script>

<!-- jQuery 2.1.4 -->
<script src="{{ asset('custom_vendors/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{asset("js/app.js")}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script src="{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>

<script src="{!! asset('plugins/moment/min/moment-with-locales.min.js') !!}"></script>
<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{asset('plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/dist/summernote.min.js') }}"></script>
<a data-toggle="modal" style="display: none" href="#generic" class="hidden modal-auto-Trigger">Trigger Modal</a>
