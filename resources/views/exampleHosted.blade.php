<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Hosted Checkout | SSLCommerz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center py-10">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="text-center py-10">
            <h2 class="text-4xl font-extrabold mb-4 text-gray-900">Hosted Checkout - SSLCommerz</h2>
            <p class="text-lg text-gray-700 mb-8 leading-relaxed">Below is an example form built entirely with Tailwind
                CSS. We have provided this sample form for understanding Hosted Checkout Payment with SSLCommerz.</p>
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
                    <form action="{{ url('/pay') }}" method="POST" class="space-y-4">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                        <div>
                            <label for="customer_name" class="block text-gray-700 text-sm font-semibold mb-2">Full
                                name</label>
                            <input type="text" name="customer_name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="customer_name" placeholder="" value="John Doe" required>
                        </div>

                        <div>
                            <label for="mobile" class="block text-gray-700 text-sm font-semibold mb-2">Mobile</label>
                            <div class="flex items-center">
                                <span
                                    class="bg-gray-200 border border-gray-300 rounded-l-md px-4 py-2 text-gray-700">+88</span>
                                <input type="text" name="customer_mobile"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    id="mobile" placeholder="01711xxxxxx" value="01711xxxxxx" required>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email <span
                                    class="text-gray-500">(Optional)</span></label>
                            <input type="email" name="customer_email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="email" placeholder="you@example.com" value="you@example.com">
                        </div>

                        <div>
                            <label for="address" class="block text-gray-700 text-sm font-semibold mb-2">Address</label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="address" placeholder="1234 Main St" value="93 B, New Eskaton Road" required>
                        </div>

                        <div>
                            <label for="address2" class="block text-gray-700 text-sm font-semibold mb-2">Address 2 <span
                                    class="text-gray-500">(Optional)</span></label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="country"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Country</label>
                                <select
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    id="country" required>
                                    <option value="">Choose...</option>
                                    <option value="Bangladesh" selected>Bangladesh</option>
                                </select>
                            </div>
                            <div>
                                <label for="state" class="block text-gray-700 text-sm font-semibold mb-2">State</label>
                                <select
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    id="state" required>
                                    <option value="">Choose...</option>
                                    <option value="Dhaka" selected>Dhaka</option>
                                </select>
                            </div>
                            <div>
                                <label for="zip" class="block text-gray-700 text-sm font-semibold mb-2">Zip</label>
                                <input type="text"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    id="zip" placeholder="" required>
                            </div>
                        </div>

                        <hr class="border-t border-gray-300 my-6">

                        <div class="flex items-center mb-4">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded mr-2"
                                id="same-address">
                            <input type="hidden" value="1200" name="amount" id="total_amount" required />
                            <label class="text-gray-700" for="same-address">Shipping address is the same as my billing
                                address</label>
                        </div>

                        <div class="flex items-center mb-6">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded mr-2"
                                id="save-info">
                            <label class="text-gray-700" for="save-info">Save this information for next time</label>
                        </div>

                        <hr class="border-t border-gray-300 my-6">

                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300 ease-in-out">
                            Continue to checkout (Hosted)
                        </button>
                    </form>
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
</body>

</html>