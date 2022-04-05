@extends('layouts.admin')
@section('title')
    All Reservations
@endsection

@section('admin-main-panel')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
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
                                        <th class="border py-2 px-1 w-1/6">Email</th>
                                        <th class="border py-2 px-1">Guests</th>
                                        <th class="border py-2 px-1 w-1/6">Date</th>
                                        <th class="border py-2 px-1">Time</th>
                                        <th class="border py-2 px-1">Message</th>
                                        <th class="border py-2 px-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <td class="border py-2 px-1 w-8 text-center">
                                                {{ $reservation->id }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $reservation->name }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                {{ $reservation->phone }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $reservation->email }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $reservation->guests }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $reservation->date }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $reservation->time }}
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $reservation->message }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                <div class="flex justify-center">
                                                    <a href="{{ route('approved-reservation', $reservation->id) }}" class="text-white bg-emerald-400 px-3 py-1 mr-2">Approved</a>
                                                    <a href="{{ route('delete-reservation', $reservation->id) }}" onclick="return confirm('Are you sure to delete this?')" class="text-white bg-red-500 hover:bg-red-600  px-3 py-1 mr-2">Delete</a>
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





