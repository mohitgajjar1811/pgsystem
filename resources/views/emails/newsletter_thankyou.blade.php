<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Subscribing - Sunrise PG</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f6f9; color: #333; }
        .wrapper { max-width: 580px; margin: 30px auto; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #FEA116 0%, #f59e0b 100%); padding: 48px 30px; text-align: center; }
        .header .icon { font-size: 52px; margin-bottom: 16px; }
        .header h1 { color: #fff; font-size: 28px; font-weight: 700; }
        .header p { color: rgba(255,255,255,0.9); margin-top: 8px; font-size: 15px; }
        .body { padding: 40px 30px; text-align: center; }
        .greeting { font-size: 20px; font-weight: 700; color: #0f172a; margin-bottom: 16px; }
        .message { color: #64748b; line-height: 1.8; font-size: 15px; margin-bottom: 28px; }
        .perks { background: #f8fafc; border-radius: 10px; padding: 24px; margin-bottom: 28px; text-align: left; }
        .perks h3 { font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #94a3b8; margin-bottom: 16px; }
        .perk-item { display: flex; align-items: flex-start; margin-bottom: 12px; }
        .perk-item .icon { font-size: 18px; margin-right: 12px; flex-shrink: 0; margin-top: 2px; }
        .perk-item p { color: #334155; font-size: 14px; line-height: 1.5; }
        .perk-item strong { color: #0f172a; }
        .divider { border: none; border-top: 1px solid #e2e8f0; margin: 0 30px; }
        .footer-sec { padding: 24px 30px; text-align: center; background: #f8fafc; }
        .footer-sec p { color: #94a3b8; font-size: 12px; line-height: 1.8; }
        .brand { font-weight: 700; color: #FEA116; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="icon">🎉</div>
            <h1>Thank You for Subscribing!</h1>
            <p>You're now part of the Sunrise PG family</p>
        </div>
        <div class="body">
            <p class="greeting">Welcome aboard! 🌟</p>
            <p class="message">
                Thank you for subscribing to the <strong>Sunrise PG Newsletter</strong>!
                You'll be among the first to know about our latest updates, special offers, 
                and exciting news about our paying guest facility.
            </p>

            <div class="perks">
                <h3>🎁 What you'll receive</h3>
                <div class="perk-item">
                    <span class="icon">🏠</span>
                    <p><strong>Room Updates</strong> — Be the first to know when new rooms become available</p>
                </div>
                <div class="perk-item">
                    <span class="icon">💰</span>
                    <p><strong>Exclusive Offers</strong> — Special pricing and seasonal discounts</p>
                </div>
                <div class="perk-item">
                    <span class="icon">📢</span>
                    <p><strong>Latest News</strong> — Facility upgrades, events, and announcements</p>
                </div>
            </div>

            <p class="message" style="font-size:13px; color:#94a3b8;">
                If you didn't subscribe to our newsletter, please ignore this email. 
                Your inbox will remain unaffected.
            </p>
        </div>
        <hr class="divider">
        <div class="footer-sec">
            <p>© {{ date('Y') }} <span class="brand">SUNRISE PG</span>. All rights reserved.<br>
            📍 Ashram Road, Ahmedabad, Gujarat | 📞 +91 7016853819</p>
        </div>
    </div>
</body>
</html>
