<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\PHPMailer;

if (!isset($_ENV['MAIL_HOST'])) {
    Dotenv::createImmutable(dirname(__DIR__, 2))->safeLoad();
}

const IPC_EMAIL_LOGO_CID = 'ipecslogo';

/**
 * Build a PHPMailer instance pre-configured from .env SMTP settings.
 */
function ipc_mailer(): PHPMailer
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $_ENV['MAIL_HOST'] ?? '';
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['MAIL_USERNAME'] ?? '';
    $mail->Password = $_ENV['MAIL_PASSWORD'] ?? '';
    $mail->SMTPSecure = strtolower($_ENV['MAIL_ENCRYPTION'] ?? 'ssl') === 'tls'
        ? PHPMailer::ENCRYPTION_STARTTLS
        : PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = (int) ($_ENV['MAIL_PORT'] ?? 465);
    $mail->CharSet = 'UTF-8';
    $mail->setFrom(
        $_ENV['MAIL_FROM_ADDRESS'] ?? $_ENV['MAIL_USERNAME'] ?? '',
        $_ENV['MAIL_FROM_NAME'] ?? 'IPECS'
    );

    $logoPath = dirname(__DIR__, 2) . '/assets/img/logo.png';
    if (is_file($logoPath)) {
        $mail->addEmbeddedImage($logoPath, IPC_EMAIL_LOGO_CID, 'logo.png');
    }

    return $mail;
}

/**
 * Wrap inner content in the shared IPECS-branded HTML email shell
 * (logo header, white card body, contact-details footer).
 */
function ipc_email_shell(string $title, string $innerHtml): string
{
    $navy = '#084b82';
    $blue = '#0b4a8c';
    $yellow = '#f2d049';
    $yellowBar = '#e8c73a';
    $yellowLight = '#fcf3c8';
    $logoCid = IPC_EMAIL_LOGO_CID;
    $year = date('Y');

    $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

    return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$title}</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f9;font-family:'Segoe UI',Helvetica,Arial,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9;padding:32px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="width:600px;max-width:600px;background:#ffffff;border-radius:10px;overflow:hidden;">
                    <tr>
                        <td style="background:{$blue};height:4px;line-height:4px;font-size:0;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="background:{$yellowLight};padding:24px 24px 18px;">
                            <img src="cid:{$logoCid}" alt="IPECS Consulting" height="48" style="height:48px;width:auto;display:block;border:0;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px 36px;color:#1e293b;font-size:15px;line-height:1.65;">
                            {$innerHtml}
                        </td>
                    </tr>
                    <tr>
                        <td style="background:{$yellow};padding:22px 28px;color:#000000;font-size:12.5px;line-height:1.7;text-align:center;">
                            <strong style="color:{$navy};">IPECS Consulting Pvt. Ltd.</strong><br>
                            Office No. 808, 8th Floor, Tower A, Saima Trade Tower, I.I Chundrigar Road, Karachi, Pakistan<br>
                            <a href="tel:+92213722542" style="color:#000000;text-decoration:none;">+92 213 722 542</a> &nbsp;&middot;&nbsp;
                            <a href="tel:+923302800660" style="color:#000000;text-decoration:none;">+92 330 2800 660</a><br>
                            <a href="mailto:md@ipecs.org.pk" style="color:#000000;text-decoration:none;">md@ipecs.org.pk</a> &nbsp;&middot;&nbsp;
                            <a href="mailto:ipecs.pk@gmail.com" style="color:#000000;text-decoration:none;">ipecs.pk@gmail.com</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:{$yellowBar};padding:10px;color:#000000;font-size:11px;text-align:center;">
                            &copy; {$year} IPECS Consulting Pvt. Ltd. All Rights Reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
HTML;
}

/**
 * Send the contact-form notification to IPECS and a thank-you auto-reply to the visitor.
 * Returns true only if the notification to IPECS succeeded (the auto-reply is best-effort).
 *
 * @param array{name:string,email:string,phone:string,company:string,subject:string,message:string} $data
 */
function ipc_send_contact_mail(array $data): bool
{
    $toAddress = $_ENV['CONTACT_TO_ADDRESS'] ?? 'ipecs.pk@gmail.com';
    $toName = $_ENV['CONTACT_TO_NAME'] ?? 'IPECS Consulting';

    $subjectLine = $data['subject'] !== '' ? $data['subject'] : 'New website inquiry';
    $h = static fn (string $v): string => htmlspecialchars($v, ENT_QUOTES, 'UTF-8');

    $rows = [
        'Name' => $data['name'],
        'Email' => $data['email'],
        'Phone' => $data['phone'],
        'Organization' => $data['company'],
        'Subject' => $subjectLine,
    ];

    $detailRows = '';
    foreach ($rows as $label => $value) {
        if ($value === '') {
            continue;
        }
        $detailRows .= '<tr>'
            . '<td style="padding:8px 12px;border-bottom:1px solid #e8ecef;font-weight:700;color:' . $h('#0b4a8c') . ';width:140px;vertical-align:top;">' . $h($label) . '</td>'
            . '<td style="padding:8px 12px;border-bottom:1px solid #e8ecef;color:#1e293b;">' . $h($value) . '</td>'
            . '</tr>';
    }

    $adminInner = '<h2 style="margin:0 0 18px;font-size:18px;color:#084b82;">New website inquiry</h2>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-bottom:20px;">' . $detailRows . '</table>'
        . '<p style="margin:0 0 8px;font-weight:700;color:#0b4a8c;">Message</p>'
        . '<p style="margin:0;white-space:pre-wrap;">' . nl2br($h($data['message']), false) . '</p>';

    $bodyText = "New website inquiry\n\n";
    foreach ($rows as $label => $value) {
        if ($value === '') {
            continue;
        }
        $bodyText .= $label . ': ' . $value . "\n";
    }
    $bodyText .= "\nMessage:\n" . $data['message'] . "\n";

    $sentToAdmin = false;

    try {
        $mail = ipc_mailer();
        $mail->addAddress($toAddress, $toName);
        if ($data['email'] !== '') {
            $mail->addReplyTo($data['email'], $data['name'] !== '' ? $data['name'] : $data['email']);
        }
        $mail->Subject = 'Website inquiry: ' . $subjectLine;
        $mail->isHTML(true);
        $mail->Body = ipc_email_shell('Website inquiry: ' . $subjectLine, $adminInner);
        $mail->AltBody = $bodyText;
        $mail->send();
        $sentToAdmin = true;
    } catch (PHPMailerException $e) {
        error_log('IPECS contact mail (admin notify) failed: ' . $e->getMessage());
    }

    if ($data['email'] !== '') {
        try {
            $reply = ipc_mailer();
            $reply->addAddress($data['email'], $data['name'] !== '' ? $data['name'] : $data['email']);
            $reply->Subject = 'Thank you for contacting IPECS Consulting';
            $reply->isHTML(true);
            $firstName = $data['name'] !== '' ? $data['name'] : 'there';

            $replyInner = '<h2 style="margin:0 0 16px;font-size:18px;color:#084b82;">Thank you for reaching out</h2>'
                . '<p style="margin:0 0 14px;">Hi ' . $h($firstName) . ',</p>'
                . '<p style="margin:0 0 14px;">Thank you for contacting <strong>IPECS Consulting Pvt. Ltd.</strong> We have received your message and a member of our team will get back to you soon.</p>'
                . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;border:1px solid #e8ecef;border-radius:8px;margin:18px 0;">'
                . '<tr><td style="padding:14px 16px;">'
                . '<p style="margin:0 0 6px;font-weight:700;color:#0b4a8c;">' . $h($subjectLine) . '</p>'
                . '<p style="margin:0;color:#475569;white-space:pre-wrap;">' . nl2br($h($data['message']), false) . '</p>'
                . '</td></tr>'
                . '</table>'
                . '<p style="margin:0;">Best regards,<br><strong>IPECS Consulting Pvt. Ltd.</strong></p>';

            $reply->Body = ipc_email_shell('Thank you for contacting IPECS Consulting', $replyInner);
            $reply->AltBody = "Hi {$firstName},\n\nThank you for contacting IPECS Consulting Pvt. Ltd. We have received your message and a member of our team will get back to you soon.\n\nYour message ({$subjectLine}):\n{$data['message']}\n\nBest regards,\nIPECS Consulting Pvt. Ltd.";
            $reply->send();
        } catch (PHPMailerException $e) {
            error_log('IPECS contact mail (auto-reply) failed: ' . $e->getMessage());
        }
    }

    return $sentToAdmin;
}
