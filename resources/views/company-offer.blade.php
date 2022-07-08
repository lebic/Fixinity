{{-- user img --}}
<h3><img {{ $user->profile_picture }}>profile picture</h3>

<h1>{{ $request->status }}</h1>
{{-- user name --}}
<h3>Company name: {{ $user->company_name }}<br></h3>


{{-- user current request's --}}
<h5>Make an offer</h5>

{{-- showing all offer detail related to user --}}

<div class="">
    @foreach ($request as $req)
        <hr>
        <p>Title: {{ $req->title }}</p>
        <p>Type: {{ $req->type }}</p>
        <p>Categorie: {{ $req->categories }}</p>
        <p>Pictur: {{ $req->pictures }}</p>
        <p>Description: {{ $req->description }}</p>
        <p>Date: {{ $req->date }}</p>
        <p>First name: {{ $user->first_name }}</p>
        <p>Last name: {{ $user->last_name }}</p>
        <p>Price: {{ $req->price }}</p>
        <hr>
    @endforeach


    <h5>Active task's</h5>

    @if ($request->status['active'])
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
    <h5>Pending task's</h5>

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
    <h5>Close task's</h5>

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
