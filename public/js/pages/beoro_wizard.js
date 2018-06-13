/* [ ---- Beoro Admin - wizard ---- ] */

    $(document).ready(function() {
        //* wizard
        beoro_wizard.w_basic();
        beoro_wizard.w_vertical();
        beoro_wizard.w_validation();
    });

    //* wizard
    beoro_wizard = {
        w_basic: function() {
            if($('#wizard-basic').length) { 
                $('#wizard-basic').smartWizard();
            }
        },
        w_vertical: function() {
            if($('#wizard-vertical').length) { 
                $('#wizard-vertical').smartWizard({
                    transitionEffect: 'slide',
                    hideButtonsOnDisabled: true
                });
            }
        },
        w_validation: function() {
            if($('#wizard-validation').length) { 
                $('#wizard-validation-form').validate({
                    onkeyup: false,
                    onfocusout: false,
                    highlight: function(element) {
                        $(element).closest('div.control-group').addClass("f-error");
                    },
                    unhighlight: function(element) {
                        $(element).closest('div.control-group').removeClass("f-error");
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    },
                    rules: {
                        'v_username'    : {
                            required    : true,
                            minlength   : 3
                        },
                        'email'       : 'email',
                        'v_newsletter'  : 'required',
                        'v_password'    : 'required',
                        'v_city'        : 'required',
                        'v_entite'     : 'required',
                        's_entite'      : 'required'
                    }, messages: {
                        'v_username'    : { required:  'Le Nom d\'utilisateur est obligatoire!' },
                        'email'       : { email   :  'E-mail invalide!' },
                        'v_newsletter'  : { required:  'Newsletter field is required!' },
                        'v_password'    : { required:  'Le Mot de passe est obligatoire!' },
                        'v_city'        : { required:  'City field is requerid!' },
                        'v_entite'     : { required:  'Vous devez appartenir à une entité!' },
                        's_entite'     : { required:  'Vous devez selection un type d\' entité!' }
                    },
                    ignore              : ':hidden'
                });
                
                $('#wizard-validation').smartWizard({
                    onLeaveStep: function(obj,context) {
                        var isValid = $('#wizard-validation-form').valid();
                        if(isValid) {
                            $('#wizard-validation').smartWizard('setError',{stepnum:context.fromStep,iserror:false});
                            return true;
                        } else {
                            adjustStepHeight();
                            return false;
                        }
                    },
                    hideButtonsOnDisabled: true,
                    labelFinish: 'Save'
                });

                function adjustStepHeight() {
                    var thisFormWrapper = $('#wizard-validation').find('.stepContainer');
                    var actStep = thisFormWrapper.children('.content').filter(':visible');
                    thisFormWrapper.height(actStep.height());
                }
            }
        }
    };