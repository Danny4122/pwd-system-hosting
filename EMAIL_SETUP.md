# Email Configuration

## Setup Instructions

1. **Install PHPMailer** (already done):
   ```bash
   composer require phpmailer/phpmailer
   ```

2. **Configure Email Settings**:
   - Open `includes/EmailHelper.php`
   - Replace the SMTP settings with your email provider:
     - `$mail->Host` - Your SMTP server (e.g., 'smtp.gmail.com')
     - `$mail->Username` - Your email address
     - `$mail->Password` - Your app password (not regular password)

3. **For Gmail**:
   - Enable 2-factor authentication
   - Generate an App Password: https://support.google.com/accounts/answer/185833
   - Use the App Password in `$mail->Password`

4. **For Other Providers**:
   - Outlook: `smtp-mail.outlook.com`, port 587
   - Yahoo: `smtp.mail.yahoo.com`, port 587
   - Custom SMTP: Update host, port, and encryption as needed

## Testing

After configuration, test by approving/denying an application. The applicant should receive an email notification.

## Troubleshooting

- If emails don't send, check the Replit logs for error messages
- Ensure your email provider allows SMTP access
- Some free email providers block SMTP - consider using a service like SendGrid or Mailgun for production