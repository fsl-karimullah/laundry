@extends('backend.layouts')
@section('title','Customer')
@section('content')
<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
        <a href="{{ route('customer.create') }}" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="tooltip" title="Tambah Data"><i class="fas fa-plus"></i></a>
            <table class="table table-sm table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td><a style="text-decoration: none" href="https://wa.me/{{ $item->phone_number }}?text=*Notifikasi%20|%20*Dua%20Putra%20Laundry*%0a%0aLaundry%20atas%20nama%20*{{ $item->name }}*%0aPesanan%20anda%20telah%20*Selesai*">{{ $item->phone_number }}</a></td>
                            <td>
                                <a href="{{ url('admin/customer/'.$item->id.'/edit') }}"
                                    class="btn btn-success btn-sm shadow-sm"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Edit">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a href="{{ url('admin/customer/'.$item->id.'/destroy') }}"
                                    class="btn btn-danger btn-sm shadow-sm delete-data"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Delete">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('backend/js/sweet-alert.min.js') }}"></script>
<script>
        let table = new DataTable('#myTable');
// $(document).ready(function () {

//     $.fn.dataTable.ext.errMode = 'throw';
//     var $table = $('#customer-table').DataTable({
//          processing: true,
//          serverSide: true,
//          responsive: true,
//          stateSave: true,
//          dom: '<"toolbar">rtp',
//          ajax: '{!! route('customer.source') !!}',
//          columns: [
//             {data: 'DT_RowIndex', name: 'DT_RowIndex',width:"2%", orderable : false},
//             // {data: 'code', name: 'code',width:"5%", orderable : false},
//             {data: 'name', name: 'name',width:"15%", orderable : true},
//             {data: 'phone_number', name: 'phone_number',width:"10%", orderable : false},
//             {data: 'action', name: 'action',width:"5%", orderable : false}
//          ]
//      });

//       $('#customer-table_wrapper > div.toolbar').html('<div class="row">' +
//                 '<div class="col-lg-10">'+
//                     '<div class="input-group mb-3"> ' +
//                         '<input type="text" class="form-control form-control-sm border-0 bg-light" id="search-box" placeholder="Masukkan Kata Kunci"> ' +
//                         '<div class="input-group-append">' +
//                         '<span class="btn btn-sm btn-primary"><i class="fas fa-search"></i></span>' +
//                         '</div>' +
//                     '</div>' +
//                 '</div>'+
//                 '<div class="col-lg-2">'+
//                     '<a href="{{ route("customer.create") }}" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="tooltip" title="Tambah Data"><i class="fas fa-plus"></i></a>'+
//                 '</div>' +
//                 '</div>');

//      $(document).on('keyup','#search-box',function (e) {
//          e.preventDefault();
//          $table.search($(this).val()).draw() ;
//      });


    $('#customer-table').on('click','a.delete-data',function(e) {
        e.preventDefault();
        var delete_link = $(this).attr('href');
        swal({
            title: "Hapus Data ini?",
            text: "",
            icon: "error",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Data anda terhapus");
                    window.location.replace(delete_link);
                } else {
                    swal("Data anda aman");
                }
            });
    });

//     $('body').tooltip({selector: '[data-toggle="tooltip"]'});
// });
</script>
@endpush
