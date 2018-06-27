@extends('layouts.auth')

@section('content')


<div id="page-container" class="main-content-boxed">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-gd-lake">
            <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                <!-- Header -->
                <div class="py-30 px-5 text-center">
                    <a class="link-effect font-w700" href="index.html">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
                    </a>
                    <h1 class="h2 font-w700 mt-50 mb-10">Don’t worry, we’ve got your back</h1>
                    <h2 class="h4 font-w400 text-muted mb-0">Please enter your username or email</h2>
                </div>
                <!-- END Header -->

                <!-- Reminder Form -->
                <div class="row justify-content-center px-5">
                    <div class="col-sm-8 col-md-6 col-xl-4">
                        <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        <label for="reminder-credential">Email</label>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                                    <i class="fa fa-asterisk mr-10"></i> Password Reminder
                                </button>
                                <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="op_auth_signin.html">
                                    <i class="si si-login text-muted mr-10"></i> Sign In
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Reminder Form -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>


@endsection

@section('js')
@if (session('status'))
<script type="text/javascript">
    swal({
      type: 'success',
      title: "Sukses",
      text: "{{ session('status') }}",
  });
</script>
@endif
@endsection