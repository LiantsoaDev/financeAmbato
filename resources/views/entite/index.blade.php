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
                                <h4>Step Validation</h4>
                            </div>
                            <div class="w-box-content">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <form id="wizard-validation-form" class="form-horizontal" action="{{$action}}" method="POST">
                                        	{{csrf_field()}}
                                            <div id="wizard-validation" class="swMain">
                                                <ul>
                                                    <li>
                                                        <a href="#sw-val-step-1">
                                                            <span class="stepNumber">1</span>
                                                            <span class="stepDesc">
                                                               A propos d'une Entité<small>Information concernant un entité</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#sw-val-step-2">
                                                            <span class="stepNumber">2</span>
                                                            <span class="stepDesc">
                                                               Formulaire d'Entité<small>Remplir les informations concernant l'entité</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="sw-val-step-1">
                                                    <h2 class="StepTitle">Etape 1: A propos d'un Entité</h2>
                                                    <p>Nous mettons en œuvre une variété de mesures de sécurité pour préserver la sécurité de vos informations personnelles. Nous utilisons un cryptage à la pointe de la technologie pour protéger les informations sensibles transmises en ligne. Nous protégeons également vos informations hors ligne. Seuls les personnes qualifiées qui ont besoin d’effectuer un travail spécifique ont accès aux informations personnelles identifiables<br>Nous ne vendons, n’échangeons et ne transférons pas vos informations personnelles identifiables à des tiers. Cela ne comprend pas les tierce parties de confiance qui nous aident à exploiter notre site Web ou à mener nos affaires, tant que ces parties conviennent de garder ces informations confidentielles.<br>Nous pensons qu’il est nécessaire de partager des informations afin d’enquêter, de prévenir ou de prendre des mesures concernant des activités illégales, fraudes présumées, situations impliquant des menaces potentielles à la sécurité physique de toute personne, violations de nos conditions d’utilisation, ou quand la loi nous y contraint.<br>
                                                    En utilisant cette application, vous consentez à notre politique de confidentialité.</p>
                                                </div>
                                                <div id="sw-val-step-2">
                                                    <h2 class="StepTitle">Etape 2: Formulaire d'information</h2>	
                                                    <div class="formSep control-group">
                                                        <label for="v_entite" class="control-label req">Nom d'Entité:</label>
                                                        <div class="controls">
                                                            <input type="text" name="v_entite" id="v_entite" class="span6">
                                                        </div>
                                                    </div>
                                                    <div class="formSep control-group">
                                                        <label for="v_country" class="control-label req">Type d'Entité:</label>
                                                        <div class="controls">
                                                            <select name="s_entite" id="s_entite" class="span6">
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
<!-- smart wizard -->
            <script src="{{asset('js/lib/smart-wizard/js/jquery.smartWizard.min.js')}}"></script>
        <!-- validation -->
            <script src="{{asset('js/lib/jquery-validation/jquery.validate.min.js')}}"></script>

            <script src="{{asset('js/pages/beoro_wizard.js')}}"></script>
            @include('notify.index')
@endsection