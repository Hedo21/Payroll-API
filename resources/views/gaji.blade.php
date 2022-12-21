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
            <h2><a class="navbar-brand mb-0 h1 me-4" href="#">Payroll</a></h2>
            <button class="navbar-toggler" type="button" data-coreui-toggle="collapse" data-coreui-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/karyawan/list">Karyawan</a>
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
            Gaji Karyawan
        </H1>
        <br>
        <a class="btn btn-dark" href="javascript:void(0)" id="btn-tambah-kopi">Tambah Daftar Gaji</a>
        <br><br>
        <table class="table table-striped table-hover table-borderless data-table" id="table-kopi">
            <thead class="table-secondary">
                <tr>
                    <th class="align-middle text-center">No.</th>
                    <th class="align-middle text-center">id gaji</th>
                    <th class="align-middle text-center">karyawan</th>
                    <th class="align-middle text-center">id uang makan</th>
                    <th class="align-middle text-center">gaji basic</th>
                    <th class="align-middle text-center">slip gaji</th>
                    <th class="align-middle text-center">pensiun</th>
                    <th class="align-middle text-center">dana lain</th>
                    <th class="align-middle text-center">Action</th>
                </tr>
            </thead>
            <tbody>

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
                            <label for="name" class="col-sm-2 control-label">Nama_Karyawan</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_karyawan">
                                    @foreach ($karyawans as $item)
                                    <option value="{{$item->id_karyawan}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">id_uang_makan</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="id_uang_makan" placeholder="id_uang_makan"
                                    value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">gaji basic</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="gaji_basic" placeholder="Gaji Basic"
                                    value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">slip gaji</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="slip_gaji" placeholder="slip gaji" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">pensiun</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="pensiun" placeholder="pensiun" value=""
                                    maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">dana lain</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="dana_lain" placeholder="dana_lain" value=""
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
                            <label for="name" class="col-sm-2 control-label">Nama_Karyawan</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_karyawan_update">
                                    @foreach ($karyawans as $item)
                                    <option value="{{$item->id_karyawan}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">id_uang_makan</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="id_uang_makan_update"
                                    placeholder="id_uang_makan" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">gaji basic</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="gaji_basic_update" placeholder="Gaji Basic"
                                    value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">slip gaji</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="slip_gaji_update" placeholder="slip gaji"
                                    value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">pensiun</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="pensiun_update" placeholder="pensiun"
                                    value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">dana lain</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="dana_lain_update" placeholder="dana_lain"
                                    value="" maxlength="50" required="">
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
                ajax: "{{ url('/gaji/list/yajra') }}",
                columns: [
                    {data: null,"sortable": false,
                        render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        }  
                    },
                    {data: 'id_gaji', name: 'id_gaji'},
                    {data: 'nama_karyawan.nama', name: 'nama_karyawan.nama'},
                    {data: 'id_uang_makan', name: 'id_uang_makan'},
                    {data: 'gaji_basic', name: 'gaji_basic'},
                    {data: 'slip_gaji', name: 'slip_gaji'},
                    {data: 'pensiun', name: 'pensiun'},
                    {data: 'dana_lain', name: 'dana_lain'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });

            //Action Tambah 
            $('body').on('click', '#btn-tambah-kopi',function(){
                $('#modal-create').modal('show');
            });
            $('#btn-save').click(function(e){
                e.preventDefault();
                var id_karyawan   = $('#id_karyawan').val();
                var id_uang_makan = $('#id_uang_makan').val();
                var gaji_basic    = $('#gaji_basic').val();
                var slip_gaji     = $('#slip_gaji').val();
                var pensiun       = $('#pensiun').val();
                var dana_lain     = $('#dana_lain').val();
                var token         = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url       : "{{ url('/gaji/list/tambah') }}",
                    type      : "POST",
                    cache     : false,
                    datatype  : "json",
                    data      : {
                        "id_karyawan"  : id_karyawan,
                        "id_uang_makan": id_uang_makan,
                        "gaji_basic"   : gaji_basic,
                        "slip_gaji"    : slip_gaji,
                        "pensiun"      : pensiun,
                        "dana_lain"    : dana_lain,
                        "_token"       : token,
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
                    url: `{{URL('gaji/list/id/${post_id}')}}`,
                    type: "GET",
                    cache: false,
                    success:function(response){
                        $('#post_id').val(response.data.id_gaji);
                        $('#id_karyawan_update').val(response.data.id_karyawan);
                        $('#id_uang_makan_update').val(response.data.id_uang_makan);
                        $('#gaji_basic_update').val(response.data.gaji_basic);
                        $('#slip_gaji_update').val(response.data.slip_gaji);
                        $('#pensiun_update').val(response.data.pensiun);
                        $('#dana_lain_update').val(response.data.dana_lain);
                        $('#modal-update').modal('show');
                    }
                });
            });
            $('#btn-save-update').click(function(e){
                e.preventDefault();
                //definisi variable
                var post_id       = $('#post_id').val();
                var id_karyawan   = $('#id_karyawan_update').val();
                var id_uang_makan = $('#id_uang_makan_update').val();
                var gaji_basic    = $('#gaji_basic_update').val();
                var slip_gaji     = $('#slip_gaji_update').val();
                var pensiun       = $('#pensiun_update').val();
                var dana_lain     = $('#dana_lain_update').val();

                $.ajax({
                    url  : `{{URL('/gaji/list/update/${post_id}')}}`,
                    type : "PUT",
                    cache: false,
                    data : {
                        "id_karyawan"  : id_karyawan,
                        "id_uang_makan": id_uang_makan,
                        "gaji_basic"   : gaji_basic,
                        "slip_gaji"    : slip_gaji,
                        "pensiun"      : pensiun,
                        "dana_lain"    : dana_lain,
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
                            url: `{{URL('/gaji/list/delete/${post_id}')}}`,
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