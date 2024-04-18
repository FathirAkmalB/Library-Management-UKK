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
                        aria-current="page">Form</li>
                </ol>
                @isset($book)
                    <h6 class="mb-2 ml-2 font-bold text-white capitalize">Update Book</h6>
                @else
                    <h6 class="mb-2 ml-2 font-bold text-white capitalize">Add New Book</h6>
                @endisset
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
        <div class="relative flex items-center p-0 mt-6 overflow-x-hidden bg-center bg-cover min-h-75 rounded-2xl"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
            <span
                class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-700 to-pink-500 opacity-60"></span>
        </div>
        <div
            class="relative flex flex-auto min-w-0 mx-6 -mt-48 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
            <form action="{{ isset($book) ? route('bookMasters.update', $book->id) : route('bookMasters.store') }}"
                method="POST" enctype="multipart/form-data"
                class="flex flex-col justify-between md:flex-row md:justify-between md:w-full">
                @csrf
                @isset($book)
                    @method('PUT')
                @endisset
                <div class="flex flex-col w-full md:w-1/2 -mx-3 p-8 mr-12">
                    <div class="mb-8">
                        <label for="bookCode" class="block mb-2 text-sm font-medium text-gray-900">Book Code<span
                                class="text-red-400">*</span></label></label>
                        @isset($book)
                            <input type="text" name="book_code" id="bookCode"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="#324423" disabled required="true" value="{{ $book->book_code }}">
                        @else
                            <input type="text" name="book_code" id="bookCode"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="#324423" required="true">
                        @endisset
                    </div>
                    <div class="mb-8">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title<span
                                class="text-red-400">*</span></label></label>
                        @isset($book)
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type Title of Book" required="true" value="{{ $book->title }}">
                        @else
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type Title of Book" required="true">
                        @endisset
                    </div>
                    <div class="mb-8">
                        <label for="author" class="block mb-2 text-sm font-medium text-gray-900">Author<span
                                class="text-red-400">*</span></label></label>
                        @isset($book)
                            <input type="text" name="author" id="author"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type name of Author" required="true" value="{{ $book->author }}">
                        @else
                            <input type="text" name="author" id="author"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type name of Author" required="true">
                        @endisset
                    </div>
                    <div class="mb-8">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Book category<span
                                class="text-red-400">*</span></label>
                        <select name="category_id" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @isset($book)
                                <option selected disabled>{{ $book->category->name }}</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @else
                                <option selected disabled>Choose Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    @isset($book)
                        <div class="mb-8">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Status Book<span
                                    class="text-red-400">*</span></label>
                            <select name="status" id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected disabled>{{ $book->status }}</option>
                                <option value="available">available</option>
                                <option value="not available">not available</option>
                            </select>
                        </div>
                    @endisset
                </div>
                <div class="flex flex-col w-full md:w-1/2 p-8 -mx-3 ">
                    <div class="mb-8">
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock<span
                                class="text-red-400">*</span></label></label>
                        @isset($book)
                            <input type="number" name="stock" id="stock"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type username" required="true" value="{{ $book->stock }}">
                        @else
                            <input type="number" name="stock" id="stock"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type username" required="true">
                        @endisset
                    </div>
                    <div class="mb-8">
                        <label for="cover" class="block mb-2 text-sm font-medium text-gray-900">Book Cover<span
                                class="text-red-400">*</span></label></label>

                        <input
                            class="block w-full text-sm text-gray-900 border p-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 "
                            id="multiple_files" name="cover" type="file" multiple
                            @isset($book) value="{{ $book->cover }}" @endisset>

                    </div>
                    <div class="mb-8">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description<span
                                class="text-red-400">*</span></label></label>
                        @isset($book)
                            <textarea id="description" rows="4" name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Type description here">{{ $book->description }}</textarea>
                        @else
                            <textarea id="description" rows="4" name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Type description here"></textarea>
                        @endisset
                    </div>
                    <div class="mb-8">
                        @isset($book)
                            <button
                                class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-blue-400 to-blue-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                                type="submit">
                                <i class="fas fa-plus"> </i>&nbsp;&nbsp;Update Book
                            </button>
                        @else
                            <button
                                class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-blue-400 to-blue-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                                type="submit">
                                <i class="fas fa-plus"> </i>&nbsp;&nbsp;Create new Book
                            </button>
                        @endisset
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
