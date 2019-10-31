@extends('multiauth::layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>

                <div class="card-body">
                @include('multiauth::message')
                @foreach($attendances as $attendance)
                <h3><u>From{{$from." To ".$to."  ".$attendance->client->name." Attended the ".$attendance->sport->name."  "." as below"}}</u></h3>
                @break
                @endforeach
                     <table class="table table-condensed">
                        <tr>
                            <td>Index</td>
                            <td>Date and Time</td>
                            <td></td>
                        </tr>
                        @foreach($attendances as $attendance)
                       <tr>
                       <td>{{$loop->iteration}}</td>                        
                       <td>{{$attendance->created_at}}</td>
                       </tr> 
                       @endforeach                        
                     </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection