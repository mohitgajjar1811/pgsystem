<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout | Sunrise PG</title>
    
    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f0f2f5;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        .checkout-container {
            max-width: 850px;
            width: 95%;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
        }

        .checkout-image {
            flex: 1 1 300px;
            background: linear-gradient(rgba(15, 23, 43, .7), rgba(15, 23, 43, .7)), url('{{ asset('user/img/carousel-1.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .checkout-image h1 { font-size: 2rem; }
        .checkout-image p { font-size: 0.9rem; }

        .checkout-form-section {
            flex: 1 1 400px;
            padding: 20px 35px;
        }

        .checkout-form-section h2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #0F172B;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
            font-size: 1.3rem;
        }

        .checkout-form-section h2::after {
            content: '';
            position: absolute;
            width: 40%;
            height: 2px;
            background: #FEA116;
            bottom: -3px;
            left: 0;
        }

        .form-label {
            font-weight: 600;
            color: #666;
            margin-bottom: 2px;
            font-size: 0.8rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 8px 12px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
            background-color: #f8f9fa;
            font-size: 0.9rem;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: #FEA116;
            box-shadow: 0 0 0 0.2rem rgba(254, 161, 22, 0.15);
        }

        .input-group-text {
            background-color: #FEA116;
            color: white;
            border: none;
            border-radius: 8px 0 0 8px;
            padding: 8px 12px;
        }

        .btn-calculate {
            background-color: #0F172B;
            color: white;
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            width: 100%;
            margin-bottom: 6px;
            font-size: 0.85rem;
        }

        .btn-calculate:hover {
            background-color: #1a253d;
        }

        .btn-book {
            background-color: #FEA116;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            border: none;
            width: 100%;
            font-size: 0.9rem;
        }

        .btn-book:hover {
            background-color: #e69014;
            color: white;
        }

        .summary-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 10px 15px;
            margin-top: 12px;
            border-left: 4px solid #FEA116;
        }

        .summary-card div { font-size: 0.85rem; }

        .total-amount {
            font-size: 1.2rem;
            font-weight: 800;
            color: #FEA116;
        }

        @media (max-width: 768px) {
            .checkout-image {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="checkout-container">
    <!-- Left Section: Visual -->
    <div class="checkout-image">
        <h1 class="display-4 text-white font-weight-bold mb-4">Sunrise PG</h1>
        <p class="lead mb-4">Experience luxury and comfort in our premium guest accommodations.</p>
        <div class="d-flex align-items-center mb-2">
            <i class="fa fa-check-circle text-primary me-2"></i>
            <span>Verified Secure Payment</span>
        </div>
        <div class="d-flex align-items-center">
            <i class="fa fa-check-circle text-primary me-2"></i>
            <span>Instant Confirmation</span>
        </div>
    </div>

    <!-- Right Section: Form -->
    <div class="checkout-form-section">
        <h2>Secure Checkout</h2>
        
        <form id="checkoutForm" method="post" action="/payment_process">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Room Category</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-door-open"></i></span>
                    <input type="text" id="roomName" name="roomnme" class="form-control" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Number of Beds</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-bed"></i></span>
                        <input type="number" id="beds" name="bed" class="form-control" min="1" readonly>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Price per Bed</label>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" value="{{ $price }}" id="price" name="priceperb" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Refundable Deposit (per bed)</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-shield-alt"></i></span>
                    <input type="number" id="deposit" name="deposite" value="1000" class="form-control" readonly>
                </div>
            </div>

            <div class="summary-card mb-4">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Room Rent:</span>
                    <span id="display-rent" class="font-weight-bold">₹ 0.00</span>
                </div>
                <div class="d-flex justify-content-between mb-3 pb-2 border-bottom">
                    <span class="text-muted">Security Deposit:</span>
                    <span id="display-deposit" class="font-weight-bold">₹ 0.00</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="h5 mb-0 font-weight-bold">Total Amount:</span>
                    <span id="display-total" class="total-amount">₹ 0.00</span>
                </div>
                <input type="hidden" id="total" name="total">
                <small class="text-muted italic">* Deposit is one-time and refundable.</small>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="terms" required checked>
                <label class="form-check-label text-muted small" for="terms">
                    I agree to the <a href="#" class="text-primary">Terms & Conditions</a> and PG rules.
                </label>
            </div>

            <div class="d-grid">
                <button type="button" id="bookNowBtn" onclick="submitForm()" class="btn-book">
                    Pay & Confirm Booking <i class="fa fa-arrow-right ms-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Retrieve values from localStorage
        var storedRoomValue = localStorage.getItem("selectedRoom");
        var storedBedValue = localStorage.getItem("selectedValue");

        document.getElementById("roomName").value = storedRoomValue || "N/A";
        document.getElementById("beds").value = storedBedValue || 1;
        
        // Initial calculation
        calculateTotal();
    });

    function calculateTotal() {
        var beds = parseInt(document.getElementById('beds').value) || 0;
        var price = parseFloat(document.getElementById('price').value) || 0;
        var depositPerBed = parseFloat(document.getElementById('deposit').value) || 0;
        
        var totalRent = beds * price;
        var totalDeposit = beds * depositPerBed;
        var grandTotal = totalRent + totalDeposit;
        
        document.getElementById('display-rent').innerText = '₹ ' + totalRent.toFixed(2);
        document.getElementById('display-deposit').innerText = '₹ ' + totalDeposit.toFixed(2);
        
        var formattedTotal = grandTotal.toFixed(2);
        localStorage.setItem('totalValue', formattedTotal);
        document.getElementById('total').value = formattedTotal;
        document.getElementById('display-total').innerText = '₹ ' + formattedTotal;
    }

    function submitForm() {
        var totalValue = document.getElementById('total').value;
        var terms = document.getElementById('terms').checked;

        if (!terms) {
            Swal.fire({
                icon: 'warning',
                iconColor: '#dc3545',
                title: 'Terms & Conditions',
                text: 'Please agree to the terms to proceed.',
                confirmButtonColor: '#FEA116'
            });
            return;
        }

        if (totalValue && totalValue > 0) {
            document.getElementById("checkoutForm").submit();
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Missing Details',
                text: 'Calculation error. Please refresh and try again.',
                confirmButtonColor: '#FEA116'
            });
        }
    }
</script>

</body>
</html>