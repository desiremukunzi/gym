@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>

                <div class="card-body">
                @include('multiauth::message')
       <div class="form-inline">
            <form class="card-title" method="POST" action="admin/from_to">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{$id ?? ''}}">

                  <input type="date" name="from" required="required" class="form-control" placeholder="from date">

                  <input type="date" name="to" required="required" class="form-control"   placeholder="to date">


                  <input type="submit" name="check" value="Pull Attendance History" class="btn btn-info">
            </form>
        </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <form method="POST" action="{{ route('admin.attendance')}}" >
                            @csrf 
                     <table class="table table-condensed">
                        <tr>
                            <td>Index</td>
                            <td>Names</td>
                            @foreach($sports as $sport)
                            <td>{{$sport->sport->name}}</td>
                            @endforeach
                            <td></td>
                        </tr>
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
                    
                 <?php $count ++;?>

                    @endif

                    @endforeach
                       <a href="/admin/attendance_details/{{$client->id}}/{{$from}}/{{$to}}/{{$sport2}}">{{$count}}
                        </a>
                    </td>
                        @endforeach
                        </tr>                         
                        @endforeach                        
                     </table>
                    </form>   

                </div>
            </div>
        </div>
    </div>

@endsection