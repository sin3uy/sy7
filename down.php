<?php
// قراءة العداد من ملف txt
$counterFile = 'counter.txt';
if (file_exists($counterFile)) {
    $count = (int) file_get_contents($counterFile);
} else {
    $count = 0;
    file_put_contents($counterFile, $count);
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الطيار - تطبيق التوصيل</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
        }
        body {
            background-color: #121212;
            color: #ffffff;
            padding-bottom: 20px;
            overflow-x: hidden;
        }
        .container {
            max-width: 480px;
            margin: 0 auto;
            background-color: #1e1e1e;
            min-height: 100vh;
            position: relative;
        }
        .app-header {
            display: flex;
            align-items: center;
            padding: 20px;
            gap: 15px;
            background-color: #1e1e1e;
        }
        .app-icon {
            width: 72px;
            height: 72px;
            border-radius: 15px;
            object-fit: cover;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
        }
        .app-info {
            flex: 1;
        }
        .app-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .app-subtitle {
            font-size: 14px;
            color: #b0b0b0;
            margin-bottom: 8px;
        }
        .app-meta {
            display: flex;
            gap: 15px;
            font-size: 12px;
            color: #b0b0b0;
            align-items: center;
            flex-wrap: wrap;
        }
        .app-meta div {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .app-meta span {
            color: #ffffff;
            margin-top: 2px;
        }
        .download-stat-container {
            display: flex;
            align-items: center;
            gap: 5px;
            background-color: #2a2a2a;
            padding: 4px 10px;
            border-radius: 12px;
            border: 1px solid #444;
            cursor: default;
        }
        .download-stat-icon {
            width: 14px;
            height: 14px;
            stroke: #b0b0b0;
            stroke-width: 2;
            fill: none;
        }
        .download-stat-number {
            font-size: 11px;
            font-weight: bold;
            color: #a6c8ff;
        }
        .install-section {
            padding: 0 20px 10px 20px;
            background-color: #1e1e1e;
        }
        .install-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #a6c8ff;
            color: #0f0f0f;
            text-align: center;
            border-radius: 8px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: background 0.2s;
        }
        .install-btn:active {
            background-color: #8fb2e6;
        }
        .install-note {
            font-size: 11px;
            color: #b0b0b0;
            margin-top: 8px;
            text-align: center;
        }
        .banner-section {
            padding: 0 20px 20px 20px;
            background-color: #1e1e1e;
            display: flex;
            justify-content: center;
        }
        .banner-image {
            display: block;
            width: 100%;
            aspect-ratio: 3000 / 1249;
            object-fit: cover;
            border-radius: 12px;
            background-color: #333;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }
        .description-section {
            padding: 20px;
            background-color: #1e1e1e;
            border-top: 1px solid #2a2a2a;
            border-bottom: 1px solid #2a2a2a;
        }
        .section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .section-title svg {
            width: 24px;
            height: 24px;
            fill: #b0b0b0;
        }
        .description-text {
            font-size: 14px;
            color: #d0d0d0;
            line-height: 1.6;
        }
        .description-text strong {
            color: #ffffff;
        }
        .tags-container {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            background-color: #1e1e1e;
        }
        .tag {
            background-color: #2a2a2a;
            color: #d0d0d0;
            padding: 8px 16px;
            border-radius: 16px;
            font-size: 13px;
            border: 1px solid #333;
        }
        .bottom-placeholder {
            height: 10px;
            background-color: #1e1e1e;
        }

        /* رسالة توجيهية إضافية */
        .extra-note {
            background-color: #2a2a2a;
            padding: 10px 15px;
            margin: 0 20px 10px 20px;
            border-radius: 8px;
            font-size: 13px;
            color: #d0d0d0;
            border-right: 4px solid #a6c8ff;
        }
    </style>
</head>
<body>

<div class="container">
    <header class="app-header">
        <img src="photo/gg.webp" class="app-icon" alt="شعار التطبيق">
        <div class="app-info">
            <div class="app-title">الطيار</div>
            <div class="app-subtitle">للتوصيل السريع والآمن</div>
            <div class="app-meta">
                <div>
                    <span>8.48 M</span>
                    حجم التطبيق
                </div>
                <div class="download-stat-container" title="عدد التحميلات الحقيقي">
                    <svg class="download-stat-icon" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    <span class="download-stat-number" id="downloadCountDisplay"><?php echo $count; ?></span>
                </div>
            </div>
        </div>
    </header>

    <div class="install-section">
        <button class="install-btn" id="installBtn">تثبيت</button>
        <div class="install-note">سيبدأ التحميل الآن، بعد اكتماله اضغط على زر "فتح" الظاهر أسفل الشاشة لبدء التثبيت.</div>
    </div>

    <!-- رسالة توجيهية إضافية -->
    <div class="extra-note">
        ⚡ بعد التحميل، ستظهر لك رسالة في أسفل المتصفح بها زر <strong>"فتح"</strong> – اضغط عليه لتظهر شاشة التثبيت.
    </div>

    <div class="banner-section">
        <img src="photo/ban.webp" class="banner-image" alt="بانر التطبيق">
    </div>

    <div class="description-section">
        <div class="section-title">
            <svg viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            لمحة عن هذا التطبيق
        </div>
        <div class="description-text">
            تطبيق <strong>الطيار</strong> هو الحل الأمثل والأسرع لتوصيل كل شيء إلى باب منزلك. 
            نقدم لك تجربة تسوق سلسة ومريحة مع مجموعة واسعة من المنتجات والخدمات المتنوعة.
            <br><br>
            ✅ <strong>التطبيق آمن</strong> وموثوق للغاية.<br>
            🏠 <strong>مدعوم في شمال سيناء</strong> لتلبية احتياجات أهالينا هناك.<br>
            📲 إصدار التطبيق: <strong>1.0.0</strong>
        </div>
    </div>

    <div class="tags-container">
        <span class="tag">توصيل</span>
        <span class="tag">المنزل</span>
        <span class="tag">الطعام</span>
        <span class="tag">المستلزمات</span>
    </div>

    <div class="bottom-placeholder"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countDisplay = document.getElementById('downloadCountDisplay');
        const installBtn = document.getElementById('installBtn');

        // رابط التحميل المباشر من Google Drive (تم تحويله)
        const apkUrl = 'https://drive.google.com/uc?export=download&id=1s2jT9hf3MX3Lus_QJtKNS7qg-9p-6LBs';

        installBtn.addEventListener('click', function() {
            // منع التكرار من نفس الجهاز
            if (localStorage.getItem('app_already_downloaded') === 'true') {
                // تم التحميل سابقاً -> نفتح الرابط مباشرة (قد يفتح الملف المحمّل أو يعيد التحميل)
                window.location.href = apkUrl;
                return;
            }

            // تسجيل التحميل (زيادة العداد)
            fetch('increment.php', {
                method: 'POST',
                cache: 'no-cache'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    countDisplay.innerText = data.count;
                    localStorage.setItem('app_already_downloaded', 'true');
                }
            })
            .catch(error => console.warn('فشل تسجيل التحميل', error));

            // فتح الرابط في نفس النافذة (بدلاً من نافذة جديدة) لبدء التحميل
            window.location.href = apkUrl;
        });
    });
</script>

</body>
</html>