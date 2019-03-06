@extends('system-mgmt.gram-panchayat.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Gram Panchayat</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('gram-panchayat.update', ['id' => $grampanchayat->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                          <div class="form-group">
                            <label class="col-md-4 control-label">District</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="district_id">
                                        @foreach ($districts as $district)
                                            <option value="{{$district->id}}" {{$district->id == $grampanchayat->gram_dist_id ? 'selected' : ''}} >{{$district->district_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                           </div>

                           <div class="form-group">
                            <label class="col-md-4 control-label">Sub Division</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="subdivision_id">
                                        @foreach ($subdivisions as $subdivision)
                                            <option value="{{$subdivision->id}}" {{$subdivision->id == $grampanchayat->gram_sub_division_id ? 'selected' : ''}} >{{$subdivision->sub_division_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                           </div>

                           <div class="form-group">
                                <label class="col-md-4 control-label">Block</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="block_id">
                                        @foreach ($blocks as $block)
                                            <option value="{{$block->id}}" {{$block->id == $grampanchayat->gram_block_id ? 'selected' : ''}} >{{$block->block_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                           <div class="form-group{{ $errors->has('gram_panchayet_name') ? ' has-error' : '' }}">
                            <label for="gram_panchayet_name" class="col-md-4 control-label">Gram Panchayat</label>
                            <div class="col-md-6">
                                <input id="gram_panchayet_name" type="text" class="form-control" name="gram_panchayet_name" value="{{ $grampanchayat->gram_panchayet_name }}" required autofocus>

                                @if ($errors->has('gram_panchayet_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gram_panchayet_name') }}</strong>
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
