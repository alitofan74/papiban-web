@extends('mimin.layout')
@section('member', 'active')
@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Member Table</h4>
                <button type="button" class="btn btn-primary" style="margin-left:auto" data-toggle="modal" data-target="#addModal">New Member</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableMember" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="formModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formAddMember" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Full Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Full Name" name="fullname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="User Name" name="username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="subAddMember">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                <button type="button" class="close removeDataDel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formDelMember" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    Are you sure to delete this ? <br>
                    <strong id="fullName"></strong>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataDel" data-dismiss="modal">No</button>
                    <button id="subDelMember" type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- edit modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="formModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Update Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formUpdateMember" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Full Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="edfullname" placeholder="Full Name" name="fullname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="edusername" placeholder="User Name" name="username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="email" class="form-control" id="edemail" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control" id="edpassword" placeholder="Password" name="password" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="subUpdateMember">Save</button>
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
        firebase.database().ref('users/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = [];
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push('<tr>\
                <td>' + value.full_name + '</td>\
        		<td>' + value.user_name + '</td>\
        		<td>' + value.email + '</td>\
        		<td><button data-toggle="modal" data-target="#updateModal" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
        		<button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger removeData" data-id="' + index + '" data-fullname="' + value.full_name + '">Delete</button></td>\
        	</tr>');
                }
                lastIndex = index;
            });
            $('#tbody').html(htmls);
            if ($.fn.dataTable.isDataTable('#tableMember')) {
                $('#tableMember').DataTable();
            } else {
                $('#tableMember').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'print'
                    ]
                });
            }
        });
    }

    getData();

    // Add Data
    $('#formAddMember').on('submit', function() {
        var values = $("#formAddMember").serializeArray();
        var fullname = values[0].value;
        var username = values[1].value;
        var email = values[2].value;
        var password = values[3].value;

        console.log(values);
        ref = firebase.database().ref('users');
        console.log(ref)
        key = ref.push().getKey();
        console.log(key)
        firebase.database().ref('users/' + key).set({
            full_name: fullname,
            user_name: username,
            password: password,
            email: email,
            foto: "http://shyntadarmawan.000webhostapp.com/assets/user.png",
            created_time : Date.now()
        })
        $("#formAddMember input").val("");
        iziToast.success({
            title: 'Success!',
            message: 'Successfully Add Member',
            position: 'topRight'
        });
        $("#addModal").modal('hide');
        $('#tableMember').dataTable().fnDestroy();
        $('#tbody').html("");
        getData();
        return false;
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function() {
        updateID = $(this).attr('data-id');
        firebase.database().ref('users/' + updateID).on('value', function(snapshot) {
            var values = snapshot.val();
            console.log(updateID)
            console.log(values)
            $('body').find("#edemail").val(values.email);
            $('body').find("#edusername").val(values.user_name);
            $('body').find("#edfullname").val(values.full_name);
            $('body').find("#edpassword").val(values.password);
        });
    });


    $('#formUpdateMember').on('submit', function() {
        var values = $("#formUpdateMember").serializeArray();
        var postData = {
            full_name: values[0].value,
            user_name: values[1].value,
            email: values[2].value,
            password: values[3].value,
            foto: "http://shyntadarmawan.000webhostapp.com/assets/user.png",
            created_time : Date.now()
        };

        var updates = {};
        updates['/users/' + updateID] = postData;

        firebase.database().ref().update(updates);

        iziToast.success({
            title: 'Success!',
            message: 'Successfully Update Member',
            position: 'topRight'
        });
        $("#updateModal").modal('hide');
        $('#tableMember').dataTable().fnDestroy();
        $('#tbody').html("");
        getData();
        return false;
    });

    // Remove Data
    $("body").on('click', '.removeData', function() {
        var id = $(this).attr('data-id');
        var fullName = $(this).attr('data-fullname');
        console.log(id, fullName)
        $('body').find('#fullName').html(fullName);
        $('body').find('#formDelMember').append('<input name="id" type="hidden" value="' + id + '">');
    });

    $('#formDelMember').on('submit', function() {
        var values = $("#formDelMember").serializeArray();
        var id = values[0].value;
        console.log(id);
        firebase.database().ref('users/' + id).remove();
        $('body').find('#formDelMember').find("input").remove();
        iziToast.success({
            title: 'Success!',
            message: 'Successfully Delete Member',
            position: 'topRight'
        });
        $("#deleteModal").modal('hide');
        $('#tableMember').dataTable().fnDestroy();
        $('#tbody').html("");
        getData();
        return false;
    });
    $('.removeDataDel').click(function() {
        $('body').find('#formDelMember').find("input").remove();
    });
</script>
@endsection