<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification for Exam Completed</title>
</head>

<body>
    <div class="max-w-7xl mx-auto ">
        <div class="">
            <p class="mb-3"><span>Dear</span> <span class="text-orange-500">{{ $messageData['name'] }}</span>,</p>
        </div>
        <div class="text-justify">
            You have successsfully complete the quiz.<br />
            Your score is {{ $messageData['score'] }} and Marks Percentage is {{ $messageData['percentage'] }}.<br />
            Don't forget to download your certificate.<br />
            Login in and <a href="{{ route('generate.pdf', $messageData['id']) }}">Click the link</a> to download
            certificate.
        </div>
        <div class="mt-3">
            <p>
                Thanks
                <br />
                {{ config('app.name') }}
            </p>
        </div>
    </div>
</body>

</html>
