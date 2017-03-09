@extends('admin/app')
@section('breadcrumb')
    {!! Breadcrumbs::render('menus', 'Menus') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Menu(), $message = "Amount of Menus"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::menus::create", $createBtn = 'Add New Menu'])
    <div class="alert alert-info">
        <strong>How To Use:</strong>
        {{--<p>You can output {{ !empty($menu) ? 'this' : 'a' }} menu anywhere on your site by calling <code>menu('{{ !empty($menu->first()) ? $menu->first()->name : 'name' }}')</code></p>--}}
    </div>
@endsection
@section('styles-add')

    <style>
        /**
 * Nestable
 */
        .dd { position: relative; display: block; margin: 0; padding: 0; list-style: none; font-size: 13px; line-height: 20px; }
        .dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
        .dd-list .dd-list { padding-left: 30px; }
        .dd-collapsed .dd-list { display: none; }
        .dd-item,
        .dd-empty,
        .dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }
        .dd-handle { display: block; height: 50px; margin: 5px 0; padding: 14px 25px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
            background: #fafafa;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box; -moz-box-sizing: border-box;
        }
        .dd-handle:hover { color: #2ea8e5; background: #fff; }
        .dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 40px; height: 37px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
        .dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
        .dd-item > button[data-action="collapse"]:before { content: '-'; }
        .dd-placeholder,
        .dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
        .dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
            background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
        }
        .dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
        .dd-dragel > .dd-item .dd-handle { margin-top: 0; }
        .dd-dragel .dd-handle {
            -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        }
        /**
         * Nestable Extras
         */
        .nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }
        #nestable-menu { padding: 0; margin: 20px 0; }
        #nestable-output,
        #nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }
        #nestable2 .dd-handle {
            color: #fff;
            border: 1px solid #999;
            background: #bbb;
            background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
            background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
            background:         linear-gradient(top, #bbb 0%, #999 100%);
        }
        #nestable2 .dd-handle:hover { background: #bbb; }
        #nestable2 .dd-item > button:before { color: #fff; }
        @media only screen and (min-width: 700px) {
            .dd { float: left; width:100%; }
            .dd + .dd { margin-left: 2%; }
        }
        .dd-hover > .dd-handle { background: #2ea8e5 !important; }
        /**
         * Nestable Draggable Handles
         */
        .dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:         linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box; -moz-box-sizing: border-box;
        }
        .dd3-content:hover { color: #2ea8e5; background: #fff; }
        .dd-dragel > .dd3-item > .dd3-content { margin: 0; }
        .dd3-item > button { margin-left: 30px; }
        .dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
            border: 1px solid #aaa;
            background: #ddd;
            background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:         linear-gradient(top, #ddd 0%, #bbb 100%);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
        .dd3-handle:hover { background: #ddd; }
    </style>
@endsection
@section('main-content')

    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">

                    <div class="panel-heading">
                        <p class="panel-title" style="color:#777">Drag and drop the menu Items below to re-arrange
                            them.</p>
                    </div>

                    <div class="panel-body" style="padding:30px;">

                        <div class="dd">
                            {{ menu($menu->name) }}
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to delete this menu
                        item?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin::menus::item::destroy', ['menu' => $menu->id, 'id' => '__id']) }}" id="delete_form"
                          method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="Yes, Delete This Menu Item">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal modal-success fade" tabindex="-1" id="add_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-plus"></i> Create a New Menu Item</h4>
                </div>
                <form action="{{ route('admin::menus::item::add', ['menu' => $menu->id]) }}" id="delete_form" method="POST">
                    <div class="modal-body">
                        <label for="name">Title of the Menu Item</label>
                        <input type="text" class="form-control" name="title" placeholder="Title"><br>
                        <label for="url">URL for the Menu Item</label>
                        <input type="text" class="form-control" name="url" placeholder="URL"><br>
                        <label for="icon_class">Font Icon class for the Menu Item (Use a <a
                                    href="/fonts/voyager/icons-reference.html"
                                    target="_blank">Voyager Font Class</a>)</label>
                        <input type="text" class="form-control" name="icon_class"
                               placeholder="Icon Class (optional)"><br>
                        <label for="color">Color in RGB or hex (optional)</label>
                        <input type="color" class="form-control" name="color"
                               placeholder="Color (ex. #ffffff or rgb(255, 255, 255)"><br>
                        <label for="target">Open In</label>
                        <select id="edit_target" class="form-control" name="target">
                            <option value="_self">Same Tab/Window</option>
                            <option value="_blank">New Tab/Window</option>
                        </select>
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    </div>
                    {{ csrf_field() }}

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success pull-right delete-confirm" value="Add New Item">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal modal-info fade" tabindex="-1" id="edit_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-edit"></i> Edit Menu Item</h4>
                </div>
                <form action="{{ route('admin::menus::item::update', ['menu' => $menu->id]) }}" id="edit_form" method="POST">
                    {{ method_field("PUT") }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label for="name">Title of the Menu Item</label>
                        <input type="text" class="form-control" id="edit_title" name="title" placeholder="Title"><br>
                        <label for="type">Link type</label>
                        <select id="edit_type" class="form-control" name="type">
                            <option value="url" selected="selected">Static URL</option>
                            <option value="route">Dynamic Route</option>
                        </select><br>
                        <div id="url_type">
                            <label for="url">URL for the Menu Item</label>
                            <input type="text" class="form-control" id="edit_url" name="url" placeholder="URL"><br>
                        </div>
                        <div id="route_type">
                            <label for="route">Route for the menu item</label>
                            <input type="text" class="form-control" id="edit_route" name="route" placeholder="Route"><br>
                            <label for="parameters">Route parameters (if any)</label>
                            <textarea rows="3" class="form-control" id="edit_parameters" name="parameters" placeholder="{{ json_encode(['key' => 'value'], JSON_PRETTY_PRINT) }}"></textarea><br>
                        </div>
                        <label for="icon_class">Font Icon class for the Menu Item (Use a <a
                                    href="fonts/voyager/icons-reference.html"
                                    target="_blank">Voyager Font Class</a>)</label>
                        <input type="text" class="form-control" id="edit_icon_class" name="icon_class"
                               placeholder="Icon Class (optional)"><br>
                        <label for="color">Color in RGB or hex (optional)</label>
                        <input type="color" class="form-control" id="edit_color" name="color"
                               placeholder="Color (ex. #ffffff or rgb(255, 255, 255)"><br>
                        <label for="target">Open In</label>
                        <select id="edit_target" class="form-control" name="target">
                            <option value="_self" selected="selected">Same Tab/Window</option>
                            <option value="_blank">New Tab/Window</option>
                        </select>
                        <input type="hidden" name="id" id="edit_id" value="">
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success pull-right delete-confirm" value="Update">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop

@section('scripts-add')

    <script type="text/javascript" src="{{ asset('plugins/Nestable/jquery.nestable.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.dd').nestable({/* config options */});
            $('.item_actions').on('click', '.delete', function (e) {
                id = $(e.currentTarget).data('id');
                $('#delete_form')[0].action = $('#delete_form')[0].action.replace("__id",id);
                $('#delete_modal').modal('show');
            });

            $('.item_actions').on('click', '.edit', function (e) {
                id = $(e.currentTarget).data('id');
                console.log(id);
                $('#edit_title').val($(e.currentTarget).data('title'));
                $('#edit_url').val($(e.currentTarget).data('url'));
                $('#edit_icon_class').val($(e.currentTarget).data('icon_class'));
                $('#edit_color').val($(e.currentTarget).data('color'));
                $('#edit_route').val($(e.currentTarget).data('route'));
                $('#edit_parameters').val(JSON.stringify($(e.currentTarget).data('parameters')));
                $('#edit_id').val(id);

                if ($(e.currentTarget).data('target') == '_self') {
                    $("#edit_target").val('_self').change();
                } else if ($(e.currentTarget).data('target') == '_blank') {
                    $("#edit_target option[value='_self']").removeAttr('selected');
                    $("#edit_target option[value='_blank']").attr('selected', 'selected');
                    $("#edit_target").val('_blank');
                }

                if ($(e.currentTarget).data('route') != "") {
                    $("#edit_type").val('route').change();
                    $("#url_type").hide();
                } else {
                    $("#route_type").hide();
                }

                $('#edit_modal').modal('show');
            });

            $('.add_item').click(function () {
                $('#add_modal').modal('show');
            });

            $('.dd').on('change', function (e) {
                $.post('{!!  route('admin::menus::order',['menu' => $menu->id])  !!}', {
                    order: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '{{ csrf_token() }}'
                }, function (data) {
                    toastr.success("Successfully updated menu order.");
                });

            });

            $('#edit_type').on('change', function (e) {
                if ($("#edit_type").val() == 'route') {
                    $("#url_type").hide();
                    $("#route_type").show();
                } else {
                    $("#routel_type").hide();
                    $("#url_type").show();
                }
            });

        });
    </script>
@stop
