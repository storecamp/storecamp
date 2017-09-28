{{--{!! Form::select($attrName, $result, $selected, ["class" => $class, ($multiple ? "multiple" : null), 'placeholder' => isset($placeholder) ? $placeholder : "select an option", "style" => "width:100%;"]) !!}--}}
<?php $i = 0; ?>
<select {!! $multiple ? "multiple" : null !!} style="z-index: 25!important;width:100%; display: initial;"
        name="{!!$attrName!!}"
        class="form-control {!! $class !!}"
        title="{!! isset($title) ? $title : ""!!}">
    <?php echo !empty($placeholder) ? $placeholder : null; ?>
    @foreach($selected as $item => $tag)
        <?php $i++; ?>
        @if($i <= 1)
            @if(!empty($placeholder))
                <option value="" disabled selected>{!! !empty($placeholder) ? $placeholder : null !!}</option>
            @endif
            <option {!! array_key_exists($item, $selected) == true ? "selected" : null !!}  value="{!! strtolower($item) !!}">{{ucfirst($tag)}}</option>
        @else
            <option {!! array_key_exists($item, $selected) == true ? "selected" : null !!}  value="{!! strtolower($item) !!}">{{ucfirst($tag)}}</option>
        @endif
    @endforeach
    @if(!count($selected) && !empty($placeholder))
        <option value="" disabled selected>{!! !empty($placeholder) ? $placeholder : null !!}</option>
    @endif
</select>
<?php $tags = !empty($tags) ? true : false; ?>
@push('scripts-add_on')
    <script>
        @if($className)
        if ($('.{{$className}}').length > 0) {
            var selector = $('.{{$className}}');
        } else {
            var selector = $('.select_builder_select');
        }
                @else
        var selector = $('.select_builder_select');
        @endif

        selector.select2({
            ajax: {
                url: "{!! $actionUrl !!}",
                delay: 250,
                tags: true,
                tokenSeparators: [',',' '],
                data: function (params) {
                    var query = {
                        search: params.term, // search term
                        page: params.page
                    };
                    return query;
                },
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true // add additional parameters
                    }
                },
                insertTag: function (data, tag) {
                    // Insert the tag at the end of the results
                    data.push(tag);
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
    </script>
@endpush
