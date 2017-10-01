<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta base="/front">
    <!-- Styles -->
    <link href="{{ asset('css/main/app.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/admin_skins.css') }}">
    <link href="{{ asset('/css/main/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app_less.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/vue-multiselect.min.css') }}" rel="stylesheet">

</head>
<body class="sidebar-mini skin-blue">
<div id="app"></div>
<script>
    window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
</script>

<!-- Scripts -->
<script src="{{ asset('front/js/app.js') }}"></script>
<script>
    (function($) {
        var items;
        items = [$('.sidebar-menu'), $('.media_tags'), $('.site_sidebar'), $('.default-menu')];
        items.forEach(function(item, i, arr) {
            var makeAnchorActive, nav;
            nav = item;
            makeAnchorActive = function(navigtation) {
                var activeParents, anchor, current, definedLinks, results;
                anchor = navigtation.find('a');
                current = window.location.href;
                i = 0;
                results = [];
                while (i < anchor.length) {
                    definedLinks = anchor[i].href;
                    if (definedLinks === current) {
                        activeParents = nav.attr('data-active-parents');
                        if (activeParents) {
                            $(anchor[i]).parent().parent().closest('li').addClass('active');
                            $(anchor[i]).parent().addClass('active');
                        } else {

                        }
                        $(anchor[i]).parent().addClass('active');
                    }
                    results.push(i++);
                }
                return results;
            };
            return makeAnchorActive(nav);
        });
    })($);
</script>
</body>
</html>
