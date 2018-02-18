<?php

return array(
    1 => array(
        'id' => 1,
        'text' => __( "Technical problems / Hard to use", $this->plugin_text_domain ),
        'details' =>
            '<div class="elfsight-deactivate-popup-detail-header">' . __( "Please describe your issue in brief.", $this->plugin_text_domain ) . '</div>
             <div class="elfsight-deactivate-popup-detail-textarea"><textarea name="reason_message" rows="4"></textarea></div>',
        'btn_text' => __( "Open a ticket", $this->plugin_text_domain ),
        'email_text' => __( "Our support will contact you at", $this->plugin_text_domain ),
        'callback' => __( "We've received your ticket and will contact you at", $this->plugin_text_domain ) . ' <b class="elfsight-deactivate-popup-callback-email">' . get_option('admin_email') . '</b><br>' . __( "Please keep you plugin activated. Helps on the way", $this->plugin_text_domain )  . ' <span class="elfsight-deactivate-smiley">&#128641;</span>'
    ),
    2 => array(
        'id' => 2,
        'text' => __( "Missing functionality", $this->plugin_text_domain ),
        'details' =>
            '<div class="elfsight-deactivate-popup-detail-header">' . __( "Describe the features you require. There might be a solution.", $this->plugin_text_domain ) . '</div>
             <div class="elfsight-deactivate-popup-detail-textarea"><textarea name="reason_message" rows="4" autocomplete="off"></textarea></div>',
        'btn_text' => __( "Send message", $this->plugin_text_domain ),
        'email_text' => __( "Our support will contact you at", $this->plugin_text_domain ),
        'callback' => __( "We've got it and will contact you at", $this->plugin_text_domain ) . ' <b class="elfsight-deactivate-popup-callback-email">' . get_option('admin_email') . '</b><br>' . __( "Please keep your plugin activated until we get back with a solution.", $this->plugin_text_domain )
    ),
    3 => array(
        'id' => 3,
        'text' => __( "Free version is too limited", $this->plugin_text_domain ),
        'details' =>
            '<div class="elfsight-deactivate-popup-detail-header">' . __( "We are very sorry that you are facing usage limits", $this->plugin_text_domain ) . ' <span class="elfsight-deactivate-smiley">&#128549;</span><br>' . __( "We have a great special offer for you", $this->plugin_text_domain ) . ' <span class="elfsight-deactivate-smiley">&#128176;</span></div>',
        'btn_text' => __( "Get offer", $this->plugin_text_domain ),
        'email_text' => __( "You will get your personal offer at", $this->plugin_text_domain ),
        'email_subtext' => __( "the email you've registered your plugin for", $this->plugin_text_domain ),
        'callback' => __( "We've sent your special offer to", $this->plugin_text_domain ) . ' <b class="elfsight-deactivate-popup-callback-email">' . get_option('admin_email') . '</b><br>' . __( "Hopefully it will change your mind", $this->plugin_text_domain ) . ' <span class="elfsight-deactivate-smiley">&#128522;</span>'
    ),
    4 => array(
        'id' => 4,
        'text' => __( "Premium is expensive", $this->plugin_text_domain ),
        'details' =>
            '<div class="elfsight-deactivate-popup-detail-header">' . __( "We have a special discount just for you", $this->plugin_text_domain ) . ' <span class="elfsight-deactivate-smiley">&#128176;</span></div>',
        'btn_text' => __( "Get coupon", $this->plugin_text_domain ),
        'email_text' => __( "We'll send your discount coupon at", $this->plugin_text_domain ),
        'email_subtext' => __( "the email you've registered your plugin for", $this->plugin_text_domain ),
        'callback' => __( "We've sent your discount coupon to", $this->plugin_text_domain ) . ' <b class="elfsight-deactivate-popup-callback-email">' . get_option('admin_email') . '</b><br>' . __( "Hopefully it will change your mind", $this->plugin_text_domain ) . ' <span class="elfsight-deactivate-smiley">&#128522;</span>'
    ),
    5 => array(
        'id' => 5,
        'text' => __( "Temporary deactivation", $this->plugin_text_domain ),
        'callback' => __("We hope you come back!", $this->plugin_text_domain)
    ),
    6 => array(
        'id' => 6,
        'text' => __( "Other reason", $this->plugin_text_domain ),
        'details' =>
            '<div class="elfsight-deactivate-popup-detail-header">' . __( "We totally get your feelings, but everything can be solved!", $this->plugin_text_domain ) . ' <span class="elfsight-deactivate-smiley">&#127804;</span><br>' . __( "Let us know that the matter is, and we'll look into it.", $this->plugin_text_domain ) . '</div>
             <div class="elfsight-deactivate-popup-detail-textarea"><textarea name="reason_message" rows="4" autocomplete="off"></textarea></div>',
        'btn_text' => __( "Send message", $this->plugin_text_domain ),
        'email_text' => __( "Your email (optional)", $this->plugin_text_domain ),
        'callback' => __( "We've got your feedback and in case a solution is required,", $this->plugin_text_domain ) . '<br>' . __( "we'll be happy to provide you with it.", $this->plugin_text_domain )
    )
);