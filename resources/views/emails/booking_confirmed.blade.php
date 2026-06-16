<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الحجز - وجهتي</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7fafc;
            color: #2d3748;
            margin: 0;
            padding: 0;
            direction: rtl;
            text-align: right;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }
        .header {
            background: linear-gradient(135deg, #0a5c8c 0%, #00b4d8 100%);
            padding: 30px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .content {
            padding: 30px;
        }
        .welcome {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #0a5c8c;
        }
        .message {
            line-height: 1.6;
            margin-bottom: 25px;
            font-size: 15px;
        }
        .booking-card {
            background-color: #f8fafc;
            border-right: 4px solid #f4a261;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 20px;
            border-top: 1px solid #edf2f7;
            border-left: 1px solid #edf2f7;
            border-bottom: 1px solid #edf2f7;
        }
        .booking-card-title {
            font-weight: bold;
            font-size: 16px;
            color: #2d3748;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .detail-label {
            color: #718096;
        }
        .detail-value {
            font-weight: 500;
            color: #2d3748;
        }
        .total-section {
            border-top: 2px dashed #e2e8f0;
            margin-top: 25px;
            padding-top: 20px;
            text-align: left;
        }
        .total-box {
            display: inline-block;
            background-color: #0a5c8c;
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
        }
        .footer {
            background-color: #f1f5f9;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #718096;
            border-top: 1px solid #e2e8f0;
        }
        .footer a {
            color: #00b4d8;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>منصة وجهتي السياحية</h1>
            <p>دليلك وحجوزاتك في مدينة عدن الجميلة</p>
        </div>
        <div class="content">
            <div class="welcome">مرحباً، {{ $user->name }}!</div>
            <div class="message">
                يسعدنا إبلاغك بأنه تم تأكيد حجوزاتك بنجاح. لقد قمنا بتجهيز كل شيء لتستمتع برحلتك في ثغر اليمن الباسم (عدن). إليك تفاصيل الحجز:
            </div>

            @php $totalPrice = 0; @endphp

            @foreach($bookings as $item)
                @if($item['type'] === 'hotel')
                    @php $totalPrice += $item['total_price']; @endphp
                    <div class="booking-card" style="border-right-color: #0a5c8c;">
                        <div class="booking-card-title">🏨 حجز فندق: {{ $item['name'] }}</div>
                        <div class="detail-row">
                            <span class="detail-label">العنوان:</span>
                            <span class="detail-value">{{ $item['address'] }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">تاريخ الدخول:</span>
                            <span class="detail-value">{{ $item['check_in'] }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">تاريخ المغادرة:</span>
                            <span class="detail-value">{{ $item['check_out'] }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">عدد النزلاء:</span>
                            <span class="detail-value">{{ $item['guests_count'] }} أشخاص</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">السعر الإجمالي:</span>
                            <span class="detail-value">${{ number_format($item['total_price'], 2) }}</span>
                        </div>
                    </div>
                @elseif($item['type'] === 'ride')
                    @php $totalPrice += $item['price']; @endphp
                    <div class="booking-card" style="border-right-color: #f4a261;">
                        <div class="booking-card-title">🚖 حجز تاكسي: مع السائق {{ $item['driver_name'] }}</div>
                        <div class="detail-row">
                            <span class="detail-label">السيارة:</span>
                            <span class="detail-value">{{ $item['car_model'] }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">رقم اللوحة:</span>
                            <span class="detail-value">{{ $item['license_plate'] }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">رقم هاتف السائق:</span>
                            <span class="detail-value" dir="ltr">{{ $item['driver_phone'] }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">نقطة الانطلاق:</span>
                            <span class="detail-value">{{ $item['pickup'] }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">وجهة الوصول:</span>
                            <span class="detail-value">{{ $item['dropoff'] }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">التاريخ والوقت:</span>
                            <span class="detail-value">{{ $item['date'] }} في {{ $item['time'] }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">تكلفة الرحلة المقدرة:</span>
                            <span class="detail-value">${{ number_format($item['price'], 2) }}</span>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="total-section">
                <div style="font-size: 14px; color: #718096; margin-bottom: 5px;">المبلغ الإجمالي المدفوع/المستحق:</div>
                <div class="total-box">${{ number_format($totalPrice, 2) }}</div>
            </div>
            
            <div style="margin-top: 30px; line-height: 1.6; font-size: 14px; color: #4a5568;">
                إذا كان لديك أي استفسار، لا تتردد في الاتصال بالسائقين مباشرة أو التواصل مع خدمة العملاء في منصتنا. نتمنى لك إقامة رائعة في صهاريج صيرة وشواطئ جولدموهور الساحرة!
            </div>
        </div>
        <div class="footer">
            <p>تم إرسال هذا البريد الإلكتروني تلقائياً من منصة وجهتي عدن.</p>
            <p>&copy; {{ date('Y') }} وجهتي. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</body>
</html>
