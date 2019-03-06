@extends('masque-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Masque</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('masque-management.update', ['id' => $masques->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('masque_name') ? ' has-error' : '' }}">
                            <label for="masque_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="masque_name" type="text" class="form-control" name="masque_name" value="{{ $masques->masque_name }}" required autofocus>

                                @if ($errors->has('masque_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('masque_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       
                       

                        <div class="form-group{{ $errors->has('masque_address') ? ' has-error' : '' }}">
                            <label for="masque_address" class="col-md-4 control-label"> Address</label>

                            <div class="col-md-6">
                                <input id="masque_address" type="text" class="form-control" name="masque_address" value="{{ $masques->masque_address }}">

                                @if ($errors->has('masque_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('masque_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">District </label>
                            <div class="col-md-6" >
                                <select class="form-control select2" name="masque_district" id="district_id" required>
                                    <option value="0">Select</option>
                                    @foreach ($districts as $district)
                                        <option value="{{$district->id}}" {{$district->id == $masques->masque_district ? 'selected' : ''}}>{{$district->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub Division </label>
                            <div class="col-md-6" >
                                <select class="form-control select2" name="masque_sub_division" id="masque_sub_division" required>
                                    <option value="">Select</option>
                                    @foreach ($subdivisions as $subdivision)
                                        <option value="{{$subdivision->id}}" {{$subdivision->id == $masques->mosque_sub_division_id ? 'selected' : ''}}>{{$subdivision->sub_division_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                        
                        @if($masques->masque_municipality > 0)
                        <div class="form-group" id="municipality_name_update" >
                            <label class="col-md-4 control-label">Municipality</label>
                            <div class="col-md-6">
                                <select class="form-control select2" name="masque_municipality" id="municipality_id">
                                    @foreach ($municipalities as $municipality)
                                      <option value="{{$municipality->id}}" {{$municipality->id == $masques->masque_municipality ? 'selected' : ''}}>{{$municipality->municipality_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif


                        
                       
                        @if($masques->masque_block > 0)
                        <div class="form-group" id="block_name_masque_update" >
                            <label class="col-md-4 control-label">Block </label>
                            <div class="col-md-6" >
                                <select class="form-control select2" name="masque_block" id="block_id">
                                    @foreach ($blocks as $block)
                                    <option value="{{$block->id}}" {{$block->id == $masques->masque_block ? 'selected' : ''}}>{{$block->block_name}}</option>
                                    @endforeach
                                </select>

                               
                            </div>
                        </div>
                         @endif

                       
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
