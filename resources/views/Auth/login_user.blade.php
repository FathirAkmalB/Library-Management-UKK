<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseBook | Login</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- Google Font Ubuntu -->
    <link href="" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/particle.css') }}">


    <script src="https://cdn.tailwindcss.com"></script>

</head>

<style>
    *{
        overflow: hidden;
    }
</style>

<body>
    <div id="stars"></div>
    <div id="stars2"></div>
    
    <section class="w-full bg-gray-800 flex justify-center items-center h-screen">
        <div class="w-5/6 bg-gray-800 bg-opacity-95 rounded-2xl shadow-md dark:border md:mt-0 sm:max-w-md xl:p-0">
            <div class="w-full p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl md:text-2xl font-bold leading-tight tracking-tight text-gray-900  dark:text-white">
                    Sign in to WiseBook account
                </h1>
                @if (session('status'))
                    <div>
                        <p class="text-red-600">{{ session('status') }} {{ session('message') }}</p>
                    </div>
                @endif
                <form class="space-y-4 md:space-y-6" action="{{ route('authentication_user') }}">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username<span class="text-red-400">*</span></label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600  dark:text-white focus:outline-1 outline-gray-700"
                            placeholder="enter username" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password<span class="text-red-400">*</span></label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 focus:outline-1 outline-gray-700  dark:text-white "
                            required>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 ">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                            </div>
                        </div>
                        <a href="#"
                            class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Forgot
                            password?</a>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
                        in</button>
                    <div class="flex justify-center">
                        <p class="text-sm font-light text-gray-50">
                            Don’t have an account yet? <a href="{{ route('register_user') }}"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign up</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

</html>
