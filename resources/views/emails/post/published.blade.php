@component('mail::message')
# Post published with success

<h3>post: {{$post->title}} </h3>

@component('mail::button', ['url' => $url])
Show
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
