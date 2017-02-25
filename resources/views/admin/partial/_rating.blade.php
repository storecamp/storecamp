<select name="rating" id="rating">
    <?php $i = 1;?>
    @for($i; $i <= 5; $i++)
        @if(isset($selected))
            @if($selected == $i)
                <option selected value="{{ $i }}">{{ $i }}</option>
            @else
                <option value="{{ $i }}">{{ $i }}</option>
            @endif
        @else
            <option value="{{ $i }}">{{ $i }}</option>
        @endif
    @endfor
</select>
@push('scripts-add_on')
<script>
    $(function() {
        $('#rating').barrating({
            theme: 'fontawesome-stars',
            readonly: {{ isset($readOnly) ? $readOnly : "false" }}
        });
    });
</script>
@endpush