@extends('admin.layoutes.master')
@section('title', 'Rooms')
@section('subPath', 'Rooms')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="sl-page-title">
                <h5>Rooms Table</h5><br>
                <a href="{{ route('admin.add_room') }}" class="btn btn-primary">Add Room</a>
            </div><!-- sl-page-title -->
            <div class="card pd-20 pd-sm-40">
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Hotel</th>
                                <th class="wd-15p">Branch</th>
                                <th class="wd-20p">Room</th>
                                <th class="wd-20p">Price</th>
                                <th class="wd-20p">Type</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-20p">Coupon</th>
                                <th class="wd-10p">Created At</th>
                                <th class="wd-10p">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rooms as $room)
                                <tr>
                                    <td>{{ $room->hotel->name }}</td>
                                    <td>{{ $room->branch->branch_name }}</td>
                                    <td>{{ $room->room_name }}</td>
                                    <td>{{ $room->price }}$</td>
                                    <td>
                                        @if ($room->type == 1)
                                            <span class="badge badge-pill badge-info">Single</span>
                                        @elseif ($room->type == 2)
                                            <span class="badge badge-pill badge-success">Double</span>
                                        @elseif ($room->type == 3)
                                            <span class="badge badge-pill badge-secondary">Suite</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($room->status == 1)
                                            <span class="badge badge-pill badge-success">available</span>
                                        @else
                                            <span class="badge badge-pill badge-warning">Reserved</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($room->coupon == null)
                                            <span class="badge badge-pill badge-danger">Not Available</span>
                                        @else
                                            <span class="badge badge-pill badge-success">{{ $room->coupon }}</span>
                                        @endif
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($room->created_at)->format('D, d F Y') }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary " data-toggle="modal" data-target="#modaldemo1"
                                            title="Show"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('admin.room_edit', $room->id) }}" class="btn btn-info" title="Edit Data"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.room_delete', $room->id) }}" id="delete" class="btn btn-danger" title="Delete Data"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
    

@endsection
