<?php
require_once '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendStatusNotification($applicantEmail, $applicantName, $applicationId, $newStatus) {
    $mail = new PHPMailer(true);

    try {
        // Server settings - Configure these for your email provider
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change to your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Replace with your email
        $mail->Password = 'your-app-password'; // Replace with app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('noreply@pwd-system.com', 'PWD Application System');
        $mail->addAddress($applicantEmail, $applicantName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'PWD Application Status Update - Application #' . $applicationId;

        $statusMessage = '';
        $statusColor = '';
        switch (strtolower($newStatus)) {
            case 'accepted':
            case 'approved':
                $statusMessage = 'Congratulations! Your PWD ID application has been approved.';
                $statusColor = '#28a745';
                break;
            case 'rejected':
            case 'denied':
                $statusMessage = 'We regret to inform you that your PWD ID application has been denied.';
                $statusColor = '#dc3545';
                break;
            case 'pending':
                $statusMessage = 'Your PWD ID application is still under review.';
                $statusColor = '#ffc107';
                break;
            case 'finalized':
                $statusMessage = 'Your PWD ID application has been finalized and is ready for pickup.';
                $statusColor = '#007bff';
                break;
            default:
                $statusMessage = 'Your PWD ID application status has been updated to: ' . ucfirst($newStatus);
                $statusColor = '#6c757d';
        }

        $mail->Body = "
        <html>
        <head>
            <title>PWD Application Status Update</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #f8f9fa; padding: 20px; text-align: center; border-radius: 5px; }
                .status { background-color: $statusColor; color: white; padding: 15px; border-radius: 5px; text-align: center; font-weight: bold; }
                .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #666; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>PWD Application System</h2>
                    <p>Application Status Update</p>
                </div>
                <div class='status'>
                    $statusMessage
                </div>
                <p>Dear $applicantName,</p>
                <p>$statusMessage</p>
                <p><strong>Application ID:</strong> $applicationId</p>
                <p>If you have any questions or need further assistance, please contact our support team.</p>
                <div class='footer'>
                    <p>This is an automated message from the PWD Application System. Please do not reply to this email.</p>
                    <p>For support, visit our website or contact your local PWD office.</p>
                </div>
            </div>
        </body>
        </html>
        ";

        $mail->AltBody = "Dear $applicantName,\n\n$statusMessage\n\nApplication ID: $applicationId\n\nIf you have any questions or need further assistance, please contact our support team.\n\nThis is an automated message from the PWD Application System.\n\nBest regards,\nPWD Application System";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Email sending failed: " . $mail->ErrorInfo);
        return false;
    }
}
?>