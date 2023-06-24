<div class="table-responsive">
    <table class="table table-bordered" id="schools-table">
        <thead>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Route</th>
        <th>Join Date</th>
        <th>Comments</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($representatives as $representative)
            <tr>
            <td>{{ $representative->name }}</td>
            <td>{{ $representative->email }}</td>
            <td>{{ $representative->telephone }}</td>
            <td>{{ $representative->route }}</td>
            <td>{{ $representative->join_date }}</td>
            <td>{{ $representative->comments }}</td>
                <td width="120">
                   
                    <div class='btn-group'>
                        <a type="button" href="#" data-toggle="modal" data-target="#modal-default-representative{{ $representative->id }}" class="btn btn-success btn-sm" title="View Representative"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                        <a href="{{ route('representatives.edit', [$representative->id]) }}"
                           class='btn btn-warning btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        <a type="button" href="#" data-toggle="modal" data-target="#modal-default-deleterepresentative{{ $representative->id }}" class="btn btn-danger btn-sm" title="Delete Representative"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                    </div>
          
                    @include('representatives.pupup-deleterepresentative')
                    @include('representatives.pupup-representative')
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
