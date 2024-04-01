<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>WiseBook</title>
    {{-- tailwind soft ui --}}
    <link rel="stylesheet" href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css') }}" />


    {{-- font family --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    {{-- FontAwesome Icons --}}
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    {{-- Nucleo Icons --}}
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> --}}



</head>

<body class="m-0 bg- font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    @include('mainlayout.sidebar')

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @yield('content')
    </main>



    <!-- Create user modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" style="position: absolute; z-index: 1060;"
        class="hidden overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Create User <span class="text-purple-500 to-purple-600">Account</span>
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" >
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username<span
                                    class="text-red-400">*</span></label></label>
                            <input type="text" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  "
                                placeholder="Type username" required="true">
                        </div>
                        <div class="col-span-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password<span
                                    class="text-red-400">*</span></label></label>
                            <input type="text" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Type password" required="true">
                        </div>
                        <div class="col-span-2">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">No. Phone<span
                                    class="text-red-400">*</span></label>
                            <input type="text" name="phone" id="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Type phone number" required="true">
                        </div>

                        <div class="col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Picture
                                Profile<span class="text-red-400">*</span></label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                aria-describedby="file_input_help" id="file_input" type="file">
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Address<span
                                    class="text-red-400">*</span></label></label>
                            <textarea id="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Type address here"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new account
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


<script src="{{ asset('assets/js/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" async></script>
<!-- github button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- main script file  -->
<script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5') }}" async></script>

</html>
