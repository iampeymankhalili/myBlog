@if ($message = Session::get('success'))
    <div id="notification" class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div id="notification" class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div id="notification" class="alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div id="notification" class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())
    <div id="notification" class="alert alert-danger">
        Please check the form below for errors
    </div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var notification = document.getElementById('notification');

        // نمایش پیام
        notification.style.display = 'block';

        // تنظیم مدت زمان نمایش پیام به میلی‌ثانیه (در اینجا 5000 میلی‌ثانیه یعنی 5 ثانیه)
        var displayDuration = 5000;

        // مخفی کردن پیام بعد از مدت زمان مورد نظر
        setTimeout(function() {
            notification.style.display = 'none';
        }, displayDuration);
    });
</script>
