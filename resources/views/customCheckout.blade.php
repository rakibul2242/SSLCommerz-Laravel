<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Custom SSLCommerz Checkout</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Custom Payment</h2>

        <form id="paymentForm">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="name">Full Name</label>
                <input type="text" id="name" name="customer_name" value="John Doe"
                    class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="phone">Mobile</label>
                <input type="text" id="phone" name="customer_phone" value="01711xxxxxx"
                    class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="email">Email</label>
                <input type="email" id="email" name="customer_email" value="you@example.com"
                    class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2" for="amount">Amount (BDT)</label>
                <input type="number" id="amount" name="amount" value="1200"
                    class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="address">Address</label>
                <input type="text" id="address" name="customer_address" placeholder="123 Street, City"
                    value="123 Street, City"
                    class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="button" id="payBtn"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                Pay Now
            </button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('#payBtn').click(function () {
                var formData = {
                    cus_name: $('#name').val(),
                    cus_email: $('#email').val(),
                    cus_phone: $('#phone').val(),
                    cus_add1: $('#address').val(),
                    amount: $('#amount').val()
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/pay-now',
                    type: 'POST',
                    data: {
                        postdata: JSON.stringify(formData)
                    },
                    success: function (response) {
                        if (response.GatewayPageURL) {
                            window.location.href = response.GatewayPageURL; // now it works
                        } else {
                            alert('Payment initiation failed. Please try again.');
                            console.error(response);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log("Status:", status);
                        console.log("Error:", error);
                        console.log("Response:", xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>

</body>

</html>