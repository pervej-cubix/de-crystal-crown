@extends('admin.master')

@section('main')


<div class="row mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title"> Virtual Tour Manage</h3>
            </div>
            <div class="card-body">
                @if( session('success') )
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if( session('message') )
                <p class="alert alert-success">{{ session('message') }}</p>
                @endif
                @if( session('errorr') )
                <p class="alert alert-success">{{ session('errorr') }}</p>
                @endif
                <div class="table-responsive">
                    <table id="example3" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">Sl No.</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Link</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($virtual_tours as $virtual_tour)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset($virtual_tour->image) }}" alt="" width="40" height="60"></td>
                                <td><a href="{{ $virtual_tour->link }}" target="_blank">{{ $virtual_tour->link }}</a></td>
                                <td>{{ $virtual_tour->status == 1 ? 'Published' : 'UnPublished' }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('tour-edit',$virtual_tour->id) }}" class="btn btn-success btn-sm me-1">
                                        <i class=" fa fa-edit"></i>
                                    </a>
                                    <form method="post" action="{{ route('tour.destroy', $virtual_tour->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection