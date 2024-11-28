<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600px" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <tr>
                        <td align="center">
                            <h1 style="font-size: 24px; color: #333333; margin-bottom: 20px;">Hello Admin</h1>
                            <h2 style="font-size: 20px; color: #007BFF; margin-bottom: 20px;">Account Activated</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px; color: #666666;">
                            <h3 style="font-size: 18px; color: #333333; border-bottom: 1px solid #dddddd; padding-bottom: 10px; margin-bottom: 20px;">Credentials</h3>
                            <p style="font-size: 16px; line-height: 1.5; margin: 0;"><strong>Email:</strong> {{ $user->email }}</p>
                            <p style="font-size: 16px; line-height: 1.5; margin: 10px 0;"><strong>Name:</strong> {{ $user->name }}</p>
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