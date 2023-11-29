@extends('partials.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Buku</h1>
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
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#tambahModal">Tambah</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>No Buku</th>
                                        <th>Genre</th>
                                        <th>Pengarang</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Stock</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->isbn }}</td>
                                            <td>{{ $book->genre }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->published_at }}</td>
                                            <td>{{ $book->stock }}</td>
                                            <td>
                                                <button class="btn btn-success ubah" data-toggle="modal"
                                                    data-target="#ubahModal" data-id="{{ $book->id }}"
                                                    data-title="{{ $book->title }}" data-isbn="{{ $book->isbn }}"
                                                    data-genre="{{ $book->genre }}"
                                                    data-author="{{ $book->author }}"
                                                    data-stock="{{ $book->stock }}"
                                                    data-published_at="{{ $book->published_at }}">Ubah</button>
                                                <button class="btn btn-danger hapus" data-toggle="modal"
                                                    data-target="#hapusModal" data-id="{{ $book->id }}"
                                                    data-title="{{ $book->title }}">Hapus</button>
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
<form action="{{ url ('book') }}" method="post">
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
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" required name="title">
                    </div>
                    <div class="form-group">
                        <label for="author">Pengarang</label>
                        <select class="form-control" required name="author_id">
                            <option value="">-- Pilih Pengarang --</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->name }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select class="form-control" required name="genre_id">
                            <option value="">-- Pilih Genre --</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="isbn">No Buku</label>
                        <input type="text" class="form-control" required name="isbn">
                    </div>
                    <div class="form-group">
                        <label for="published_at">Tanggal Terbit</label>
                        <input type="date" class="form-control" required name="published_at">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" class="form-control" required name="stock">
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
<form action="{{ url ('book') }}" method="post">
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
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" required name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="author">Pengarang</label>
                        <select class="form-control" required name="author_id" id="author_id">
                            <option value="">-- Pilih Pengarang --</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->name }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select class="form-control" required name="genre_id" id="genre_id">
                            <option value="">-- Pilih Genre --</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="isbn">No Buku</label>
                        <input type="text" class="form-control" required name="isbn" id="isbn">
                    </div>
                    <div class="form-group">
                        <label for="published_at">Tanggal Terbit</label>
                        <input type="date" class="form-control" required name="published_at" id="published_at">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" class="form-control" required name="stock" id="stock">
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
<form action="{{ url ('book') }}" method="post">
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
@endsection

@section('javascript')
<script>
    $('.ubah').click(function () {
        $('#ubah_id').val($(this).data('id'));
        $('#title').val($(this).data('title'));
        $('#author_id').val($(this).data('author'));
        $('#genre_id').val($(this).data('genre'));
        $('#stock').val($(this).data('stock'));
        $('#isbn').val($(this).data('isbn'));
        $('#published_at').val($(this).data('published_at'));
    });
    $('.hapus').click(function () {
        $('#hapus_id').val($(this).data('id'));
        $('#hapusModalLabel').html(`Apakah anda yakin ingin menghapus ${$(this).data('title')}`);
    });

</script>
@endsection
