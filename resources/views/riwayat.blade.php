@extends('partials.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Riwayat Peminjaman</h1>
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


@endsection

@section('javascript')
@endsection
