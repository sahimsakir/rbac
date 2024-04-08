@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 my-3">
            <div class="card">
                <div class="card-header"><h4>Dashboard</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h6>Welcome {{ Auth::user()->name }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
