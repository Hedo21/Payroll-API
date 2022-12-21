<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css" rel="stylesheet"
        integrity="sha384-UkVD+zxJKGsZP3s/JuRzapi4dQrDDuEf/kHphzg8P3v8wuQ6m9RLjTkPGeFcglQU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.min.css'>
    <title>Tampilan Payroll</title>
</head>

<body class="bg-dark bg-opacity-10">
    {{-- navbar --}}
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <h2><a class="navbar-brand" href="#">Payroll</a></h2>
            <button class="navbar-toggler" type="button" data-coreui-toggle="collapse" data-coreui-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active me-2" href="/karyawan/list">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/gaji/list">Gaji</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Tampilan --}}
    <div class="container">
        <br>
        <H1>
            Karyawan
        </H1>
        <br>
        <a class="btn btn-dark" href="javascript:void(0)" id="btn-tambah-kopi">Tambah Karyawan</a>
        <br><br>
        <table class="table table-striped table-hover table-borderless data-table" id="table-kopi">
            <thead class="table-secondary">
                <tr>
                    <th class="align-middle text-center">No.</th>
                    <th class="align-middle text-center">Id Karyawan</th>
                    <th class="align-middle text-center">username</th>
                    <th class="align-middle text-center">password</th>
                    <th class="align-middle text-center">level</th>
                    <th class="align-middle text-center">Nama</th>
                    <th class="align-middle text-center">Alamat</th>
                    <th class="align-middle text-center">Email</th>
                    <th class="align-middle text-center">No. Telpon</th>
                    <th class="align-middle text-center">Absensi</th>
                    <th class="align-middle text-center">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            </tbody>
        </table>
    </div>

    {{-- Form Tambah --}}
    <div class="modal fade" id="modal-create" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="KopiForm" name="KopiForm" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="username" placeholder="username" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="password" placeholder="password" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Level_Karyawan</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="level_karyawan" placeholder="Level Karyawan"
                                    value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama" placeholder="nama" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="alamat" placeholder="alamat" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email" placeholder="email" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">No. Telpon</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="no_telpon" placeholder="no_telpon" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Absensi</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="absensi" placeholder="absensi" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-dark" id="btn-save" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- form update --}}
    <div class="modal fade" id="modal-update" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="post_id">
                    <form id="KopiForm" name="KopiForm" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="username_update" value="" maxlength="50"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="password_update" value="" maxlength="50"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Level Karyawan</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="level_karyawan_update" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_update" value="" maxlength="50"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="alamat_update" value="" maxlength="50"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email_update" value="" maxlength="50"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">No. Telpon</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="no_telpon_update" value="" maxlength="50"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Absensi</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="absensi_update" value="" maxlength="50"
                                    required="">
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-dark" id="btn-save-update" value="create">Save
                                changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js"
        integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //Input DataTable
            var table = $('#table-kopi').DataTable({
                lengthMenu: [
                    [ 5, 10, 20, 50, -1 ],
                    [ '5 rows', '10 rows', '20 rows', '50 rows', 'All' ]
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ url('/karyawan/list/yajra') }}",
                columns: [
                    {data: null,"sortable": false,
                        render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        }  
                    },
                    {data: 'id_karyawan', name: 'id_karyawan'},
                    {data: 'username', name: 'username'},
                    {data: 'password', name: 'password' , visible: false},
                    {data: 'level_karyawan', name: 'level_karyawan'},
                    {data: 'nama', name: 'nama'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'email', name: 'email'},
                    {data: 'no_telpon', name: 'no_telpon'},
                    {data: 'absensi', name: 'absensi'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });

            //Action Tambah 
            $('body').on('click', '#btn-tambah-kopi',function(){
                $('#modal-create').modal('show');
            });
            $('#btn-save').click(function(e){
                e.preventDefault();
                var username       = $('#username').val();
                var password       = $('#password').val();
                var level_karyawan = $('#level_karyawan').val();
                var nama           = $('#nama').val();
                var alamat         = $('#alamat').val();
                var email          = $('#email').val();
                var no_telpon      = $('#no_telpon').val();
                var absensi        = $('#absensi').val();
                var token          = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url       : "{{ url('/karyawan/list/tambah') }}",
                    type      : "POST",
                    cache     : false,
                    datatype  : "json",
                    data      : {
                        "username"      : username,
                        "password"      : password,
                        "level_karyawan": level_karyawan,
                        "nama"          : nama,
                        "alamat"        : alamat,
                        "email"         : email,
                        "no_telpon"     : no_telpon,
                        "absensi"       : absensi,
                        "_token"        : token,
                    },
                    success:function(response){
                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        table.draw();
                        $('#modal-create').modal('hide');
                    }
                });
            });
            
            // Action Update
            $('body').on('click', '#btn-update', function(){
                let post_id = $(this).attr('data-id');
                console.log("ini response " + (post_id));
                $.ajax({
                    url: `{{URL('karyawan/list/id/${post_id}')}}`,
                    type: "GET",
                    cache: false,
                    success:function(response){
                        $('#post_id').val(response.data.id_karyawan);
                        $('#username_update').val(response.data.username);
                        $('#password_update').val(response.data.password);
                        $('#level_karyawan_update').val(response.data.level_karyawan);
                        $('#nama_update').val(response.data.nama);
                        $('#alamat_update').val(response.data.alamat);
                        $('#email_update').val(response.data.email);
                        $('#no_telpon_update').val(response.data.no_telpon);
                        $('#absensi_update').val(response.data.absensi);
                        $('#modal-update').modal('show');
                    }
                });
            });
            $('#btn-save-update').click(function(e){
                e.preventDefault();
                //definisi variable
                var post_id        = $('#post_id').val();
                var username       = $('#username_update').val();
                var password       = $('#password_update').val();
                var level_karyawan = $('#level_karyawan_update').val();
                var nama           = $('#nama_update').val();
                var alamat         = $('#alamat_update').val();
                var email          = $('#email_update').val();
                var no_telpon      = $('#no_telpon_update').val();
                var absensi        = $('#absensi_update').val();

                $.ajax({
                    url  : `{{URL('/karyawan/list/update/${post_id}')}}`,
                    type : "PUT",
                    cache: false,
                    data : {
                        "username"      : username,
                        "password"      : password,
                        "level_karyawan": level_karyawan,
                        "nama"          : nama,
                        "alamat"        : alamat,
                        "email"         : email,
                        "no_telpon"     : no_telpon,
                        "absensi"       : absensi,
                    },
                    success:function(response){
                        console.log(response);
                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        
                        table.draw();
                        
                        $('#modal-update').modal('hide');
                    }
                });
            });

            // Action Delete
            $('body').on('click', '#btn-delete', function(){
                let post_id = $(this).attr('data-id');
                console.log(post_id);
                Swal.fire({
                    title: "Are you sure About That?",
                    text : "Delete this data?",
                    icon : "warning",
                    cancelButtonText: "cancel",
                    showCancelButton: true,
                    confirmButtonText: "continue"
                }).then((result)=> {
                    if (result.isConfirmed){
                        console.log(result);
                        $.ajax({
                            type:'DELETE',
                            url: `{{URL('/karyawan/list/delete/${post_id}')}}`,
                            cache:false,
                            success:function(response){
                                Swal.fire({
                                    type:'success',
                                    icon:'success',
                                    title:`${response.message}`,
                                    showConfirmButton:false,
                                    timer:3000
                                });
                                table.draw();
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>