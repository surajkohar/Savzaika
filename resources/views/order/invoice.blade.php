<?php
$admin_email = 'info@savzaika.com';
$admin_mobile = '+91 9999999999';
$shop_address = 'Address 1';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
    </style>
</head>

<body style="background-color: #f0f4f8; font-family: sans-serif;">

    <div
        style="margin: 0 auto; border-radius: 0.375rem; background-color: #fff; padding: 2rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div style="padding: 1.5rem;">
                <h1 style="color: #1a202c; font-size: 2rem; font-weight: bold; margin-bottom: 1rem;">
                    {{ config('app.name') }}
                </h1>
                <p>{{ $shop_address }}</p>
                <p>Phone: {{ $admin_mobile }}</p>
                <p>Email: {{ $admin_email }}</p>
                <p>Website: {{ config('app.url') }}</p>
            </div>
            <div style="padding-bottom: 2rem;">
                <h2 style="color: #1a202c; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">INVOICE</h2>
                <p>Order ID: #{{ $order->id }}</p>
                <p>Customer ID: {{ $order->User->name }}</p>
                <p>Date: {{ date('jS F Y', strtotime($order->created_at)) }}</p>
            </div>
        </div>

        <div style="padding: 1.5rem;">
            <h2
                style="color: #fff; background-color: #3c82f6; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">
                BILL TO</h2>
            <table style="width: 100%;">
                <tr>
                    <th style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">Name</th>
                    <td style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">
                        {{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">Phone</th>
                    <td style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">
                        {{ $order->Shipping_address->phone }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">Address</th>
                    <td style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">
                        {{ $order->Shipping_address->email }}</td>
                </tr>
            </table>
        </div>

        <br>

        <?php $subtotal = 0; ?>
        <div style="padding: 1.5rem;">
            <h2
                style="color: #1a202c; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem; background-color: #3c82f6; color: #fff;">
                DESCRIPTION</h2>
            <table style="width: 100%; text-align: center; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #718096; padding: 0.5rem;">PRODUCT</th>
                        <th style="border: 1px solid #718096; padding: 0.5rem;">QUANTITY</th>
                        <th style="border: 1px solid #718096; padding: 0.5rem;">PRICE</th>
                        <th style="border: 1px solid #718096; padding: 0.5rem;">TOTAL PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->Order_Item as $order_item)
                        <?php $subtotal += $order_item->quantity * $order_item->product->price; ?>
                        <tr>
                            <td style="border: 1px solid #718096; padding: 0.5rem;">{{ $order_item->product->name }}
                            </td>
                            <td style="border: 1px solid #718096; padding: 0.5rem;">{{ $order_item->quantity }}</td>
                            <td style="border: 1px solid #718096; padding: 0.5rem;">₹ {{ $order_item->product->price }}
                            </td>
                            <td style="border: 1px solid #718096; padding: 0.5rem;">
                                ₹ {{ $order_item->quantity * $order_item->product->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="padding: 1.5rem;">
            <h2
                style="color: #1a202c; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem; background-color: #3c82f6; color: #fff;">
                SHIPPING ADDRESS</h2>
            <table style="width: 100%;">
                <tr>
                    <th style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">City</th>
                    <td style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">
                        {{ $order->Shipping_address->city }}
                    </td>
                </tr>
                <tr>
                    <th style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">State</th>
                    <td style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">
                        {{ $order->Shipping_address->state }}
                    </td>
                </tr>
                <tr>
                    <th style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">Street</th>
                    <td style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">
                        {{ $order->Shipping_address->street }}
                    </td>
                </tr>
                <tr>
                    <th style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">Phone</th>
                    <td style="border: 1px solid #718096; padding: 0.5rem; text-align: left;">
                        {{ $order->Shipping_address->phone }}
                    </td>
                </tr>
            </table>
        </div>

        <div style="padding: 1.5rem;">
            <h2
                style="color: #1a202c; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem; background-color: #3c82f6; color: #fff;">
                ORDER SUMMARY</h2>
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="border: 1px solid #718096; padding: 0.5rem;">SUB AMOUNT</td>
                        <td style="border: 1px solid #718096; padding: 0.5rem;">₹ {{ $subtotal }}</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #718096; padding: 0.5rem;">COUPON DISCOUNT AMOUNT</td>
                        <td style="border: 1px solid #718096; padding: 0.5rem;">₹ {{ $order->discount_amount }}</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #718096; padding: 0.5rem;">SHIPPING CHARGE</td>
                        <td style="border: 1px solid #718096; padding: 0.5rem;">₹ 8</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #718096; padding: 0.5rem;">GRAND TOTAL</td>
                        <td style="border: 1px solid #718096; padding: 0.5rem;">
                            ₹ {{ $subtotal + 8 - $order->discount_amount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
            <p style="color: #fff; background-color: #3c82f6; font-weight: bold; padding: 0.5rem;">STATUS: <span
                    style="text-transform:uppercase;">{{ $order->status }}</span></p>
        </div>

    </div>

</body>

</html>
