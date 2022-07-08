{{-- user img --}}
<h3><img {{ $user->profile_picture }}src="" width="" height="">profile picture</h3>

<h1>{{ $request->status }}</h1>
{{-- user name --}}
<h3>first name: {{ $user->first_name }}, last name: {{ $user->last_name }}<br></h3>


{{-- user current request's --}}
<h5>Current Request</h5>

{{-- showing all offer detail related to user --}}

<h5>Active task's</h5>
<div class="">
    @foreach ($request as $req)
        <hr>
        <p>Title: {{ $req->title }}</p>
        <p>Type: {{ $req->type }}</p>
        <p>Categorie: {{ $req->categories }}</p>
        <p>Pictur: {{ $req->pictures }}</p>
        <p>Description: {{ $req->description }}</p>
        <p>First name: {{ $user->first_name }}</p>
        <p>Last name: {{ $user->last_name }}</p>
        <p>Company name: {{ $user->company_name }}</p>
        <p>Date: {{ $req->date }}</p>
        <p>Price: {{ $req->price }}</p>
        <hr>
    @endforeach
</div>



<h5>Pending task's</h5>
<div>
    @if ($request->status['pending'])
        @foreach ($request as $req)
            <div class="current_task_container">
                <hr>
                <p>Title: {{ $req->title }}</p>
                <p>Type: {{ $req->type }}</p>
                <p>Categorie: {{ $req->categories }}</p>
                <p>Pictur: {{ $req->pictures }}</p>
                <p>Description: {{ $req->description }}</p>
                <p>First name: {{ $user->first_name }}</p>
                <p>Last name: {{ $user->last_name }}</p>
                <p>Company name: {{ $user->company_name }}</p>
                <p>Date: {{ $req->date }}</p>
                <p>Price: {{ $req->price }}</p>
                <hr>
        @endforeach
    @endif
</div>



<h5>Close task's</h5>
<div>
    @if ($request->status['close'])
        @foreach ($request as $req)
            <div class="current_task_container">
                <hr>
                <p>Title: {{ $req->title }}</p>
                <p>Type: {{ $req->type }}</p>
                <p>Categorie: {{ $req->categories }}</p>
                <p>Pictur: {{ $req->pictures }}</p>
                <p>Description: {{ $req->description }}</p>
                <p>First name: {{ $user->first_name }}</p>
                <p>Last name: {{ $user->last_name }}</p>
                <p>Company name: {{ $user->company_name }}</p>
                <p>Date: {{ $req->date }}</p>
                <p>Price: {{ $req->price }}</p>
                <hr>
        @endforeach
    @endif
</div>
