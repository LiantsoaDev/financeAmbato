<div class="row-fluid">
        <div class="span12">
            <div class="w-box w-box-green">
                <div class="w-box-header">
                    <h4>Site</h4>
                    <i class="icsw16-settings icsw16-white pull-right"></i>
                </div>
                <div class="w-box-content cnt_a">
                    <div class="row-fluid">
                        <div class="span12">
                            <p class="heading_a">Choix d'une année budgetaire</p>
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="formSep">
                                        <label for="s_mailer">Choisissez une année budgetaire </label>
                                        <select id="s_mailer" name="s_mailer" class="span6">
                                            @foreach($years as $y)
                                                <option value="{{$y}}">{{$y}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">Choisissez une Année antérieure</span>
                                    </div>
                                </div>
                                <div class="span6"><hr>
                                <button type="button" class="btn btn-success">Valider</button>
                                <a href="javascript:back.history()" type="button" class="btn btn-danger">Retour</a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>