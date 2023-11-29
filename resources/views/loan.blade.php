@extends('partials.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peminjaman</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                                Tambah
                            </button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Buku</th>
                                        <th>Peminjam</th>
                                        <th>Tangal pinjam</th>
                                        <th>Tanggal Jatuh Tempo</th>
                                        <th>Tanggal Pengenbalian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($loans as $loan)
                                        <tr>
                                            <td>{{ $loan->book->title }}</td>
                                            <td>{{ $loan->user->name }}</td>
                                            <td>{{ $loan->borrowed_at }}</td>
                                            <td>{{ $loan->due_at }}</td>
                                            <td>{{ $loan->returned_at }}</td>
                                            <td>
                                                <button class="btn btn-success ubah" data-toggle="modal"
                                                    data-target="#ubahModal" data-id="{{ $loan->id }}"
                                                    data-book="{{ $loan->book_id }}"
                                                    data-user="{{ $loan->user_id }}"
                                                    data-due_at="{{ $loan->due_at }}">Ubah</button>
                                                <button class="btn btn-danger hapus" data-toggle="modal"
                                                    data-target="#hapusModal" data-id="{{ $loan->id }}">Hapus</button>
                                                <button class="btn btn-primary pengembalian" data-toggle="modal"
                                                    data-target="#pengembalianModal"
                                                    data-id="{{ $loan->id }}">pengembalian</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<!-- Modal Tambah -->
<form action="{{ url ('loan') }}" method="post">
    @csrf
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user">Peminjam</label>
                        <select class="form-control" required name="user_id">
                            <option value="">-- Pilih User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book">Buku</label>
                        <select class="form-control" required name="book_id">
                            <option value="">-- Pilih Buku --</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="due_at">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" required name="due_at">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Modal ubah -->
<form action="{{ url ('loan') }}" method="post">
    @csrf
    <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahModalLabel">Ubah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" required name="id" id="ubah_id">
                    <div class="form-group">
                        <label for="user">Peminjam</label>
                        <select class="form-control" required name="user_id" id="user_id">
                            <option value="">-- Pilih User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book">Buku</label>
                        <select class="form-control" required name="book_id" id="book_id">
                            <option value="">-- Pilih Buku --</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="due_at">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" required name="due_at" id="due_at">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Modal hapus -->
<form action="{{ url ('loan') }}" method="post">
    @csrf
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Ubah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" required name="id" id="hapus_id">
                    <input type="hidden" required name="hapus" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Modal pengembalian -->
<form action="{{ url ('loan') }}" method="post">
    @csrf
    <div class="modal fade" id="pengembalianModal" tabindex="-1" role="dialog" aria-labelledby="pengembalianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pengembalianModalLabel">Ubah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" required name="id" id="pengembalian_id">
                    <input type="hidden" required name="hapus" value="2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('javascript')
<script>
    $('.ubah').click(function () {
        $('#ubah_id').val($(this).data('id'));
        $('#user_id').val($(this).data('user'));
        $('#book_id').val($(this).data('book'));
        $('#due_at').val($(this).data('due_at'));
    });
    $('.hapus').click(function () {
        $('#hapus_id').val($(this).data('id'));
        $('#hapusModalLabel').html(`Apakah anda yakin ingin menghapus peminjaman ini?`);
    });
    $('.pengembalian').click(function () {
        $('#pengembalian_id').val($(this).data('id'));
        $('#pengembalianModalLabel').html(`Apakah anda yakin ingin melakukan pengembalian?`);
    });

</script>
@endsection
