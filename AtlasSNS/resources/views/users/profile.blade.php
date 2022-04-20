@extends('layouts.login')

@section('content')
<body>
  <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['profile_edit'], 'method' => 'PUT']) !!}
            {!! Form::hidden('id',$user->id) !!}
            <div class="m-3">
                <div class="form-group pt-1">
                    {{Form::label('name','user name')}}
                    {{Form::text('name', $user->username, ['class' => 'form-control', 'id' =>'name'])}}
                    <span class="text-danger">{{$errors->first('username')}}</span>
                </div>
                <div class="form-group pt-2">
                    {{Form::label('mail','mail addres')}}
                    {{Form::email('mail', $user->mail, ['class' => 'form-control', 'id' =>'email'])}}
                    <span class="text-danger">{{$errors->first('mail')}}</span>
                </div>
                <div class="form-group pt-3">
                        {{Form::label('password','password')}}
                        {{Form::password('password', ['class' => 'form-control', 'id' =>'password'])}}
                        <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
                <div class="form-group pt-4">
                        {{Form::label('password_confirmation','password comfirm')}}
                        {{Form::password('password_confirmation', ['class' => 'form-control', 'id' =>'password_confirmation'])}}
                        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                </div>
                <div class="form-group pt-3">
                        {{Form::label('bio','bio')}}
                        {{Form::password('bio', ['class' => 'form-control', 'id' =>'bio'])}}
                        <span class="text-danger">{{$errors->first('bio')}}</span>
                </div>
                <div>
                    <p>icon image</p>
                </div>
                <div class="w-25">
                        {{Form::submit(' 更新する ', ['class'=>'btn btn-success rounded-pill'])}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @if ($errors->any())
        <script src="{{ asset('js/modal.js') }}"></script>
    @endif
</body>
@endsection