<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">إدخال البيانات</h2>
    <form method="post" action="{{route('posts.store')}}">
        @csrf
        <!-- Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" name="title" class="form-control" id="name" placeholder="أدخل اسم المقاله">
        </div>

        <!-- Article Input -->
        <div class="mb-3">
            <label for="article" class="form-label">المقالة</label>
            <textarea class="form-control" name="body" id="article" rows="5" placeholder="أدخل نص المقالة هنا"></textarea>
        </div>

        <!-- Submit and Reset Buttons -->
        <button type="submit" class="btn btn-primary">إرسال</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
