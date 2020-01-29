@extends('layouts.app')

@section('content')
    @include('partials.errors')
    @include('partials.success')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header text-left">
                        <p><span>Завантаженння файлу Excel</span></p>
                    </div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input type="file" name="select_file" >
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Завантажити">
                                </div>

                            </form>
                            <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
