@component('mail::message')
# New Review added to "{{ $movieTitle }}" movie
 
{{ $reviewerEmail }} has added a new review to the "{{ $movieTitle }}" movie.
 
@component('mail::button', ['url' => 'link'])
View Review
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent