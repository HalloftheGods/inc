<table class="form-table">
    <tr class="wuev-tr-border-bottom">
        <th><?php echo __( 'Verification Notice', 'wc-email-confirmation' ); ?></th>
        <td>
            <textarea name="xlwuev_email_registration_message" class="wuev-input-textarea" required rows="3"><?php echo $tab_options['xlwuev_email_registration_message']; ?></textarea>
        </td>
    </tr>
	<tr class="wuev-tr-border-bottom">
		<th><?php echo __( 'Verification Success Notice', 'wc-email-confirmation' ); ?></th>
		<td>
			<textarea name="xlwuev_email_success_message" class="wuev-input-textarea" required rows="3"><?php echo $tab_options['xlwuev_email_success_message']; ?></textarea>
		</td>
	</tr>
    <tr class="wuev-tr-border-bottom">
        <th><?php echo __( 'Re-Verification Notice', 'wc-email-confirmation' ); ?></th>
        <td>
            <textarea name="xlwuev_email_new_verification_link" class="wuev-input-textarea" required rows="3"><?php echo $tab_options['xlwuev_email_new_verification_link']; ?></textarea>
        </td>
    </tr>
	<tr class="wuev-tr-border-bottom">
		<th><?php echo __( 'Re-Verification Notice <br>(For Verified Users)', 'wc-email-confirmation' ); ?></th>
		<td>
			<textarea name="xlwuev_email_verification_already_done" class="wuev-input-textarea" required rows="3"><?php echo $tab_options['xlwuev_email_verification_already_done']; ?></textarea>
		</td>
	</tr>
    <tr class="wuev-tr-border-bottom">
        <th><?php echo __( 'Resend Confirmation Link Text', 'wc-email-confirmation' ); ?></th>
        <td>
            <textarea name="xlwuev_email_resend_confirmation" class="wuev-input-textarea" required rows="3"><?php echo $tab_options['xlwuev_email_resend_confirmation']; ?></textarea>
        </td>
    </tr>
    <tr class="wuev-tr-border-bottom">
        <th><?php echo __( 'Email Verification Link Text', 'wc-email-confirmation' ); ?></th>
        <td>
            <textarea name="xlwuev_email_new_verification_link_text" class="wuev-input-textarea" required rows="3"><?php echo $tab_options['xlwuev_email_new_verification_link_text']; ?></textarea>
        </td>
    </tr>
    <tr class="wuev-tr-border-bottom">
        <th></th>
        <td>
            <p class="description"><?php echo __( 'You can use following merge tags in any of the above messages.', 'wc-email-confirmation' ); ?></p>
            {{xlwuev_resend_link}} = <?php echo __( 'Generates Resend Confirmation Email Link', 'wc-email-confirmation' ); ?><br>
            {{xlwuev_site_login_link}} = <?php echo __( 'Show the Woocommerce Myaccount Page', 'wc-email-confirmation' ); ?><br>
        </td>
    </tr>
</table>