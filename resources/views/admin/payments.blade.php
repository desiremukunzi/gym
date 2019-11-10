@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title text-center">Payments recieved</h4>
      </div>
      <div class="card-body">
          
          <table class="table table-condensed">
            <tr>
              <td>Index</td>
              <td>Names</td>              
              <td>Amount</td>
              <td>Done-At</td>
            </tr>
            <?php $amount=0;$amount2=0; ?>
            @foreach($payments as $payment)
            <tr>
              <td>{{$loop->iteration}}</td>              
              <td>{{$payment->client->name}}</td>
              <td>{{$payment->amount}}</td>
              <td>{{$payment->created_at}}</td>
            </tr>  
              @php $amount=$amount+$payment->amount; @endphp
              @endforeach     
              <tr><td>Total</td><td colspan="1"></td><td>{{$amount}}</td><td></td></tr>        
             </table>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection