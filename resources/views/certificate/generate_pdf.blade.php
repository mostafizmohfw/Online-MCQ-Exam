<div class="text-center max-w-5xl bg_image">
    <h1 class="text-center">Certificate </h1>
    <br />
    <br />
    <p>This Cetificate is Proudly Presented to</p>

    <p>Mr./Mrs. {{ $result->user->name }}</p>
    <p>for your outstanding archievement on "{{ $result->quiz->name }}"</p>
    Your Total Marks is {{ $result->score }} & marks percentage is {{ $result->percentage }}.
</div>
