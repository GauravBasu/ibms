@extends('system-mgmt.gram-panchayat.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Gram Panchayat</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('gram-panchayat.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-md-4 control-label">District</label>
                            <div class="col-md-6">
                               <select class="form-control" name="gram_district_id" id="gram_district_id">
                                @foreach ($districts as $district)
                                    <option value="{{$district->id}}">{{$district->district_name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub Division</label>
                            <div class="col-md-6">
                               <select class="form-control" name="gram_sub_division_id" id="gram_sub_division_id">
                                    
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-4 control-label">Block</label>
                            <div class="col-md-6">
                               <select class="form-control" name="gram_block_id" id="gram_block_id">
                                    <option value="-1"></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gram_panchayat_name') ? ' has-error' : '' }}">
                            <label for="gram_panchayat_name" class="col-md-4 control-label">Gram Panchayat </label>
                            <div class="col-md-6">
                                <input id="gram_panchayat_name" type="text" class="form-control" name="gram_panchayat_name" value="{{ old('gram_panchayat_name') }}" required autofocus>
                                @if ($errors->has('gram_panchayat_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gram_panchayat_name') }}</strong>
                                    </span>
                                @endif
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
