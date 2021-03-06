@extends('layouts.admin')
@section('title')
    Create Food Item
@endsection

@section('admin-main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div>
                <div class="flex justify-between">
                    <h2 class="font-semibold text-xl leading-tight add-class text-white">
                        {{ __('Add New Food') }}
                    </h2>
                    <a href="{{ route('food-menu') }}" class="border border-emerald-400 px-3 py-1">Back</a>
                </div>
            </div>

            <div class="py-12">
                <div class="mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">

                            <form action="{{ route('new-food-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="flex mt-6">
                                    <div class="flex-1 mr-4">
                                        <label for="name" class="formLabel">Name</label>
                                        <input type="text" name="name" class="formInput" value="{{ old('name') }}">

                                        @error('name')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex-1 mr-4">
                                        <label for="price" class="formLabel">Price</label>
                                        <input type="number" name="price" class="formInput" value="{{ old('price') }}">

                                        @error('price')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="flex mt-6 justify-between">
                                    <div class="flex-1 mx-5">
                                        <label for="foodimage" class="formLabel">Food Image</label>
                                        <label for="foodimage" class="formLabel border-2 rounded-md border-dashed border-emerald-700 py-4 text-center">Click
                                            to upload image</label>
                                        <input type="file" name="foodimage" id="foodimage" class="formInput hidden">

                                        @error('foodimage')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex mt-6">
                                    <div class="flex-1 mr-4">
                                        <label for="description" class="formLabel">Description</label>
                                        <textarea name="description" id="description" class="formInput" rows="10">{{ old('description') }}</textarea>

                                        @error('description')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <button type="submit" class="px-8 py-2 text-base uppercase bg-emerald-600 hover:bg-emerald-700 text-white rounded-md transition-all">Create</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
