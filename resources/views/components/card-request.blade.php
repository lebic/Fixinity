<div id="card_ctn">

    {{-- Container for one card --}}
    <div id="card">

        <div id="card_profile">

            {{-- Company profile picture --}}
            <img class="card_img"
                src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png"
                width="100em" height="100em" alt="">

            <div id="card_profile_text">
                {{-- Company name --}}
                <h4> {{ $user->first_name }}{{ $user->last_name }}</h4>
                {{-- Request type --}}
              {{--   <h5>{{ $req->categories }} </h5> --}}
            </div>
        </div>

        <div id="card_text">
            {{-- Request description --}}
      <p>{{ $req->description }} </p>  
 
        </div>
    </div>