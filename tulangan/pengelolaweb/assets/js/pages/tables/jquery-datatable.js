$(function () {
    $('.js-basic-example').DataTable();
    $("#tb_sekolah").DataTable({
        // "searching": false,
        "ordering": false,
        "lengthChange": false,
        pageLength: 7,
    });
    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
