@extends('admin/app')
@section('breadcrumb')
    {!! Breadcrumbs::render('menus', 'Menus') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Menu(), $message = "Amount of Menus"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::design::menus::create", $classBtn="add_item", $createBtn = 'Add New Menu Item'])
    <button class="btn pull-right" style="margin-bottom: 20px;" data-toggle="collapse" href="#info" aria-expanded="false"
            aria-controls="info">
        <span class="fa fa-info"></span>info
    </button>
@endsection
@section('main-content')
    <div class="collapse" id="info">
        <div class="alert alert-info">
            <strong>How To Use:</strong>
            <p>You can get the menu by its own type on your site by calling <code>menu($menu->name, 'default')</code></p>
            <p class="text-mute"><b>types:</b>
                <span class="text-warning">'default'</span>
                <span class="divider"> || </span>
                <span class="text-warning">'navigation'</span>
            </p>
        </div>
    </div>
    <div class="panel panel-bordered">
        <div class="panel-heading panel-info">
            <p class="panel-title panel-info" style="color:#777">Drag and drop the menu Items below to re-arrange
                them.</p>
        </div>
        <div class="panel-body" style="padding:30px;">
            <div class="dd">
                {{ menu($menu->name, 'build') }}
            </div>
        </div>
    </div>
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="builder-trash"></i> Are you sure you want to delete this menu
                        item?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin::design::menus::item::destroy', ['menu' => $menu->id, 'id' => '__id']) }}"
                          id="delete_form"
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
                    <h4 class="modal-title"><i class="builder-plus"></i> Create a New Menu Item</h4>
                </div>
                <form action="{{ route('admin::design::menus::item::add', ['menu' => $menu->id]) }}" id="delete_form"
                      method="POST">
                    <div class="modal-body">
                        <label for="name">Title of the Menu Item</label>
                        <input type="text" class="form-control" name="title" placeholder="Title"><br>
                        <div class="route_type">
                            <label for="route">Route for the menu item</label>
                            <input type="text" class="form-control" id="create_route" name="route"
                                   placeholder="Route"><br>
                            <label for="parameters">Route parameters (if any)</label>
                            <textarea rows="3" class="form-control" id="create_parameters" name="parameters"
                                      placeholder="{{ json_encode(['key' => 'value'], JSON_PRETTY_PRINT) }}"></textarea><br>
                        </div>
                        <label for="icon_class">Font Icon class for the Menu Item (Use a <a
                                    href="https://almsaeedstudio.com/themes/AdminLTE/pages/UI/icons.html"
                                    target="_blank">Font classes</a>)</label>
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
                    <h4 class="modal-title"><i class="builder-edit"></i> Edit Menu Item</h4>
                </div>
                <form action="{{ route('admin::design::menus::item::update', ['menu' => $menu->id]) }}" id="edit_form"
                      method="POST">
                    {{ method_field("PUT") }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label for="name">Title of the Menu Item</label>
                        <input type="text" class="form-control" id="edit_title" name="title" placeholder="Title"><br>
                        <label for="type">Link type</label>
                        <select id="edit_type" class="form-control" name="type">
                            <option value="route">Dynamic Route</option>
                        </select><br>
                        <div id="route_type">
                            <label for="route">Route for the menu item</label>
                            <input type="text" class="form-control" id="edit_route" name="route"
                                   placeholder="Route"><br>
                            <label for="parameters">Route parameters (if any)</label>
                            <textarea rows="3" class="form-control" id="edit_parameters" name="parameters"
                                      placeholder="{{ json_encode(['key' => 'value'], JSON_PRETTY_PRINT) }}"></textarea><br>
                        </div>
                        <label for="icon_class">Font Icon class for the Menu Item (Use a <a
                                    href="https://almsaeedstudio.com/themes/AdminLTE/pages/UI/icons.html"
                                    target="_blank">Font classes</a>)</label>
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
                $('#delete_form')[0].action = $('#delete_form')[0].action.replace("__id", id);
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

            $('.add_item').click(function (e) {
                e.preventDefault();
                $('#add_modal').modal('show');
            });

            $('.dd').on('change', function (e) {
                $.post('{!!  route('admin::design::menus::order',['menu' => $menu->id])  !!}', {
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
