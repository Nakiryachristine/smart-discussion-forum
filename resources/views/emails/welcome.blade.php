<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Smart Discussion Forum</title>
</head>
<body style="margin: 0; padding: 0; min-width: 100%; background-color: #f4f4f5; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1f2937;">
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #f4f4f5; padding: 24px 12px;">
        <tr>
            <td align="center">
                
                <table width="100%" max-width="600" border="0" cellpadding="0" cellspacing="0" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; border: 1px solid #e5e7eb; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); overflow: hidden;">
                    
                    <tr>
                        <td style="background-color: #55b05c; height: 6px;"></td>
                    </tr>

                    <tr>
                        <td style="padding: 40px 32px;">
                            
                            <table border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 24px;">
                                <tr>
                                    <td style="vertical-align: middle; padding-right: 8px;">
                                        <font style="font-size: 24px; color: #55b05c; font-weight: bold;">💬</font>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <span style="font-size: 16px; font-weight: 700; color: #55b05c; tracking-style: uppercase; letter-spacing: 0.05em;">
                                            SMART DISCUSSION FORUM
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <h1 style="font-size: 26px; font-weight: 800; color: #030712; margin: 0 0 16px 0; letter-spacing: -0.025em;">
                                Hello, {{ $user->name }}!
                            </h1>
                            
                            <p style="font-size: 16px; line-height: 1.6; color: #4b5563; margin: 0 0 24px 0;">
                                Your account has been created successfully. Welcome to our community! You are now fully set up to collaborate, share academic insights, and engage seamlessly with your peers and lecturers.
                            </p>

                            <table border="0" cellpadding="0" cellspacing="0" style="margin: 32px 0; width: 100%;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ config('app.url') }}/login" 
                                           style="background-color: #2683ba; color: #ffffff; padding: 14px 32px; font-weight: 700; font-size: 16px; text-decoration: none; border-radius: 8px; display: inline-block; transition: background-color 0.2s ease;">
                                            Go to Dashboard
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 32px 0;">
                            
                            <p style="font-size: 13px; line-height: 1.5; color: #6b7280; margin: 0; text-align: center;">
                                If you did not register for this account, please disregard this email securely.
                            </p>

                        </td>
                    </tr>

                    <tr>
                        <td style="background-color: #f9fafb; padding: 16px 32px; border-top: 1px solid #e5e7eb; text-align: center;">
                            <span style="font-size: 12px; color: #9ca3af;">
                                © 2026 Smart Discussion Forum. All rights reserved.
                            </span>
                        </td>
                    </tr>

                </table>
                
            </td>
        </tr>
    </table>

</body>
</html>