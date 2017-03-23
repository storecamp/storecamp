@extends('admin/app')
@section('contentheader_title')
    Add New Setting
@endsection
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::settings::default::index", $createBtn = 'Back', $showFilters = false])
@endsection
@section('main-content')
    <div class="panel" style="margin-top:10px;">
        <div class="panel-heading new-setting">
            <hr>
            <h3 class="panel-title"><i class="settings-plus"></i> New Setting</h3>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin::settings::default::store') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="key">Key</label>
                        <input id="key" type="text" class="form-control" name="key">
                        {!! $errors->first('key', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Value</label>
                        <input id="value" type="text" class="form-control" name="value">
                        {!! $errors->first('value', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
                <div style="clear:both"></div>
                <div class="col-md-12 text-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right new-setting-btn">
                            <i class="settings-plus"></i> Add New Setting
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
@section('scripts-add')
    <script src="{!! asset('plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}"></script>
    <script src="{!! asset('plugins/JSONarea/dist/JSONarea.min.js') !!}"></script>
    <script>
        // do the deal
        var myJSONArea = JSONArea(document.getElementById('options_textarea'), {
            sourceObjects: [] // optional array of objects for JSONArea to inherit from
        });

        valid_json = false;

        // then here's how you use JSONArea's update event
        myJSONArea.getElement().addEventListener('update', function (e) {
            if (e.target.value != "") {
                valid_json = e.detail.isJSON;
            }
        });

        myJSONArea.getElement().addEventListener('focusout', function (e) {
            if (valid_json) {
                $('#valid_options').show();
                $('#invalid_options').hide();
                var ugly = e.target.value;
                var obj = JSON.parse(ugly);
                var pretty = JSON.stringify(obj, undefined, 4);
                document.getElementById('options_textarea').value = pretty;
            } else {
                $('#valid_options').hide();
                $('#invalid_options').show();
            }
        });
    </script>
    <script>
        $('document').ready(function () {
            $('#toggle_options').click(function () {
                $('.new-settings-options').toggle();
                if ($('#toggle_options .settings-double-down').length) {
                    $('#toggle_options .settings-double-down').removeClass('settings-double-down').addClass('settings-double-up');
                } else {
                    $('#toggle_options .settings-double-up').removeClass('settings-double-up').addClass('settings-double-down');
                }
            });
        });
    </script>
@endsection
