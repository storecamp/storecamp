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
            <h3 class="box-title">{{$data->name}} parser</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::model($data, ["id" => "parser", "method" => "PUT", "route" => ["admin::parsers::parse", $data->id]]) !!}
            <div class="form-group">
                {!! Form::input('text', 'keyword', null, ['class' => 'form-control', 'placeholder' => 'type the keyword']) !!}
            </div>
            {!! Form::submit("Start parsing", ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.row -->
@endsection
@section('scripts-add')

@endsection

