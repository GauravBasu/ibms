@extends('system-mgmt.sub-division.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Sub Division</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('sub-division.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('subdivision') ? ' has-error' : '' }}">
                            <label for="subdivision" class="col-md-4 control-label">Sub Division Name</label>

                            <div class="col-md-6">
                                <input id="subdivision" type="text" class="form-control" name="subdivision" value="{{ old('subdivision') }}" required autofocus>

                                @if ($errors->has('subdivision'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subdivision') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">District</label>
                            <div class="col-md-6">
                               <select class="form-control" name="district_id" id="district_id">
                                @foreach ($districts as $district)
                                    <option value="{{$district->id}}">{{$district->district_name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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
