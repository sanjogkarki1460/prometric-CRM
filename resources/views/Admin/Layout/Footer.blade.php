@section('footer')
    <div class="page-footer">
        <div class="page-footer-inner"> 2020 &copy
            <a href="https://www.prometricexamnepal.com/" target="_blank" class="makerCss">Prometric exam Nepal</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- end footer -->
    </div>
    <!-- start js include path -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/popper/popper.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-blockui/jquery.blockui.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- Common js-->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <script src="{{asset('assets/js/theme-color.js')}}"></script>
    <!-- Material -->
    <script src="{{asset('assets/plugins/material/material.min.js')}}"></script>

    <!-- data tables -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/table/table_data.js')}}"></script>



    <!-- Toastr -->

    <script src="{{asset('assets/js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")

        @endif

        @if(Session::has('delete'))
        toastr.info("{{Session::get('delete')}}")
        @endif

        @if(Session::has('Error'))
        toastr.error("{{Session::get('Error')}}")
        @endif
    </script>

    <!-- summernote -->
    <script src="http://radixtouch.in/templates/admin/smart/source/assets/plugins/summernote/summernote.js"></script>
    <script src="{{asset('assets/js/pages/summernote/summernote-data.js')}}"></script>

    <!--select2-->
    <script src="{{asset('assets/plugins/select2/js/select2.js')}}"></script>
    <script src="{{asset('assets/js/pages/select2/select2-init.js')}}"></script>
    <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        location.reload();
    }
    $('#applicantAppointment').dataTable();
</script>
<script type="text/javascript">
    $('#bookss').select2({
            placeholder: "Select One..."
    });
     $('#person').select2({
            placeholder: "Select One..."
    });
     $('#mcqss').select2({
            placeholder: "Select One..."
    });
</script>
@stack('scripts')
    <!--select2-->
    <!-- end js include path -->
    </body>
@endsection