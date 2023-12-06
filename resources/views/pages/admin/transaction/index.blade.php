@extends('layouts.admin')

@section('title')
    Store Dashboard
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transaksi</h2>
            <p class="dashboard-subtitle">
                Daftar Transaksi
            </p>
            {{-- <a href="{{ route('exporttransaction2') }}" class="btn btn-success">Export Excel</a> --}}
            {{-- <div class="row mt-4">
                <div class="col">
                    <form method="POST" class="form-inline">
                        <input type="date" name="tgl-mulai" class="form-control">
                        <input type="date" name="tgl-selesai" class="form-control ml-3">
                        <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
                    </form>
                </div>
            </div> --}}
            <br>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Status Transaksi</th>
                                        <th>Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('addon-script')
    {{-- <script>
        // AJAX DataTablenn
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'user.name', name: 'user.name' },
                { data: 'total_price', name: 'total_price' },
                { data: 'transaction_status', name: 'transaction_status' },
                { data: 'created_at', name: 'created_at' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script> --}}

    <script type="text/javascript">
    $(document).ready(function () {
        $('#crudTable').DataTable({
          
            dom: 'Bfrtip',
            buttons: ['excel', 'print'],
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            processing: true,
            serverSide: true,
            "bPaginate": false,
            ordering: true,
            ajax: {
            url:'{!! url()->current() !!}',
        },
        columns:[
          { data: 'id', name: 'id' },
                { data: 'user.name', name: 'user.name' },
                { data: 'total_price', name: 'total_price' },
                { data: 'transaction_status', name: 'transaction_status' },
                { data: 'created_at', name: 'created_at' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
        ]
        });
    });
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    {{-- <script>
        
                if(isset($_POST['filter_tgl'])){
                    $mulai = mysqli_real_escape_string($_POST['tgl_mulai']);
                    $selesai = mysqli_real_escape_string($_POST['tgl_selesai']);
                    $data = mysqli_query("SELECT * FROM transactions WHERE created_at BETWEEN '$mulai' AND '$selesai'");
                }elseif {
                    $data = mysqli_query("SELECT * FROM transactions");
                }
            
    </script> --}}
@endpush
