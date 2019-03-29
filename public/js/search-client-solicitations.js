
$(function() {
    $("#name").autocomplete({
        source: "/chamados/novo/getclient",
        minLength: 3,
        select: function( event, ui ) {
            $('#name').val(ui.item.name);
            $('#phone').val(ui.item.phone);
            $('#email').val(ui.item.email);
            $('#city').val(ui.item.city);
            $('#client-id').val(ui.item.cid);
            console.log(ui.item);
        }
    });
});
