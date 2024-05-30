@extends('admin.layouts.main')
@section('container')
<style>
    #hvt:hover {
        transform: scale(3.5);
    }
</style>



<div class="row">
    @if (Session::has('message'))
    <div class="col-sm-12">
        <div class="alert alert-{{ Session::get('type') }} alert-dismissible fade show" role="alert">
            @if (Session::get('type') == 'danger') <i class="mdi mdi-block-helper me-2"></i> @else <i class="mdi mdi-check-all me-2"></i> @endif
            {{ __(Session::get('message')) }}
            <button type="button" class="btn-close alert-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <div class="col-sm-12 message"></div>
    <div class="col-sm-12 mb-2">
        @can('Gallery-Create')
        <a href="{{route('gallery.add')}}" class="btn btn-xs btn-success float-right add">Add Gallery</a>
        @endcan
        @can('Gallery-View')
        <a href="{{route('gallery.list')}}" class="btn btn-xs btn-primary float-right add">All Gallery</a>
        @endcan
        @can('Gallery-Delete')
        <a href="{{route('gallery.list.trashed')}}" class="btn btn-xs btn-danger float-right add">Trash</a>
        @endcan
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="gallery" class="table table-bordered data-table wrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th width="5%">Image</th>
                            <th width="10%">Deleted At</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection

@push('customScripts')
<script type="text/javascript">
    var form = $(".form");

    $(function() {
        var table = $('#gallery').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: "{{route('gallery.list.trashed')}}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'desc',
                    name: 'desc'
                },
                {
                    data: 'image',
                    name: 'image'
                },


                {
                    data: 'deleted_at',
                    name: 'deleted_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            responsive: true,
            'createdRow': function(row, data, dataIndex) {
                $(row).attr('id', data.id);
            },
            "order": [
                [0, "desc"]
            ],
            "bDestroy": true,
        });

        // destroy ajax
        $(document).on('click', '.btn-destroy', function() {

            var formData = form.serialize();

            var updateId = form.find('input[name="id"]').val();
            var id = $(this).data('id')
            var el = $(this)
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, destroy it!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ms-2 mt-2",
                buttonsStyling: !1
            }).then(function(t) {
                if (t.value) {
                    console.log(el);
                    if (!id) return;
                    $.ajax({
                        url: route('gallery.destroy'),
                        type: "POST",
                        data: {
                            id: id
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            if($.isEmptyObject(data.error)){
                                let table = $('#gallery').DataTable();
                                table.row('#' + id).remove().draw(false)
                                showMsg("success", data.message);
                            }else{
                                printErrorMsg(data.error);
                            }
                        }
                    });
                }
            })
        });
    });
    // delete ajax

    $(document).on("click", ".restore", function(event) {
        var id = $(this).data('id');
        $.ajax({
            url: "{{route('gallery.restore')}}",
            type: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                let result = JSON.parse(data);
                $('.message').html('<div class="alert alert-' + result.type +
                    ' alert-dismissible fade show" role="alert"><i class="mdi ' + result.icon +
                    ' me-2"></i>' + result.message +
                    '<button type="button" class="btn-close alert-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>'
                );

                let table = $('.data-table').DataTable();
                table.row('#' + id).remove().draw(false);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>

@endpush
