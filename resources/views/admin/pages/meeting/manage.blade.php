@extends('admin.master')

@section('main')


<div class="row mt-10 mb-10">
        <div class="col-lg-10 offset-lg-1 col-md-12">
            <div class="card mt-4">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add New Meetings & Events</h3>
                </div>
                <div class="card-body">
                    @if( session('messages') )
                        <p class="alert alert-success">{{ session('messages') }}</p>
                    @endif
                    <form class="form-horizontal" action="{{ route('meeting-store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="meetingName" class="col-md-3 form-label">Meetings & Events Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="meetingName" id="meetingName" placeholder="Enter your Room Type" type="text" required="required">
                                @if($errors->has('meetingName'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('meetingName') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Enter your Description"></textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="diningName" class="col-md-3 form-label">Features</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <input class="form-control col-md-6" name="Features1" placeholder="Enter your Features 1" type="text" required="required">
                                    <input class="form-control col-md-6" name="Features2" placeholder="Enter your Features 2" type="text" required="required">
                                    @if($errors->has('Features1'))
                                        <div class="alert alert-danger mt-1">{{ $errors->first('Features1') }}</div>
                                    @endif
                                    @if($errors->has('Features2'))
                                        <div class="alert alert-danger mt-1">{{ $errors->first('Features2') }}</div>
                                    @endif
                                </div>
                                <div class="row">
                                    <input class="form-control col-md-6" name="Features3" placeholder="Enter your Features 3" type="text">
                                    <input class="form-control col-md-6" name="Features4" placeholder="Enter your Features 4" type="text">
                                    @if($errors->has('Features3'))
                                        <div class="alert alert-danger mt-1">{{ $errors->first('Features3') }}</div>
                                    @endif
                                    @if($errors->has('Features4'))
                                        <div class="alert alert-danger mt-1">{{ $errors->first('Features4') }}</div>
                                    @endif
                                </div>
                                <div class="row">
                                    <input class="form-control col-md-6" name="Features5" placeholder="Enter your Features 5" type="text">
                                    <input class="form-control col-md-6" name="Features6" placeholder="Enter your Features 6" type="text">
                                    @if($errors->has('Features5'))
                                        <div class="alert alert-danger mt-1">{{ $errors->first('Features5') }}</div>
                                    @endif
                                    @if($errors->has('Features6'))
                                        <div class="alert alert-danger mt-1">{{ $errors->first('Features6') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <label for="image" class="col-md-3 form-label">Display Image</label>
                            <div class="col-md-9">
                                <div class="form-control">
                                    <input type="file" name="image" class="dropify" id="image" data-height="200" accept="image/*">
                                    @if($errors->has('image'))
                                        <div class="alert alert-danger mt-1">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="meeting_gallaries" class="col-md-3 form-label">Meeting & Events Gallaries</label>
                            <div class="col-md-9">
                                <input type="file" name="meeting_gallaries[]" id="meeting_gallaries" accept="image/*" multiple />
                                @if($errors->has('meeting_gallaries'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('meeting_gallaries') }}</div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <label for="email" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 mt-2 p">
                                <label ><input type="radio" value="1" checked name="status"><span>Published</span></label>
                                <label><input type="radio" value="0" name="status"><span>UnPublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    <div class="row mt-5">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title"> Meetings & Events Manage</h3>
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
                                <th class="border-bottom-0">Meetings & Events Name</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Features 1</th>
                                <th class="border-bottom-0">Features 2</th>
                                <th class="border-bottom-0">Features 3</th>
                                <th class="border-bottom-0">Features 4</th>
                                <th class="border-bottom-0">Features 5</th>
                                <th class="border-bottom-0">Features 6</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Meetings Gallaries</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meetings as $meeting)
                            
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $meeting->meetingName }}</td>
                                    <td>{{ $meeting->description }}</td>
                                    <td>{{ $meeting->Features1 }}</td>
                                    <td>{{ $meeting->Features2 }}</td>
                                    <td>{{ $meeting->Features3 }}</td>
                                    <td>{{ $meeting->Features4 }}</td>
                                    <td>{{ $meeting->Features5 }}</td>
                                    <td>{{ $meeting->Features6 }}</td>
                                    <td><img src="{{ asset($meeting->image) }}" alt="" width="40" height="60"></td>
                                    <td>
                                    @if($meeting->meeting_gallaries && count($meeting->meeting_gallaries) > 0)
                                        @foreach($meeting->meeting_gallaries as $meeting_gallaray)
                                            <img class="m-1" src="{{ asset($meeting_gallaray->meeting_photo) }}" alt="" height="120">
                                        @endforeach
                                    @else
                                        <p>No Galleries Available</p>
                                    @endif
                                    </td>
                                    <td>{{ $meeting->status == 1 ? 'Published' : 'UnPublished' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('meeting-edit',$meeting->id) }}" class="btn btn-success btn-sm me-1">
                                            <i class=" fa fa-edit"></i>
                                        </a>
                                        <form method="post" action="{{ route('meeting.destroy', $meeting->id) }}">
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