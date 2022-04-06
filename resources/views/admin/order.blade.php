@extends('layouts.admin')
@section('title')
    All Orders
@endsection

@section('admin-main-panel')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div>
                <div class="flex justify-between">
                    <h2 class="font-semibold text-xl leading-tight add-class text-white">
                        {{ __('All Orders') }}
                    </h2>
                    <div class="search">
                        <form action="{{ route('search-order')}}" method="POST">
                        @csrf
                            <input type="text" placeholder="Search here..." name="search" class="search text-cyan-900 p-2" id="">
                            <input type="submit" value="Search" class="btn btn-success p-2">
                        </form>
                    </div>
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
                                        <th class="border py-2 px-1">Name</th>
                                        <th class="border py-2 px-1">Phone</th>
                                        <th class="border py-2 px-1">Address</th>
                                        <th class="border py-2 px-1">Food Name</th>
                                        <th class="border py-2 px-1">Price</th>
                                        <th class="border py-2 px-1">Quantity</th>
                                        <th class="border py-2 px-1">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="border py-2 px-1 w-8 text-center">
                                                {{ $order->id }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $order->name }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                {{ $order->phone }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $order->address }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $order->foodname }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                ${{ $order->price }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $order->quantity }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                               ${{ $order->price * $order->quantity }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                <div class="flex justify-center">
                                                    {{-- <a href="{{ route('approved-reservation', $reservation->id) }}" class="text-white bg-emerald-400 px-3 py-1 mr-2">Approved</a> --}}
                                                    {{-- <a href="{{ route('delete-reservation', $reservation->id) }}" onclick="return confirm('Are you sure to delete this?')" class="text-white bg-red-500 hover:bg-red-600  px-3 py-1 mr-2">Delete</a> --}}
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





