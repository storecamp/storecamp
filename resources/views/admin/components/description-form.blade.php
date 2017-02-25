@if(isset($property_name))
<div class="form-group">
    {{ Form::label($property_name, ucwords($property_name).':') }}
    {{ Form::textarea($property_name, old(ucwords($property_name)), ['class' => 'form-control description', "id" => $property_name]) }}
    {{ $errors->first($property_name, '<div class="text-danger">:message</div>') }}
    </div>
@push('scripts-add_on')
    <!-- include summernote css/js-->
    <script>
        $(document).ready(function() {
            $('textarea[name={{$property_name}}]').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null             // set maximum height of editor
            });
        });
    </script>
@endpush

@else
    <h1 class="text-warning">Please specify $property_name</h1>
@endif