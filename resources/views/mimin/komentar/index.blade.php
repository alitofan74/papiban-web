@extends('mimin.layout')
@section('komentar', 'active')
@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Komentar Table</h4>
                <button type="button" class="btn btn-primary" style="margin-left:auto" data-toggle="modal" data-target="#addModalKomen">New Komentar</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableKomentar" style="width:100%;">
                        <thead>
                            <tr>
                                <th>UserID</th>
                                <th>TBID</th>
                                <th>Komentar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyKomentar">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<!-- Modal Add -->
<div class="modal fade" id="addModalKomen" tabindex="-1" role="dialog" aria-labelledby="formModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add Komentar</h5>
                <button type="button" class="close removeDataAdd" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formAddKomentar" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    <div class="form-group">
                        <label>UserName</label>
                        <select class="form-control" id="selUser" name="user" required autofocus>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tambal Ban</label>
                        <select class="form-control" id="selTB" name="tb" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Komentar</label>
                        <textarea class="form-control" required name="komentar"></textarea>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataAdd" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="subAddKomentar">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModalKomen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Komentar</h5>
                <button type="button" class="close removeDataDel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formDelKomentar" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    Are you sure to delete this ? <br>
                    <strong id="tkomentar"></strong>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataDel" data-dismiss="modal">No</button>
                    <button id="subDelKomentar" type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- edit modal -->
<div class="modal fade" id="updateModalKomen" tabindex="-1" role="dialog" aria-labelledby="formModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Update Komentar</h5>
                <button type="button" class="close removeDataUpdate" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formUpdateKomentar" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    <div class="form-group">
                        <label>UserName</label>
                        <input type="text" class="form-control" id="edselUser" name="user" required autofocus readonly="true">
                    </div>
                    <div class="form-group">
                        <label>Tambal Ban</label>
                        <input type="text" class="form-control" id="edselTB" name="tb" required readonly="true">
                    </div>
                    <div class="form-group">
                        <label>Komentar</label>
                        <textarea class="form-control" required name="komentar" id="edkomentar"></textarea>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataUpdate" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="subUpdateKomentar">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')

<script>
    console.log(config)

    var lastIndex = 0;

    // Get Data
    function getData() {
        console.log("first");
        firebase.database().ref('komentars/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = [];
            console.log(value)
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push('<tr>\
                <td>' + value.userID + '</td>\
        		<td>' + value.tbID + '</td>\
        		<td>' + value.komentar + '</td>\
        		<td><button data-toggle="modal" data-target="#updateModalKomen" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
        		<button data-toggle="modal" data-target="#deleteModalKomen" class="btn btn-danger removeData" data-id="' + index + '" data-komentar="' + value.komentar + '">Delete</button></td>\
        	</tr>');
                }
                lastIndex = index;
            });
            $('#tbodyKomentar').html(htmls);
            if ($.fn.dataTable.isDataTable('#tableKomentar')) {
                $('#tableKomentar').DataTable();
            } else {
                $('#tableKomentar').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'print'
                    ]
                });
            }
        });
    }

    function getUser() {
        firebase.database().ref('users/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = ['<option value="">UserID belum dipilih</option>'];
            console.log(value)
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push('<option value="' + index + '">' + value.full_name + '</option>');
                }
            });
            $('#selUser').html(htmls);
        });
    }

    function getTB() {
        firebase.database().ref('tambalban/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = ['<option value="">TBID belum dipilih</option>'];
            console.log(value)
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push('<option value="' + index + '">' + value.nama + '</option>');
                }
            });
            $('#selTB').html(htmls);
        });
    }

    getData();
    getUser();
    getTB();

    // Add Data
    $('#formAddKomentar').on('submit', function() {
        var values = $("#formAddKomentar").serializeArray();
        var user = values[0].value;
        var tb = values[1].value;
        var komentar = values[2].value;

        console.log(values);
        ref = firebase.database().ref('komentars');
        console.log(ref)
        key = ref.push().getKey();
        console.log(key)

        firebase.database().ref('komentars/' + key).set({
            userID: user,
            tbID: tb,
            komentar: komentar,
            created_time: Date.now()
        })
        $("#formAddKomentar input").val("");
        $("#formAddKomentar")[0].reset();
        iziToast.success({
            title: 'Success!',
            message: 'Successfully Add Komentar',
            position: 'topRight'
        });
        $("#addModalKomen").modal('hide');
        $('#tableKomentar').dataTable().fnDestroy();
        $('#tbodyKomentar').html("");
        getData();
        return false;
    });

    console.log(firebase.auth().currentUser);

    $('.removeDataAdd').click(function() {
        $("#formAddKomentar input").val("");
        $("#formAddKomentar")[0].reset();
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function() {
        console.log("aaaaaa");
        updateID = $(this).attr('data-id');
        firebase.database().ref('komentars/' + updateID).on('value', function(snapshot) {
            var values = snapshot.val();
            console.log(updateID)
            console.log(values)
            $('body').find("#edkomentar").val(values.komentar);
            $('body').find("#edselUser").val(values.userID);
            $('body').find("#edselTB").val(values.tbID);
        });
    });


    $('#formUpdateKomentar').on('submit', function() {
        var values = $("#formUpdateKomentar").serializeArray();
        console.log(values)
        var postData = {
            userID: values[0].value,
            tbID: values[1].value,
            komentar: values[2].value,
            created_time: Date.now()
        };

        var updates = {};
        updates['/komentars/' + updateID] = postData;

        firebase.database().ref().update(updates);

        iziToast.success({
            title: 'Success!',
            message: 'Successfully Update Komentar',
            position: 'topRight'
        });
        $("#updateModalKomen").modal('hide');
        $('#tableKomentar').dataTable().fnDestroy();
        $('#tbodyKomentar').html("");
        getData();
        return false;
    });

    $('.removeDataUpdate').click(function() {
        $("#formUpdateKomentar input").val("");
        $("#formUpdateKomentar")[0].reset();
    });

    // Remove Data
    $("body").on('click', '.removeData', function() {
        var id = $(this).attr('data-id');
        var komentar = $(this).attr('data-komentar');
        console.log(id, komentar)
        $('body').find('#tkomentar').html(komentar);
        $('body').find('#formDelKomentar').append('<input name="id" type="hidden" value="' + id + '">');
    });

    $('#formDelKomentar').on('submit', function() {
        var values = $("#formDelKomentar").serializeArray();
        var id = values[0].value;
        console.log(id);
        firebase.database().ref('komentars/' + id).remove();
        $('body').find('#formDelKomentar').find("input").remove();
        iziToast.success({
            title: 'Success!',
            message: 'Successfully Delete Komentar',
            position: 'topRight'
        });
        $("#deleteModalKomen").modal('hide');
        $('#tableKomentar').dataTable().fnDestroy();
        $('#tbodyKomentar').html("");
        getData();
        return false;
    });
    $('.removeDataDel').click(function() {
        $('body').find('#formDelKomentar').find("input").remove();
        $("#formDelKomentar input").val("");
        $("#formDelKomentar")[0].reset();
    });
</script>
@endsection