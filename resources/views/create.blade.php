@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <div id="knockout-app">
                                <h1>Create a New Contact</h1>
                                <form action="/contacts" method="POST">
                                    @csrf
                                    <div class="form"><label for="first_name">First Name: </label>
                                    <input type="text" name="first_name" data-bind="text: firstName" id="first_name"></div>
                                    <div class="form"><label for="text">Last Name: </label>
                                    <input type="text" name="last_name" data-bind="text: lastName" id="last_name"></div>
                                    <div class="form"><label for="phone_number">Phone Numbers: </label>
                                    <input type="text" name="phone_number_type[]" data-bind="value: phoneNumberType" id="phone_number_type">
                                    <input type="text" name="phone_number[]" data-bind="value: phoneNumber" id="phone_number"></div>
                                    <div data-bind="template: { name: 'myTemphoneNumberTemplateplate', foreach: items }"></div>
                                    <div data-bind="template: { name: 'myContactTemplate' foreach: contactItems }"></div>
                                    <input type="submit" value="Save">

                                                                       
                                </form>

                                <div class="form"><button data-bind="click: add">Add A Number</button></div>
                                <div class="form"><button data-bind="click: addContact">Add A Contact</button></div>
                                <a href="/" class="link-dark">Homepage</a>

                                <script type="text/html" id="myTemphoneNumberTemplateplate">
                                    <input type="text" name="phone_number_type[]" data-bind="text: phoneNumberType" id="phone_number_type">
                                    <input type="text" name="phone_number[]" data-bind="text: phoneNumber" id="phone_number">
                                </script>

                                <script type="text/html" id="myContactTemplate">
                                    <div class="form"><label for="first_name">First Name: </label>
                                    <input type="text" name="first_name" data-bind="text: firstName" id="first_name"></div>
                                    <div class="form"><label for="text">Last Name: </label>
                                    <input type="text" name="last_name" data-bind="text: lastName" id="last_name"></div>
                                    <div class="form"><label for="phone_number">Phone Numbers: </label>
                                    <input type="text" name="phone_number_type[]" data-bind="text: phoneNumberType" id="phone_number_type">
                                    <input type="text" name="phone_number[]" data-bind="text: phoneNumber" id="phone_number"></div>
                                    <div data-bind="template: { name: 'phoneNumberTemplate', foreach: items }"></div>
                                </script>

                                <script type="text/javascript">
                                    var contactViewModel = {
                                        firstName: ko.observable();
                                        lastName: ko.observable();
                                        phoneNumberType: ko.observableArray();
                                        phoneNumber: ko.observableArray();
                                        items: ko.observableArray([]);
                                        contactItems: ko.observableArray([]);
                                        add: function() {
                                            items.push({});
                                        }
                                        addContact: function() {
                                            contactItems.push({});
                                        }
                                    };
                                    
                                    var jsonData = ko.toJSON(contactViewModel);
                                    $.post("/contacts", jsonData, function(returnedData) {
                                        // This callback is executed if the post was successful
                                    })

                                    const knockoutApp = document.querySelector("#knockout-app");
                                    ko.applyBindings(contactViewModel, knockoutApp);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection