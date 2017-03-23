<select name="_rating" data-current-rating="{!! isset($selected) ? $selected : 1 !!}" id="rating" autocomplete="on">
    <?php
    $i = 1;
    $limit = isset($limit) ? $limit : 5;
    ?>
    @for($i; $i <= $limit; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>
<span class="title current-rating">
    Current rating: <span class="value"></span>
</span>
<input type="text" value="{{isset($selected) ? $selected : 1}}" name="rating" class="rating-input hidden">
@push('scripts-add_on')
<script>
    $(function() {
        var currentRating = $('#rating').data('current-rating');
        $(".current-rating .value").html("<span class='label label-default'>" + currentRating + "</span>");
        var bar = {
            theme: 'fontawesome-stars-o',
            showSelectedRating: true,
            initialRating: currentRating,
            readonly: {{ isset($readOnly) ? $readOnly : "false" }}
        };
        $('#rating').barrating(bar);
        console.log(bar);
        // on star click
        $('.br-widget a').on('click', function(event, target) {
            // check the value of clicked star
            let $selected = $(this).data('rating-value');


            if(!bar.readonly) {
                $(".current-rating .value").html("<span class='label label-default'>" + $selected + "</span>");// make sure we selected new start we clicked (or half star)
                $('.rating').barrating('set', $selected);
                $('.rating-input').attr('value', $selected);
            }

        });
    });
</script>
@endpush