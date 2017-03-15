@extends('admin/app')
@section('breadcrumb')
    {!! \Breadcrumbs::render('settings', 'Settings') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Settings(), $message = "All Settings Count"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::settings::default::create", $createBtn = 'Add New Setting'])
    <button class="btn pull-right" style="margin-bottom: 20px;" data-toggle="collapse" href="#info" aria-expanded="false"
            aria-controls="info">
        <span class="fa fa-info"></span>info
    </button>
@endsection
@section('styles-add')
    <style>
        .panel-actions .settings-trash {
            cursor: pointer;
        }

        .panel-actions .settings-trash:hover {
            color: #e94542;
        }

        .panel hr {
            margin-bottom: 10px;
        }

        .panel {
            padding-bottom: 15px;
        }

        .sort-icons {
            font-size: 21px;
            color: #ccc;
            position: relative;
            cursor: pointer;
        }

        .panel-title code {
            padding: 5px 10px;
            font-size: 11px;
            border: 0;
            position: relative;
            top: -2px;
        }

        .new-setting .panel-title {
            margin: 0 auto;
            display: inline-block;
            color: #999fac;
            font-weight: lighter;
            font-size: 13px;
            background: #fff;
            width: auto;
            height: auto;
            position: relative;
            padding-right: 15px;
        }

        .new-setting hr {
            margin-bottom: 0;
            position: absolute;
            top: 7px;
            width: 96%;
            margin-left: 2%;
        }

        .new-setting .panel-title i {
            position: relative;
            top: 2px;
        }

        .new-settings-options {
            display: none;
            padding-bottom: 10px;
        }

        .new-settings-options label {
            margin-top: 13px;
        }

        .new-settings-options .alert {
            margin-bottom: 0;
        }
    </style>
@stop

@section('main-content')
    <div class="collapse" id="info">
        <div class="alert alert-info">
            <strong>How To Use:</strong>
            <p>You can get the value of each setting anywhere on your site by calling <code>setting('key')</code></p>
        </div>
    </div>
    <div class="panel" id="settings" style="overflow: hidden">
        @foreach($settings as $key => $setting)
            <div class="panel-heading">
                <h3 class="panel-title">
                    <b>{{ $setting->key }}</b> <code>setting('{{ $setting->key }}')</code>
                </h3>
                <div class="panel-actions pull-right">
                    <a class="btn btn-xs btn-default" href="{{ route('admin::settings::default::move_up', $setting->id) }}">
                        <span class="fa fa-angle-up"></span>
                    </a>
                    <a class="btn btn-xs btn-default" href="{{ route('admin::settings::default::move_down', $setting->id) }}">
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <a class="btn btn-xs btn-default">
                        <i class="settings-trash fa fa-remove"
                           data-id="{{ $setting->id }}"
                           data-display-key="{{ $setting->key }}"
                           data-display-name="{{ $setting->value }}"></i>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin::settings::default::update', [$setting->unique_id]) }}" method="POST"
                      enctype="multipart/form-data">
                    {{ method_field("PUT") }}
                    {{ csrf_field() }}
                    <textarea type="text" class="form-control" name="setting"
                              id="{{$setting->key . '-' . $key}}" rows="2"
                              cols="60">{{trim($setting->value)}}</textarea>
                    <button type="submit" class="btn pull-right">
                        update setting <b>{{ $setting->key }}</b>
                    </button>
                </form>

                <script>
                    {{--var ugly = document.getElementById('{{$setting->key . '-' . $key}}').value;--}}
                    {{--var obj = JSON.parse(ugly);--}}
                    {{--var pretty = JSON.stringify(obj, undefined, 4);--}}
                    {{--document.getElementById("{{$setting->key . '-' . $key}}").value = pretty;--}}
                </script>
            </div>
            @if(!$loop->last)
                <hr>
            @endif
        @endforeach

    </div>
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="settings-trash"></i> Are you sure you want to delete the <span
                                id="delete_setting_title"></span> Setting?
                    </h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin::settings::default::delete', ['id' => '__id']) }}" id="delete_form"
                          method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="Yes, Delete This Setting">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts-add')
    <script src="{!! asset('plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}"></script>
    <script src="{!! asset('plugins/JSONarea/dist/JSONarea.min.js') !!}"></script>
    <script>
        $('document').ready(function () {
            $('#toggle_options').click(function () {
                $('.new-settings-options').toggle();
                if ($('#toggle_options .fa-angle-down').length) {
                    $('#toggle_options .fa-angle-down').removeClass('fa-angle-down').addClass('fa-angle-up');
                } else {
                    $('#toggle_options .settings-double-up').removeClass('fa-angle-up').addClass('fa-angle-down');
                }
            });
        });
    </script>
    <script>
        $('document').ready(function () {
            $('.settings-trash').click(function () {
                var display = $(this).data('display-name') + '/' + $(this).data('display-key');

                $('#delete_setting_title').text(display);
                $('#delete_form')[0].action = $('#delete_form')[0].action.replace('__id', $(this).data('id'));
                $('#delete_modal').modal('show');
            });

            $('.toggleswitch').bootstrapToggle();
        });
    </script>
@endsection