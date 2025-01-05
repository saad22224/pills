<x-mail::message>
  hi {{$user->name}}
  <h1>مرحبا بك في موقعنا</h1>
<x-mail::button :url="''" color='success'>
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
