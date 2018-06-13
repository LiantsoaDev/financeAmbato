@extends('layouts.app')

@section('style')
<!-- aditional stylesheets -->
        <!-- smart wizard -->
            <link rel="stylesheet" href="{{asset('js/lib/smart-wizard/styles/smart_wizard.css')}}">     
@endsection


@section('content')
<div class="container">
    <div class="row-fluid">
        <div class="span12">
        	<div class="w-box w-box-blue">
                            <div class="w-box-header">
                                <h4>Etape d'Enregistrement</h4>
                            </div>
                            <div class="w-box-content">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <form id="wizard-validation-form" class="form-horizontal" method="POST" action="{{route('page.insert.membre')}}">
                                        	{{csrf_field()}}
                                            <div id="wizard-validation" class="swMain">
                                                <ul>
                                                    <li>
                                                        <a href="#sw-val-step-1">
                                                            <span class="stepNumber">1</span>
                                                            <span class="stepDesc">
                                                               Détails du Compte<small>Remplissez les détails de votre compte</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#sw-val-step-2">
                                                            <span class="stepNumber">2</span>
                                                            <span class="stepDesc">
                                                               Information supplémentaire<small>Remplissez vos informations</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#sw-val-step-3">
                                                            <span class="stepNumber">3</span>
                                                            <span class="stepDesc">
                                                               Termes et conditions<small>Conditions générales d'utilisation</small>
                                                            </span>
                                                         </a>
                                                    </li>
                                                </ul>
                                                <div id="sw-val-step-1">
                                                    <h2 class="StepTitle">Etape 1: Détails du Compte</h2>
                                                    <div class="formSep control-group">
                                                        <label for="v_username" class="control-label req">Nom d'utilisateur:</label>
                                                        <div class="controls">
                                                            <input type="text" name="v_username" id="v_username" class="span6">
                                                            <span class="help-block">Au moins 3 caractères</span>
                                                        </div>
                                                    </div>
                                                    <div class="formSep control-group">
                                                        <label for="v_password" class="control-label req">Mot de passe:</label>
                                                        <div class="controls">
                                                            <input type="password" name="v_password" id="v_password" class="span6">
                                                        </div>
                                                    </div>
                                                    <div class="formSep control-group">
                                                        <label for="email" class="control-label">E-mail:</label>
                                                        <div class="controls">
                                                            <input type="text" name="email" id="email" class="span6">
                                                            @if($errors->has('email'))
	                                                        <small style="color:red;font-size: 9pt">* {{$errors->first('email')}}</small>
	                                                        @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="sw-val-step-2">
                                                    <h2 class="StepTitle">Etape 2: Information supplémentaire</h2>	
                                                    <div class="formSep control-group">
                                                        <label for="v_country" class="control-label req">Entités:</label>
                                                        <div class="controls">
                                                            <select name="v_entite" id="v_entite" class="span6" onchange="showUser(this.value)">
                                                                <option></option>
                                                                <option value="admin">Komity Site Web</option>
                                                                <option value="birao">Biraom-piangonana</option>
                                                                <option value="sampana">Sampana</option>
                                                                <option value="rantsana">Rantsana</option>
                                                                <option value="comite">Komity</option>
                                                                <option value="controlleur">Controlleur</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="formSep control-group">
                                                        <div id="txtHint"><b>Une liste des entités s'afficheront ici... </b></div>
                                                    </div> 
                                                </div>
                                                <div id="sw-val-step-3">
                                                    <h2 class="StepTitle">Etape 3: Politique de confidentialité</h2>
                                                    <p>Nous mettons en œuvre une variété de mesures de sécurité pour préserver la sécurité de vos informations personnelles. Nous utilisons un cryptage à la pointe de la technologie pour protéger les informations sensibles transmises en ligne. Nous protégeons également vos informations hors ligne. Seuls les personnes qualifiées qui ont besoin d’effectuer un travail spécifique ont accès aux informations personnelles identifiables<br>Nous ne vendons, n’échangeons et ne transférons pas vos informations personnelles identifiables à des tiers. Cela ne comprend pas les tierce parties de confiance qui nous aident à exploiter notre site Web ou à mener nos affaires, tant que ces parties conviennent de garder ces informations confidentielles.<br>Nous pensons qu’il est nécessaire de partager des informations afin d’enquêter, de prévenir ou de prendre des mesures concernant des activités illégales, fraudes présumées, situations impliquant des menaces potentielles à la sécurité physique de toute personne, violations de nos conditions d’utilisation, ou quand la loi nous y contraint.<br>
                                                    En utilisant cette application, vous consentez à notre politique de confidentialité.</p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>	
@endsection

@section('script')
<script>
    function showUser(str) {
      if (str=="") {
        document.getElementById("txtHint").innerHTML="";
        return;
      } 
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("txtHint").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","{{ url('private/getentite').'/' }}"+str,true);
      xmlhttp.send();
    }
</script>
<!-- smart wizard -->
            <script src="{{asset('js/lib/smart-wizard/js/jquery.smartWizard.min.js')}}"></script>
        <!-- validation -->
            <script src="{{asset('js/lib/jquery-validation/jquery.validate.min.js')}}"></script>

            <script src="{{asset('js/pages/beoro_wizard.js')}}"></script>
            @include('notify.index')
@endsection