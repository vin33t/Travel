@extends('layouts.frontend')
@section('title')
client
@endsection
@section('header')
	<section class="content-header">
      <h1>
        Client
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('clients')}}"><i class="fa fa-user-circle"></i> clients</a></li>
        <li class="active">Client</li>
      </ol>
    </section>
@stop
@section('content')

	<div class="box box-info">
		<div class="box-body">
			
			<table class="table table-hover mb-0">
				<tbody>
					<div class="row">
						<tr>
							<td><strong>First Name:</strong></td>
							<td>{{$client->first_name}}</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>last Name:</strong></td>
							<td>{{$client->last_name}}</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Country:</strong></td>
							<td>{{$client->country}}</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>County:</strong></td>
							<td>{{$client->county}}</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Postal Code:</strong></td>
							<td>{{$client->postal_code}}</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>City:</strong></td>
							<td>{{$client->city}}</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Address:</strong></td>
							<td>{{$client->address}}</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Phone:</strong></td>
							<td>{{$client->phone}}</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Email:</strong></td>
							<td>{{$client->email}}</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>DOB:</strong></td>
							<td>{{$client->DOB}}</td>
						</tr>
					</div>
				</tbody>
			</table>
		</div>
	</div>

@endsection