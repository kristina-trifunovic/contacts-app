@extends('layouts.app')

@section('content')
@foreach($contacts as $contact)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">First name: {{ $contact->first_name }}</div>
                        <div class="row mb-3">Last name: {{ $contact->last_name }}</div>
                        <div class="row mb-3">Phone Numbers: 
                            <ul>
                            @foreach($contact->phone_number as $number)
                                @foreach($contact->phone_number_type as $type)
                                    <li> {{ $type}} - {{ $number }}</li>
                                @endforeach
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="text-center">
    <a href="/contacts/create" class="text-dark">Create Contact</a>
</div>
@endsection