@extends('layouts.frontend')
@section('title')
Edit Invoice
@endsection
@section('header')
	<section class="content-header">
      <h1>
        Invoice
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('invoice')}}"><i class="fa fa-paperclip"></i> Invoice</a></li>
        <li class="active">Edit Invoice</li>
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



	<form action="{{route('invoice.update',['id'=>$invoice->id])}}" method="post">
		@csrf
		<div class="box box-primary">
		<div class="box-body">
			<section class="content-header">
				<h1 class="text-center"><span style="color:#0066FF;">Edit Invoice</span></h1>
			</section>
			<hr>
			<div class="row">
				<div class="col-md-8">
					<h3>To,</h3>
					<h3>RECEIVER (BILL TO)</h3>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
				<div class="form-group">
					<input type="text" name='receiver_name' required class="form-control" readonly value="{{$invoice->receiver_name}}">
					<div id="address">
						<textarea name="billing_address" required class="form-control" readonly placeholder="Enter Billing Adress">{{$invoice->billing_address}}"></textarea>
					</div>
				</div>
				</div>
				<div class="col-md-4">
				<div class="form-group">
					<input style="color:white;font-weight:500;background-color:#0066FF;" type="text" name='invoice_no' readonly class="form-control" value="{{$invoice->invoice_no}}">
					<input type="date" name='invoice_date' value="{{$invoice->invoice_date}}" readonly placeholder="Select Invoice date" required class="form-control">
				</div>
				</div>
			</div>
		</div>
		</div>
		<?php $i = 1;?>
			@foreach ($invoice->invoiceInfo as $info)
				<div class="box box-primary">
					<div class="box-body">
							@if($info->service_name == 'Flight')
									<div class="row">
										<div class="col-md-4">				
											<div class="form-group">					
												<label for="service_name[]"><strong>{{$i++}}.</strong>	Service Name</label>					
												<input name="service_name[]" class="form-control service" value="{{$info->service_name}}" readonly required>
											</div>			
										</div>		
									</div>
									<div class="row">		
										<div class="col-md-4">		
											<div class="form-group">			
												<label for="airline_name">Airline Name</label>			
												<input type="text" name="airline_name[]" value="{{$info->airline_name}}" required class="form-control">		
											</div>		
										</div>		
										<div class="col-md-4">		
											<div class="form-group">			
												<label for="source">Source</label>			
												<input type="text" name="source[]" value="{{$info->source}}" class="form-control">		
											</div>		
										</div>		
										<div class="col-md-4">		
											<div class="form-group">			
												<label for="destination">Destination</label>			
												<input type="text" name="destination[]" value="{{$info->destination}}" required class="form-control">		
											</div>		
										</div>		
									</div>
									<div class="row">		
										<div class="col-md-3">		
											<div class="form-group">			
												<label for="date">Date</label>			
												<input type="date" name="date[]" value="{{$info->date}}" required class="form-control">		
											</div>		
										</div>		
										<div class="col-md-2">		
											<div class="form-group">			
												<label for="adult[]">Adult</label>			
												<input type="text" name="adult[]" value="{{$info->adult}}" class="form-control">		
											</div>		
										</div>		
										<div class="col-md-2">		
											<div class="form-group">			
												<label for="child[]">Child</label>			
												<input type="text" name="child[]" value="{{$info->child}}" required class="form-control">		
											</div>		
										</div>		
										<div class="col-md-2">				
											<div class="form-group">					
												<label for="infant[]">Infant</label>					
												<input type="text" name="infant[]" value="{{$info->infant}}" required class="form-control">				
											</div>				
										</div>	
										<div class="col-md-3">		
											<div class="form-group">			
												<label for="infant_dob[]">Infant DOB</label>		
												<input type="date" name="infant_dob[]" value="{{$info->infant_dob}}" required class="form-control">		
											</div>		
										</div>	
									</div>
									<div class="row">		
										<div class="col-md-3">		
											<div class="form-group">	
												<label for="flight_quantity[]">Quantity</label>		
												<input type="text" id="quantity" name="flight_quantity[]" value="{{$info->flight_quantity}}" required class="form-control" onKeyUp="FlightAmount()">		
											</div>		
										</div>	
										<div class="col-md-3">			
											<div class="form-group">	
												<label for="flight_price[]">Price</label>		
												<input id="price" type="text" name="flight_price[]" value="{{$info->flight_price}}" required class="form-control" onKeyUp="FlightAmount()">			
											</div>		
										</div>		
										<div class="col-md-3">			
											<div class="form-group">	
												<label for="flight_amount[]">Amount</label>		
												<input id="amount" type="number" name="flight_amount[]" value="{{$info->flight_amount}}" required class="form-control" readonly>			
											</div>		
										</div>
									</div>
									{{-- <div align="right">						
										<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					
									</div>	 --}}
							
							@elseif($info->service_name == 'Visa Services')
									<div class="row">			
										<div class="col-md-4">				
											<div class="form-group">					
												<label for="service_name[]"><strong>{{$i++}}.</strong> Service Name</label>					
												<input name="service_name[]" class="form-control service" value="{{$info->service_name}}" readonly required>			
											</div>			
										</div>		
									</div>
									<div class="row">	
										<div class="col-md-6">		
											<div class="form-group">			
												<label for="name_of_visa_applicant">Name Of Visa Applicant</label>			
												<input type="text" name="name_of_visa_applicant[]" value="{{$info->name_of_visa_applicant}}" required class="form-control">		
											</div>		
										</div>		
										<div class="col-md-6">		
											<div class="form-group">			
												<label for="passport_origin">Passport Origin</label>			
												<input type="text" name="passport_origin[]" value="{{$info->passport_origin}}" class="form-control">		
											</div>		
										</div>		
									</div>		
									<div class="row">				
										<div class="col-md-4">				
											<div class="form-group">					
												<label for="visa_country">Visa Country</label>					
												<input type="text" name="visa_country[]" value="{{$info->visa_country}}" required class="form-control">				
											</div>				
										</div>				
										<div class="col-md-4">				
											<div class="form-group">					
												<label for="visa_type">Visa Type</label>					
												<input type="text" name="visa_type[]" value="{{$info->visa_country}}" class="form-control">				
											</div>				
										</div>				
										<div class="col-md-4">						
											<div class="form-group">							
												<label for="visa_charges[]">Visa Fee</label>							
												<input type="text" name="visa_charges[]" value="{{$info->visa_charges}}" class="form-control" onKeyUp="VisaAmount()">						
											</div>						
										</div>				
									</div>
									<div class="row">						
										<div class="col-md-4">			
											<div class="form-group">	
												<label for="service_charge[]">Service Charge</label>		
												<input id="service_charge" type="text" name="service_charge[]" value="{{$info->service_charge}}" required class="form-control" onKeyUp="VisaAmount()">			
											</div>		
										</div>		
										<div class="col-md-4">			
											<div class="form-group">	
												<label for="visa_amount">Amount</label>		
												<input id="amount" type="number" name="visa_amount[]" value="{{$info->visa_amount}}" required class="form-control" readonly>			
											</div>		
										</div>
									</div>
									{{-- <div align="right">						
										<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					
									</div>	 --}}

							@elseif($info->service_name == 'Hotel')
									<div class="row">			
										<div class="col-md-4">				
											<div class="form-group">					
												<label for="service_name[]"><strong>{{$i++}}.</strong> Service Name</label>					
												<input name="service_name[]" class="form-control service" value="{{$info->service_name}}" readonly required>			
											</div>			
										</div>		
									</div>
									<div class="row">		
										<div class="col-md-6">		
											<div class="form-group">			
												<label for="hotel_city">City</label>			
												<input type="text" name="hotel_city[]" value="{{$info->hotel_city}}" required class="form-control">		
											</div>		
										</div>		
										<div class="col-md-6">		
											<div class="form-group">			
												<label for="hotel_country">Country</label>			
												<input type="text" name="hotel_country[]" value="{{$info->hotel_country}}" class="form-control">		
											</div>		
										</div>		
									</div>		
									<div class="row">		
										<div class="col-md-4">		
											<div class="form-group">			
												<label for="hotel_name">Name</label>			
												<input type="text" name="hotel_name[]" value="{{$info->hotel_name}}" required class="form-control">		
											</div>		
										</div>		
										<div class="col-md-4">		
											<div class="form-group">			
												<label for="check_in_date">Check In Date</label>			
												<input type="date" name="check_in_date[]" value="{{$info->check_in_date}}" required class="form-control">		
											</div>		
										</div>		
										<div class="col-md-4">		
											<div class="form-group">			
												<label for="check_out_date">Check Out Date</label>			
												<input type="date" name="check_out_date[]" value="{{$info->check_out_date}}" required class="form-control">		
											</div>		
										</div>		
									</div>		
									<div class="row">		
										<div class="col-md-3">		
											<div class="form-group">			
												<label for="no_of_children[]">No. Of Children</label>			
												<input type="text" name="no_of_children[]" value="{{$info->no_of_children}}" class="form-control" >		
											</div>		
										</div>		
										<div class="col-md-3">		
											<div class="form-group">			
												<label for="no_of_rooms">No. Of Rooms</label>			
												<input type="text" name="no_of_rooms[]" value="{{$info->no_of_rooms}}" class="form-control">		
											</div>		
										</div>		
										<div class="col-md-3">		
											<div class="form-group">			
												<label for="hotel_amount[]">Amount</label>			
												<input type="text" name="hotel_amount[]" value="{{$info->hotel_amount}}" class="form-control">		
											</div>		
										</div>		
									</div>
									{{-- <div align="right">						
										<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">				
									</div> --}}

							@elseif($info->service_name == 'Insurance')
									<div class="row">			
										<div class="col-md-4">				
											<div class="form-group">					
												<label for="service_name[]"><strong>{{$i++}}.</strong> Service Name</label>					
												<input name="service_name[]" class="form-control service" value="{{$info->service_name}}" readonly required>			
											</div>			
										</div>		
									</div>
									<div class="row">	
										<div class="col-md-4">		
											<div class="form-group">			
												<label for="name_of_insurance_applicant">Name Of Insurance Applicant</label>			
												<input type="text" name="name_of_insurance_applicant[]" value="{{$info->name_of_insurance_applicant}}" required class="form-control">		
											</div>		
										</div>		
										<div class="col-md-4">		
											<div class="form-group">			
												<label for="insurance_remarks">Passport Origin</label>			
												<input type="text" name="insurance_remarks[]" value="{{$info->insurance_remarks}}" class="form-control">		
											</div>		
										</div>						
										<div class="col-md-4">				
											<div class="form-group">					
												<label for="insurance_amount[]">Insurance Amount</label>					
												<input type="text" name="insurance_amount[]" value="{{$info->insurance_amount}}" required class="form-control">				
											</div>				
										</div>	
									</div>			
									{{-- <div align="right">						
										<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					
									</div> --}}

							@elseif($info->service_name == 'Local Sight Sceen')
									<div class="row">			
										<div class="col-md-4">				
											<div class="form-group">					
												<label for="service_name[]"><strong>{{$i++}}.</strong> Service Name</label>					
												<input name="service_name[]" class="form-control service" value="{{$info->service_name}}" readonly required>			
											</div>			
										</div>		
									</div>
									<div class="row">	
										<div class="col-md-6">		
											<div class="form-group">			
												<label for="local_sight_sceen_remarks">Local Sight Sceen Remarks</label>			
												<input type="text" name="local_sight_sceen_remarks[]" value="{{$info->local_sight_sceen_remarks}}" required class="form-control">		
											</div>		
										</div>		
										<div class="col-md-6">				
											<div class="form-group">					
												<label for="local_sight_sceen_amount[]">Sight Sceen Charges</label>					
												<input type="text" name="local_sight_sceen_amount[]" value="{{$info->local_sight_sceen_amount}}" required class="form-control">				
											</div>				
										</div>				
									</div>
									{{-- <div align="right">						
										<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					
									</div> --}}

							@elseif($info->service_name == 'Local Transport')
								<div class="row">			
									<div class="col-md-4">				
										<div class="form-group">					
											<label for="service_name[]"><strong>{{$i++}}.</strong> Service Name</label>					
											<input name="service_name[]" class="form-control service" value="{{$info->service_name}}" readonly required>			
										</div>			
									</div>		
								</div>
								<div class="row">	
									<div class="col-md-6">		
										<div class="form-group">			
											<label for="local_transport_remarks">Local Transport Remarks</label>			
											<input type="text" name="local_transport_remarks[]" value="{{$info->local_transport_remarks}}" required class="form-control">		
										</div>		
									</div>		
									<div class="col-md-6">				
										<div class="form-group">					
											<label for="local_transport_amount[]">Transport Charges</label>					
											<input type="text" name="local_transport_amount[]" value="{{$info->local_transport_amount}}" required class="form-control">				
										</div>				
									</div>				
								</div>
								{{-- <div align="right">						
									<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					
								</div> --}}

							@elseif($info->service_name == 'Car Rental')
								<div class="row">			
									<div class="col-md-4">				
										<div class="form-group">					
											<label for="service_name[]"><strong>{{$i++}}.</strong> Service Name</label>					
											<input name="service_name[]" class="form-control service" value="{{$info->service_name}}" readonly required>			
										</div>			
									</div>		
								</div>
								<div class="row">	
									<div class="col-md-6">		
										<div class="form-group">			
											<label for="car_rental_remarks">Car Rental Remarks</label>			
											<input type="text" name="car_rental_remarks[]" value="{{$info->car_rental_remarks}}" required class="form-control">		
										</div>		
									</div>		
									<div class="col-md-6">				
										<div class="form-group">					
											<label for="car_rental_amount[]">Car Rental Charges</label>					
											<input type="text" name="car_rental_amount[]" value="{{$info->car_rental_amount}}" required class="form-control">				
										</div>				
									</div>				
								</div>
								{{-- <div align="right">						
									<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					
								</div> --}}

							@elseif($info->service_name == 'Other Facilities')
								<div class="row">			
									<div class="col-md-4">				
										<div class="form-group">					
											<label for="service_name[]"><strong>{{$i++}}.</strong> Service Name</label>					
											<input name="service_name[]" class="form-control service" value="{{$info->service_name}}" readonly required>			
										</div>			
									</div>		
								</div>
								<div class="row">	
									<div class="col-md-6">		
										<div class="form-group">			
											<label for="other_facilities_remarks">Other Facilities Remarks</label>			
											<input type="text" name="other_facilities_remarks[]" value="{{$info->other_facilities_remarks}}" required class="form-control">		
										</div>		
									</div>		
									<div class="col-md-6">				
										<div class="form-group">					
											<label for="other_facilities_amount[]">Other Facilities Charges</label>					
											<input type="text" name="other_facilities_amount[]" value="{{$info->other_facilities_amount}}" required class="form-control">				
										</div>				
									</div>				
								</div>
								{{-- <div align="right">						
									<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					
								</div> --}}
							@endif
					</div>				
				</div>
			@endforeach
		
			{{-- <div class="text-center"  style="margin-top: 5px">
				<button class="btn btn-success btn-sm"  type="button" id="add">Add Service</button><br><br>
			</div> --}}
		<div class="box box-primary" id="targetTotal">
		<div class="box-body">
			<table class="table table-bordered">
				<tr>
					<td class="col-md-8" align="right"><strong>Currency:</strong></td>
					<td class="col-md-4">
					<select name="currency" class="form-control" id="currency">
						<option value="$" {{($invoice->currency == '$')?'selected':''}}>$</option>
						<option value="&#163;" {{($invoice->currency != "$")?'selected':''}}>&#163;</option>
					</select>
					</td>
				</tr>
				<tr>
					<td class="col-md-8" align="right"><strong>SubTotal:</strong></td>
					<td class="col-md-4"><input name="total"  type="text" id="total" required class="form-control" readonly></td>
				</tr>
				<tr>
					<td class="col-md-8" align="right"><strong>Discount:</strong></td>
					<td class="col-md-4"><input name="discount" type="text" id="discount" value="{{$invoice->discount}}" required class="form-control" value="0"></td>
				</tr>
				<tr>
					<td class="col-md-8" align="right"><strong>Total:</strong></td>
					<td class="col-md-4"><input name="discounted_total" type="text" id="discounted_total" style="color:white;font-weight:500;background-color:#0066FF;" required class="form-control" readonly></td>
				</tr>
			</table>
		</div>
		</div>
		<div class="box box-primary">
			<div class="box-body">
				<table class="table table-bordered">

					<tr>
					<td class="col-md-8" align="right">
						<p class="lead">Payment Methods</p>
					</td>
					<td class="col-md-4"></td>
					</tr>
					<tr>
					<td class="col-md-8" align="right">
						<input type="checkbox" id="credit" name="credit"> <strong>Credit card:</strong>
					</td>
					<td class="col-md-4" id="creditInput"></td>
					</tr>
					<tr>
					<td class="col-md-8" align="right">
						<input type="checkbox" id="debit" name="debit"> <strong>Debit card:</strong>
					</td>
					<td class="col-md-4" id="debitInput"></td>
					</tr>
					<tr>
					<td class="col-md-8" align="right">
						<input type="checkbox" id="cash" name="cash"> <strong>Cash:</strong>
					</td>
					<td class="col-md-4" id="cashInput"></td>
					</tr>
					<tr>
					<td class="col-md-8" align="right">
						<input type="checkbox" id="bank" name="bank"> <strong>Bank Transfer:</strong>
					</td>
					<td class="col-md-4" id="bankInput"></td>
					</tr>
				</table>
			</div>
		</div>

			<div class="form-group">
			<div class="text-center">
				<button class="btn btn-primary" type="submit">Update</button>
			</div>
			</div>
	</form>


@stop
@section('js')
<script>

</script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
    $("#add").click(function(){
    	var append = '<div class="box box-primary">			<div class="box-body">					<div class="row">						<div class="col-md-4">							<div class="form-group">								<label for="service_name[]">Select Service</label>								<select name="service_name[]" class="form-control service" onChange="SelectService(this);" required>										<option value="">--select--</option>										@if($products->count()>0)										@foreach($products as $product)											<option value="{{$product->service}}">{{$product->service}}</option>										@endforeach										@endif								</select>							</div>						</div>					</div>	<div class="Insert"></div>		<div align="right">						<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					</div>	</div>				</div>';
        $("#target").append(append);
        });
    });
	function SomeDeleteRowFunction(btndel) {
    if (typeof(btndel) == "object") {
        $(btndel).closest('.box').remove();
    } else {
        return false;
    }}
    function SelectService(test){
			var value = test.value;
			if (value == 'Flight') {
				var data = '<div class="box-body"> <div class="row">			<div class="col-md-4">				<div class="form-group">					<label for="service_name[]">Select Service</label>					<select name="service_name[]" class="form-control service" required onChange="SelectService(this);">							<option value="">--select--</option>							@if($products->count()>0)							@foreach($products as $product)								<option value="{{$product->service}}" {{($product->service == "Flight")?"selected":''}}>{{$product->service}}</option>							@endforeach							@endif					</select>				</div>			</div>		</div><div class="row">		<div class="col-md-4">		<div class="form-group">			<label for="airline_name">Airline Name</label>			<input type="text" name="airline_name" required class="form-control">		</div>		</div>		<div class="col-md-4">		<div class="form-group">			<label for="source">Source</label>			<input type="text" name="source" class="form-control">		</div>		</div>		<div class="col-md-4">		<div class="form-group">			<label for="destination">Destination</label>			<input type="text" name="destination" required class="form-control">		</div>		</div>		</div><div class="row">		<div class="col-md-3">		<div class="form-group">			<label for="date">Date</label>			<input type="date" name="date" required class="form-control">		</div>		</div>		<div class="col-md-2">		<div class="form-group">			<label for="adult[]">Adult</label>			<input type="text" name="adult[]" class="form-control">		</div>		</div>		<div class="col-md-2">		<div class="form-group">			<label for="child[]">Child</label>			<input type="text" name="child[]" required class="form-control">		</div>		</div>		<div class="col-md-2">				<div class="form-group">					<label for="infant[]">Infant</label>					<input type="text" name="infant[]" required class="form-control">				</div>				</div>	<div class="col-md-3">		<div class="form-group">			<label for="infant_dob[]">Infant DOB</label>			<input type="date" name="infant_dob[]" required class="form-control">		</div>		</div>	</div><div class="row">		<div class="col-md-3">		<div class="form-group">	<label for="flight_quantity[]">Quantity</label>		<input type="text" id="quantity" name="flight_quantity[]" required class="form-control" onKeyUp="FlightAmount()">		</div>		</div>	<div class="col-md-3">			<div class="form-group">	<label for="flight_price[]">Price</label>		<input id="price" type="text" name="flight_price[]" required class="form-control" onKeyUp="FlightAmount()">			</div>		</div>		<div class="col-md-3">			<div class="form-group">	<label for="flight_amount[]">Amount</label>		<input id="amount" type="number" name="flight_amount[]" required class="form-control" readonly>			</div>		</div></div><div align="right">						<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					</div>	</div>				</div></div>';
				$(test).closest(".box").html(data);
			}
			if (value == 'Visa Services') {
				var data = '<div class="box-body"> <div class="row">			<div class="col-md-4">				<div class="form-group">					<label for="service_name[]">Select Service</label>					<select name="service_name[]" class="form-control service" required onChange="SelectService(this);">							<option value="">--select--</option>							@if($products->count()>0)							@foreach($products as $product)								<option value="{{$product->service}}" {{($product->service == "Visa Services")?"selected":''}}>{{$product->service}}</option>							@endforeach							@endif					</select>				</div>			</div>		</div><div class="row">	<div class="col-md-6">		<div class="form-group">			<label for="name_of_visa_applicant">Name Of Visa Applicant</label>			<input type="text" name="name_of_visa_applicant[]" required class="form-control">		</div>		</div>		<div class="col-md-6">		<div class="form-group">			<label for="passport_origin">Passport Origin</label>			<input type="text" name="passport_origin[]" class="form-control">		</div>		</div>		</div>		<div class="row">				<div class="col-md-4">				<div class="form-group">					<label for="visa_country">Visa Country</label>					<input type="text" name="visa_country[]" required class="form-control">				</div>				</div>				<div class="col-md-4">				<div class="form-group">					<label for="visa_type">Visa Type</label>					<input type="text" name="visa_type[]" class="form-control">				</div>				</div>				<div class="col-md-4">						<div class="form-group">							<label for="visa_charges[]">Visa Fee</label>							<input type="text" name="visa_charges[]" class="form-control" onKeyUp="VisaAmount()">						</div>						</div>				</div><div class="row">						<div class="col-md-4">			<div class="form-group">	<label for="service_charge[]">Service Charge</label>		<input id="service_charge" type="text" name="service_charge[]" required class="form-control" onKeyUp="VisaAmount()">			</div>		</div>		<div class="col-md-4">			<div class="form-group">	<label for="visa_amount">Amount</label>		<input id="amount" type="number" name="visa_amount[]" required class="form-control" readonly>			</div>		</div></div><div align="right">						<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					</div>	</div>				</div></div>';
				$(test).closest(".box").html(data);
			}
			if (value == 'Hotel') {
				var data = '<div class="box-body"> <div class="row">			<div class="col-md-4">				<div class="form-group">					<label for="service_name[]">Select Service</label>					<select name="service_name[]" class="form-control service" required onChange="SelectService(this);">							<option value="">--select--</option>							@if($products->count()>0)							@foreach($products as $product)								<option value="{{$product->service}}" {{($product->service == "Hotel")?"selected":''}}>{{$product->service}}</option>							@endforeach							@endif					</select>				</div>			</div>		</div> <div class="row">		<div class="col-md-6">		<div class="form-group">			<label for="hotel_city">City</label>			<input type="text" name="hotel_city[]" required class="form-control">		</div>		</div>		<div class="col-md-6">		<div class="form-group">			<label for="hotel_country">Country</label>			<input type="text" name="hotel_country[]" class="form-control">		</div>		</div>		</div>		<div class="row">		<div class="col-md-4">		<div class="form-group">			<label for="hotel_name">Name</label>			<input type="text" name="hotel_name[]" required class="form-control">		</div>		</div>		<div class="col-md-4">		<div class="form-group">			<label for="check_in_date">Check In Date</label>			<input type="date" name="check_in_date[]" required class="form-control">		</div>		</div>		<div class="col-md-4">		<div class="form-group">			<label for="check_out_date">Check Out Date</label>			<input type="date" name="check_out_date[]" required class="form-control">		</div>		</div>		</div>		<div class="row">		<div class="col-md-3">		<div class="form-group">			<label for="no_of_children[]">No. Of Children</label>			<input type="text" name="no_of_children[]" class="form-control" >		</div>		</div>		<div class="col-md-3">		<div class="form-group">			<label for="no_of_rooms">No. Of Rooms</label>			<input type="text" name="no_of_rooms[]" class="form-control">		</div>		</div>		<div class="col-md-3">		<div class="form-group">			<label for="hotel_amount[]">Amount</label>			<input type="text" name="hotel_amount[]" class="form-control">		</div>		</div>		</div>			</div>		</div></div><div align="right">						<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					</div>	</div>				</div></div>';
				$(test).closest(".box").html(data);
			}
			if (value == 'Insurance') {
				var data = '<div class="box-body"> <div class="row">			<div class="col-md-4">				<div class="form-group">					<label for="service_name[]">Select Service</label>					<select name="service_name[]" class="form-control service" required onChange="SelectService(this);">							<option value="">--select--</option>							@if($products->count()>0)							@foreach($products as $product)								<option value="{{$product->service}}" {{($product->service == "Insurance")?"selected":''}}>{{$product->service}}</option>							@endforeach							@endif					</select>				</div>			</div>		</div><div class="row">	<div class="col-md-4">		<div class="form-group">			<label for="name_of_insurance_applicant">Name Of Insurance Applicant</label>			<input type="text" name="name_of_insurance_applicant[]" required class="form-control">		</div>		</div>		<div class="col-md-4">		<div class="form-group">			<label for="insurance_remarks">Passport Origin</label>			<input type="text" name="insurance_remarks[]" class="form-control">		</div>		</div>						<div class="col-md-4">				<div class="form-group">					<label for="insurance_amount[]">Insurance Amount</label>					<input type="text" name="insurance_amount[]" required class="form-control">				</div>				</div>				</div><div align="right">						<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					</div>	</div>				</div></div>';
				$(test).closest(".box").html(data);
			}
			if (value == 'Local Sight Sceen') {
				var data = '<div class="box-body"> <div class="row">			<div class="col-md-4">				<div class="form-group">					<label for="service_name[]">Select Service</label>					<select name="service_name[]" class="form-control service" required onChange="SelectService(this);">							<option value="">--select--</option>							@if($products->count()>0)							@foreach($products as $product)								<option value="{{$product->service}}" {{($product->service == "Local Sight Sceen")?"selected":''}}>{{$product->service}}</option>							@endforeach							@endif					</select>				</div>			</div>		</div><div class="row">	<div class="col-md-6">		<div class="form-group">			<label for="local_sight_sceen_remarks">Local Sight Sceen Remarks</label>			<input type="text" name="local_sight_sceen_remarks[]" required class="form-control">		</div>		</div>		<div class="col-md-6">				<div class="form-group">					<label for="local_sight_sceen_amount[]">Sight Sceen Charges</label>					<input type="text" name="local_sight_sceen_amount[]" required class="form-control">				</div>				</div>				</div><div align="right">						<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					</div>	</div>				</div></div>';
				$(test).closest(".box").html(data);
			}
			if (value == 'Local Transport') {
				var data = '<div class="box-body"> <div class="row">			<div class="col-md-4">				<div class="form-group">					<label for="service_name[]">Select Service</label>					<select name="service_name[]" class="form-control service" required onChange="SelectService(this);">							<option value="">--select--</option>							@if($products->count()>0)							@foreach($products as $product)								<option value="{{$product->service}}" {{($product->service == "Local Transport")?"selected":''}}>{{$product->service}}</option>							@endforeach							@endif					</select>				</div>			</div>		</div><div class="row">	<div class="col-md-6">		<div class="form-group">			<label for="local_transport_remarks">Local Transport Remarks</label>			<input type="text" name="local_transport_remarks[]" required class="form-control">		</div>		</div>		<div class="col-md-6">				<div class="form-group">					<label for="local_transport_amount[]">Transport Charges</label>					<input type="text" name="local_transport_amount[]" required class="form-control">				</div>				</div>				</div><div align="right">						<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					</div>	</div>				</div></div>';
				$(test).closest(".box").html(data);
			}
			if (value == 'Car Rental') {
				var data = '<div class="box-body"> <div class="row">			<div class="col-md-4">				<div class="form-group">					<label for="service_name[]">Select Service</label>					<select name="service_name[]" class="form-control service" required onChange="SelectService(this);">							<option value="">--select--</option>							@if($products->count()>0)							@foreach($products as $product)								<option value="{{$product->service}}" {{($product->service == "Car Rental")?"selected":''}}>{{$product->service}}</option>							@endforeach							@endif					</select>				</div>			</div>		</div><div class="row">	<div class="col-md-6">		<div class="form-group">			<label for="car_rental_remarks">Car Rental Remarks</label>			<input type="text" name="car_rental_remarks[]" required class="form-control">		</div>		</div>		<div class="col-md-6">				<div class="form-group">					<label for="car_rental_amount[]">Car Rental Charges</label>					<input type="text" name="car_rental_amount[]" required class="form-control">				</div>				</div>				</div><div align="right">						<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					</div>	</div>				</div></div>';
				$(test).closest(".box").html(data);
			}
			if (value == 'Other Facilities') {
				var data = '<div class="box-body"> <div class="row">			<div class="col-md-4">				<div class="form-group">					<label for="service_name[]">Select Service</label>					<select name="service_name[]" class="form-control service" required onChange="SelectService(this);">							<option value="">--select--</option>							@if($products->count()>0)							@foreach($products as $product)								<option value="{{$product->service}}" {{($product->service == "Other Facilities")?"selected":''}}>{{$product->service}}</option>							@endforeach							@endif					</select>				</div>			</div>		</div><div class="row">	<div class="col-md-6">		<div class="form-group">			<label for="other_facilities_remarks">Other Facilities Remarks</label>			<input type="text" name="other_facilities_remarks[]" required class="form-control">		</div>		</div>		<div class="col-md-6">				<div class="form-group">					<label for="other_facilities_amount[]">Other Facilities Charges</label>					<input type="text" name="other_facilities_amount[]" required class="form-control">				</div>				</div>				</div><div align="right">						<input type="button" class="btn btn-danger btn-xs" value="Remove" onclick="SomeDeleteRowFunction(this);">					</div>	</div>				</div></div>';
				$(test).closest(".box").html(data);
			}
			if (value == '') {
				var data = '';
				$(test).closest(".box").html(data);
			}
		}

	function FlightAmount(){
		for (var i = 0; i < document.getElementsByName("flight_price[]").length; i++) {
    		var actual_amount = document.getElementsByName("flight_price[]")[i].value * document.getElementsByName("flight_quantity[]")[i].value;
     		document.getElementsByName("flight_amount[]")[i].value = actual_amount;

    	}
	}

	function VisaAmount(){
		for (var i = 0; i < document.getElementsByName("service_charge[]").length; i++) {
    		var actual_amount = document.getElementsByName("service_charge[]")[i].value - (-document.getElementsByName("visa_charges[]")[i].value);
     		document.getElementsByName("visa_amount[]")[i].value =actual_amount;

    	}
	}



    $(document).ready(function(){
    $("#targetTotal").hover(function(){
		var total_amount = 0;
    	var total_flight_amount = 0;
		var total_visa_amount = 0;
		var total_hotel_amount = 0;
		var total_insurance_amount = 0;
		var total_local_sight_sceen_amount = 0;
		var total_other_facilities_amount = 0;
		var total_car_rental_amount = 0;
		var total_local_transport_amount = 0;
    	for (var i = 0; i < document.getElementsByName("flight_amount[]").length; i++) {
    		var total_flight_amount = total_flight_amount - (-document.getElementsByName("flight_amount[]")[i].value);
    	}
		for (var i = 0; i < document.getElementsByName("visa_amount[]").length; i++) {
    		var total_visa_amount = total_visa_amount - (-document.getElementsByName("visa_amount[]")[i].value);
    	}
		for (var i = 0; i < document.getElementsByName("hotel_amount[]").length; i++) {
    		var total_hotel_amount = total_hotel_amount - (-document.getElementsByName("hotel_amount[]")[i].value);
    	}
		for (var i = 0; i < document.getElementsByName("insurance_amount[]").length; i++) {
    		var total_insurance_amount = total_insurance_amount - (-document.getElementsByName("insurance_amount[]")[i].value);
    	}
		for (var i = 0; i < document.getElementsByName("local_sight_sceen_amount[]").length; i++) {
    		var total_local_sight_sceen_amount = total_local_sight_sceen_amount - (-document.getElementsByName("local_sight_sceen_amount[]")[i].value);
    	}
		for (var i = 0; i < document.getElementsByName("other_facilities_amount[]").length; i++) {
    		var total_other_facilities_amount = total_other_facilities_amount - (-document.getElementsByName("other_facilities_amount[]")[i].value);
    	}
		for (var i = 0; i < document.getElementsByName("car_rental_amount[]").length; i++) {
    		var total_car_rental_amount = total_car_rental_amount - (-document.getElementsByName("car_rental_amount[]")[i].value);
    	}
		for (var i = 0; i < document.getElementsByName("local_transport_amount[]").length; i++) {
    		var total_local_transport_amount = total_local_transport_amount - (-document.getElementsByName("local_transport_amount[]")[i].value);
    	}
		total_amount = Number(total_flight_amount) + Number(total_visa_amount) + Number(total_hotel_amount) + Number(total_insurance_amount) + Number(total_local_sight_sceen_amount) + Number(total_other_facilities_amount) + Number(total_car_rental_amount) + Number(total_local_transport_amount) ;
		document.getElementsByName("total")[0].value = total_amount;
		var discounted = Number(total_amount) - document.getElementsByName("discount")[0].value;
		document.getElementsByName("discounted_total")[0].value = document.getElementById('currency').value + discounted;
    });
    });

    $(document).ready(function(){
    $("#credit").click(function(){
    	var input = '<input name="credit_amount" type="text" class="form-control">';
    	$("#creditInput").html(input);
    });
	});
	$(document).ready(function(){
    $("#debit").click(function(){
    	var input = '<input name="debit_amount" type="text" class="form-control">';
    	$("#debitInput").html(input);
    });
	});
	$(document).ready(function(){
    $("#cash").click(function(){
    	var input = '<input name="cash_amount" type="text" class="form-control">';
    	$("#cashInput").html(input);
    });
	});
	$(document).ready(function(){
    $("#bank").click(function(){
    	var input = '<input name="bank_amount" type="text" class="form-control">';
    	$("#bankInput").html(input);
    });
	});



   	</script>
@stop

