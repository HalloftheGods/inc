(function($, ajaxObj) {
    $(function() {
        window.onmessage = function(e) {
            if (e.data && e.data.params) {
                $.post(ajaxObj.ajaxurl, {
                    action: ajaxObj.action,
                    nonce: ajaxObj.nonce,
                    params: e.data.params
                });
            }
        };

        $(document).ready(function(){
            setTimeout(function(){
                $('html, body').animate({
                    scrollTop: $('#elfsight-portal-frame').offset().top
                }, 1000);
            }, 1000);
        });

		if (localStorage['elfsight-support--hidden'] !== 'true') {
			$('.elfsight-support').removeClass('elfsight-support--hidden');
		}
		
		$('.elfsight-support-close').on('click', function() {
			$('.elfsight-support').hide();
		});

		$('.elfsight-support-nevershow').on('click', function() {
			$('.elfsight-support').hide();
			
			localStorage.setItem('elfsight-support--hidden', true);
		})
    });
})(window.jQuery || {}, elfsightPortalAjaxObj || {});