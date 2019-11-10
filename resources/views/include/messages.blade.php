@if(count($errors) > 0)
    <div class="alert alert-solid-danger">
        <div class="alert-text">
            <h4 class="alert-heading">Errors Found : </h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif


@if(session('success'))
    <div class="alert alert-solid-success alert-bold">
        <div class="alert-text">{{session('success')}}</div>
    </div>
@endif



@if(session('error'))
    <div class="alert alert-solid-danger alert-bold">
        <div class="alert-text">{{session('error')}}</div>
    </div>
@endif

