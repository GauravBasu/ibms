@extends('masque-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new Mosque</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('masque-management.store') }}">

                        {{ csrf_field() }}

                        

                       
                         

                        <div class="form-group">
                            <label class="col-md-4 control-label">District </label>
                            <div class="col-md-6" >
                                <select class="form-control select2" name="masque_district_id" id="masque_district_id">
                                    <option value="0">Select</option>
                                    @foreach ($districts as $district)
                                        <option value="{{$district->id}}">{{$district->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub Division </label>
                            <div class="col-md-6" >
                                <select class="form-control select2" name="masque_sub_division" id="masque_sub_division">
                                    <option value="0">Select</option>
                                   
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Urban/Rural </label>
                            <div class="col-md-6">
                            <select class="form-control" name="masque_rural_urban" id="masque_rural_urban">
                                    <option value="0">Select</option>
                                    <option value="1">Rural</option>
                                    <option value="2">Urban</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="municipality_name" >
                            <label class="col-md-4 control-label">Municipality</label>
                            <div class="col-md-6">
                                <select class="form-control select2" name="masque_municipality_id" id="masque_municipality_id">
                                    <option value="0">Select</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="block_name_masque" >
                            <label class="col-md-4 control-label">Block </label>
                            <div class="col-md-6" >
                                <select class="form-control select2" name="masque_block" id="block_id">
                                    <option value="0">Select</option>
                                </select>

                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('masque_name') ? ' has-error' : '' }}">
                            <label for="masque_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="masque_name" type="text" class="form-control" name="masque_name" value="{{ old('masque_name') }}" required autofocus>

                                @if ($errors->has('masque_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('masque_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('masque_address') ? ' has-error' : '' }}">
                            <label for="masque_address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="masque_address" type="masque_address" class="form-control" name="masque_address" value="{{ old('masque_address') }}" required>

                                @if ($errors->has('masque_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('masque_address') }}</strong>
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
