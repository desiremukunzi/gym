@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title text-center">Select Sports to attend</h4>
      </div>
      <div class="card-body">
        <div class="form-inline">
          @if(auth('client')->user()->client_type_id==1)
          <form method="POST" action="{{ route('client.momo')}}" >
            @csrf
            <input type="hidden" name="token" value="cVxOFqvRKayuYY6eSIx0fcsOqBUeUG7i">
            <table class="table table-condensed">
              @foreach($sports as $sport)
              <tr>
                <td>{{$sport->name}}</td>
                <td><input type="checkbox" name="{{$sport->name}}" value="{{$sport->id}}"></td>
              </tr>
              @endforeach
              <tr><td colspan="1"><input type="submit" name="save" value="Save"></td></tr>
            </table>
          </form>
          @else
          <table class="table table-condensed">
            <tr>
              <td>Index</td>
              <td>Names</td>
              @foreach($sports as $sport)
              <td>{{$sport->sport->name}}</td>
              
              @endforeach
              <td></td>
            </tr>
            <?php $amount=0;$amount2=0; ?>
            @foreach($clients as $client)
            <tr>
              <td>{{$loop->iteration}}</td>
              
              <td>{{$client->name}}</td>
              @foreach($sports as $sport)
              <td>
                <?php $count=0; ?>
                @foreach($attendances as $attendance)
                <?php $sport2=$sport->sport->id; $attendance2=$attendance->sport_id ;$client2=$client->id; $client_id2=$attendance->client_id; ?>
                @if(($sport2==$attendance2)&&($client2==$client_id2))
                
                <?php
                $count ++;
                $discount=$sport->sport->discount;
                
                ?>
                @endif
                @endforeach
                {{--  <a href="/admin/attendance_details/{{$client->id}}/{{$from}}/{{$to}}/{{$sport2}}">{{$count}}</a> --}}
                {{$count}}
                
                <?php $amoun=$discount*$count;
                $amount=$amount+$amoun; ?>
                
              </td>
              
              @endforeach
              <td>
                <?php
                echo $amount;
                $amount2=$amount2+$amount;
                ?>
                
              </td>
            </tr>
            @endforeach
          </table>
          
          <form method="POST" action="{{ route('client.momo')}}" >
            @csrf
            <input type="hidden" name="token" value="cVxOFqvRKayuYY6eSIx0fcsOqBUeUG7i">
            <input type="text" name="amount" readonly="readonly" value="{{$amount2}}">
            <input type="submit" name="" value="Pay">
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>
  
</div>
@endsection