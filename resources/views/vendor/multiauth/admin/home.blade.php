@extends('multiauth::layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>

                <div class="card-body">
                @include('multiauth::message')
       <div class="form-inline">
            <form class="card-title" method="POST" action="{{route('admin.from_to')}}">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{$id}}">
                  <input type="date" name="from" required="required" class="form-control" placeholder="from date">

                  <input type="date" name="to" required="required" class="form-control"   placeholder="to date">

                  <select name="sport" class="form-control">
                            @foreach($sports as $sport)
                            <option value={{$sport->sport->id}}>{{$sport->sport->name}}</option>
                            @endforeach                  
                  </select>

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
                        <input type="text" name="client_id" value="{{$client->id}}">
                        @foreach($sports as $sport)
                       <td> 
                        <input type="checkbox" name="{{$sport->sport->name}}" value="{{$client->id}}">
                    </td>
                        @endforeach
                        <td><input type="submit" name="save" value="Save"></td>
                        </tr>                         
                        @endforeach                        
                     </table>
                    </form>   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection