<?php

if (!defined('ABSPATH')) exit;

class PortalDeactivate {
    const cookie_time = 86400;

    const platform_alias = 'wordpress';
    const api_url = 'https://apps.elfsight.com/api/v1/public/portal/status';
    const support_email = 'support@elfsight.com';

    public $app_slug;
    public $app_name;
    public $plugin_text_domain;

    public $deactivate_reasons;
    public $deactivate_link;

    public $admin_email;
    public $site_url;

    public $email;
    public $deactivate = false;
    public $reason_id;
    public $reason_text;
    public $reason_message;

    private $send_coupon = false;
    private $send_message = false;

    private $subject = 'WP Portal Deactivate';
    private $message;
    private $headers;

    public $date;

    public $result;

    public function __construct($config, $deactivate_link) {
        $this->app_slug = $config['app_slug'];
        $this->app_name = $config['app_name'];
        $this->plugin_text_domain = $config['plugin_text_domain'];
        $this->deactivate_link = $deactivate_link;

        $this->deactivate_reasons = $this->setDeactivateReasons();

        $this->admin_email = get_option('admin_email');
        $this->site_url = get_site_url();

        add_action('admin_footer-plugins.php', array($this, 'includeDeactivatePopup'));

        $this->statusPortal();
    }

    public function statusPortal() {
        if ($_POST) {
            if ($_POST['action'] && $_POST['action'] === $this->app_slug . '-deactivate') {
                $this->deactivateMessage($_POST);
                $this->checkPortal();

                echo json_encode($this->result);

                setcookie($this->app_slug.'-active','false', time() + self::cookie_time);
                setcookie($this->app_slug.'-active-updated','false', time() + self::cookie_time);

                die();
            }
        } else {
            setcookie($this->app_slug.'-active','true', time() + self::cookie_time);

            $active = (isset($_COOKIE[$this->app_slug.'-active']) && $_COOKIE[$this->app_slug.'-active'] === 'true') ? true : false;
            $active_updated = (isset($_COOKIE[$this->app_slug.'-active-updated']) && $_COOKIE[$this->app_slug.'-active-updated'] === 'true') ? true : false;

            if ($active && !$active_updated) {
                $this->checkPortal();

                setcookie($this->app_slug.'-active-updated','true', time() + self::cookie_time);
            }
        }
    }

    public function checkPortal() {
        $data = array();

        $data['platform_alias'] = self::platform_alias;
        $data['email'] = $this->email;
        $data['admin_email'] = $this->admin_email;
        $data['site_url'] = $this->site_url;
        $data['app_name'] = $this->app_name;
        $data['event'] = $this->deactivate ? 'deactivated' : 'activated';
        $data['send_coupon'] = $this->send_coupon;

        if ($this->reason_text) {
            $data['deactivate_reason'] = $this->reason_text;
        }
        if ($this->reason_message) {
            $data['deactivate_message'] = $this->reason_message;
        }

        $response = wp_remote_post(
            self::api_url,
            array(
                'method' => 'POST',
                'body' => $data
            )
        );

        if (!$response['body']) {
            return;
        }

        $response_data = json_decode($response['body'], true);

        if ($response_data) {
            if (isset($response_data['status']) && $response_data['status']) {
                $this->result['api']['status'] = 'OK';
                $this->result['api']['message'] = 'Status changed';
            } else {
                $this->result['api']['status'] = 'OK';
                $this->result['api']['message'] = 'Status updated';
            }
        } else {
            $this->result['api']['status'] = 'ERROR';
        }
    }

    public function setDeactivateReasons() {
        return require ( dirname( __FILE__ ) . '/deactivate-reasons.php' );
    }

    public function includeDeactivatePopup() {
        require ( dirname( __FILE__ ) . '/templates/deactivate-popup.php' );
    }

    public function deactivateMessage($post) {
        $this->email = strip_tags($post['email']);

        $this->deactivate = $post['deactivate'] === 'true' ? true : false;

        $this->reason_id = $post['reason_id'];
        $this->reason_text = $this->deactivate_reasons[$this->reason_id]['text'];

        if (!empty($post['reason_message'])) {
            $this->reason_message = $post['reason_message'];
        }

        switch ($this->reason_id) {
            case '1':
                $this->subject = 'WP Portal Deactivate - Ticket';
                $this->send_message = true;
                break;
            case '2':
                $this->send_message = true;
                break;
            case '3':
            case '4':
                $this->send_coupon = true;
                break;
            case '6':
                $this->send_message = $this->reason_message ? true : false;
                break;
            default:
                break;
        }

        $this->date = date("F j, Y, g:i a");

        $this->message = $this->setMessage();

        $this->headers = $this->setHeaders($this->email ? $this->email : $this->admin_email);

        $this->sendDeactivateMessage();
    }

    public function setMessage() {
        $message = '<html><body>';

        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= '<tr><td style="background: #eee;"><strong>Portal:</strong></td><td>' . $this->app_name . '</td></tr>';
        $message .= '<tr><td style="background: #eee;"><strong>Reason:</strong></td><td>' . $this->reason_text . '</td></tr>';

        if ($this->reason_message) {
            $message .= '<tr><td style="background: #eee;"><strong>Message:</strong></td><td style="white-space: pre-wrap;">' . $this->reason_message . '</td></tr>';
        }

        if ($this->email) {
            if ($this->send_coupon) {
                $message .= '<tr><td style="background: #eee;"><strong>Coupon sent to:</strong></td><td>' . $this->email . '</td></tr>';
            } else {
                $message .= '<tr><td style="background: #eee;"><strong>Contact at:</strong></td><td>' . $this->email . '</td></tr>';
            }
        } else {
            $message .= '<tr><td style="background: #eee;"><strong>From:</strong></td><td>' . $this->admin_email . '</td></tr>';
        }

        $message .= '<tr><td style="background: #eee;"><strong>Site:</strong></td><td>' . $this->site_url . '</td></tr>';
        $message .= '<tr><td style="background: #eee;"><strong>Server date:</strong></td><td>' . $this->date . '</td></tr>';
        $message .= '</table>';

        $message .= '</body></html>';
        return $message;
    }

    public function setHeaders($from) {
        $headers = 'From: ' . $from . "\r\n";
        $headers .= 'Reply-To: ' . $from . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset="utf-8"';
        return $headers;
    }

    public function sendDeactivateMessage() {
        if ($this->send_message) {
            $mail_status = mail(self::support_email, $this->subject, $this->message, $this->headers);

            if ($mail_status) {
                $this->result['mail']['status'] = 'OK';
                $this->result['mail']['message'] = 'Mail successfully sent to ' . self::support_email;
            } else {
                $this->result['mail']['status'] = 'ERROR';
                $this->result['mail']['message'] = 'Mail error sent to ' . self::support_email;
            }
        } else {
            $this->result['mail']['status'] = 'OK';
            $this->result['mail']['message'] = 'Mail not sent for selected reason: "'. $this->reason_text .'"';
        }
    }
}