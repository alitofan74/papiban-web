@extends('mimin.layout')
@section('tambalban', 'active')
@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambal Ban Table</h4>
                <button type="button" class="btn btn-primary" style="margin-left:auto" data-toggle="modal" data-target="#addModalTB">New Tambal Ban</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableTambalBan" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Tubles</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbodytb">
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
<div class="modal fade" id="addModalTB" tabindex="-1" role="dialog" aria-labelledby="formModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add Tambal Ban</h5>
                <button type="button" class="close removeDataAdd" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formAddTambalBan" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Tambal Ban</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-store-alt"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nama Tambal Ban" name="nama" autofocus required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Tambal Ban</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-map"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Alamat Tambal Ban" name="alamat" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Jam Buka</label>
                            <div class="input-group">
                                <input type="time" class="form-control" placeholder="Jam Buka" name="jambuka" required>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>Jam Tutup</label>
                            <div class="input-group">
                                <input type="time" class="form-control" placeholder="Jam Tutup" name="jamtutup" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Latitude</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Latitude" name="latitude" required>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>Longitude</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Longitude" name="longitude" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status" class="custom-control-input" id="statustb">
                            <label class="custom-control-label" for="statustb">Aktif</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="tubles" class="custom-control-input" id="tublestb">
                            <label class="custom-control-label" for="tublestb">Tubles</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataAdd" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="subAddTambalBan">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModalTB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Tambal Ban</h5>
                <button type="button" class="close removeDataDel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formDelTambalBan" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    Are you sure to delete this ? <br>
                    <strong id="delNama"></strong>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataDel" data-dismiss="modal">No</button>
                    <button id="subDelTambalBan" type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- edit modal -->
<div class="modal fade" id="updateModalTB" tabindex="-1" role="dialog" aria-labelledby="formModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Update Tambal Ban</h5>
                <button type="button" class="close removeDataUpdate" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="formUpdateTambalBan" method="POST" action="#" onsubmit="return false">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Tambal Ban</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-store-alt"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nama Tambal Ban" name="nama" required id="ednama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Tambal Ban</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-map"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Alamat Tambal Ban" name="alamat" required id="edalamat">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Jam Buka</label>
                            <div class="input-group">
                                <input type="time" class="form-control" placeholder="Jam Buka" name="jambuka" required id="edjambuka">
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>Jam Tutup</label>
                            <div class="input-group">
                                <input type="time" class="form-control" placeholder="Jam Tutup" name="jamtutup" required id="edjamtutup">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Latitude</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Latitude" name="latitude" required id="edlatitude">
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>Longitude</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Longitude" name="longitude" required id="edlongitude">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status" class="custom-control-input" id="edstatustb">
                            <label class="custom-control-label" for="statustb">Aktif</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="tubles" class="custom-control-input" id="edtublestb">
                            <label class="custom-control-label" for="tublestb">Tubles</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary removeDataUpdate" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="subUpdateTambalBan">Save</button>
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
        firebase.database().ref('tambalban/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = [];
            console.log(value)
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push('<tr>\
                <td>' + value.nama + '</td>\
                <td>' + value.alamat + '</td>\
        		<td>' + value.jambuka + ' - ' + value.jamtutup + '</td>\
                <td><div class="badge badge-light">' + value.status + '</div></td>\
                <td><div class="badge badge-light">' + value.tubles + '</div></td>\
        		<td>' + value.latitude + '</td>\
                <td>' + value.longitude + '</td>\
        		<td><button data-toggle="modal" data-target="#updateModalTB" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
        		<button data-toggle="modal" data-target="#deleteModalTB" class="btn btn-danger removeData" data-id="' + index + '" data-nama="' + value.nama + '">Delete</button></td>\
        	</tr>');
                }
                lastIndex = index;
            });
            $('#tbodytb').html(htmls);
            if ($.fn.dataTable.isDataTable('#tableTambalBan')) {
                $('#tableTambalBan').DataTable();
            } else {
                $('#tableTambalBan').DataTable({
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
    $('#formAddTambalBan').on('submit', function() {
        var values = $("#formAddTambalBan").serializeArray();
        console.log(values);
        var nama = values[0].value;
        var alamat = values[1].value;
        var jambuka = values[2].value;
        var jamtutup = values[3].value;
        var latitude = values[4].value;
        var longitude = values[5].value;
        var status = $('#statustb').is(":checked");
        var tubles = $('#tublestb').is(":checked");

        console.log($('#statustb').is(":checked"));
        console.log($('#tublestb').is(":checked"));

        ref = firebase.database().ref('tambalban');
        console.log(ref)
        key = ref.push().getKey();
        console.log(key)
        firebase.database().ref('tambalban/' + key).set({
            nama: nama,
            alamat: alamat,
            jambuka: jambuka,
            jamtutup: jamtutup,
            latitude: latitude,
            longitude: longitude,
            status: status,
            tubles: tubles,
            fotobengkel: "http://shyntadarmawan.000webhostapp.com/assets/tb1.jpg",
            created_time: Date.now()
        })
        $("#formAddTambalBan input").val("");
        $("#formAddTambalBan")[0].reset();
        iziToast.success({
            title: 'Success!',
            message: 'Successfully Add Tambal Ban',
            position: 'topRight'
        });
        $("#addModalTB").modal('hide');
        $('#tableTambalBan').dataTable().fnDestroy();
        $('#tbodytb').html("");
        getData();
        return false;
    });

    $('.removeDataAdd').click(function() {
        $("#formAddTambalBan input").val("");
        $("#formAddTambalBan")[0].reset();
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function() {
        console.log("aaaaaa");
        updateID = $(this).attr('data-id');
        firebase.database().ref('tambalban/' + updateID).on('value', function(snapshot) {
            var values = snapshot.val();
            console.log(updateID)
            console.log(values)
            $('body').find("#ednama").val(values.nama);
            $('body').find("#edalamat").val(values.alamat);
            $('body').find("#edjambuka").val(values.jambuka);
            $('body').find("#edjamtutup").val(values.jamtutup);
            $('body').find("#edlatitude").val(values.latitude);
            $('body').find("#edlongitude").val(values.longitude);
            $('body').find("#edstatustb").prop('checked', values.status);
            $('body').find("#edtublestb").prop('checked', values.tubles);
        });
    });


    $('#formUpdateTambalBan').on('submit', function() {
        var values = $("#formUpdateTambalBan").serializeArray();
        var postData = {
            nama: values[0].value,
            alamat: values[1].value,
            jambuka: values[2].value,
            jamtutup: values[3].value,
            latitude: values[4].value,
            longitude: values[5].value,
            status: $('#edstatustb').is(":checked"),
            tubles: $('#edtublestb').is(":checked"),
            fotobengkel: "http://shyntadarmawan.000webhostapp.com/assets/tb1.jpg",
            created_time: Date.now()
        };

        var updates = {};
        updates['/tambalban/' + updateID] = postData;

        firebase.database().ref().update(updates);
        $("#formUpdateTambalBan input").val("");
        $("#formUpdateTambalBan")[0].reset();
        iziToast.success({
            title: 'Success!',
            message: 'Successfully Update Tambal Ban',
            position: 'topRight'
        });
        $("#updateModalTB").modal('hide');
        $('#tableTambalBan').dataTable().fnDestroy();
        $('#tbodytb').html("");
        getData();
        return false;
    });

    $('.removeDataUpdate').click(function() {
        $("#formUpdateTambalBan input").val("");
        $("#formUpdateTambalBan")[0].reset();
    });

    // Remove Data
    $("body").on('click', '.removeData', function() {
        var id = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        console.log(id, nama)
        $('body').find('#delNama').html(nama);
        $('body').find('#formDelTambalBan').append('<input name="id" type="hidden" value="' + id + '">');
    });

    $('#formDelTambalBan').on('submit', function() {
        var values = $("#formDelTambalBan").serializeArray();
        var id = values[0].value;
        console.log(id);
        firebase.database().ref('tambalban/' + id).remove();
        $('body').find('#formDelTambalBan').find("input").remove();
        iziToast.success({
            title: 'Success!',
            message: 'Successfully Delete Tambal Ban',
            position: 'topRight'
        });
        $("#deleteModalTB").modal('hide');
        $('#tableTambalBan').dataTable().fnDestroy();
        $('#tbodytb').html("");
        getData();
        return false;
    });
    $('.removeDataDel').click(function() {
        $('body').find('#formDelTambalBan').find("input").remove();
        $("#formDelTambalBan input").val("");
        $("#formDelTambalBan")[0].reset();
    });
</script>
@endsection