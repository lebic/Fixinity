<head>
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto:wght@500&display=swap"
        rel="stylesheet">

</head>

<x-guest-layout>
    <x-auth-card>

        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>





        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- COMPANY FORMS-->
        <div id="form_ctn">
            <form method="POST" action="{{ route('register-company') }}">
                @csrf


                <h2>Register</h2>
                <h3>Contact</h3>

                <!-- First Name -->
                <div>

                    <x-input placeholder="First name" id="first_name" class="block mt-1 w-full" type="text"
                        name="first_name" :value="old('first_name')" required autofocus />
                </div>

                <!-- Last Name -->
                <div>

                    <x-input placeholder="Last name" id="last_name" class="block mt-1 w-full" type="text"
                        name="last_name" :value="old('last_name')" required autofocus />
                </div>
                <!-- Company Name -->
                <div>

                    <x-input placeholder="Company name" id="company_name" class="block mt-1 w-full" type="text"
                        name="company_name" :value="old('company_name')" required autofocus />
                </div>
                <!-- Role -->
                <div>

                    <x-input placeholder="Your role in the company" id="role" class="block mt-1 w-full"
                        type="text" name="role" :value="old('role')" required autofocus />
                </div>
                <!-- Phone Number -->
                <div>

                    <x-input placeholder="Phone number" id="phone_number" class="block mt-1 w-full" type="number"
                        name="phone_number" :value="old('phone_number')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">

                    <x-input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">

                    <x-input placeholder="Password" id="password" class="block mt-1 w-full" type="password"
                        name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">

                    <x-input placeholder="Password" id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required />
                </div>
                <!-- Profile picture -->





                <!--<input id="profile_picture" type="file" class="opacity-0" name="profile_picture"
                    :value="old('profile_picture')" autofocus onchange="showPreview(event);" />-->

                <div class="center">
                    <div class="form-input">

                        <label id="profile_picture_label" for="profile_picture">Click for a profile picture</label>
                        <input hidden id="profile_picture" name="profile_picture" type="file"
                            :value="old('profile_picture')" id="file-ip-1" accept="image/*"
                            onchange="showPreview(event)">
                    </div>
                    <div class="preview_ctn">
                        <img class="preview_img" width="100vh" id="file-ip-1-preview">
                    </div>
                </div>

        </div>



        <!-- Category -->
        <div>


            <!--<x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')"
                        required autofocus /> -->

            <select class="list" name="category" :value="old('category') id =" required autofocus>
                <option class="list_item" value="" selected="selected" disabled="disabled">Select your
                    category</option>
                <option class="list_item" value="plumbery">Plumbery</option>
                <option class="list_item" value="hvac">Hvac</option>
                <option class="list_item" value="electricity">Electricity</option>

            </select>


        </div>





        <h3>Address</h3>
        <!-- Address road -->
        <div>

            <x-input placeholder="Address street" id="address_road" class="block mt-1 w-full" type="text"
                name="address_road" :value="old('address_road')" required autofocus />
        </div>

        <!-- Address number -->
        <div>

            <x-input placeholder="Address number" id="address_number" class="block mt-1 w-full" type="number"
                name="address_number" :value="old('address_number')" required autofocus />
        </div>


        <!-- zipcode -->
        <div>


            <x-input placeholder="Zipcode" id="zipcode" class="block mt-1 w-full" type="number" name="zipcode"
                :value="old('zipcode')" required autofocus />
        </div>

        <!-- town -->
        <div>

            <x-input placeholder="City" id="town" class="block mt-1 w-full" type="text" name="town"
                :value="old('town')" required autofocus />
        </div> <!-- Country -->
        <div>
            <!--<x-label for="country" :value="__('Country')" />-->

            <!--<x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')"
                        required autofocus /> -->

            <select class="list" name="country" :value="old('country') id =" country" required autofocus>
                <option class="list_item" value="" selected="selected" disabled="disabled">Select a
                    country
                </option>
                <option class="list_item" value="Luxembourg">Luxembourg</option>
                <option class="list_item" value="Belgique">Belgique</option>
                <option class="list_item" value="France">France</option>
                <option class="list_item" value="Allemagne">Allemagne</option>
            </select>


        </div>






        <div id="signup_ctn" class="flex items-center ">
            <p>By signing up, you agree to Fixinity’s Terms of Service and
                Privacy Policy.</p>
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button id="signup_btn">
                {{ __('Register') }}
            </x-button>

        </div>

        </form>



        </div>



    </x-auth-card>
</x-guest-layout>
<script type="text/javascript">
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }
</script>
