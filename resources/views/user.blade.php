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
                    <form method="POST" action="{{ route('post_user') }}">
                        @csrf
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="form-outline ">
                                    <input type="text" name="name" id="name" required
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="name">
                                        Name
                                    </label>
                                </div>
                                <div class="form-outline ">
                                    <input type="email" name="email" id="email" required
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="email">
                                        Email
                                    </label>
                                </div>
                                <div class="form-outline ">
                                    <select class="form-control" id="role" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="non-admin">Non Admin</option>
                                    </select>
                                    <label class="form-label" for="role">
                                        Role
                                    </label>
                                </div>
                                <div class="form-outline ">
                                    <input type="password" name="password" id="typeEmailX-2" required
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">
                                        Password
                                    </label>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
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
