@extends('layouts.frontend')
@section('title')
Edit Family Member
@endsection
@section('header')
	<section class="content-header">
      <h1>
        Edit Family Member
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('clients')}}"><i class="fa fa-user-circle"></i> clients</a></li>
        <li class="active">Edit Family Member</li>
      </ol>
    </section>
@stop
@section('content')
	
	@if(count($errors)>0)
		<ul class="list-group">
			@foreach($errors->all() as $error)
				<li class="list_group-item text-danger">
					{{ $error }}
				</li>
			@endforeach
		</ul>
    @endif
    
    <form action="{{route('update.family',['id'=>$family->id])}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">	
                    <div class="col-md-4">		
                        <div class="form-group">			
                            <label for="member_name">Member Name</label>			
                            <input type="text" name="member_name" value="{{$family->member_name}}" required class="form-control">		
                        </div>	
                    </div>	
                    <div class="col-md-4">		
                        <div class="form-group">			
                            <label for="member_DOB">Member DOB</label>			
                            <input type="date" name="member_DOB" value="{{$family->member_DOB}}" required class="form-control">		
                        </div>	
                    </div>	
                    <div class="col-md-4">		
                        <div class="form-group">			
                            <label for="member_passport_no">Member Passport NO.</label>			
                            <input type="text" name="member_passport_no" value="{{$family->member_passport_no}}" required class="form-control">		
                        </div>	
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="member_passport_place">Place of Issue</label>
                            <input type="text" name="member_passport_place" value="{{$family->member_passport_place}}" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="member_passport_front">Passport Front:</label>
                            <input type="file" name="member_passport_front"  class="form-control" value="{{$family->member_passport_front}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="member_passport_back">Passport Back:</label>
                        <input type="file" name="member_passport_back"  class="form-control" value="{{$family->member_passport_back}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </div>
    </form>
@stop