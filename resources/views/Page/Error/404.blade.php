@extends('Layout.Header')

@section('content')

    <div class="blank-page-area pb-100px pt-100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blank-content-header">
                        <h1>The page you are looking for was not found.</h1>
                    </div>
                    <div class="page-not-found text-center">
                        <h4>Sorry For The Inconvenience.</h4>
                        <p>Search again what you are looking for</p>
                        <a href="{{ route('index') }}">Go To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


@endsection