@extends('layouts.master')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center><strong>Register New Entity</strong></center></div>
                <div class="card-body">
                    @include('multiauth::message')
                    <form method="POST" action="{{ route('admin.institution_register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Representative Names</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="representative_name" value="{{ old('representative_name') }}"
                                required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tel</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}"
                                required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">Sports Subscriptions</label>
                            <div class="col-md-6">
                                @foreach($sports as $sport)
                                
                                {{$sport->name}}&nbsp;&nbsp;<input type="checkbox" name="{{$sport->name}}" value="{{$sport->id}}">
                                
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">duration</label>
                            <div class="col-md-6">
                                <select name="duration" id="sport_id" class="form-control {{ $errors->has('duration_id') ? ' is-invalid' : '' }}">
                                    <option selected disabled>Select duration</option>
                                    @foreach ($durations as $duration)
                                    <option value="{{ $duration->id }}">{{ $duration->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' text-danger' : '' }} row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary float-left">
                                Register
                                </button>
                                <a href="{{ route('admin.show') }}" class="btn btn-info float-right">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection