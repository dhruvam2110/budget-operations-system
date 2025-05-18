//dropify js
$('.dropify').dropify({
    defaultFile: $('.dropify').data('default-file')
});

$(document).ready(function() {
    $('#table').DataTable(
        {
            "aLengthMenu": [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]],
            "iDisplayLength": 10,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'colvis'
            ],
            responsive: true,
            "sDom": 'C<"clear">lfrtip'
        } 
    );
});

function checkAll(bx) {
    var cbs = document.getElementsByTagName('input');

    for(var i=0; i < cbs.length; i++) {

        if(cbs[i].type == 'checkbox') {

            cbs[i].checked = bx.checked;
        }
    }
}
