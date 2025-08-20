<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function payViaAjax(Request $request)
    {
        // Retrieve the data sent from the frontend via AJAX
        $customerData = $request->input('postdata');
        $customerData = json_decode($customerData, true); // Decode the JSON string into an array

        // Basic validation and handling of missing data
        $customerName = $customerData['cus_name'] ?? 'Guest Customer';
        $customerEmail = $customerData['cus_email'] ?? 'guest@example.com';
        $customerPhone = $customerData['cus_phone'] ?? '01XXXXXXXXX';
        $customerAddress = $customerData['cus_addr1'] ?? 'Not Provided';

        // The amount is also hardcoded in the frontend, which is not secure.
        // Ideally, you should fetch the amount from your database based on a product ID
        // or a session-based cart. For this example, let's use the hardcoded value from the HTML.
        $totalAmount = 1200; // This should be dynamic and fetched securely.

        // Prepare the data for SSLCommerz
        $post_data = array();
        $post_data['total_amount'] = $totalAmount;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // Must be a unique transaction ID

        // Use the customer information received from the frontend
        $post_data['cus_name'] = $customerName;
        $post_data['cus_email'] = $customerEmail;
        $post_data['cus_add1'] = $customerAddress;
        $post_data['cus_add2'] = ""; // You might want to get this from the form as well
        $post_data['cus_city'] = "Dhaka"; // You might want to get this from the form
        $post_data['cus_state'] = "Dhaka"; // You might want to get this from the form
        $post_data['cus_postcode'] = "1212"; // You might want to get this from the form
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $customerPhone;
        $post_data['cus_fax'] = "";

        // Shiping Info (you can also get this from the form)
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        // Product info
        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Order from Website";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        // ... (rest of the code is fine)

        // Save the order to the database
        $update_product = DB::table('orders')
            ->updateOrInsert(
                ['transaction_id' => $post_data['tran_id']],
                [
                    'name' => $post_data['cus_name'],
                    'email' => $post_data['cus_email'],
                    'phone' => $post_data['cus_phone'],
                    'amount' => $post_data['total_amount'],
                    'status' => 'Pending',
                    'address' => $post_data['cus_add1'],
                    'currency' => $post_data['currency']
                ]
            );

        // Initiate the payment
        $sslc = new SslCommerzNotification();
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            return response()->json(['error' => 'Could not initiate payment. Please try again.']);
        }

        // Return the response to the frontend
        return response()->json($payment_options);
    }
    public function success(Request $request)
    {
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                echo "<br >Transaction is successfully Completed";
            }
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

    public function customCheckout()
    {
        return view('customCheckout');
    }

    public function payNow(Request $request)
    {
        $data = $request->postdata;
        $post_data = [
            'cus_name' => $data['cus_name'] ?? 'Guest Customer',
            'cus_email' => $data['cus_email'] ?? 'guest@example.com',
            'cus_phone' => $data['cus_phone'] ?? '01711xxxxxx',
            'cus_add1' => $data['cus_add1'] ?? '123 Street, City',
            'total_amount' => $data['amount'] ?? 0,
            'currency' => 'BDT',
            'tran_id' => uniqid(),
            'product_name' => 'Sample Product',
            'product_category' => 'Electronics',
            'product_profile' => 'general',
            'shipping_method' => 'Courier',
            'ship_name' => 'John Doe',
            'ship_address' => '123 Street, City',
            'ship_city' => 'Dhaka',
            'ship_state' => 'Dhaka',
            'ship_postcode' => '1212',
            'ship_country' => 'Bangladesh',
            'ship_add1' => '123 Street, City',
        ];

        $ssl = new SslCommerzNotification();
        $payment = $ssl->makePayment($post_data, 'checkout', 'json');

        if (is_string($payment)) {
            $payment = json_decode($payment, true);
        }

        // Process the payment with the retrieved data
        return response()->json([
            'success' => true,
            'message' => 'Payment processed successfully',
            'GatewayPageURL' => $payment['data'] ?? null,
            'data' => $post_data
        ]);
    }
}
