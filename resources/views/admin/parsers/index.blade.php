@extends("admin/app")
@section('breadcrumb')
    {!! Breadcrumbs::render('parsers', 'Parsers') !!}
@endsection
@include('admin.partial._contentheader_title', [$model = new \App\Core\Models\Parser(), $message = "All Parsers"])
@section('contentheader_description')
    @include('admin.partial._content-head_btns', [$routeName = "admin::products::create", $createBtn = 'Add new parser'])
@endsection
@section("main-content")
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of parsers</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @foreach($data->chunk(2) as $row)
                <div class="row">
                    @foreach($row as $parser)
                        <a href="{{route('admin::parsers::show', $parser->id)}}" class="col-sm-6 col-md-6">
                            <div class="text-center thumbnail">
                                <img src="{{asset($parser->image)}}" class="rounded" alt="{{$parser->name}}">
                                <h4 class="text-center">{{$parser->name}}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.row -->
@endsection
@section('scripts-add')

@endsection

