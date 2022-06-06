@extends('admin.layoutes.master')
@section('title', 'Hotel View')

@section('content')
    <div class="col-md-12">
        <div class="card" style="width:400px">
            <div class="card-body">
                <h4 class="card-title">{{ $hotel->name }}</h4>
                <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
            </div>
        </div>
    </div>
@endsection
