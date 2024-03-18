@component('mail::message')
# Your post was liked

{{ $liker->name }} liked your post

@component('mail::button', ['url' => route('post.show', $likedPost)])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
