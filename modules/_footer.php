<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<script src="select2/dist/js/select2.min.js"></script>
<!--    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>-->
<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!--<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>-->
<script type="text/javascript" src="js/plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/daterangepicker/daterange.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/AdminLTE/demo.js" type="text/javascript"></script>
<!--<script src="js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>-->
<script type="text/javascript">
    // $(function() {
    //     CKEDITOR.replace('editor1');
    //     CKEDITOR.replace('editor2');
    // });
    // function matchCustom(params, data) {
    //     // If there are no search terms, return all of the data
    //     if ($.trim(params.term) === '') {
    //         return data;
    //     }
    //     // Do not display the item if there is no 'text' property
    //     if (typeof data.text === 'undefined') {
    //         return null;
    //     }
    //     // `params.term` should be the term that is used for searching
    //     // `data.text` is the text that is displayed for the data object
    //     if (data.text.indexOf(params.term) > -1) {
    //         var modifiedData = $.extend({}, data, true);
    //         modifiedData.text += ' (matched)';
    //
    //         // You can return modified objects from here
    //         // This includes matching the `children` how you want in nested data sets
    //         return modifiedData;
    //     }
    //     // Return `null` if the term should not be displayed
    //     return null;
    // }
</script>
<script type="text/javascript">
    //Date range picker
    //Date range picker
    $('#reservation').daterangepicker();
    $('#startdate').datepicker();
    $('#startdate1').datepicker();
    $('#enddate').datepicker();
    $('#enddate1').datepicker();
</script>
<script src="js/AdminLTE/demo.js" type="text/javascript"></script>