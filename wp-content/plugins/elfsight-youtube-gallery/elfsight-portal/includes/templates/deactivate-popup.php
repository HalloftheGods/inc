<script>
    jQuery(document).ready(function () {
        deactivatePopupReady('<?php echo $this->app_slug; ?>');
    });
</script>

<div class="elfsight-deactivate-popup" id="<?php echo $this->app_slug; ?>-deactivatePopup">
    <form method="post" id="<?php echo $this->app_slug; ?>-deactivateForm" action="">

        <div class="elfsight-deactivate-popup-header">
            <div class="elfsight-deactivate-popup-header-heading">
                <?php _e("Why are you deactivating", $this->plugin_text_domain); ?>
                <strong>Elfsight <?php echo $this->app_name; ?></strong>?
            </div>
            <div class="elfsight-deactivate-popup-header-subheading">
                <?php _e("Help other WordPress users with leaving your feedback.", $this->plugin_text_domain); ?>
            </div>
        </div>

        <div class="elfsight-deactivate-popup-body">
            <div class="elfsight-deactivate-popup-reasons">
                <?php foreach( $this->deactivate_reasons as $reason ) { ?>
                    <div class="elfsight-deactivate-popup-reason">
                        <label>
                            <input type="radio"
                                   value="<?php echo $reason['id']; ?>"
                                   name="reason_id" >
                            <span><?php echo $reason['text']; ?></span>
                        </label>
                    </div>
                <?php } ?>
            </div>

            <div class="elfsight-deactivate-popup-details">

            </div>
        </div>

        <div class="elfsight-deactivate-popup-callback">
            <div class="elfsight-deactivate-popup-callback-item"
                 id="submit-callback-0">
                <span class="elfsight-deactivate-popup-callback-smiley">&#9785;</span>
                <br><?php _e("We hope you come back!", $this->plugin_text_domain); ?>
            </div>

            <?php foreach( $this->deactivate_reasons as $deactivate_reason_slug => $deactivate_reason ) { ?>
                <div class="elfsight-deactivate-popup-callback-item"
                     id="submit-callback-<?php echo $deactivate_reason['id'];?>">
                    <?php echo $deactivate_reason['callback'];?>
                </div>
            <?php } ?>

            <div class="elfsight-deactivate-popup-callback-item"
                 id="deactivate-callback">
                <?php _e("We hope you come back!", $this->plugin_text_domain); ?>
            </div>

            <div class="elfsight-deactivate-popup-callback-item"
                 id="submitted-callback">
                <?php _e("You already sent a message. ", $this->plugin_text_domain); ?><br><br><?php _e("If you have not received a response, please contact us by email ", $this->plugin_text_domain); ?><a href="mailto:support@elfsight.com">support@elfsight.com</a>
            </div>

            <div class="elfsight-deactivate-popup-callback-item"
                 id="error-callback">
                <?php _e("The request failed. Please contact us by email ", $this->plugin_text_domain); ?><a href="mailto:support@elfsight.com">support@elfsight.com</a>
            </div>
        </div>

        <div class="elfsight-deactivate-popup-footer">
            <a href="<?php echo $this->deactivate_link?>" class="button button-secondary" id="proceedDeactivate"><?php _e("Deactivate", $this->plugin_text_domain); ?></a>
            <a href="<?php echo $this->deactivate_link?>" class="button button-secondary" id="submitDeactivate"><?php _e("Deactivate", $this->plugin_text_domain); ?></a>
            <a class="button button-primary" id="cancelDeactivate"><?php _e("Cancel", $this->plugin_text_domain); ?></a>
        </div>

    </form>

    <div class="elfsight-deactivate-popup-details-clone">
        <?php foreach( $this->deactivate_reasons as $reason ) { ?>
            <div class="elfsight-deactivate-popup-details-item"
                 id="deactivate-details-<?php echo $reason['id']; ?>">
                <?php if (!empty($reason['details'])) { ?>
                    <?php echo $reason['details']; ?>
                <?php } ?>

                <?php if (!empty($reason['email_text'])) { ?>
                    <div class="elfsight-deactivate-popup-detail-email">
                        <span>
                            <?php echo $reason['email_text']; ?><br>

                            <?php if (!empty($reason['email_subtext'])) { ?>
                                <small>(<?php echo $reason['email_subtext']; ?>)</small>
                            <?php } ?>
                        </span>
                        <input name="email" value="<?php if ($reason['id'] !== 6) echo get_option('admin_email'); ?>">
                    </div>
                <?php } ?>

                <?php if (!empty($reason['btn_text'])) { ?>
                    <div class="elfsight-deactivate-popup-detail-button"><button class="button button-primary"><?php echo $reason['btn_text']; ?></button></div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
<div class="elfsight-overlay" id="<?php echo $this->app_slug; ?>-deactivateOverlay"></div>