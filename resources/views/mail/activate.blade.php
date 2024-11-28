<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate Account</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600px" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <tr>
                        <td align="center">
                            <h1 style="font-size: 24px; color: #333333; margin-bottom: 20px;">Activate Your Account</h1>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px;">
                            <p style="font-size: 16px; color: #666666; line-height: 1.5;">
                                Thank you for signing up! Click the button below to activate your account and get started.
                            </p>
                            <a href="{{ $url }}" style="display: inline-block; margin-top: 20px; padding: 12px 24px; background-color: #007BFF; color: #ffffff; text-decoration: none; font-size: 16px; font-weight: bold; border-radius: 5px;">
                                Activate Account
                            </a>
                            <p style="font-size: 14px; color: #666666; margin-top: 30px;">
                                If the button doesn’t work, copy and paste the following link into your browser:
                            </p>
                            <p style="font-size: 14px; color: #007BFF; word-wrap: break-word;">{{ $url }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top: 20px;">
                            <p style="font-size: 12px; color: #aaaaaa;">
                                © 2023 Your Company. All rights reserved.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
