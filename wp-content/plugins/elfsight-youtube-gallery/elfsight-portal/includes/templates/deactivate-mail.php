<html><body>
<table rules="all" style="border-color: #666;" cellpadding="10">
    <tr><td style="background: #eee;"><strong>Portal:</strong></td><td><?= $this->product_name ?></td></tr>

    <tr><td style="background: #eee;"><strong>Reason:</strong></td><td><?= $this->reason_text ?></td></tr>

    <? if ($this->reason_text === 'Technical problems / Hard to use' && $this->reason_message): ?>
        <tr><td style="background: #eee;"><strong>Ticket:</strong></td><td style="white-space: pre-wrap;"><?= $this->reason_message ?></td></tr>
    <? endif; ?>

    <? if ($this->reason_text === 'Other reason' && $this->reason_message): ?>
        <tr><td style="background: #eee;"><strong>Message:</strong></td><td style="white-space: pre-wrap;"><?= $this->reason_message ?></td></tr>
    <? endif; ?>

    <? if ($this->reason_text === 'Missing functionality' && $this->reason_message): ?>
        <tr><td style="background: #eee;"><strong>Required features:</strong></td><td style="white-space: pre-wrap;"><?= $this->reason_message ?></td></tr>
    <? endif; ?>

    <? if ($this->email): ?>
        <? if ($this->send_coupon): ?>
            <tr><td style="background: #eee;"><strong>Coupon sent to:</strong></td><td><?= $this->email ?></td></tr>
        <? else: ?>
            <tr><td style="background: #eee;"><strong>Contact at:</strong></td><td><?= $this->email ?></td></tr>
        <? endif; ?>
    <? else: ?>
        <tr><td style="background: #eee;"><strong>From:</strong></td><td><?= $this->from ?></td></tr>
    <? endif; ?>

    <tr><td style="background: #eee;"><strong>Site:</strong></td><td><?= $this->site_url ?></td></tr>
    <tr><td style="background: #eee;"><strong>Server date:</strong></td><td><?= $this->date ?></td></tr>
</table>
</body></html>