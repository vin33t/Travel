@extends('layouts.frontend')
@section('title')
Accounts Department
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@stop
@section('header')
	<section class="content-header">
      <h1>
        Accounts Department
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('departments')}}"><i class="fa fa-cube"></i> Departments</a></li>
        <li class="active"><i class="fa fa-user-circle"></i> Accounts Department</li>
      </ol>
    </section>
@stop
@section('content')

    <div class="row">
        <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                <h3>{{App\User::role('Account Manager')->count()}}</h3>

                <p>{{'Accounts Manager'}}</p>
                </div>
                <div class="icon">
                <i class="fa fa-user-circle"></i>
                </div>
                <a href="{{route('display.specific',['slug'=>'Account Manager'])}}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                <h3>{{App\User::role('Account Executive')->count()}}</h3>

                <p>{{'Accounts Executive'}}</p>
                </div>
                <div class="icon">
                <i class="fa fa-users"></i>
                </div>
                <a href="{{route('display.specific',['slug'=>'Account Executive'])}}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-body">
                <section class="content-header">
                  {{-- <span class="pull-right"><a href="{{route('invoice.report')}}" class="btn btn-xs bg-maroon">Report</a></span> --}}
                  <h1 class="text-center">
                    <span style="color:#0066FF;">Today's Invoices({{$invoices->count()}})</span>
                  </h1>
    
                  <hr>
    
                </section>
                <div class="table-responsive">
                  <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                    <thead>
                      <tr>
                        <th>Invoice No.</th>
                        <th>Invoice Date</th>
                        <th>Receiver Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($invoices->count()>0)
                      
                        @foreach($invoices as $invoice)
                        <tr>
                          <td><a href="{{route('invoice.view',['id'=>$invoice->id])}}">{{$invoice->invoice_no}}</a></td>
                          <td>{{$invoice->invoice_date}}</td>
                          <td>{{$invoice->receiver_name}}</td>
                          
                          <?php $total = $invoice->discounted_total + $invoice->VAT_amount ?>
                          <td>{{$invoice->currency}}{{$total}}</td>
                          
                          @if($invoice->status == 1)
                          <td><small class="label label-success">Paid</small></td>
                          @else
                          <td><small class="label label-danger">Unpaid</small></td>
                          @endif
                          
                        </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{route('paidInvoice.report')}}">
                <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Paid Invoices</span>
                    <span class="info-box-number">{{$paid_invoices->count()}}</span>

                    <div class="progress">
                    <div class="progress-bar" style="width: @if($invoices->count()>0)
                    {{(($paid_invoices->count()/$invoices->count())*100)}}%
                    @else
                    0%
                    @endif"></div>
                    </div>
                        <span class="progress-description">
                        @if($invoices->count()>0)
                        {{(($paid_invoices->count()/$invoices->count())*100)}}%
                        @else
                        0%
                        @endif
                        </span>
                </div>
                </div>
            </a>

            <a href="{{route('canceled.invoices')}}">
                <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-ban"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Canceled Invoices</span>
                    <span class="info-box-number">{{$canceled_invoices->count()}}</span>

                    <div class="progress">
                    <div class="progress-bar" style="width: @if($invoices->count()>0)
                    {{(($canceled_invoices->count()/$invoices->count())*100)}}%
                    @else
                    0%
                    @endif"></div>
                    </div>
                        <span class="progress-description">
                        @if($invoices->count()>0)
                        {{(($canceled_invoices->count()/$invoices->count())*100)}}%
                        @else
                        0%
                        @endif
                        </span>
                </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('unpaidInvoice.report')}}">
                <div class="info-box bg-navy">
                <span class="info-box-icon"><i class="fa fa-thumbs-o-down"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">UnPaid Invoices</span>
                    <span class="info-box-number">{{$unpaid_invoices->count()}}</span>
    
                    <div class="progress">
                    <div class="progress-bar" style="width:
                    @if($invoices->count()>0)
                    {{(($unpaid_invoices->count()/$invoices->count())*100)}}%
                    @else
                    0%
                    @endif"></div>
                    </div>
                        <span class="progress-description">
                        @if($invoices->count()>0)
                        {{(($unpaid_invoices->count()/$invoices->count())*100)}}%
                        @else
                        0%
                        @endif
                        </span>
                </div>
                </div>
            </a>
        </div> 
    </div>
@stop
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>


  <script>
  	$(document).ready(function() {
    $('#recent-orders').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        ]
    } );
} );
</script>
@endsection