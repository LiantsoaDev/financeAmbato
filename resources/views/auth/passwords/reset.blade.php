<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <link rel="icon" type="image/ico" href="favicon.ico">
    <title>{{config('app.name')}} - Reset</title>

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'>
    <!-- jQuery framework -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- validation -->
    <script src="{{asset('js/lib/jquery-validation/jquery.validate.js')}}"></script>
    
    <script type="text/javascript">
        (function(a){a.fn.vAlign=function(){return this.each(function(){var b=a(this).height(),c=a(this).outerHeight(),b=(b+(c-b))/2;a(this).css("margin-top","-"+b+"px");a(this).css("top","50%");a(this).css("position","absolute")})}})(jQuery);(function(a){a.fn.hAlign=function(){return this.each(function(){var b=a(this).width(),c=a(this).outerWidth(),b=(b+(c-b))/2;a(this).css("margin-left","-"+b+"px");a(this).css("left","50%");a(this).css("position","absolute")})}})(jQuery);
        $(document).ready(function() {
            if($('#login-wrapper').length) {
                $("#login-wrapper").vAlign().hAlign()
            };
            if($('#login-validate').length) {
                $('#login-validate').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    rules: {
                        login_name: { required: true },
                        login_password: { required: true }
                    }
                })
            }
            if($('#forgot-validate').length) {
                $('#forgot-validate').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    rules: {
                        forgot_email: { required: true, email: true }
                    }
                })
            }
            $('#pass_login').click(function() {
                $('.panel:visible').slideUp('200',function() {
                    $('.panel').not($(this)).slideDown('200');
                });
                $(this).children('span').toggle();
            });
        });
    </script>

</head>
<body>
    <div id="login-wrapper" class="clearfix">
        <div class="main-col">
            <img src="{{asset('img/beoro.png')}}" alt="" class="logo_img" />

            <div class="panel">
                <p class="heading_main">Réinitialisation du Mot de passe</p>

                <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <label for="login_password">E-Mail</label>
                    <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus/>

                    @if ($errors->has('email'))
                        <small style="color:red;font-size: 9pt">{{ $errors->first('email') }}</small><br><br>
                    @endif

                    <label for="login_password">Mot de passe</label>
                    <input id="password" type="password" name="password" required/>

                    @if ($errors->has('password'))
                        <small style="color:red;font-size: 9pt">{{ $errors->first('password') }}</small><br><br>
                    @endif

                    <label for="login_password">Confirmer Mot de passe</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>   

                     @if ($errors->has('password_confirmation'))
                            <small style="color:red;font-size: 9pt">{{ $errors->first('password_confirmation') }}</small><br><br>
                    @endif

                    <div class="submit_sect">
                        <button type="submit" class="btn btn-beoro-3">Réinitialiser</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>