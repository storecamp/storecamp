@extends("admin/app")
    @section('breadcrumb')
        {!! Breadcrumbs::render('products', 'Products') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = $products, $message = "All Products"])
    @section('contentheader_description')
        @include('admin.partial._content-head_btns', [$routeName = "admin::products::create", $createBtn = 'Add new product'])
    @endsection
@section("main-content")
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of products</h3>
                    <div class="box-tools">
                        @include('admin.partial._box_search')
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <th>No</th>
                        <th>Product Title</th>
                        <th>Model</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Availability</th>
                        <th>Stock Status</th>
                        <th>Review</th>
                        <th>Created At</th>
                        <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->model }}</td>
                                <td>
                                    {{ $product->categories ? $product->categories->first()->name : "no category  provided"}}
                                </td>
                                <td>{{ $product->price ? $product->price : null }}</td>
                                <td>
                                    <div class="label bg-blue">{{ $product->quantity }}</div>
                                </td>
                                @if($product->availability)
                                    <td>
                                        <div class="label bg-green">{{$product->getAvailability()}}</div>
                                    </td>
                                @else
                                    <td>
                                        <div class="label bg-warning">{{$product->getAvailability()}}</div>
                                    </td>
                                @endif
                                <td>{{ $product->getStockStatus() }}</td>
                                <td>
                                    <a class="edit" href="{{ route('admin::reviews::create', $product->unique_id) }}"
                                       title="Make Review">
                                        <i class="fa fa-eye"></i> Make review</a>
                                </td>
                                <td>{{ $product->created_at }}</td>
                                <td align="center">
                                    <a class="btn btn-default edit" href="{{ route('admin::products::edit', $product->unique_id) }}"
                                       title="Edit">
                                        <em class="fa fa-pencil"></em></a>
                                    <a class="btn btn-danger delete text-warning"
                                       href="{{ route('admin::products::get::delete', $product->unique_id) }}"
                                       title="Are you sure you want to delete?"><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php $no++;?>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="text-center">
        {{ $products->links() }}
    </div>
@endsection
