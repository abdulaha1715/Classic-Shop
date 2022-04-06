@extends('layouts.admin')
@section('title')
    Create Chef
@endsection

@section('admin-main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div>
                <div class="flex justify-between">
                    <h2 class="font-semibold text-xl leading-tight add-class text-white">
                        {{ __('Add New Chef') }}
                    </h2>
                    <a href="{{ route('chefs') }}" class="border border-emerald-400 px-3 py-1">Back</a>
                </div>
            </div>

            <div class="py-12">
                <div class="mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">

                            <form action="{{ route('new-chef-store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="specialtie" class="formLabel">Specialtie</label>
                                        <input type="text" name="specialtie" class="formInput" value="{{ old('specialtie') }}">

                                        @error('specialtie')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="flex mt-6 justify-between">
                                    <div class="flex-1 mx-5">
                                        <label for="chefimage" class="formLabel">Chef Image</label>
                                        <label for="chefimage" class="formLabel border-2 rounded-md border-dashed border-emerald-700 py-4 text-center">Click
                                            to upload image</label>
                                        <input type="file" name="chefimage" id="chefimage" class="formInput hidden">

                                        @error('chefimage')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex mt-6">
                                    <div class="flex-1 mr-4">
                                        <label for="cheffacebook" class="formLabel">Chef Facebook</label>
                                        <input type="text" name="cheffacebook" class="formInput" value="{{ old('cheffacebook') }}">

                                        @error('cheffacebook')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex-1 mr-4">
                                        <label for="cheftwitter" class="formLabel">Chef Twitter</label>
                                        <input type="text" name="cheftwitter" class="formInput" value="{{ old('cheftwitter') }}">

                                        @error('cheftwitter')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex-1 mr-4">
                                        <label for="chefbehence" class="formLabel">Chef Behence</label>
                                        <input type="text" name="chefbehence" class="formInput" value="{{ old('chefbehence') }}">

                                        @error('chefbehence')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex mt-6">
                                    <div class="flex-1 mr-4">
                                        <label for="chefinstagram" class="formLabel">Chef Instagram</label>
                                        <input type="text" name="chefinstagram" class="formInput" value="{{ old('chefinstagram') }}">

                                        @error('chefinstagram')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex-1 mr-4">
                                        <label for="chefgoogleplus" class="formLabel">Chef Google+</label>
                                        <input type="text" name="chefgoogleplus" class="formInput" value="{{ old('chefgoogleplus') }}">

                                        @error('chefgoogleplus')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex-1 mr-4"></div>
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
