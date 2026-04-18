<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign UP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            background: #ffffff; /* Changed background color to white */
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .login-form {
            width: 340px;
            margin: 50px auto;
            position: relative; /* Changed from fixed to relative */
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {
        font-size: 15px;
        font-weight: bold;
        background-color: orange; /* Changed button background color to orange */
        border-color: orange; /* Changed button border color to orange */
        color: #ffffff; /* Changed button text color to white */
    }
    .btn:hover {
        background-color: #ff7f00; /* Changed button background color on hover to a shade of orange */
        border-color: #ff7f00; /* Changed button border color on hover to a shade of orange */
    }
<!--        .btn {-->
<!--            font-size: 15px;-->
<!--            font-weight: bold;-->
<!--            background-color: orange; /* Changed button color to orange */-->
<!--            border-color: orange; /* Changed border color to orange */-->
<!--            color: #ffffff; /* Changed button text color to white */-->
<!--        }-->

        /* Customize form layout */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group.inline {
            display: flex;
            align-items: center;
        }

        .form-group.inline .form-control {
            width: 50%;
            margin-right: 10px;
        }

        /* Style for titles above input fields */
        .form-group.label-above {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .form-group.label-above label {
            margin-bottom: 5px;
        }

        .text-center a {
            color: orange; /* Changed link color to orange */
            border-color: orange; /* Changed button border color to orange */
        }
    </style>
</head>

<body>
    <div class="login-form">
        <form method="post">
            @csrf
            <h2 class="text-center">Signup</h2>
            <div class="form-group label-above">
                <!-- First Name -->
                <label data-model-name="first_name">First Name</label>
                <input type="text" class="form-control" name="firstname" id="first_name" placeholder="First Name" required="required">
            </div>
            <div class="form-group label-above">
                <!-- Last Name -->
                <label data-model-name="last_name">Last Name</label>
                <input type="text" class="form-control" name="lastname" id="last_name" placeholder="Last Name" required="required">
            </div>
            <div class="form-group">
                <label data-model-name="first_name">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <label data-model-name="first_name">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
<!--            <div class="form-group">-->
<!--                <label data-model-name="first_name">Date of Birth</label>-->
<!--                <input type="date" class="form-control" name="dof" placeholder="Date of Birth" required="required">-->
<!--            </div>-->
            <div class="form-group">
                <label data-model-name="first_name">Phone Number</label>
                <input type="tel" class="form-control" name="phoneno" placeholder="Phone Number" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Signup</button>
            </div>
        </form>
        <p class="text-center"><a href="/loadlogin" style="color: orange;">Already registered</a></p> <!-- Changed link color to orange -->
    </div>
</body>

</html>

