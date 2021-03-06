@extends('layouts.frontend')
@section('title')
Invoices
@endsection
@section('header')
	<section class="content-header">
      <h1>
        Invoice
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-paperclip"></i>Invoice</li>
      </ol>
    </section>
@stop
@section('content')
	
		<div class="box box-info">
			<div class="box-body">
				
			
			<table id="myTable" class="table table-striped">
                    <thead id="ignorePDF">
                      <tr>
                        <th>Invoice No.</th>
                        <th>Invoice Date</th>
                        <th>Receiver Name</th>
                        <th>Total</th>
                        <th>Status</th>
                        {{-- <th>PDF</th> --}}
                        <th>Action</th>
                        {{-- <th>Delete</th> --}}
                      </tr>
                    	</thead>
                    <tbody>
                    	@if($invoices->count()>0)
                    	
	                    	@foreach($invoices as $invoice)
	                    	<tr>
	                    		<td>{{$invoice->invoice_no}}</td>
	                    		<td>{{$invoice->invoice_date}}</td>
	                    		<td>{{$invoice->receiver_name}}</td>
					                <?php $total = $invoice->discounted_total + $invoice->VAT_amount ?>
					                <td>{{$invoice->currency}}{{$total}}</td>
	                    		@if($invoice->status == 1)
	                    		<td><div class="text-success">{{'Paid'}}</div></td>
	                    		@else
	                    		<td><div class="text-danger">{{'Unpaid'}}</div></td>
	                    		@endif
	                    		{{-- <td><button class="btn btn-xs btn-success" id="pdf">PDF</button></td> --}}
	                    		<td>
														<a href="{{route('invoice.view',['id'=>$invoice->id])}}" class="btn btn-info btn-xs"><span class="fa fa-eye"></span></a>
														@if($invoice->status == 0)
	                    			<a href="{{route('invoice.edit',['id'=>$invoice->id])}}" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a>
														<a href="{{route('invoice.delete',['id'=>$invoice->id])}}" class="btn btn-danger btn-xs">Cancel</a>
														<a href="{{route('invoice.pay',['id'=>$invoice->id])}}" class="btn btn-primary btn-xs">Pay</a>
														<a href="{{route('invoice.reminder',['id'=>$invoice->id])}}" class="btn btn-warning btn-xs">Send Reminder</a>
														@endif
	                    		</td>
	                    	</tr>
	                    	@endforeach
                    	@endif
                    </tbody>
            </table>
        
		</div>
		</div>
		<div class="text-center">
			<a href="{{route('invoice.create')}}">
				<button class="btn btn-success">Create</button>
			</a>
		</div>
@endsection
@section('js')
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script>
	$(document).ready(function(){
    $("#pdf").click(function(){
	var doc = new jsPDF()
	var source = document.getElementById('myTable');
	doc.fromHTML(source);
	doc.output("dataurlnewwindow");
	});
	});
</script>
@stop

