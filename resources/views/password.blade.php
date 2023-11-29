@extends('partials.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ganti Password</h1>
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
                    <form method="POST" action="{{ route('post_ubah_password') }}">
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
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="typeEmailX-2" required
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">
                                        Password
                                    </label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password_confirm" required id="typePasswordX-2"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Password
                                        Confirm</label>
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
