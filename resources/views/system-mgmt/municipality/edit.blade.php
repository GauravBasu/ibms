@extends('system-mgmt.municipality.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Municipality</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('municipality.update', ['id' => $municipality->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                          <div class="form-group">
                            <label class="col-md-4 control-label">District</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="muni_district_id" id="muni_edit_district_id">
                                        @foreach ($districts as $district)
                                            <option value="{{$district->id}}" {{$district->id == $municipality->muni_district_id ? 'selected' : ''}}>{{$district->district_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                           </div>
                           <div class="form-group">
                            <label class="col-md-4 control-label">Sub Division</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="muni_sub_division_id" id="muni_sub_division_id">
                                        <option value="">--Select--</option>
                                        @foreach ($subdivisions as $subdivision)

                                            <option value="{{$subdivision->id}}" {{$subdivision->id == $municipality->muni_sub_division_id ? 'selected' : ''}}>{{$subdivision->sub_division_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                           </div>

                           <div class="form-group{{ $errors->has('municipality_name') ? ' has-error' : '' }}">
                            <label for="municipality_name" class="col-md-4 control-label">Municipality Name</label>

                            <div class="col-md-6">
                                <input id="municipality_name_update" type="text" class="form-control" name="municipality_name" value="{{ $municipality->municipality_name }}" required autofocus>

                                @if ($errors->has('municipality_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('municipality_name') }}</strong>
                                    </span>
                                @endif
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
