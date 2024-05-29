<?php
    $admin_email="info@savzaika.com";
   $admin_mobile="+91 9999999999";
   $shop_address="Address 1";
     ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Savzaika Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        .invoice-container {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .bill-to,
        .shipping-address,
        .order-summary {
            margin: 1rem 0;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .status {
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="header">
            <h2>Savzaika Invoice</h2>
            <p>
                {{$shop_address}}<br />
                Phone: {{$admin_mobile}}<br />
                Email: {{$admin_email}}<br />
                Website: {{ config('app.url') }}
            </p>
        </div>

        <div class="invoice-details">
            <p>
                Order ID: #{{ $order->id}}<br />
                Customer ID:{{ $order->User->name }}<br />
                Date: {{ date('jS F Y', strtotime($order->created_at)) }}
            </p>
        </div>

        <div class="bill-to">
            <h3>BILL TO</h3>
            <p>
                Name: {{ $order->user->first_name }}<br />
                Phone: {{ $order->Shipping_address->phone
                }}<br />
                Email: {{ $order->Shipping_address->email
                }}
            </p>
        </div>

        <?php $subtotal = 0; ?>
        <div class="description">
            <h3>DESCRIPTION</h3>
            <table>
                <tr>
                    <th>PRODUCT</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                    <th>TOTAL PRICE</th>
                </tr>
                @foreach($order->Order_Item as $order_item)
                <?php $subtotal += $order_item->quantity * $order_item->product->price; ?>
                <tr>
                    <td>{{ $order_item->product->name }}</td>
                    <td>{{ $order_item->quantity}}</td>
                    <td>₹ {{ $order_item->product->price }}</td>
                    <td>₹ {{ $order_item->quantity *
                        $order_item->product->price}}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="shipping-address">
            <h3>SHIPPING ADDRESS</h3>
            <p>
                City: {{$order->Shipping_address->city}}<br />
                State: {{$order->Shipping_address->state}}<br />
                Street: {{$order->Shipping_address->street}}<br />
                Phone: {{$order->Shipping_address->phone}}
            </p>
        </div>

        <div class="order-summary">
            <h3>ORDER SUMMARY</h3>
            <table>
                <tr>
                    <th>SUB AMOUNT</th>
                    <td>₹ {{$subtotal}}</td>
                </tr>
                <tr>
                    <th>COUPON DISCOUNT</th>
                    <td>₹ {{$order->discount_amount}}</td>
                </tr>
                <tr>
                    <th>SHIPPING CHARGE</th>
                    <td>₹ 8</td>
                </tr>
                <tr>
                    <th>GRAND TOTAL</th>
                    <td>₹ {{$subtotal+8-$order->discount_amount}}</td>
                </tr>
            </table>
        </div>

        <div class="status">
            <p>STATUS:{{$order->status}}</p>
        </div>
    </div>
</body>

</html>