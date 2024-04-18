<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/bookWiseIcon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/bookWiseIcon.png') }}" />

    <title>BookWise</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oxygen:700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://unpkg.com/scrollreveal@4.0.5/dist/scrollreveal.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Graduate --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400&family=Graduate&display=swap"
        rel="stylesheet">

    {{-- Montserrat --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- PT Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #32619b;
            border-radius: 4px;
        }
    </style>
</head>

<body class="is-boxed has-animations bg-[#F5F5F5]">
    <nav class="flex justify-between items-center w-[92%] mx-auto my-4">
        <div class="w-1/4 h-12 content-center sm:w-4/6 md:w-5/12 lg:w-2/ xl:w-2/6">
            <img src="{{ asset('assets/img/BookWiseLogo.png') }}" class="w-24" alt="">
        </div>
        <div class="w-1/4 h-12 content-center hidden sm:hidden md:block sm:w-4/6 md:w-5/12 lg:w-2/ xl:w-2/6">
            <p class="font-[PT Sans] text-center text-sm font-bold text-gray-700">there's still a lot we don't know</p>
        </div>
        <div class="w-1/4 h-12 content-center sm:w-4/6 md:w-5/12 lg:w-2/ xl:w-2/6">
            @if (Auth::check())
            <a href="{{ route('dashboard') }}">
                <button type="button"
                class="float-right w-20 sm:w-28 text-white bg-[#3E8CD6] hover:bg-[#3E8CD6] focus:ring-4 focus:ring-[#3E8CD6] font-bold rounded-md text-xs py-1 px-0.5 sm:px-8  sm:py-2 dark:bg-[#3E8CD6] dark:hover:bg-[#3E8CD6] focus:outline-none dark:focus:ring-[#3E8CD6]">{{ Auth::user()->username }}</button>
            </a>
           @else
             <a href="{{ route('login_user') }}">
                <button type="button"
                class="float-right w-20 sm:w-28 text-white bg-[#3E8CD6] hover:bg-[#3E8CD6] focus:ring-4 focus:ring-[#3E8CD6] font-bold rounded-md text-xs py-1 px-0.5 sm:px-8  sm:py-2 dark:bg-[#3E8CD6] dark:hover:bg-[#3E8CD6] focus:outline-none dark:focus:ring-[#3E8CD6]">Sign
                in</button>
            </a>   
           @endif  
        </div>
    </nav>

    <main class="w-[100%]">
        <div class="w-[92%] mx-auto my-4">
            <div class="relative bg-cover object-cover rounded-lg bg-center h-[60vh] flex justify-center items-center shadow-lg"
                style="background-image: url('{{ asset('assets/img/heroImage.png') }}')">
                <div class="text-center">
                    <h1 class="font-[Montserrat] text-white text-xl md:text-2xl font-bold mr-14">KNOWLEDGE IS POWER</h1>
                    <h1 class="font-[Montserrat] text-[#FFBA3C] text-xl md:text-2xl font-bold ml-14">COME FIND OUT WITH
                        US</h1>
                    <button type="button"
                        class=" my-4 text-white bg-[#FFBA3C] hover:bg-[#FFBA3C] focus:ring-4 focus:ring-[#FFBA3C] text-xs py-1.5 px-2 sm:px-8  sm:py-2 dark:bg-[#FFBA3C] dark:hover:bg-[#FFBA3C] focus:outline-none dark:focus:ring-[#FFBA3C]">Explore
                        Your Mastery</button>
                </div>
            </div>



            <div class="w-full justify-between inline-flex flex-col md:flex md:flex-row md:justify-between my-14 ">
                <div class="w-full h-fit md:w-[45%] md:h-[50vh] inline-flex flex-col justify-between">
                    <div>
                        <h2 class="font-[Graduate] font-medium text-2xl text-[#3E8CD6]">BookWise</h2>
                        <h3 class="font-[Montserrat] font-medium text-lg text-black">Library</h3>
                    </div>
                    <div>
                        <p class="text-xs text[#B4B4B4]">Welcome to BookWise Library, where knowledge unfolds as an
                            endless
                            adventure and
                            wisdom flows like a river through the mind. Amidst a rich and diverse collection, BookWise
                            is
                            not
                            just a library; it's a haven where curious souls and knowledge seekers feel at home. With
                            cozy
                            and
                            inspirational spaces, BookWise invites every visitor to immerse themselves in the world of
                            knowledge.</p>
                        <div class="inline-flex justify-between w-full my-6">
                            <div class="w-2/4 flex justify-between">
                                <div class="w-20 h-4 flex justify-between">
                                    <i class="fa-brands fa-square-instagram text-[#9C9C9C] mr-2"></i>
                                    <span class="text-xs text-[#9C9C9C]">bookwise.lib</span>
                                </div>
                                <div class="w-20 h-4 flex justify-between">
                                    <i class="fa-brands fa-facebook text-[#9C9C9C] mr-2"></i>
                                    <span class="text-xs text-[#9C9C9C]">bookwise.lib</span>
                                </div>
                            </div>
                            <div class="w-28 h-4 flex justify-between">
                                <span class="text-xs text-[#3E8CD6]">Go to BookWise</span>
                                <i class="fa-solid fa-arrow-right-long text-[#3E8CD6] mr-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-red-600-400 my-20 md:my-0 relative rounded-lg bg-center w-2/4 flex justify-center items-center">
                    <img class="" src="{{ asset('assets/img/contentBuilding.png') }}" alt="content-building">
                </div>
            </div>
        </div>

        <div class="w-full h-[40vh] bg-[#EDEDED] inline-flex flex-col justify-center items-center my-20">
            <p class="font-[PT Sans] w-3/5 text-xs text-[#6C6C6C] text-center my-8">“When we read, we don't just access
                knowledge from the past; we also lay the groundwork for the future. Books are windows into an infinite
                world of knowledge, opening doors to deeper understanding and greater achievements.”</p>
            <span class="font-[PT Sans] text-xs text-[#6C6C6C] text-center">— Albert Einstein</span>
        </div>

        <div class="w-[92%] mx-auto  mb-20">
            <h1 class="text-xl text-black font-[PT Sans] font-normal mb-4">Discover <span
                    class="text-[#FFB01A] text-xl font-normal font-[PT Sans]">Books</span></h1>
            <div class="h-0.5 w-20 bg-[#FFB01A] rounded-md mb-4"></div>
            <div class="flex justify-between">
                @foreach ($books as $item)
                <a href="{{ route('bookMasters.show', $item->id) }}">
                    <div class="w-40 inline-flex flex-col justify-between">
                        <div class="w-full h-[49vh]">
                            <img src="{{ asset('storage/' . $item->cover) }}" alt="Buku" class="w-full">
                        </div>
                        <div class="w-full mt-2">
                            <h6 class="text-xs font-semibold">{{ $item->title }}</h6>
                            <h6 class="text-[12px] mb-4 text-[#FFB01A]">{{ $item->category->name }}</h6>
                            <h6 class="text-[12px] text-[#A9A9A9]">{{ $item->status }}</h6>
                        </div>
                    </div>
                </a>
                @endforeach
               

            </div>
        </div>



        <div class="w-[80%] mx-auto mb-96">
            <h2 class="text-center text-black text-xl font-[PT Sans] font-semibold mb-4"><span class="text-[#3488D1]">Overview</span> BookWise</h2>
            <div class="h-1 mx-auto w-16 bg-[#FFB01A] rounded-md mb-8"></div>
            <div class="w-full flex justify-between mb-24">
                <div class="w-[45%] h-48 rounded-lg shadow-lg">
                    <img src="{{ asset('assets/img/roomBooks.png') }}" >
                    <h2 class="font-[PT Sans] text-black text-sm text-center my-2">Room A</h2>
                    <p class="font-[PT Sans] text-xs text-[#9A9A9A] text-center"><i class="fa-regular fa-map mr-2 "></i>82 Main Road London SE31 0CV</p>
                </div>
                <div class="w-[45%] h-48 rounded-lg shadow-lg">
                    <img src="{{ asset('assets/img/roomBooks.png') }}" >
                    <h2 class="font-[PT Sans] text-black text-sm text-center my-2">Room A</h2>
                    <p class="font-[PT Sans] text-xs text-[#9A9A9A] text-center"><i class="fa-regular fa-map mr-2 "></i>82 Main Road London SE31 0CV</p>
                </div>
            </div>
            <div class="w-full flex justify-between mb-24">
                <div class="w-[45%] h-48 rounded-lg shadow-lg">
                    <img src="{{ asset('assets/img/roomBooks.png') }}" >
                    <h2 class="font-[PT Sans] text-black text-sm text-center my-2">Room A</h2>
                    <p class="font-[PT Sans] text-xs text-[#9A9A9A] text-center"><i class="fa-regular fa-map mr-2 "></i>82 Main Road London SE31 0CV</p>
                </div>
                <div class="w-[45%] h-48 rounded-lg shadow-lg">
                    <img src="{{ asset('assets/img/roomBooks.png') }}" >
                    <h2 class="font-[PT Sans] text-black text-sm text-center my-2">Room A</h2>
                    <p class="font-[PT Sans] text-xs text-[#9A9A9A] text-center"><i class="fa-regular fa-map mr-2 "></i>82 Main Road London SE31 0CV</p>
                </div>
            </div>
        </div>

    </main>


</body>

<script>
    var copy = document.querySelector(".logos-slide").cloneNode(true);
    document.querySelector(".logos").appendChild(copy);
</script>

</html>
