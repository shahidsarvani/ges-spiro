<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/global/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script src="{{ asset('assets/global/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('assets/global/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/global/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ asset('assets/global/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/tinymce/init-tinymce.js') }}"></script>
<script src="{{ asset('assets/global/js/demo_pages/form_inputs.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- /theme JS files -->

<script>
    var csrf_token = "{{ csrf_token() }}"
</script>