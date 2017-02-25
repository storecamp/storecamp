@extends("admin/app")

    @section('breadcrumb')
        {!! Breadcrumbs::render('categories', 'Categories') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = $categories, $message = "All Categories"])
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::categories::create", $createBtn = 'Add New Category'])
    @endsection
@section("main-content")
    @include('admin.components.modal-description', [$attrName = "Description"])
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of categories</h3>
                    <div class="box-tools">
                        @include('admin.partial._box_search')
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Sort Order</th>
                        <th>Created</th>
                        <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <?php $no++; ?>
                            @include('admin.categories.category', [$category, $no])
                        @endforeach
                        </tbody>
                    </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="text-center">
        {{ $categories->links() }}
    </div>
@endsection
