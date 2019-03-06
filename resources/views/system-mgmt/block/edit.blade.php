@extends('system-mgmt.block.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Block</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('block.update', ['id' => $block->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">District</label>
                            <div class="col-md-6">
                                <select class="form-control" name="district_id">
                                    @foreach ($districts as $district)
                                        <option value="{{$district->id}}" {{$district->id == $block->district_id ? 'selected' : ''}}>{{$district->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub Division </label>
                            <div class="col-md-6">
                                <select class="form-control" name="subdivision_id">
                                    @foreach ($subdivisions as $subdivision)
                                        <option value="{{$subdivision->id}}" {{$subdivision->id == $block->subdivision_id ? 'selected' : ''}} >{{$subdivision->sub_division_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('block_name') ? ' has-error' : '' }}">
                            <label for="block_name" class="col-md-4 control-label">Block Name</label>

                            <div class="col-md-6">
                                <input id="block_name" type="text" class="form-control" name="block_name" value="{{ $block->block_name }}" required autofocus>

                                @if ($errors->has('block_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('block_name') }}</strong>
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
