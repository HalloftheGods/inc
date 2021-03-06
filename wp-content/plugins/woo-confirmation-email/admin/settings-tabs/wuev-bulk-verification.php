<table class="form-table">
    <tr>
        <th><?php echo __( 'Select User Role', 'wc-email-confirmation' ); ?></th>
        <td>
            <select name="wc_email_user_role">
				<?php wp_dropdown_roles(); ?>
            </select>
        </td>
    </tr>
    <tr class="wuev-tr-border-bottom">
        <th><input type="submit" value="<?php echo __( 'Verify', 'wc-email-confirmation' ); ?>"
                   class="button button-primary" name="role_bulk_users"/></th>
        <td></td>
    </tr>
    <tr>
        <th><?php echo __( 'Verify All the Users', 'wc-email-confirmation' ); ?></th>
        <td><p class="description"><?php echo __( 'Verify all the Users of all roles', 'wc-email-confirmation' ); ?></p></td>
    </tr>
    <tr class="wuev-tr-border-bottom">
        <th><input type="submit" value="<?php echo __( 'Verify All', 'wc-email-confirmation' ); ?>"
                   class="button button-primary" name="site_bulk_users"/></th>
        <td></td>
    </tr>
</table>