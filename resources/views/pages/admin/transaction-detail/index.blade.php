@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <!--SECTION CONTENT-->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transaksi Detail</h2>
                <p class="dashboard-subtitle">
                  Daftar Transaksi Detail
                </p>
                {{-- <a href="{{ route('exporttransaction') }}" class="btn btn-success">Export Excel</a> --}}
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
                                <th>ID Transaksi</th>
                                <th>Nama Pembeli</th>
                                <th>Nama Produk</th>
                                <th>Kategori Produk</th>
                                <th>Harga</th>
                                <th>Status Pengiriman</th>
                                <th>Resi</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>                          
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
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
      var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
          url:'{!! url()->current() !!}',
        },
        columns:[
          { data: 'id', name: 'id' },
          { data: 'transactions_id', name: 'transactions_id' },
          { data: 'transaction.user.name', name: 'transaction.user.name' },
          { data: 'product.name', name: 'product.name' },
          { data: 'product.category.name', name: 'product.category.name' },
          { data: 'price', name: 'price' },
          { data: 'shipping_status', name: 'shipping_status' },
          { data: 'resi', name: 'resi' },
          { data: 'created_at', name: 'created_at' },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            width: '15%',
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
          { data: 'transactions_id', name: 'transactions_id' },
          { data: 'transaction.user.name', name: 'transaction.user.name' },
          { data: 'product.name', name: 'product.name' },
          { data: 'product.category.name', name: 'product.category.name' },
          { data: 'price', name: 'price' },
          { data: 'shipping_status', name: 'shipping_status' },
          { data: 'resi', name: 'resi' },
          { data: 'created_at', name: 'created_at' },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            width: '15%',
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


@endpush
