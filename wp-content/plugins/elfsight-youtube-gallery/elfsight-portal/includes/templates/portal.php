<div class="elfsight-portal wrap">

    <?php if ($this->support_link) { ?>
        <div class="elfsight-support elfsight-support--hidden">
            <a class="elfsight-support-close">+</a>
            <div class="elfsight-support-heading"><span class="elfsight-support-heading-icon"></span> <?php _e("Need help?", $this->plugin_text_domain); ?></div>
            <div class="elfsight-support-text"><?php _e("If you have any question about our plugin or you need help with its installation, leave us a message and we'll glad to help you absolutely for free!", $this->plugin_text_domain); ?></div>
            <a class="elfsight-support-button" target="_blank" href="<?php echo $this->support_link; ?>"><?php _e("GET FREE HELP", $this->plugin_text_domain); ?></a>
            <a class="elfsight-support-nevershow"><?php _e("Never show again", $this->plugin_text_domain); ?></a>
        </div>
    <?php } ?>

    <iframe src="<?php echo $this->embed_url; ?>" id="elfsight-portal-frame"></iframe>
</div>
