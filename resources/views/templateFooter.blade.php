    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- <script src="{{ asset('assets/./vendors/chart.js/Chart.min.js') }}"></script> -->
    <script src="{{ asset('assets/./vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/./vendors/daterangepicker/daterangepicker.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="{{ asset('assets/./vendors/chartist/chartist.min.js') }}"></script> -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/./js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->

    <!-- JDatatable Configuration -->
    <script>
      $(document).ready(function() {
          $('#modal-tabel').DataTable();
      } );
    </script>
    <!-- End of JDatatable Configuration -->
  </body>
</html>