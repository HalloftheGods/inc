Stripe.setPublishableKey(wc_stripe_apple_pay_params.key),jQuery(function(a){"use strict";var b={getAjaxURL:function(a){return wc_stripe_apple_pay_params.ajaxurl.toString().replace("%%endpoint%%","wc_stripe_"+a)},init:function(){Stripe.applePay.checkAvailability(function(c){c&&(a(".apple-pay-button").show(),a(".woocommerce-checkout .apple-pay-button").css("visibility","visible"),a(".apple-pay-button-checkout-separator").show(),b.generate_cart())}),a(document.body).on("click",".apple-pay-button",function(c){c.preventDefault();var d={countryCode:wc_stripe_apple_pay_params.country_code,currencyCode:wc_stripe_apple_pay_params.currency_code,total:{label:wc_stripe_apple_pay_params.label,amount:wc_stripe_apple_pay_params.total},lineItems:wc_stripe_apple_pay_params.line_items,requiredBillingContactFields:["postalAddress"],requiredShippingContactFields:"yes"===wc_stripe_apple_pay_params.needs_shipping?["postalAddress","phone","email","name"]:["phone","email","name"]},e=Stripe.applePay.buildSession(d,function(c,d){var e={nonce:wc_stripe_apple_pay_params.stripe_apple_pay_nonce,result:c};a.ajax({type:"POST",data:e,url:b.getAjaxURL("apple_pay"),success:function(b){"true"===b.success&&(d(ApplePaySession.STATUS_SUCCESS),window.location.href=b.redirect),"false"===b.success&&(d(ApplePaySession.STATUS_FAILURE),a(".apple-pay-button").before('<p class="woocommerce-error wc-stripe-apple-pay-error">'+b.msg+"</p>"),a(document.body).animate({scrollTop:a(".wc-stripe-apple-pay-error").offset().top},500))}})},function(c){var d={nonce:wc_stripe_apple_pay_params.stripe_apple_pay_cart_nonce,errors:c.message};a.ajax({type:"POST",data:d,url:b.getAjaxURL("log_apple_pay_errors")})});"yes"===wc_stripe_apple_pay_params.needs_shipping&&(e.onshippingcontactselected=function(c){var d={nonce:wc_stripe_apple_pay_params.stripe_apple_pay_get_shipping_methods_nonce,address:c.shippingContact};a.ajax({type:"POST",data:d,url:b.getAjaxURL("apple_pay_get_shipping_methods"),success:function(a){var b={label:wc_stripe_apple_pay_params.label,amount:a.total};"true"===a.success&&e.completeShippingContactSelection(ApplePaySession.STATUS_SUCCESS,a.shipping_methods,b,a.line_items),"false"===a.success&&e.completeShippingContactSelection(ApplePaySession.STATUS_INVALID_SHIPPING_POSTAL_ADDRESS,a.shipping_methods,b,a.line_items)}})},e.onshippingmethodselected=function(c){var d={nonce:wc_stripe_apple_pay_params.stripe_apple_pay_update_shipping_method_nonce,selected_shipping_method:c.shippingMethod};a.ajax({type:"POST",data:d,url:b.getAjaxURL("apple_pay_update_shipping_method"),success:function(a){var b={label:wc_stripe_apple_pay_params.label,amount:parseFloat(a.total).toFixed(2)};"true"===a.success&&e.completeShippingMethodSelection(ApplePaySession.STATUS_SUCCESS,b,a.line_items),"false"===a.success&&e.completeShippingMethodSelection(ApplePaySession.STATUS_INVALID_SHIPPING_POSTAL_ADDRESS,b,a.line_items)}})}),e.begin()})},generate_cart:function(){var c={nonce:wc_stripe_apple_pay_params.stripe_apple_pay_cart_nonce};a.ajax({type:"POST",data:c,url:b.getAjaxURL("generate_apple_pay_cart"),success:function(a){wc_stripe_apple_pay_params.total=a.total,wc_stripe_apple_pay_params.line_items=a.line_items}})}};b.init(),a(document.body).on("updated_cart_totals",function(){b.init()}),a(document.body).on("updated_checkout",function(){b.init()})});