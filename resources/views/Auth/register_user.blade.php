<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseBook | Register</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- Google Font Ubuntu -->
    <link href="" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/particle.css') }}">

</head>

<style>
    * {
        overflow-x: hidden;
    }
</style>

<body>

    <div id="stars"></div>
    <div id="stars2"></div>

    <section class="w-full bg-gray-800 flex justify-center items-center h-screen">
        <div class="w-5/6 bg-gray-800 bg-opacity-95 rounded-2xl shadow-md dark:border md:mt-0 sm:max-w-md xl:p-0">
            <div class="w-full p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl md:text-2xl font-bold leading-tight tracking-tight text-gray-900  dark:text-white">
                    Sign up WiseBook
                </h1>
                @if (session('status'))
                    <div>
                        <p class="text-red-600">{{ session('status') }} {{ session('message') }}</p>
                    </div>
                @endif
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('registering') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username<span class="text-red-400">*</span></label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600  dark:text-white focus:outline-1 outline-gray-700"
                            placeholder="Create your username" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password<span class="text-red-400">*</span></label>
                        <input type="password" name="password" id="password" placeholder="min. 8 character"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 focus:outline-1 outline-gray-700  dark:text-white "
                            required>
                    </div>
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600  dark:text-white focus:outline-1 outline-gray-700"
                            placeholder="ex: +62XXXXXXXXX" required>
                    </div>
                    <div>
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address<span class="text-red-400">*</span></label>
                        <textarea placeholder="ex: Jl. Samarinda II No.8, Kel. Sanabosa, Kec. Garanta, Jawa Utara." name="address" id="address" cols="30" rows="10" class="h-20 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600  dark:text-white focus:outline-1 outline-gray-700" required></textarea>
                    </div>
                    
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign up</button>
                    <div class="flex justify-center">
                        <p class="text-sm font-light text-gray-50">
                            Already have an account? <a href="{{ route('login_user') }}"    
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign in</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>


</body>

</html>
