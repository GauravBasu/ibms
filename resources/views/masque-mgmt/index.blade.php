@extends('masque-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of Mosque</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('masque-management.create') }}">Add new Mosque</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('masque-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['Name'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th  class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Name</th>
                <th  class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Address</th>
                
                <th  class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Block </th>
                <th  class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Municipality </th>
                <th  class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Sub Division </th>
                <th  class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">District </th>
               
                <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
              
            @foreach ($masques as $masque)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $masque->masque_name }}</td>
                  <td>{{ $masque->masque_address }}</td> 

                  <td class="hidden-xs">{{ $masque->block_name }}</td>
                  <td class="hidden-xs">{{ $masque->Municilapity_name }}</td>
                  <td class="hidden-xs">{{ $masque->sub_division_name }}</td>
                  <td class="hidden-xs">{{ $masque->district_name }}</td>
                  
                  <td>
                    <form class="row" method="POST" action="{{ route('masque-management.destroy', ['id' => $masque->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('masque-management.edit', ['id' => $masque->id]) }}" class="btn btn-warning col-sm-3  btn-margin">
                        Update
                        </a>
                        
                         <button type="submit" class="btn btn-danger col-sm-3  btn-margin">
                          Delete
                        </button>
                       
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th  rowspan="1" colspan="1">Name</th>
                <th  rowspan="1" colspan="1">Address</th>
                <th class="hidden-xs"  rowspan="1" colspan="1">Block </th>
                <th class="hidden-xs"  rowspan="1" colspan="1">Municipality </th>
                <th class="hidden-xs"  rowspan="1" colspan="1">Sub Division </th>
                <th class="hidden-xs"  rowspan="1" colspan="1">District </th>
                
                <th width="30%" rowspan="1" colspan="2">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($masques)}} of {{$masques->total()}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $masques->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection