@extends('admin.layoutes.master')
@section('title', 'Booking')
@section('subPath', 'Booking')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="sl-page-title">
                <h5>Booking Table</h5><br>
                <a href="{{ route('admin.add_book') }}" class="btn btn-primary">Add Book</a>
            </div><!-- sl-page-title -->
            <div class="card pd-20 pd-sm-40">
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Hotel</th>
                                <th class="wd-15p">Branch</th>
                                <th class="wd-20p">Room</th>
                                <th class="wd-20p">FirstName</th>
                                <th class="wd-20p">LastName</th>
                                <th class="wd-20p">Address</th>
                                <th class="wd-20p">Price</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-10p">Created At</th>
                                <th class="wd-10p">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($booking as $book)
                                <tr>
                                    <td>{{ $book->hotel->name }}</td>
                                    <td>{{ $book->branch->branch_name }}</td>
                                    <td>{{ $book->room->room_name }}</td>
                                    <td>{{ $book->first_name }}</td>
                                    <td>{{ $book->last_name }}</td>
                                    <td>{{ $book->address }}</td>
                                    <td>{{ $book->price }}</td>
                                   
                                    <td>
                                        @if ($book->status == 1)
                                            <span class="badge badge-pill badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-pill badge-warning">Pending</span>
                                        @endif
                                    </td>

                                    <td>{{ Carbon\Carbon::parse($book->created_at)->format('D, d F Y') }}</td>
                                    <td>
                                 
                                        <a href="{{ route('admin.room_edit', $book->id) }}" class="btn btn-info"
                                            title="Edit Data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.room_delete', $book->id) }}" id="delete"
                                            class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>


    @endsection
