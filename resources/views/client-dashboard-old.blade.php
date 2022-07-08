{{-- user img --}}
<h3><img {{ $user->profile_picture }}>profile picture</h3>

{{-- @foreach ($request as $req)
    <div>title: {{ $req->status }}</div>
@endforeach --}}

{{-- user name --}}
<h3>first name: {{ $user->first_name }}, last name: {{ $user->last_name }}</h3>


{{-- user current request's --}}
<h5>Current Request</h5>

{{-- showing all request related to user --}}
@foreach ($request as $req)
    @if ($req->status == 'open')
        <div class="current_task_container">
            <hr>
            <p>Title: {{ $req->title }}</p>
            <p>Type: {{ $req->type }}</p>
            <p>Categorie: {{ $req->categories }}</p>
            <p>Pictur: {{ $req->pictures }}</p>
            <p>Description: {{ $req->description }}</p>
            <hr>
        </div>
        @endif
    @endforeach

{{-- @endif --}}
<h5>Pending task's</h5>


{{-- showing all done request related to user --}}
@foreach ($request as $req)
    @if ($req->status['pending'])
        <div class="finished_task_container">
            <hr>
            <p>Title: {{ $req->title }}</p>
            <p>Type: {{ $req->type }}</p>
            <p>Categorie: {{ $req->categories }}</p>
            <p>Pictur: {{ $req->pictures }}</p>
            <p>Description: {{ $req->description }}</p>
            <hr>
        </div>
        @endif
    @endforeach


<h5>Finished task's</h5>

@foreach ($request as $req)
    @if ($req->status['close'])
        <div class="finished_task_container">
            <hr>
            <p>Title: {{ $req->title }}</p>
            <p>Type: {{ $req->type }}</p>
            <p>Categorie: {{ $req->categories }}</p>
            <p>Pictur: {{ $req->pictures }}</p>
            <p>Description: {{ $req->description }}</p>
            <hr>
        </div>
        @endif
    @endforeach

