

<form action="{{ route('comment.store') }}" method="POST" style="text-align:center;">
    @csrf

    <input type="hidden" name="source" value="{{ $source }}">

    <label>Name</label><br>
    <input type="text" name="name" value="{{ old('name') }}" required><br><br>

    <label>Comment</label><br>
    <textarea name="comment" rows="4" required>{{ old('comment') }}</textarea><br><br>

    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site') }}"></div><br>

    <button type="submit">Post Comment</button>
</form>

@if(session('captcha_error'))
    <p style="color:red;">{{ session('captcha_error') }}</p>
@endif

@foreach($comments as $c)
    <div class="comment-box">
        <strong>{{ $c->name }}</strong><br>
        <p>{{ $c->comment }}</p>
        <small>{{ $c->created_at->format('d-M-Y H:i') }}</small>
    </div>
    <hr>
@endforeach

<script src="https://www.google.com/recaptcha/api.js" async defer></script>


