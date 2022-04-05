@extends('layouts.admin')
@section('title')
    All Foods
@endsection

@section('admin-main-panel')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div>
                <div class="flex justify-between">
                    <h2 class="font-semibold text-xl leading-tight add-class text-white">
                        {{ __('All Foods') }}
                    </h2>
                    <a href="{{ route('create-food') }}" class="border border-emerald-400 px-3 py-1">Add New</a>
                </div>
            </div>

            <div class="py-12">
                <div class="mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b">

                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible flex justify-between pr-4 text-xl align-items-center">
                                    <strong>{{ session()->get('success') }}</strong>
                                    <a href="#" class="close text-4xl" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                            @endif

                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="text-center">
                                        <th class="border py-2 px-1 w-16">Id</th>
                                        <th class="border py-2 px-1 w-28">Image</th>
                                        <th class="border py-2 px-1">Name</th>
                                        <th class="border py-2 px-1 w-1/6">Price</th>
                                        <th class="border py-2 px-1 w-2/6">Description</th>
                                        <th class="border py-2 px-1 w-1/6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        function getImageUrl($image) {
                                            if(str_starts_with($image, 'http')) {
                                                return $image;
                                            }
                                            return asset('storage/uploads') . '/' . $image;
                                        }
                                    @endphp

                                    @foreach ($foods as $food)
                                        <tr>
                                            <td class="border py-2 px-1 w-8 text-center">
                                                {{ $food->id }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                <img src="{{ getImageUrl($food->foodimage) }}" class="mx-auto rounded w-20 h-20" alt="">
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $food->name }}
                                            </td>
                                            <td class="border py-2 px-1 text-center font-bold">
                                                ${{ $food->price }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                {{ $food->description }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                <div class="flex justify-center">
                                                    <a href="{{ route('edit-food', $food->id) }}" class="text-white bg-emerald-400 px-3 py-1 mr-2">Edit</a>
                                                    <a href="{{ route('delete-food', $food->id) }}" onclick="return confirm('Are you sure to delete this?')" class="text-white bg-red-500 hover:bg-red-600  px-3 py-1 mr-2">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial -->
    </div>
    <!-- main-panel ends -->

@endsection





