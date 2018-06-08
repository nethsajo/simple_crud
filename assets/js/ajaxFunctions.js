var url = '../class/functions.php';

function modal_add_guest() {
    $('#modal_guests').modal('show');
    $('#data-submit--guests').html('Add Guest');
    $('#modal_guests').find($('#guest_id')).val('');
    $('#modal_guests').find($('#guest_firstname')).val('');
    $('#modal_guests').find($('#guest_lastname')).val('');
    $('#modal_guests').find($('#guest_email')).val('');
    $('#modal_guests').find($('#guest_address')).val('');
    $('#modal_guests').find($('#guest_contact')).val('');
}

//Add Guests
function add_guests() {
    $("#data-submit--guests").click(function(e){
        e.preventDefault();
        var data = {
            action : 'Guests',
            guest_firstname : $("#guest_firstname").val(), guest_lastname : $("#guest_lastname").val(), 
            guest_email : $("#guest_email").val(), guest_address : $("#guest_address").val(), 
            guest_contact : $("#guest_contact").val(), guest_id : $("#guest_id").val()
        };
        $("#data-submit--guests").html("Please Wait");

        $.ajax({
            type: 'POST', url: url, data: data, cache: false, dataType: 'json',
            success:function(data) {
                successful(data.success,data.bgcolor,data.color,data.message);
                show_guests();
                $('#modal_guests').modal('hide');
            }
        });
    });
}

function show_guests() {
    var data = { action : 'Show Guests Table' };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false,
        success:function(data) {
            if ($.fn.DataTable.isDataTable('#show-g-table')){
                $('#show-g-table').DataTable().destroy();
            };
            $('#show_guests_table').html(data);
            
            $('#show-g-table').DataTable({
                responsive: true,
                ordering: false
            });
        }
    });
}

function edit_guest_by_id(id) {
    var data = { action : 'Get Guest By Id', guest_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false, dataType: 'json',
        success:function(data) {
            $('#modal_guests').modal('show');
            $('#modal_guests').find($('#guest_id')).val(id);
            $('#modal_guests').find($('#guest_firstname')).val(data.guest_firstname);
            $('#modal_guests').find($('#guest_lastname')).val(data.guest_lastname);
            $('#modal_guests').find($('#guest_email')).val(data.guest_email);
            $('#modal_guests').find($('#guest_address')).val(data.guest_address);
            $('#modal_guests').find($('#guest_contact')).val(data.guest_contact);
            $('#data-submit--guests').html('Save Changes');
        }
    });
}

function modal_delete_guest(id) {
    $("#modal_delete_guest").modal('show');
    $("#modal_delete_guest").find($("#data-delete--guests")).val(id);
}

function delete_guest_by_id(id) {
    $("#data-delete--guests").html("Please Wait");
    var data = { action : 'Delete Guest By Id', guest_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false, dataType: 'json',
        success:function(data) {
            successful(data.success,data.bgcolor,data.color,data.message);
            show_guests();
            $("#modal_delete_guest").modal('hide');
        }
    });
}

//Custom method if the request was success. 
function successful(data,bgcolor,color,message) {
    data == true ? notify(bgcolor,color,message) : notify(bgcolor,color,message);
}

//Amaran Notification 
function notify(bgcolor,color,message) {
    $.amaran({
        'theme'     : 'colorful', 'content'   : { bgcolor: bgcolor,color: color,message: message },
        'position'  : 'top left', 'outEffect' : 'slideBottom'
    });
}