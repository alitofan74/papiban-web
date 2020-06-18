@extends('mimin.layout')
@section('rating', 'active')
@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Rating Table</h4>
                <button type="button" class="btn btn-primary" style="margin-left:auto" data-toggle="modal" data-target="#addModalKomen">New Rating</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableRating" style="width:100%;">
                        <thead>
                            <tr>
                                <th>UserID</th>
                                <th>TBID</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyRating">
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
                <h5 class="modal-title" id="formModal">Add Rating</h5>
                <button type="button" class="close removeDataAdd" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formAddRating" method="POST" action="#" onsubmit="return false">
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
                        <label>Rating</label>
                        <input type="number" step="0.1" min="0" max="5" class="form-control" required name="rating">
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataAdd" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="subAddRating">Save</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Rating</h5>
                <button type="button" class="close removeDataDel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formDelRating" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    Are you sure to delete this ? <br>
                    <strong id="tRating"></strong>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataDel" data-dismiss="modal">No</button>
                    <button id="subDelRating" type="submit" class="btn btn-primary">Yes</button>
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
                <h5 class="modal-title" id="formModal">Update Rating</h5>
                <button type="button" class="close removeDataUpdate" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formUpdateRating" method="POST" action="#" onsubmit="return false">
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
                        <label>Rating</label>
                        <input type="number" min="0" max="5" step="0.1" class="form-control" required name="rating" id="edRating">
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataUpdate" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="subUpdateRating">Save</button>
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
        firebase.database().ref('ratings/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = [];
            console.log(value)
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push('<tr>\
                <td>' + value.userID + '</td>\
        		<td>' + value.tbID + '</td>\
        		<td>' + value.rating + '</td>\
        		<td><button data-toggle="modal" data-target="#updateModalKomen" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
        		<button data-toggle="modal" data-target="#deleteModalKomen" class="btn btn-danger removeData" data-id="' + index + '" data-rating="' + value.rating + '">Delete</button></td>\
        	</tr>');
                }
                lastIndex = index;
            });
            $('#tbodyRating').html(htmls);
            if ($.fn.dataTable.isDataTable('#tableRating')) {
                $('#tableRating').DataTable();
            } else {
                $('#tableRating').DataTable({
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
                    htmls.push('<option value="' + index + '">' + value.fullname + '</option>');
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
    $('#formAddRating').on('submit', function() {
        var values = $("#formAddRating").serializeArray();
        var user = values[0].value;
        var tb = values[1].value;
        var rating = values[2].value;

        console.log(values);
        ref = firebase.database().ref('ratings');
        console.log(ref)
        key = ref.push().getKey();
        console.log(key)

        firebase.database().ref('ratings/' + key).set({
            userID: user,
            tbID: tb,
            rating: rating,
            createdtime: Date.now()
        })
        $("#formAddRating input").val("");
        $("#formAddRating")[0].reset();
        iziToast.success({
            title: 'Success!',
            message: 'Successfully Add Rating',
            position: 'topRight'
        });
        $("#addModalKomen").modal('hide');
        $('#tableRating').dataTable().fnDestroy();
        $('#tbodyRating').html("");
        getData();
        return false;
    });

    console.log(firebase.auth().currentUser);

    $('.removeDataAdd').click(function() {
        $("#formAddRating input").val("");
        $("#formAddRating")[0].reset();
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function() {
        console.log("aaaaaa");
        updateID = $(this).attr('data-id');
        firebase.database().ref('ratings/' + updateID).on('value', function(snapshot) {
            var values = snapshot.val();
            console.log(updateID)
            console.log(values)
            $('body').find("#edRating").val(values.rating);
            $('body').find("#edselUser").val(values.userID);
            $('body').find("#edselTB").val(values.tbID);
        });
    });


    $('#formUpdateRating').on('submit', function() {
        var values = $("#formUpdateRating").serializeArray();
        console.log(values)
        var postData = {
            userID: values[0].value,
            tbID: values[1].value,
            rating: values[2].value,
            createdtime: Date.now()
        };

        var updates = {};
        updates['/ratings/' + updateID] = postData;

        firebase.database().ref().update(updates);

        iziToast.success({
            title: 'Success!',
            message: 'Successfully Update Rating',
            position: 'topRight'
        });
        $("#updateModalKomen").modal('hide');
        $('#tableRating').dataTable().fnDestroy();
        $('#tbodyRating').html("");
        getData();
        return false;
    });

    $('.removeDataUpdate').click(function() {
        $("#formUpdateRating input").val("");
        $("#formUpdateRating")[0].reset();
    });

    // Remove Data
    $("body").on('click', '.removeData', function() {
        var id = $(this).attr('data-id');
        var rating = $(this).attr('data-rating');
        console.log(id, rating)
        $('body').find('#tRating').html(rating);
        $('body').find('#formDelRating').append('<input name="id" type="hidden" value="' + id + '">');
    });

    $('#formDelRating').on('submit', function() {
        var values = $("#formDelRating").serializeArray();
        var id = values[0].value;
        console.log(id);
        firebase.database().ref('ratings/' + id).remove();
        $('body').find('#formDelRating').find("input").remove();
        iziToast.success({
            title: 'Success!',
            message: 'Successfully Delete Rating',
            position: 'topRight'
        });
        $("#deleteModalKomen").modal('hide');
        $('#tableRating').dataTable().fnDestroy();
        $('#tbodyRating').html("");
        getData();
        return false;
    });
    $('.removeDataDel').click(function() {
        $('body').find('#formDelRating').find("input").remove();
        $("#formDelRating input").val("");
        $("#formDelRating")[0].reset();
    });
</script>
@endsection