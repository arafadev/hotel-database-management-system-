@extends('admin.layoutes.master')
@section('title', 'Branches')
@section('subPath', 'Branches')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="sl-page-title">
                <h5>Branche Table</h5>
            </div><!-- sl-page-title -->
            <div class="card pd-20 pd-sm-40">
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Hotel</th>
                                <th class="wd-15p">Branch Name</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-10p">Created At</th>
                                <th class="wd-10p">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($branches as $branch)
                                <tr>
                                    <td>{{ $branch->hotel->name }}</td>
                                    <td>{{ $branch->branch_name }}</td>
                                    <td>
                                        @if ($branch->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">InActive</span>
                                        @endif
                                    </td>

                                    <td>{{ Carbon\Carbon::parse($branch->created_at)->format('D, d F Y') }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary " data-toggle="modal" data-target="#modaldemo1"
                                            title="Show"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-info" title="Edit Data"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.branch_delete', $branch->id) }}" id="delete"
                                            class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>

                                        @if ($branch->status == 1)
                                            <a href="{{ route('admin.branch_inactive', $branch->id) }}"
                                                class="btn btn-warning " title="Inactive Now"><i
                                                    class="fa fa-arrow-down"></i></a>
                                        @else
                                            <a href="{{ route('admin.branch_active', $branch->id) }}"
                                                class="btn btn-success " title="Active Now"><i
                                                    class="fa fa-arrow-up"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Branche</h3>
                </div><br>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.add_branch') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5 for="exampleFormControlSelect1">Hotel select</h5>
                                        <select class="form-control" id="exampleFormControlSelect1" name="hotel_id">
                                            <option selected value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <h5>Branch Name</h5>
                                        <div class="controls">
                                            <input type="text" name="branch_name" value="{{ old('branch_name') }}"
                                                class="form-control">
                                        </div>
                                        @error('branch_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Status</h5>
                                        <div class="controls">
                                            <input type="number" name="status" class="form-control" min="0" max="1"
                                                value="1">
                                            <div class="help-block"></div>
                                        </div>

                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="Add" value="Add Branch" class="btn btn-info">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
    <div id="modaldemo1" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Branch</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <form method="post" action="{{ route('admin.add_branch') }}">
                        @csrf
                        <div class="form-group">
                            <h5 for="exampleFormControlSelect1">Hotel select</h5>
                            <select class="form-control" id="exampleFormControlSelect1" name="hotel_id">
                                <option selected value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Branch Name</h5>
                            <div class="controls">
                                <input type="text" name="branch_name" value="{{ old('branch_name') }}"
                                    class="form-control">
                            </div>
                            @error('branch_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Status</h5>
                            <div class="controls">
                                <input type="number" name="status" class="form-control" min="0" max="1" value="1">
                                <div class="help-block"></div>
                            </div>

                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-info pd-x-20">Edit Branch</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection
