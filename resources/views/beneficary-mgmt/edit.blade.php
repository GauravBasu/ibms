@extends('beneficary-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Beneficiary</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('beneficiary-management.update', ['id' => $beneficiary->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('beneficary_name') ? ' has-error' : '' }}">
                            <label for="beneficary_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="beneficary_name" type="text" class="form-control" name="beneficary_name" value="{{ $beneficiary->ben_name }}" required autofocus>

                                @if ($errors->has('beneficary_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('beneficary_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                            <label for="mobile_no" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="mobile_no" type="type" class="form-control" name="mobile_no" value="{{ $beneficiary->mobile_no }}" required>

                                @if ($errors->has('mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('aadher_no') ? ' has-error' : '' }}">
                            <label for="aadher_no" class="col-md-4 control-label">Aadher  Number</label>

                            <div class="col-md-6">
                                <input id="aadher_no" type="text" class="form-control" name="aadher_no" value="{{ $beneficiary->aadher_no }}" required>

                                @if ($errors->has('aadher_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aadher_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_ac_number') ? ' has-error' : '' }}">
                            <label for="bank_ac_number" class="col-md-4 control-label">Bank Account Number</label>

                            <div class="col-md-6">
                                <input id="bank_ac_number" type="text" class="form-control" name="bank_ac_number" value="{{ $beneficiary->bank_ac_number }}" required>

                                @if ($errors->has('bank_ac_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_ac_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ifsc_code') ? ' has-error' : '' }}">
                            <label for="ifsc_code" class="col-md-4 control-label">IFSC Code</label>

                            <div class="col-md-6">
                                <input id="ifsc_code" type="text" class="form-control" name="ifsc_code" value="{{ $beneficiary->ifsc_code }}" required>

                                @if ($errors->has('ifsc_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ifsc_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('acc_type') ? ' has-error' : '' }}">
                            <label for="acc_type" class="col-md-4 control-label">Acc Type</label>

                            <div class="col-md-6">
                                <input id="acc_type" type="text" class="form-control" name="acc_type" value="{{ $beneficiary->ac_type }}" required>

                                @if ($errors->has('acc_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pan_number') ? ' has-error' : '' }}">
                            <label for="pan_number" class="col-md-4 control-label">Pan Number</label>

                            <div class="col-md-6">
                                <input id="pan_number" type="text" class="form-control" name="pan_number" value="{{ $beneficiary->pan_number }}" required>

                                @if ($errors->has('pan_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pan_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       
                       

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address </label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $beneficiary->address }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">District </label>
                            <div class="col-md-6" >
                                <select class="form-control select2" name="add_district" id="district_id">
                                    <option value="0">Select</option>
                                    @foreach ($districts as $district)
                                        <option value="{{$district->id}}" {{$district->id == $beneficiary->add_district ? 'selected' : ''}}>{{$district->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        @if($beneficiary->add_municipality > 0)
                        <div class="form-group" id="municipality_name_update" >
                            <label class="col-md-4 control-label">Municipality</label>
                            <div class="col-md-6">
                                <select class="form-control select2" name="add_municipality" id="municipality_id">
                                    @foreach ($municipalities as $municipality)
                                      <option value="{{$municipality->id}}" {{$municipality->id == $beneficiary->add_municipality ? 'selected' : ''}}>{{$municipality->municipality_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif


                        
                       
                        @if($beneficiary->add_block > 0)
                        <div class="form-group" id="block_name_masque_update" >
                            <label class="col-md-4 control-label">Block </label>
                            <div class="col-md-6" >
                                <select class="form-control select2" name="add_block" id="block_id">
                                    @foreach ($blocks as $block)
                                    <option value="{{$block->id}}" {{$block->id == $beneficiary->add_block ? 'selected' : ''}}>{{$block->block_name}}</option>
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
