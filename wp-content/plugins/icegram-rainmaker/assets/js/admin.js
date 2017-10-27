jQuery(function(){function a(a){switch(a){case"mailchimp":jQuery("#mailchimp_api_key").show().val(""),jQuery(".mailchimp-list").html(""),jQuery(".mailchimp-double-optin").html(""),jQuery("#disconnect-mailchimp").replaceWith('<button id="auth-mailchimp" class="button button-secondary auth-button" disabled="true">Verify</button><br/><a href="http://kb.mailchimp.com/accounts/management/about-api-keys" target="_blank">Find / Generate your MailChimp API key</a>'),jQuery("#auth-mailchimp").attr("disabled","true");break;case"campaignmonitor":jQuery("#campaignmonitor_api_key").show().val(""),jQuery("#campaignmonitor_client_id").val(""),jQuery(".campaignmonitor-list").html(""),jQuery("#disconnect-campaignmonitor").replaceWith('<button id="auth-campaignmonitor" class="button button-secondary auth-button" disabled>Authenticate Campaign Monitor</button>'),jQuery("#auth-campaignmonitor").attr("disabled","true");break;case"hubspot":jQuery("#hubspot_api_key").val(""),jQuery(".hubspot-list").html(""),jQuery("#disconnect-hubspot").replaceWith('<button id="auth-hubspot" class="button button-secondary auth-button" disabled="true">Authenticate HubSpot</button>'),jQuery("#auth-hubspot").attr("disabled","true")}}jQuery("#rm-form-tabs").tabs({activate:function(a,b){if(1==b.newTab.index()){var c=jQuery("#rm_style_selector").val()||"rm-form-style0";jQuery(".rm_grid").find('.rm_grid_item[data-style="'+c+'"]').addClass("rm_style_selected")}else 2==b.newTab.index()&&(jQuery(this).find("#rm_enable_list").trigger("change"),jQuery(this).find("#rm-list-provider").trigger("change"))}}).addClass("ui-tabs-vertical ui-helper-clearfix"),jQuery(".rm_grid").on("click",".rm_grid_item",function(){jQuery(".rm_grid_item").removeClass("rm_style_selected"),jQuery(this).addClass("rm_style_selected"),jQuery("#rm_style_selector").val(jQuery(this).data("style"))}),jQuery("#dialog_link, ul#icons li").hover(function(){jQuery(this).addClass("ui-state-hover")},function(){jQuery(this).removeClass("ui-state-hover")}),jQuery(document).on("change","#rm-list-provider",function(){var a=jQuery(this).val().toLowerCase();jQuery("#rm-list-details-container").html(""),jQuery("#rm-list-details").find(".rm-loader").show();var b="rm_get_"+a+"_data",c=jQuery("#post_ID").val(),d="action="+b+"&form_id="+c;jQuery.ajax({url:ajaxurl,data:d,method:"POST",dataType:"JSON",success:function(a){jQuery("#rm-list-details").find(".rm-loader").hide(),jQuery("#rm-list-details-container").html(a.data),jQuery(".help_tip").tipTip({attribute:"data-tip"})},error:function(a){console.log(a)}})}),jQuery("#rm-list-provider").trigger("change"),jQuery(document).on("change","#rm_enable_list",function(a){1==jQuery(this).is(":checked")?jQuery("#mailchimp_api_key").attr("required","required"):jQuery("#mailchimp_api_key").removeAttr("required")}),jQuery(document).on("change",".form_type",function(a){form_selected=jQuery("."+(jQuery('input:radio[name="form_data[type]"]:checked').val()||"subscription")+"_settings"),jQuery(".subscription_settings, .custom_settings, .contact_settings").not(form_selected).slideUp(),form_selected.slideDown()}),jQuery(".form_type").change(),jQuery(document).on("change keyup paste keydown",".auth-text-input",function(a){var b=jQuery(this).val();""!==b?jQuery(".auth-button").removeAttr("disabled"):jQuery(".auth-button").attr("disabled","true")}),jQuery("body").on("click",".disconnect-mailer",function(){var b=jQuery(this).data("mailerslug");if(!confirm("Are you sure? If you disconnect, your previous campaigns syncing with "+b+" will be disconnected as well."))return!1;var c=jQuery(this).data("mailer"),d="rm_disconnect_"+c,e={action:d};jQuery.ajax({url:ajaxurl,data:e,type:"POST",dataType:"JSON",success:function(b){jQuery("#save-btn").attr("disabled","true"),"disconnected"==b.message&&a(c),jQuery(".rm-form-row").fadeIn("300"),jQuery(".rm-mailer-help").show()}})}),jQuery("body").on("click","#auth-mailchimp",function(a){a.preventDefault();var b=jQuery("#mailchimp_api_key").val(),c="rm_update_mailchimp_authentication",d=jQuery("input.mailchimp-double-optin:checked").val(),e={action:c,authentication_token:b,mailchimp_double_optin:d};jQuery.ajax({url:ajaxurl,data:e,type:"POST",dataType:"JSON",success:function(a){"success"==a.status?(jQuery("#rm-list-details-container").html(a.message),jQuery(".help_tip").tipTip({attribute:"data-tip"})):(console.log(a.message),jQuery(".mailchimp-list").html('<span class="rm-mailer-error">'+a.message+"</span>")),jQuery("#rm-list-details").find(".rm-loader").hide()},error:function(a){console.log(a)}}),a.preventDefault()}),jQuery("body").on("click","#auth-campaignmonitor",function(a){a.preventDefault(),jQuery("#rm-list-details").find(".rm-loader").show();var b=jQuery("#campaignmonitor_api_key").val(),c=jQuery("#campaignmonitor_client_id").val(),d="rm_update_campaignmonitor_authentication",e={action:d,clientID:c,authentication_token:b};jQuery.ajax({url:ajaxurl,data:e,type:"POST",dataType:"JSON",success:function(a){"success"==a.status?(jQuery("#save-btn").removeAttr("disabled"),jQuery("#campaignmonitor_client_id").closest(".rm-form-row").hide(),jQuery("#campaignmonitor_api_key").closest(".rm-form-row").hide(),jQuery("#auth-campaignmonitor").closest(".rm-form-row").hide(),jQuery(".campaignmonitor-list").html(a.message),jQuery(".help_tip").tipTip({attribute:"data-tip"})):jQuery(".campaignmonitor-list").html('<span class="rm-mailer-error">'+a.message+"</span>"),jQuery("#rm-list-details").find(".rm-loader").hide()},error:function(a){console.log(a)}}),a.preventDefault()}),jQuery("body").on("click","#auth-hubspot",function(a){a.preventDefault(),jQuery("#rm-list-details").find(".rm-loader").show();var b=jQuery("#hubspot_api_key").val(),c="rm_update_hubspot_authentication",d={action:c,api_key:b};jQuery.ajax({url:ajaxurl,data:d,type:"POST",dataType:"JSON",success:function(a){"success"==a.status?(jQuery("#save-btn").removeAttr("disabled"),jQuery("#hubspot_api_key").closest(".rm-form-row").hide(),jQuery("#auth-hubspot").closest(".rm-form-row").hide(),jQuery(".hubspot-list").html(a.message)):(console.log(a.message),jQuery(".hubspot-list").html('<span class="rm-mailer-error">'+a.message+"</span>")),jQuery("#rm-list-details").find(".rm-loader").hide()},error:function(a){console.log(a)}}),a.preventDefault()}),jQuery("body").on("click","#auth-icontact",function(a){a.preventDefault(),jQuery("#rm-list-details").find(".rm-loader").show();var b=jQuery("#icontact_app_id").val(),c=jQuery("#icontact_email").val(),d=jQuery("#icontact_pass").val(),e="rm_update_icontact_authentication",f={action:e,appID:b,appUser:c,appPass:d};jQuery.ajax({url:ajaxurl,data:f,type:"POST",dataType:"JSON",success:function(a){"success"==a.status&&(jQuery("#save-btn").removeAttr("disabled"),jQuery("#icontact_app_id").closest(".rm-form-row").hide(),jQuery("#icontact_email").closest(".rm-form-row").hide(),jQuery("#icontact_pass").closest(".rm-form-row").hide(),jQuery("#auth-icontact").closest(".rm-form-row").hide(),jQuery(".icontact-list").html(a.message)),jQuery("#rm-list-details").find(".rm-loader").hide()}}),a.preventDefault()})});