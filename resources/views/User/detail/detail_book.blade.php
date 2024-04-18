@extends('mainlayout.layout')

@section('content')
    <nav class="absolute z-20 flex flex-wrap items-center justify-between w-full px-6 py-2 text-white transition-all shadow-none duration-250 ease-soft-in lg:flex-nowrap lg:justify-start"
        navbar-profile navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-6 py-1 mx-auto flex-wrap-inherit">
            <nav>
                <!-- breadcrumb -->
                <ol class="flex flex-wrap pt-1 pl-2 pr-4 mr-12 bg-transparent rounded-lg sm:mr-16">
                    <li class="leading-normal text-sm">
                        <a class="opacity-50" href="javascript:;">Pages</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']"
                        aria-current="page">Detail Book</li>
                </ol>
                <h6 class="mb-2 ml-2 font-bold text-white capitalize">Book</h6>
            </nav>

            <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                <div class="flex items-center md:ml-auto md:pr-4">
                    <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">

                    </div>
                </div>

            </div>
        </div>
    </nav>

    <div class="w-full px-6 mx-auto">
        <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
            <span
                class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
        </div>
        <div
            class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-32 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
            <div class="flex flex-wrap -mx-">
                <div class="flex-none w-auto max-w-full px-3">
                    <div
                        class="text-base ease-soft-in-out h-36 w-24 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="cover_image"
                            class="w-24 h-24 shadow-xl  object-cover"
                            style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        <h5 class="mb-0 font-semibold text-base capitalize">{{ $book->title }}</h5>
                        <p class="font-normal leading-normal text-base capitalize">{{ $book->author }}</p>
                        <p class="font-normal leading-normal text-xs capitalize"><i
                                class="mb-8 fa-solid fa-star text-yellow-400"></i>{{ $avgRating }}/5</p>
                        <p class="mb-0 font-normal leading-normal text-xs capitalize">Stock: {{ $book->stock }}</p>
                        <p class="mb-0 font-normal leading-normal text-xs capitalize">Category: {{ $book->category->name }}
                        </p>
                        <p class=" font-normal leading-normal text-xs">Created at {{ $book->formatted_created_at }}</p>
                    </div>
                </div>
                <div class="w-full max-w-full  px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                    @if ($book->status == 'available')
                        <span
                            class="text-purple-500 border-[2px] border-gradient-to-br border-purple-600  hover:border-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center block w-full mb-2 capitalize">{{ $book->status }}</span>
                    @else
                        <span
                            class="text-red-500 border-[2px] border-gradient-to-br border-red-600  hover:border-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center block w-full mb-2 capitalize">{{ $book->status }}</span>
                    @endif


                    @if ($bookLend && $bookLend->status == 'Lend')
                        <button type="submit"
                            class="text-blue-400 border-[2px] border-gradient-to-br border-blue-300  hover:border-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center block w-full mb-2 capitalize">{{ $bookLend->status }}</button>
                    @else
                        <form action="/book-lend/{{ $book->id }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-white bg-gradient-to-br from-yellow-500 to-yellow-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center block w-full mb-2 capitalize">Request</button>
                        </form>
                    @endif

                    @if (Auth::user()->role_id == 1)
                        <a href="{{ route('bookMasters.edit', $book->id) }}"
                            class="text-white bg-gradient-to-br from-yellow-500 to-yellow-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center block w-full mb-2 capitalize">Edit
                            Book</a>
                    @endif

                </div>

            </div>
        </div>
    </div>
    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3 mb-6">

            <div class="w-full max-w-full px-3 lg-max:mt-6 ">
                <div
                    class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                <h6 class="mb-0">Description</h6>
                            </div>
                            <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">

                                <div data-target="tooltip"
                                    class="hidden px-2 py-1 text-center text-white bg-black rounded-lg text-sm"
                                    role="tooltip">
                                    <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                        data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li
                                class="relative px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                <p>{{ $book->description }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
        @if ($collectionDateTime != false)
            <div class="flex flex-wrap -mx-3">

                <div class="w-full max-w-full px-3 lg-max:mt-6 ">
                    <div
                        class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                            <div class="flex flex-wrap -mx-3">
                                <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                    <h6 class="mb-0">Return Book</h6>
                                </div>
                                <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">
                                    <div data-target="tooltip"
                                        class="hidden px-2 py-1 text-center text-white bg-black rounded-lg text-sm"
                                        role="tooltip">
                                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                            data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="/return-book/{{ $collection->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $collection->lend->id }}">
                            <div class="flex-auto p-4">
                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                    <li
                                        class="relative px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                        <div class="rate">
                                            <input type="radio" id="star5_{{ $collection->id }}" name="rating"
                                                value="5" />
                                            <label for="star5_{{ $collection->id }}" title="text">5 stars</label>
                                            <input type="radio" id="star4_{{ $collection->id }}" name="rating"
                                                value="4" />
                                            <label for="star4_{{ $collection->id }}" title="text">4 stars</label>
                                            <input type="radio" id="star3_{{ $collection->id }}" name="rating"
                                                value="3" />
                                            <label for="star3_{{ $collection->id }}" title="text">3 stars</label>
                                            <input type="radio" id="star2_{{ $collection->id }}" name="rating"
                                                value="2" />
                                            <label for="star2_{{ $collection->id }}" title="text">2 stars</label>
                                            <input type="radio" id="star1_{{ $collection->id }}" name="rating"
                                                value="1" />
                                            <label for="star1_{{ $collection->id }}" title="text">1 star</label>
                                        </div>
                                    </li>
                                    <li
                                        class="relative px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                        <textarea id="description" rows="4" name="review"
                                            class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            placeholder="Type address here"></textarea>
                                    </li>
                                    <li
                                        class="relative px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                        <button type="submit"
                                            class="text-white bg-gradient-to-br from-green-500 to-green-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center block w-full mb-2 capitalize">Return
                                            Now</button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <div class="flex flex-wrap -mx-3 mb-6">

            <div class="w-full max-w-full px-3 lg-max:mt-6 ">
                <div
                    class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                <h6 class="mb-0">Rating & Review</h6>
                            </div>
                            <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">

                                <div data-target="tooltip"
                                    class="hidden px-2 py-1 text-center text-white bg-black rounded-lg text-sm"
                                    role="tooltip">
                                    <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                        data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            @foreach ($ratings as $item)
                                <li
                                    class="relative flex my-4  px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                    <div
                                        class="text-base mr-4  ease-soft-in-out h-14 w-14 relative inline-flex items-center justify-center text-white transition-all duration-200">
                                        <img src="{{ asset('storage/' . $item->user->avatar) }}" alt="cover_image"
                                            class="w-24 h-24 shadow-xl  rounded-md object-cover"
                                            style="width: 100%; height: 100%; object-fit: cover;" />
                                    </div>
                                    <div>
                                        <p>{{ $item->user->username }}</p>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $item->rating)
                                                <span class="text-yellow-500">★</span>
                                            @else
                                                <span class="text-gray-300">☆</span>
                                            @endif
                                        @endfor
                                        <p>{{ $item->review }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>



        </div>

    </div>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
    </style>
@endsection
