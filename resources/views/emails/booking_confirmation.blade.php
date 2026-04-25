<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Sunrise PG</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f6f9; color: #333; }
        .wrapper { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #FEA116 0%, #e8940f 100%); padding: 40px 30px; text-align: center; }
        .header h1 { color: #fff; font-size: 28px; font-weight: 700; letter-spacing: 1px; }
        .header p { color: rgba(255,255,255,0.9); margin-top: 6px; font-size: 15px; }
        .checkmark { width: 70px; height: 70px; background: rgba(255,255,255,0.3); border: 2px solid #ffffff; border-radius: 50%; margin: 0 auto 16px; line-height: 70px; text-align: center; display: block; }
        .checkmark span { font-size: 38px; color: #ffffff; font-weight: bold; }
        .body { padding: 36px 30px; }
        .greeting { font-size: 18px; font-weight: 600; margin-bottom: 12px; color: #0f172a; }
        .message { color: #64748b; line-height: 1.7; margin-bottom: 28px; font-size: 14px; }
        .details-card { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden; margin-bottom: 28px; }
        .details-card .card-header { background: #0f3460; color: #fff; padding: 14px 20px; font-size: 13px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; }
        .details-table { width: 100%; border-collapse: collapse; }
        .details-table tr { border-bottom: 1px solid #e2e8f0; }
        .details-table tr:last-child { border-bottom: none; }
        .details-table td { padding: 13px 20px; font-size: 14px; }
        .details-table td:first-child { color: #64748b; font-weight: 500; width: 45%; }
        .details-table td:last-child { color: #0f172a; font-weight: 600; }
        .total-row td { background: #fff8e7; }
        .total-row td:last-child { color: #FEA116; font-size: 16px; font-weight: 700; }
        .info-box { background: #eff6ff; border-left: 4px solid #3b82f6; border-radius: 6px; padding: 14px 18px; margin-bottom: 24px; }
        .info-box p { color: #1e40af; font-size: 13px; line-height: 1.6; }
        .footer-sec { text-align: center; padding: 24px 30px; background: #f8fafc; border-top: 1px solid #e2e8f0; }
        .footer-sec p { color: #94a3b8; font-size: 12px; line-height: 1.8; }
        .brand { font-weight: 700; color: #FEA116; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="checkmark"><span>✓</span></div>
            <h1>Booking Confirmed!</h1>
            <p>Your room has been successfully booked at Sunrise PG</p>
        </div>
        <div class="body">
            <p class="greeting">Dear {{ $booking->name ?? $userName }},</p>
            <p class="message">
                Thank you for choosing <strong>Sunrise PG</strong>! We're excited to welcome you. 
                Your booking has been confirmed. Please find your booking details below.
            </p>

            <div class="details-card">
                <div class="card-header">📋 Booking Details</div>
                <table class="details-table">
                    <tr>
                        <td>Room Type</td>
                        <td>{{ $roomName }}</td>
                    </tr>
                    <tr>
                        <td>Number of Beds</td>
                        <td>{{ $beds }} Bed(s)</td>
                    </tr>
                    <tr>
                        <td>Price per Bed / Month</td>
                        <td>₹{{ number_format($pricePerBed, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Security Deposit</td>
                        <td>₹{{ number_format($deposit, 2) }}</td>
                    </tr>
                    @if(isset($joiningDate) && $joiningDate)
                    <tr>
                        <td>Joining Date</td>
                        <td>{{ $joiningDate }}</td>
                    </tr>
                    @endif
                    <tr class="total-row">
                        <td>Total Amount Paid</td>
                        <td>₹{{ number_format($totalAmount, 2) }}</td>
                    </tr>
                </table>
            </div>

            <div class="info-box">
                <p>📍 <strong>Address:</strong> Ashram Road, Ahmedabad, Gujarat<br>
                📞 <strong>Contact:</strong> +91 7016853819<br>
                📧 <strong>Email:</strong> info@sunrise.com</p>
            </div>

            <p class="message">
                If you have any questions or need assistance, feel free to contact us. 
                We look forward to making your stay comfortable and memorable!
            </p>
        </div>
        <div class="footer-sec">
            <p>© {{ date('Y') }} <span class="brand">SUNRISE PG</span>. All rights reserved.<br>
            This is an automated email. Please do not reply directly to this email.</p>
        </div>
    </div>
</body>
</html>
