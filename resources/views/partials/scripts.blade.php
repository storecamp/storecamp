<script>
    APP_URL = {!! json_encode(url('/')) !!};
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script src="{{asset("js/app.js")}}"></script>
<a data-toggle="modal" style="display: none" href="#generic" class="hidden modal-auto-Trigger">Trigger Modal</a>
