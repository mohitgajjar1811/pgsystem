<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Proceed to Pay</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for form */
        body {
            background-color: lightblue;
        }
        .container {
            margin-top: 200px;
        }
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff; /* White background */
            border: 1px solid #dee2e6; /* Gray border */
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Box shadow */
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
<!--    <style>-->
<!--        body {-->
<!--            font-family: 'Arial', sans-serif;-->
<!--            background-color: #f9f9f9;-->
<!--            margin: 0;-->
<!--            padding: 0;-->
<!--            display: flex;-->
<!--            justify-content: center;-->
<!--            align-items: center;-->
<!--            min-height: 100vh;-->
<!--        }-->

<!--        .form-container {-->
<!--            max-width: 400px;-->
<!--            width: 100%;-->
<!--            padding: 40px;-->
<!--            background-color: #fff;-->
<!--            border-radius: 10px;-->
<!--            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);-->
<!--            overflow: hidden;-->
<!--            position: relative;-->
<!--        }-->

<!--        .form-title {-->
<!--            text-align: center;-->
<!--            font-size: 28px;-->
<!--            margin-bottom: 20px;-->
<!--            color: #333333;-->
<!--        }-->

<!--        .form-input {-->
<!--            width: calc(100% - 30px);-->
<!--            padding: 15px;-->
<!--            margin-bottom: 20px;-->
<!--            border: 2px solid #007bff;-->
<!--            border-radius: 8px;-->
<!--            box-sizing: border-box;-->
<!--            font-size: 16px;-->
<!--            transition: border-color 0.3s ease;-->
<!--            outline: none;-->
<!--        }-->

<!--        .form-input:focus {-->
<!--            border-color: #0056b3;-->
<!--        }-->

<!--        .form-button {-->
<!--            width: calc(100% - 30px);-->
<!--            padding: 15px;-->
<!--            background-color: #007bff;-->
<!--            color: #ffffff;-->
<!--            border: none;-->
<!--            border-radius: 8px;-->
<!--            cursor: pointer;-->
<!--            font-size: 18px;-->
<!--            transition: background-color 0.3s ease;-->
<!--            outline: none;-->
<!--        }-->

<!--        .form-button:hover {-->
<!--            background-color: #0056b3;-->
<!--        }-->

<!--        .form-image {-->
<!--            width: 100px;-->
<!--            height: 100px;-->
<!--            margin: 0 auto 30px;-->
<!--            border-radius: 50%;-->
<!--            overflow: hidden;-->
<!--            position: relative;-->
<!--        }-->

<!--        .form-image img {-->
<!--            width: 100%;-->
<!--            height: 100%;-->
<!--            object-fit: cover;-->
<!--        }-->

<!--        .form-image:before {-->
<!--            content: '';-->
<!--            position: absolute;-->
<!--            top: 0;-->
<!--            left: 0;-->
<!--            width: 100%;-->
<!--            height: 100%;-->
<!--            background: linear-gradient(45deg, #ff4081, #7e57c2, #03a9f4, #4caf50);-->
<!--            animation: gradient 15s ease infinite;-->
<!--            z-index: -1;-->
<!--        }-->

<!--        @keyframes gradient {-->
<!--            0% {-->
<!--                background-position: 0% 50%;-->
<!--            }-->
<!--            50% {-->
<!--                background-position: 100% 50%;-->
<!--            }-->
<!--            100% {-->
<!--                background-position: 0% 50%;-->
<!--            }-->
<!--        }-->

<!--        .form-footer {-->
<!--            text-align: center;-->
<!--            font-size: 14px;-->
<!--            color: #666666;-->
<!--            margin-top: 20px;-->
<!--        }-->

<!--        .form-footer a {-->
<!--            color: #007bff;-->
<!--            text-decoration: none;-->
<!--        }-->

<!--        .form-footer a:hover {-->
<!--            text-decoration: underline;-->
<!--        }-->
<!--    </style>-->
</head>
<body>
<form class="text-center border border-light p-5" action="/success" method="POST">
    @csrf

    <!-- RAZORPAY INTEGRATION HERE -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="rzp_test_PvM4GxK9MYlCUc"
            data-amount="{{ $payment->amount }}"
            data-currency="INR"
            data-order_id="{{ $payment->id }}"
            data-buttontext="Pay with Razorpay"
            data-name="PG Management System"
            data-description="Secure PG Booking Payment"
            data-image="https://oibp1.000webhostapp.com/logo.PNG"
            data-prefill.name="{{ $result->firstname }} {{ $result->lastname }}"
            data-prefill.email="{{ $result->email }}"
            data-prefill.contact="{{ $result->phoneno }}"
            data-theme.color="#F37254"></script>

    <script id="blog-data" type="application/json">@json($blog_data)</script>
    <!-- JavaScript to store the total amount and blog data in local storage -->
    <script>
        // Retrieve the total amount from the Django context
        var totalAmount = "{{ $total_amount }}";

        // Store the total amount in local storage
        localStorage.setItem('totalAmount', totalAmount);

        // Retrieve the blog data from the Django context safely without IDE errors
        var blogData = JSON.parse(document.getElementById('blog-data').textContent);

        // Store the blog data in local storage
        localStorage.setItem('blogData', JSON.stringify(blogData));
    </script>
</form>
</body>
</html>
