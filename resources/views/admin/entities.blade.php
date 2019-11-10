@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title text-center">End of Entities' Subscriptions</h4>
      </div>
      <div class="card-body">
          
          <table class="table table-condensed">
            <tr>
              <td>Index</td>
              <td>Entities</td>              
              <td>Date</td>
            </tr>
            <?php $amount=0;$amount2=0; ?>
            @foreach($entities as $entitie)
            <tr>
              <td>{{$loop->iteration}}</td>              
              <td>{{$entitie->name}}</td>
              <td>{{$entitie->subscription->sport_id}}</td>
              <td>{{$entitie->created_at}}</td>
            </tr>  
              @endforeach     
             </table>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection