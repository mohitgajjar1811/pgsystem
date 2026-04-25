<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Alert - Sunrise PG Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f6f9; color: #333; }
        .wrapper { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #0f3460 0%, #16213e 100%); padding: 36px 30px; text-align: center; }
        .header h1 { color: #FEA116; font-size: 26px; font-weight: 700; }
        .header p { color: rgba(255,255,255,0.75); margin-top: 6px; font-size: 14px; }
        .bell { font-size: 42px; margin-bottom: 12px; }
        .body { padding: 32px 30px; }
        .alert-badge { display: inline-block; background: #fef3c7; color: #92400e; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 20px; }
        .greeting { font-size: 17px; font-weight: 600; color: #0f172a; margin-bottom: 10px; }
        .message { color: #64748b; font-size: 14px; line-height: 1.7; margin-bottom: 26px; }
        .section-title { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #94a3b8; margin-bottom: 12px; }
        .details-card { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden; margin-bottom: 20px; }
        .card-header { background: #FEA116; color: #fff; padding: 12px 20px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; }
        .details-table { width: 100%; border-collapse: collapse; }
        .details-table tr { border-bottom: 1px solid #e2e8f0; }
        .details-table tr:last-child { border-bottom: none; }
        .details-table td { padding: 12px 20px; font-size: 14px; }
        .details-table td:first-child { color: #64748b; font-weight: 500; width: 45%; }
        .details-table td:last-child { color: #0f172a; font-weight: 600; }
        .total-row td:last-child { color: #FEA116; font-weight: 700; font-size: 15px; }
        .footer-sec { text-align: center; padding: 22px 30px; background: #f8fafc; border-top: 1px solid #e2e8f0; }
        .footer-sec p { color: #94a3b8; font-size: 12px; }
        .brand { font-weight: 700; color: #FEA116; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="bell">🔔</div>
            <h1>New Booking Alert!</h1>
            <p>A new room booking has been made on Sunrise PG</p>
        </div>
        <div class="body">
            <span class="alert-badge">⚡ Action Required</span>
            <p class="greeting">Hello Admin,</p>
            <p class="message">
                A new booking has been submitted on your platform. Please review the details below 
                and take any necessary action.
            </p>

            <div class="details-card">
                <div class="card-header">👤 User Information</div>
                <table class="details-table">
                    <tr>
                        <td>Name</td>
                        <td>{{ $userName }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $userEmail }}</td>
                    </tr>
                </table>
            </div>

            <div class="details-card">
                <div class="card-header">🏠 Booking Details</div>
                <table class="details-table">
                    <tr>
                        <td>Room Type</td>
                        <td>{{ $roomName }}</td>
                    </tr>
                    <tr>
                        <td>Beds Booked</td>
                        <td>{{ $beds }}</td>
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
                        <td>Total Amount</td>
                        <td>₹{{ number_format($totalAmount, 2) }}</td>
                    </tr>
                </table>
            </div>

            <p class="message">
                Please log in to the admin panel to manage this booking.
            </p>
        </div>
        <div class="footer-sec">
            <p>© {{ date('Y') }} <span class="brand">SUNRISE PG</span> Admin System. Automated notification.</p>
        </div>
    </div>
</body>
</html>
