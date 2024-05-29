<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shipment Confirmation</title>
  <style>
    body {
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    p {
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 15px;
    }

    .details {
      margin-bottom: 20px;
    }

    .details span {
      font-weight: bold;
    }

    .mt-6 {
      margin-top: 20px;
    }

    .text-sm {
      font-size: 14px;
    }

    .text-gray-500 {
      color: #666;
    }
  </style>
</head>

<body>

  <div class="container">
    <h1>Shipment Confirmation</h1>

    <p>Dear {{$order->user->first_name}},</p>

    <p>We are excited to inform you that your order has been successfully shipped! Below are the details of your shipment:</p>

    <div class="details">
      <p><span>Order ID:</span> #{{$order->id}}</p>
      <p><span>Shipped on:</span>{{ now()->format('jS F Y') }}</p>
      <p><span>Tracking Number:</span> ABC123XYZ</p>
      <p><span>Estimated Delivery Date:</span> {{ now()->addDays(8)->format('jS F Y') }}</p>
    </div>

    <p>You can track your shipment using the provided tracking number. If you have any questions or concerns, please feel free to contact our customer support at {{env('MAIL_FROM_ADDRESS', 'info@savzaika.com')}}.</p>

    <p>Thank you for choosing  {{ config('app.name') }}! We appreciate your business.</p>

    <div class="mt-6">
      <p class="text-sm text-gray-500">Best regards,<br>[{{ config('app.name') }}]</p>
    </div>
  </div>

</body>

</html>
