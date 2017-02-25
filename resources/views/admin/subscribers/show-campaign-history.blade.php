<div id="history" style="font-family:'Open Sans';">
    {{ $mail }}
</div>

<script>
    $('#history').summernote({
        height: 100+"%",
        fontNames: ['Open Sans', 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Immpact', 'Tahoma', 'Times New Roman', 'Verdana'],
        fontNamesIgnoreCheck: ['Open Sans'],
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']], // Still buggy
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });
</script>