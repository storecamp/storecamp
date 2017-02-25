@extends('admin/app')
    @section('breadcrumb')
        {!! Breadcrumbs::render('categories', 'Categories') !!}
    @endsection
    @include('admin.partial._contentheader_title', [$model = null, $message = "All HtmlElements"])
    @section('contentheader_description')
        {{--@include('admin.partial._content-head_btns', [$routeName = "admin::categories::create", $createBtn = 'Add New Category'])--}}
    @endsection
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <h3>Control-Group</h3>
            {!!
             ControlGroup::generate(
    Forms::label('control', 'Control Group'),
    Forms::text('control'),
    Forms::help('Here is a help text')
)!!}
            <h3>Menu</h3>
            {!! app('elements.menu.manager')->menu('sidebar') !!}
            {!! app('elements.menu.manager')->menu('administration') !!}
            <h3>Carousel</h3>
            <div class="row">
                <div class="col-md-8">
                    {!! Carousel::named('example')->withContents([
                    [
                    'image' => '//lorempixel.com/800/400/city',
                    'alt' => 'something',
                    ],
                    [
                    'image' => '//lorempixel.com/800/400/people',
                    'alt' => 'something else',
                    ],
                    ]) !!}
                </div>
            </div>
            <h3>Breadcrumb</h3>
            {!! Breadcrumb::withLinks(array('Home' => '#', 'Library' => '#', 'Data')) !!}
            <h3>Badge</h3>
            {!! Badge::withContents(1) !!}
            <h3>Alert</h3>
            {!! Alert::success("Hello this is alert")->close() !!}
            <h3>Accordion</h3>
            {!! Accordion::named("basic")->open(1)->withContents([
	[
	    'title' => 'First Panel',
	    'contents' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit',
	],
	[
	    'title' => 'Second Panel',
	    'contents' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit'
	],
	[
	    'title' => 'Third Panel',
	    'contents' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit',
	],
]) !!}
            <h3>Button</h3>
            {!! Button::primary("Hello here")->withIcon("fa fa-anchor", false) !!}
            <h3>Button Group</h3>
            {!! ButtonGroup::withContents([
                     Button::primary('Left'),
                     Button::primary('Middle'),
                     Button::primary('Right'),
                   ]) !!}
            <div class="clearfix"></div>
            {!! ButtonGroup::checkbox([
             Button::primary('Left'),
             Button::primary('Middle'),
             Button::primary('Right'),
           ]) !!}
            <div class="clearfix"></div>

            {!! ButtonGroup::radio([
                         Button::primary('Left'),
                         Button::primary('Middle'),
                         Button::primary('Right'),
                       ]) !!}
            <div class="clearfix"></div>
            <h3>DropdownButton types</h3>
            {!! DropdownButton::normal('Normal')
              ->withContents([
                    ['url' => '#', 'label' => 'First'],
                    ['url' => '#', 'label' => 'Second']
      ]) !!}

            {!! DropdownButton::primary('Warning')
              ->withContents([
                    ['url' => '#', 'label' => 'First'],
                    ['url' => '#', 'label' => 'Second']
              ]) !!}

            {!! DropdownButton::danger('Danger')
              ->withContents([
                    ['url' => '#', 'label' => 'First'],
                    ['url' => '#', 'label' => 'Second']
      ]) !!}
            {!! DropdownButton::warning('Warning')
              ->withContents([
                    ['url' => '#', 'label' => 'First'],
                    ['url' => '#', 'label' => 'Second']
      ]) !!}
            {!! DropdownButton::success('Success')
              ->withContents([
                    ['url' => '#', 'label' => 'First'],
                    ['url' => '#', 'label' => 'Second']
      ]) !!}
            <div class="clearfix"></div>
            <h3>DropdownButton sizes and positioning</h3>

            {!! DropdownButton::normal('Large')
              ->withContents([
                  ['url' => '#', 'label' => 'First'],
                  ['url' => '#', 'label' => 'Second']
                  ])->large() !!}
            {!! DropdownButton::normal('Standard')
              ->withContents([
                    ['url' => '#', 'label' => 'First'],
                    ['url' => '#', 'label' => 'Second']
                    ]) !!}

            {!! DropdownButton::normal('Small')
              ->withContents([
                   ['url' => '#', 'label' => 'First'],
                   ['url' => '#', 'label' => 'Second']
                   ])->small() !!}
            {!! DropdownButton::normal('Extra Small')
              ->withContents([
                    ['url' => '#', 'label' => 'First'],
                    ['url' => '#', 'label' => 'Second']])
              ->extraSmall() !!}
            {!! DropdownButton::normal('Split')
           ->withContents([
               ['url' => '#', 'label' => 'First'],
               ['url' => '#', 'label' => 'Second']
           ])
           ->split() !!}
            {!! DropdownButton::normal('Dropup')
                      ->withContents([
                          ['url' => '#', 'label' => 'First'],
                          ['url' => '#', 'label' => 'Second']
                      ])
                      ->dropup()->split() !!}
            {!! DropdownButton::normal('Divider')
              ->withContents([
                  ['url' => '#', 'label' => 'First'],
                  DropdownButton::DIVIDER,
                  ['url' => '#', 'label' => 'Second']
              ]) !!}
            <div class="clearfix"></div>
            <h3>icons</h3>
            {!! Icon::create('check text-info') !!}
            {!! Icon::create('close text-yellow') !!}
        </div>
    </div>
@endsection