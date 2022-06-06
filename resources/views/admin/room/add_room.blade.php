@extends('admin.layoutes.master')
@section('title', 'Add Room')
@section('subPath', 'Add Room')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="sl-page-title">
                <h5>Add Rooms</h5><br>
            </div><!-- sl-page-title -->
            <div class="card pd-20 pd-sm-40">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Room </h3>
                </div><br>
                <!-- /.box-header -->

                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.store_room') }}">
                            @csrf
                            @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5 for="exampleFormControlSelect1">Select Hotel</h5>
                                        <select class="form-control" id="exampleFormControlSelect1" name="hotel_id">
                                            <option selected value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5 for="exampleFormControlSelect1">Select Branch</h5>
                                        <select class="form-control" id="exampleFormControlSelect1" name="branch_id">
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('branch_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Room Name</h5>
                                        <div class="controls">
                                            <input type="text" name="room_name" value="{{ old('room_name') }}"
                                                class="form-control">
                                        </div>
                                        @error('room_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Description</h5>
                                        <div class="controls">
                                            <input type="text" name="description" value="{{ old('description') }}"
                                                class="form-control">
                                        </div>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Price($)</h5>
                                        <div class="controls">
                                            <input type="number" name="price" required value="{{ old('price') }}"
                                                class="form-control">
                                        </div>
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Type Of Room</h5>
                                        <div class="controls">
                                            <select class="form-control " id="exampleFormControlSelect1" name="type">
                                                <option value="1">Single</option>
                                                <option value="2">Double</option>
                                                <option value="3">Suite</option>
                                            </select>
                                        </div>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Status</h5>
                                        <div class="controls">
                                            <input type="number" name="status" class="form-control" min="1" max="1"
                                                value="1" disabled>
                                        </div>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Coupon</h5>
                                        <div class="controls">
                                            <input type="text" name="coupon" class="form-control">
                                        </div>
                                        @error('coupon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" name="Add" value="Add Branch" class="btn btn-info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div><!-- card -->
    </div>


@endsection
