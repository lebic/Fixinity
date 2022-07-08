@foreach ($user as $user)
    <strong>First Name : </strong> {{ $user->first_name }}<br>
    <strong>Last Name : </strong> {{ $user->last_name }}<br>
    <a href="{{ route('users.show', [$user->id]) }}">Profile</a><br>
    <hr>
@endforeach


{{-- <a href="{{ route('users.show', [$user->id]) }}">Profile</a> --}}


{{-- IMPORTANT : IGNORE THIS PAGE. THIS WAS JUST A SIMPLE TEST --}}
