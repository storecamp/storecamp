@extends('admin/app')
    @section('breadcrumb')
        {!! Breadcrumbs::render('reviews', 'Product reviews') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = $productReviews, $message = "All Product Reviews"])
    @section('contentheader_description')
            @include('admin.partial._content-head_btns', [$routeName = "admin::products::index", $createBtn = 'Get Product For Review'])
    @endsection

@section('main-content')
    <div class="row">
        <div class="col-xs-2">
            <div class="p-2x"><a href="{{route('admin::reviews::index')}}" class="btn btn-block btn-info">Clear review
                    marks</a></div>
            <ul class="nav nav-tabs nav-stacked nav-contrast-red" role="tablist">
                <?php $colors = ['', 'text-red', 'text-orange', 'text-teal', 'text-blue']?>
                @foreach(config('rating') as $key => $rating)
                    <li>
                        <a href="{{route('admin::reviews::index')}}?search={{$key}}&searchFields=rating;"
                           aria-controls="review">
                            <span class="pull-right label label-default"></span>
                            <i class="fa fa-circle-o {{ $colors[$key-1] }} mr-2x"></i> {{$rating}}
                        </a>
                    </li>
                @endforeach
            </ul>

            <ul class="nav nav-tabs nav-stacked nav-contrast-red" role="tablist">
                <li>
                    <a href="{{route('admin::reviews::index')}}?search=1&searchFields=hidden;"
                       aria-controls="review">
                        <span class="pull-right label label-default"></span>
                        <i class="fa fa-eye-slash mr-2x"></i> show hidden
                    </a>
                </li>
            </ul>
            <!-- /nav-review -->

            <!-- /nav-label -->
        </div>

        <div class="col-xs-10">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of Reviews</h3>
                    <div class="box-tools">
                        @include('admin.partial._box_search')
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <th>#</th>
                        <th>Review Product Name</th>
                        <th>Rating</th>
                        <th>Hidden</th>
                        <th>Author</th>
                        <th>Created</th>
                        <th class="text-center"><em class="fa fa-cog"></em> Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($productReviews as $key => $productReview)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $productReview->product->title }}</td>

                                <td>
                                    <span class="review-item-status label label-default">{{$productReview->rating}}</span>
                                </td>
                                <td>
                                    @if($productReview->hidden === 1)
                                        <span class="review-item-status label label-warning"> hidden </span>
                                    @else
                                        <span class="review-item-status label label-info"> visible</span>
                                    @endif
                                </td>
                                <td> <a href="{{ route("admin::users::show", $productReview->user->id) }}">
                                        {{$productReview->user->name}}
                                    </a>
                                </td>
                                <td>{{ $productReview->created_at }}</td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a class="btn btn-default show" href="{{ route('admin::reviews::show', $productReview->id) }}" title="Show and Reply">
                                            <em class="fa fa-eye"></em>
                                        </a>
                                        <a class="btn btn-default edit" href="{{ route('admin::reviews::edit', $productReview->id) }}" title="Edit">
                                            <em class="fa fa-pencil"></em>
                                        </a>
                                        <a class="btn btn-danger delete text-warning" href="{{ route('admin::reviews::get.delete', $productReview->id) }}"
                                           title="Are you sure you want to delete?"><em class="fa fa-trash"></em>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++ ;?>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="text-center">
        {{ $productReviews->links() }}
    </div>
@endsection

@section('scripts-add')

@endsection