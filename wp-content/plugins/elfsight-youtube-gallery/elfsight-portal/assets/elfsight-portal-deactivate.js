function deactivatePopupReady(slug){
    var $deactivateLink = jQuery('#' + slug + '-deactivateLink');

    var $deactivatePopup = jQuery('#' + slug + '-deactivatePopup'),
        $deactivatePopupOverlay  = jQuery('#' + slug + '-deactivateOverlay'),
        $deactivateForm  = jQuery('#' + slug + '-deactivateForm');

    var $proceedDeactivate = $deactivatePopup.find('#proceedDeactivate'),
        $submitDeactivate = $deactivatePopup.find('#submitDeactivate'),
        $cancelDeactivate = $deactivatePopup.find('#cancelDeactivate'),
        $submitDetails = $deactivatePopup.find('.elfsight-deactivate-popup-detail-button button');

    var $deactivatePopupBody = $deactivatePopup.find('.elfsight-deactivate-popup-body'),
        $deactivatePopupCallback = $deactivatePopup.find('.elfsight-deactivate-popup-callback'),
        $deactivatePopupCallbackItems = $deactivatePopupCallback.find('.elfsight-deactivate-popup-callback-item'),
        $deactivatePopupReasonDetailsContainer = $deactivatePopup.find('.elfsight-deactivate-popup-details'),
        $deactivatePopupReasonDetailsItems = $deactivatePopup.find('.elfsight-deactivate-popup-details-clone .elfsight-deactivate-popup-details-item');

    var $deactivateFormReasonId = $deactivateForm.find('[name=reason_id]'),
        $deactivateFormEmail = $deactivateForm.find('[name=email]'),
        $deactivateFormEmailHolder = $deactivateForm.find('.elfsight-deactivate-popup-callback-email');

    var proceedDeactivateForce = false;
    var deactivateFormSubmitted = localStorage.getItem(slug + '-deactivateFormSubmitted');
        deactivateFormSubmitted = deactivateFormSubmitted ? deactivateFormSubmitted : false;
    var deactivatePopupOpened = false;
    var deactivatePopupTimeout;

    // prevent default deactivate and open popup
    $deactivateLink.on('click', function(e){
        e.preventDefault();

        deactivatePopupOpened = true;

        clearTimeout(deactivatePopupTimeout);
        $deactivatePopup.addClass('elfsight-deactivate-popup-open');
    });

    // closing popup by cancel
    $cancelDeactivate.on('click', function(){
        closePopup(0);
    });

    // closing popup by overlay
    $deactivatePopupOverlay.on('click', function(){
        closePopup(0);
    });

    // footer deactivate
    $proceedDeactivate.on('click', function(e){
        e.preventDefault();

        deactivateFormSubmitted = false;

        submitForm({deactivate: true, deactivate_timeout: 0, show_callback: false});
    });

    // footer submit when reason checked
    $submitDeactivate.on('click', function(e){
        e.preventDefault();

        submitForm({deactivate: true, deactivate_timeout: 5000, show_callback: true});
    });

    // reason select
    $deactivateFormReasonId.on('change', function(){
        var id = jQuery(this).val();

        // toggle proceed and submit deactivate
        if (!deactivateFormSubmitted) {
            $proceedDeactivate.hide();
            $submitDeactivate.css('display', 'inline-block');
        }

        // toggle reason callback
        $deactivatePopupCallbackItems.each(function (i, item) {
            var $item = jQuery(item);

            if ($item.attr('id') === 'submit-callback-' + id) {
                $item.show();
            } else {
                $item.hide();
            }
        });

        // toggle reason details
        $deactivatePopupReasonDetailsItems.each(function (i, item) {
            var $item = jQuery(item);

            if ($item.attr('id') === 'deactivate-details-' + id) {
                $deactivatePopupReasonDetailsContainer.html($item);

                // bind submit reason details event
                $submitDetails = $deactivatePopup.find('.elfsight-deactivate-popup-detail-button button')
                $submitDetails.on('click', function(e){
                    e.preventDefault();

                    submitForm({deactivate: false, show_callback: true});
                });
            }
        });

        // bind change email event
        $deactivateFormEmail = $deactivateForm.find('[name=email]');
        $deactivateFormEmail.on('change', function(){
            $deactivateFormEmailHolder.text(jQuery(this).val());
        });
    });

    function submitForm(deactivate_options) {
        var data = $deactivateForm.serializeArray();

        data.push({name: 'action', value: slug + '-deactivate'});

        data.push({name: 'deactivate', value: deactivate_options.deactivate ? 'true' : 'false'});
        data.push({name: 'submit', value: 'true'});

        if (!deactivateFormSubmitted) {
            localStorage.setItem(slug + '-deactivateFormSubmitted', true);
            deactivateFormSubmitted = true;

            jQuery.post('', jQuery.param(data)).then(function(result) {
                if (deactivate_options.show_callback) {
                    showCallback();
                }

                var result_data = JSON.parse(result);

                if (result_data) {
                    if (result_data.mail.status !== 'OK') {
                        $deactivatePopupCallbackItems.hide();
                        $deactivatePopup.find('#error-callback').show();
                    } else {
                       closePopup(5000);
                    }
                } else {
                    $deactivatePopupCallbackItems.hide();
                    $deactivatePopup.find('#error-callback').show();
                }
            })
        } else {
            if (deactivate_options.show_callback) {
                showCallback();
                $deactivatePopupCallbackItems.hide();
                $deactivatePopupCallback.find('#submitted-callback').show();
            }
        }

        if (deactivate_options.deactivate) {
            deactivatePlugin(deactivate_options.deactivate_timeout);
        }
    }

    // close and reset popup
    function closePopup(timeout) {
        if (deactivatePopupOpened) {
            deactivatePopupTimeout = setTimeout(function () {
                $deactivatePopup.removeClass('elfsight-deactivate-popup-open');

                $deactivatePopupBody.show();
                $deactivatePopupCallback.hide();
                $deactivatePopupCallbackItems.hide();
                $deactivatePopupCallback.find('#deactivate-callback').show();

                $deactivateFormReasonId.prop('checked', false);

                $deactivatePopupReasonDetailsContainer.html('');

                $proceedDeactivate.css('display', 'inline-block');
                $submitDeactivate.hide();

                deactivatePopupOpened = false;
            }, timeout);
        }
    }

    // close and reset popup
    function showCallback() {
        // toggle body and reset
        $deactivatePopupBody.hide();
        $deactivatePopupCallback.show();

        // hide submit
        $proceedDeactivate.css('display', 'inline-block');
        $submitDeactivate.hide();

        // enable force deactivate
        proceedDeactivateForce = true;
    }

    function deactivatePlugin(timeout) {
        var deactivate_link = $deactivateLink.attr('href');

        setTimeout(function () {
            document.location.href = deactivate_link;
        }, proceedDeactivateForce ? 0 : timeout);
    }
}