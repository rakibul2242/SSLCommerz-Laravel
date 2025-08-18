<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Example - EasyCheckout (Popup) | SSLCommerz">
    <meta name="author" content="SSLCommerz">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Example - EasyCheckout (Popup) | SSLCommerz</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3E%3Cpath d='M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1.5rem 1.5rem;
            padding-right: 2.5rem;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center py-10">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="py-10 text-center">
            <h2 class="text-4xl font-extrabold mb-4 text-gray-900">EasyCheckout (Popup) - SSLCommerz</h2>
            <p class="text-lg text-gray-700 mb-8 leading-relaxed">Below is an example form built entirely with Tailwind’s utility classes. We have provided this sample form for understanding EasyCheckout (Popup) Payment integration with SSLCommerz.</p>
        </div>

        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/3 px-4 mb-8 md:order-2">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
                    <h4 class="flex justify-between items-center px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <span class="text-xl font-semibold text-gray-700">Your cart</span>
                        <span class="bg-blue-600 text-white text-sm px-3 py-1 rounded-full">3</span>
                    </h4>
                    <ul class="divide-y divide-gray-200">
                        <li class="flex justify-between items-center px-6 py-4">
                            <div>
                                <h6 class="font-semibold text-gray-800">Product name</h6>
                                <small class="text-gray-600">Brief description</small>
                            </div>
                            <span class="text-gray-700">1000</span>
                        </li>
                        <li class="flex justify-between items-center px-6 py-4">
                            <div>
                                <h6 class="font-semibold text-gray-800">Second product</h6>
                                <small class="text-gray-600">Brief description</small>
                            </div>
                            <span class="text-gray-700">50</span>
                        </li>
                        <li class="flex justify-between items-center px-6 py-4">
                            <div>
                                <h6 class="font-semibold text-gray-800">Third item</h6>
                                <small class="text-gray-600">Brief description</small>
                            </div>
                            <span class="text-gray-700">150</span>
                        </li>
                        <li class="flex justify-between items-center px-6 py-4 font-bold text-lg bg-gray-50">
                            <span class="text-gray-800">Total (BDT)</span>
                            <strong class="text-blue-600">1200 TK</strong>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full md:w-2/3 px-4 md:order-1">
                <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200">
                    <h4 class="text-2xl font-bold mb-6 text-gray-800">Billing address</h4>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="mb-4">
                            <label for="customer_name" class="block text-gray-700 text-sm font-semibold mb-2">Full name</label>
                            <input type="text" name="customer_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="customer_name" placeholder="" value="John Doe" required>
                            <div class="text-red-500 text-sm mt-1 hidden" id="customer_name_feedback">
                                Valid customer name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="mobile" class="block text-gray-700 text-sm font-semibold mb-2">Mobile</label>
                        <div class="flex items-center">
                            <span class="bg-gray-200 border border-gray-300 rounded-l-md px-4 py-2 text-gray-700">+88</span>
                            <input type="text" name="customer_mobile" class="w-full px-4 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="mobile" placeholder="01711xxxxxx" value="01711xxxxxx" required>
                        </div>
                        <div class="text-red-500 text-sm mt-1 hidden" id="mobile_feedback">
                            Your Mobile number is required.
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email <span class="text-gray-500">(Optional)</span></label>
                        <input type="email" name="customer_email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" placeholder="you@example.com" value="you@example.com" required>
                        <div class="text-red-500 text-sm mt-1 hidden" id="email_feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 text-sm font-semibold mb-2">Address</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="address" placeholder="1234 Main St" value="93 B, New Eskaton Road" required>
                        <div class="text-red-500 text-sm mt-1 hidden" id="address_feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="address2" class="block text-gray-700 text-sm font-semibold mb-2">Address 2 <span class="text-gray-500">(Optional)</span></label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="country" class="block text-gray-700 text-sm font-semibold mb-2">Country</label>
                            <select class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="country" required>
                                <option value="">Choose...</option>
                                <option value="Bangladesh" selected>Bangladesh</option>
                            </select>
                            <div class="text-red-500 text-sm mt-1 hidden" id="country_feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div>
                            <label for="state" class="block text-gray-700 text-sm font-semibold mb-2">State</label>
                            <select class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="state" required>
                                <option value="">Choose...</option>
                                <option value="Dhaka" selected>Dhaka</option>
                            </select>
                            <div class="text-red-500 text-sm mt-1 hidden" id="state_feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div>
                            <label for="zip" class="block text-gray-700 text-sm font-semibold mb-2">Zip</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="zip" placeholder="" required>
                            <div class="text-red-500 text-sm mt-1 hidden" id="zip_feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    
                    <hr class="border-t border-gray-300 my-8">
                    
                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mr-2" id="same-address">
                        <input type="hidden" value="1200" name="amount" id="total_amount" required />
                        <label class="text-gray-700" for="same-address">Shipping address is the same as my billing address</label>
                    </div>
                    <div class="flex items-center mb-6">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mr-2" id="save-info">
                        <label class="text-gray-700" for="save-info">Save this information for next time</label>
                    </div>

                    <hr class="border-t border-gray-300 my-8">

                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300 ease-in-out" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}">
                        Pay Now
                    </button>
                </div>
            </div>
        </div>

        <footer class="mt-10 pt-10 text-gray-500 text-center text-sm">
            <p class="mb-2">&copy; 2019 Company Name</p>
            <ul class="flex justify-center space-x-4">
                <li><a href="#" class="hover:text-gray-700">Privacy</a></li>
                <li><a href="#" class="hover:text-gray-700">Terms</a></li>
                <li><a href="#" class="hover:text-gray-700">Support</a></li>
            </ul>
        </footer>
    </div>
    
    <script>
        var obj = {};
        // If you want to pass some value from frontend, you can do like this, but be aware, this value can be modified by anyone, so it's not secure to pass total_amount, store_passwd etc from frontend.
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('#address').val();

        document.getElementById('sslczPayBtn').setAttribute('postdata', JSON.stringify(obj));

        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>

</body>
</html>
