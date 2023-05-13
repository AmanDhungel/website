<footer class="main-footer">
    <strong class="{{setFont()}}">
        {{trans('message.footer.copyright')}} &copy; <?php echo date('Y');?>
        <a href="{{url('/dashboard')}}">@if(systemSetting()->app_name) {{ systemSetting()->app_name}} @else {{ env('APP_NAME') }}  @endif </a>
        {{trans('message.footer.all_rights_reserved')}}
    </strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>  {{trans('message.footer.developed_by')}}: </b> Omniblue Technlogy
    </div>
@yield('js')


    <!-- jQuery -->
   {{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>--}}
    <script src="{{asset('plugins/jquery/main-jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('theme-design/js/main.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/validation/validate.min.js')}}"></script>
    <script src="{{asset('plugins/validation/additional-methods.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src={{asset("plugins/bootstrap-toggle/js/bootstrap-toggle.js")}}></script>
    <script src={{asset("js/theme_switch.min.js")}}></script>
    <script src={{asset("js/common.min.js")}}></script>


    @if(@$load_js)
        @foreach(@$load_js as $js)
            <script src="{{asset($js)}}"></script>
        @endforeach
    @endif
    <script type="text/javascript">
        var site_url = "{{url('/')}}";
        @if(@$script_js)
            {!!$script_js!!}
        @endif
    </script>
</footer>
