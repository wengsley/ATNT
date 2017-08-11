@extends("app")

@section("main-content")

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="register-box">
        <div class="panel panel-default">
            <div class="panel-body">
                 <form action="{{ url('/register') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <div class="top-form">{!! Form::label('User Name') !!}</div>
                        <label class="left-form">
                            {!! Form::text('firstname', null, ['required', 'class'=>'form-control', 'placeholder'=>'Enter Your First Name']) !!}
                        </label>

                        <label class="right-form">
                            {!! Form::text('lastname', null, ['required', 'class'=>'form-control', 'placeholder'=>'Enter Your Last Name']) !!}
                        </label>
                    </div>
                    <div class="form-group has-feedback">
                        {!! Form::label('Email') !!}
                        {!! Form::text('email', null, ['required', 'class'=>'form-control', 'placeholder'=>'Enter Your Email Address']) !!}
                    </div>

                    <div class="form-group has-feedback">   
                        <div class="top-form">{!! Form::label('Password') !!}</div>
                        <label class="left-form">                          
                            {!! Form::password('password', null, ['required', 'class'=>'form-control', 'placeholder'=>'Enter Your Password']) !!}
                        </label>

                        <label class="right-form">
                            {!! Form::password('password_confimation', null, ['required', 'class'=>'form-control', 'placeholder'=>'Re-Enter Your Password']) !!}
                        </label>
                    </div>
                    <div class="form-group has-feedback">
                        {!! Form::label('Contact No.') !!}
                        {!! Form::text('mobile', null, ['required', 'class'=>'form-control', 'placeholder'=>'Enter Your Contact No']) !!}
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> I agree to the <b>Terms and Conditions</b>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::submit('GET STARTED', ['class'=>'btn btn-info btn-block btn-flat']) !!}
                        </div>
                    </div>
               </form>
            </div>
            </div>
        </div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/auth.css') }}"/>
@endpush

@push('scripts')
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
@endpush
