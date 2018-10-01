<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <link rel="icon" type="image/ico" href="favicon.ico">
    <title>{{config('app.name')}} - Login</title>

    <link rel="stylesheet" href="{{asset('public/css/login.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'>
    <!-- jQuery framework -->
        <script src="{{asset('public/js/jquery.min.js')}}"></script>
    <!-- validation -->
    <script src="{{asset('public/js/lib/jquery-validation/jquery.validate.js')}}"></script>
    
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
            <img src="{{asset('public/img/beoro.png')}}" alt="" class="logo_img" />

            <div class="panel">
                <p class="heading_main">Accès Administrateur</p>

                @if (session('status'))
                <small style="color:green;font-size: 9pt">{{ session('status') }}</small><br><br>
                @endif

                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}

                    <label for="login_name">Email</label>
                    <input type="email" id="login_name" name="email" value="{{ old('email') }}" placeholder="exemple@gmail.com" required autofocus/>

                    @if ($errors->has('email'))
                        <small style="color:red;font-size: 9pt">{{ $errors->first('email') }}</small><br><br>
                    @endif

                    <label for="login_password">Mot de passe</label>
                    <input type="password" id="login_password" name="password" required/>

                    @if ($errors->has('password'))
                        <small style="color:red;font-size: 9pt">{{ $errors->first('password') }}</small><br><br>
                    @endif

                    <label for="login_remember" class="checkbox">
                        <input type="checkbox" id="login_remember" name="remember" {{ old('remember') ? 'checked' : '' }} /> Se souvenir de moi
                    </label>

                    <div class="submit_sect">
                        <button type="submit" class="btn btn-beoro-3">Connecter</button>
                    </div>
                </form>
            </div>
            <div class="panel" style="display:none">

                <p class="heading_main">Réinitialiser le Mot de passe?</p>

                <form id="forgot-validate" method="post" action="{{ route('password.email') }}"">
                    {{ csrf_field() }}

                    <label for="forgot_email">Votre adresse email</label>
                    <input type="text" id="forgot_email" name="email" value="{{ old('email') }}" required/>

                    @if ($errors->has('email'))
                        <small style="color:red;font-size: 9pt">{{ $errors->first('email') }}</small>
                    @endif

                    <div class="submit_sect">
                        <button type="submit" class="btn btn-beoro-3">Envoyer le mot de passe</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="login_links">
            <a href="javascript:void(0)" id="pass_login"><span>Mot de passe oublié?</span><span style="display:none">Accès Administrateur</span></a>
        </div>
    </div>


</body>
</html>