<script type="text/javascript">
    var configSummernote = {
        placeholder: 'Details goes here',
        toolbar: [
            ['style', ['style']],
            ['fontsize', ['fontsize']],
            ['font', ['bold', 'italic', 'underline', 'font', 'strikethrough', 'superscript', 'subscript']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'hr', 'link']],
            ['insert', ['hr', 'link']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview']]
        ],
        fontSizes: ['12', '14', '16', '18', '20', '22', '24', '36'],
        fontNames: ["Mukta, sans-serif"]
    }
    $('#sidebarCollapse').on('click', function () {
        $('body').toggleClass('sidebar-mini');
    });
    $('#navCollapse').on('click', function () {
        $('#app').toggleClass('nav-open');
    });

</script>
