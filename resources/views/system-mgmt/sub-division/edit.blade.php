@extends('system-mgmt.sub-division.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Sub Division</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('sub-division.update', ['id' => $subdivision->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('sub_division_name') ? ' has-error' : '' }}">
                            <label for="sub_division_name" class="col-md-4 control-label">Sub Division Name</label>

                            <div class="col-md-6">
                                <input id="sub_division_name" type="text" class="form-control" name="sub_division_name" value="{{ $subdivision->sub_division_name }}" required autofocus>

                                @if ($errors->has('sub_division_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_division_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">District</label>
                            <div class="col-md-6">
                                <select class="form-control" name="district_id">
                                    @foreach ($districts as $district)
                                        <option value="{{$district->id}}" {{$district->id == $subdivision->sub_district_id ? 'selected' : ''}} >{{$district->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
