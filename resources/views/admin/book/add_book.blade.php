@extends('admin.layoutes.master')
@section('title', 'Add Room')
@section('subPath', 'Add Room')

@section('content')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <div class="row">
        <div class="col-md-12">
            <div class="sl-page-title">
                <h5>Add Book</h5><br>
            </div><!-- sl-page-title -->
            <div class="card pd-20 pd-sm-40">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Book </h3>
                </div><br>
                <!-- /.box-header -->

                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.store_book') }}">
                            @csrf
                            {{-- @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif --}}
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
                                        <h5 for="exampleFormControlSelect1">Select Room</h5>
                                        <select class="form-control" id="exampleFormControlSelect1" name="room_id">
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('room_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>First Name</h5>
                                        <div class="controls">
                                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                                class="form-control">
                                        </div>
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Last Name</h5>
                                        <div class="controls">
                                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                class="form-control">
                                        </div>
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address</h5>
                                        <div class="controls">
                                            <input type="text" name="address" value="{{ old('address') }}"
                                                class="form-control">
                                        </div>
                                        @error('address')
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
                                        <h5>Coupon</h5>
                                        <div class="controls">
                                            <input type="text" name="coupon" value="{{ old('coupon') }}"
                                                class="form-control">
                                        </div>
                                        @error('coupon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Status</h5>
                                        <div class="controls">
                                            <input type="number" name="status" class="form-control" min="0" max="1"
                                                value="0" disabled>
                                        </div>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" name="Add" value="Add Book" class="btn btn-info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div><!-- card -->
    </div>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="branch_id"]').on('change', function() {
                var branch_id = $(this).val();
                if (branch_id) {
                    $.ajax({
                        url: "{{ url('/branch/room/ajax') }}/" + branch_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // $('select[name="subsubcategory_id"]').html('');
                            var d = $('select[name="branch_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="room_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .room_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script> --}}

@endsection
