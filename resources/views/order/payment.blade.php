@extends('layouts.layout')

@section('content')
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
    </style>
    <style>
        .form-radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            flex-shrink: 0;
            border-radius: 100%;
            border-width: 2px;
        }

        .form-radio:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        @media not print {
            .form-radio::-ms-check {
                border-width: 1px;
                color: transparent;
                background: inherit;
                border-color: inherit;
                border-radius: inherit;
            }
        }

        .form-radio:focus {
            outline: none;
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            background-repeat: no-repeat;
            padding-top: 0.5rem;
            padding-right: 2.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            background-position: right 0.5rem center;
            background-size: 1.5em 1.5em;
        }

        .form-select::-ms-expand {
            color: #a0aec0;
            border: none;
        }

        @media not print {
            .form-select::-ms-expand {
                display: none;
            }
        }

        @media print and (-ms-high-contrast: active),
        print and (-ms-high-contrast: none) {
            .form-select {
                padding-right: 0.75rem;
            }
        }
    </style>

    <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 pb-10 pt-16">
        <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
            <div class="w-full pt-1 pb-5">
                <div
                    class="bg-buttonColor1 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                    <i class="mdi mdi-credit-card-outline text-3xl"></i>
                </div>
            </div>
            <div class="mb-10">
                <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1>
            </div>
            <div class="mb-3 flex -mx-2">
                <div class="px-2">
                    <label for="type1" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-buttonColor1" name="type" id="type1"
                            checked>
                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                    </label>
                </div>
                <div class="px-2" style="margin-left: 10%;margin-top:-1.5%">
                    <label for="type2" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-buttonColor1" name="type" id="type2">
                        <img src="https://img.freepik.com/premium-vector/cash-delivery-badges-collection-cash-delivery-label_798171-827.jpg?size=626&ext=jpg&ga=GA1.1.1107067595.1699424389&semt=ais"
                            class="h-16 ml-3">
                    </label>
                </div>
            </div>

            <div id="inputForm">
                <form method="POST" action="{{ route(' user.payments') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="font-bold text-sm mb-2 ml-1">Name on card</label>
                        <div>
                            <input
                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors"
                                placeholder="John Smith" type="text" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="font-bold text-sm mb-2 ml-1">Card number</label>
                        <div>
                            <input
                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors"
                                placeholder="0000 0000 0000 0000" type="text" />
                        </div>
                    </div>
                    <div class="mb-3 -mx-2 flex items-end">
                        <div class="px-2 w-1/2">
                            <label class="font-bold text-sm mb-2 ml-1">Expiration date</label>
                            <div>
                                <select
                                    class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors cursor-pointer">
                                    <option value="01">01 - January</option>
                                    <option value="02">02 - February</option>
                                    <option value="03">03 - March</option>
                                    <option value="04">04 - April</option>
                                    <option value="05">05 - May</option>
                                    <option value="06">06 - June</option>
                                    <option value="07">07 - July</option>
                                    <option value="08">08 - August</option>
                                    <option value="09">09 - September</option>
                                    <option value="10">10 - October</option>
                                    <option value="11">11 - November</option>
                                    <option value="12">12 - December</option>
                                </select>
                            </div>
                        </div>
                        <div class="px-2 w-1/2">
                            <select
                                class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors cursor-pointer">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-10">
                        <label class="font-bold text-sm mb-2 ml-1">Security code</label>
                        <div>
                            <input
                                class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors"
                                placeholder="000" type="text" />
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="block w-full max-w-xs mx-auto bg-buttonColor0 hover:bg-buttonColor1 focus:bg-buttonColor1 text-white rounded-lg p-2 font-semibold"><i
                                class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
                    </div>
                </form>
            </div>
            <div id="cashOnDelivery" style="display: none;margin-top:10%;text-align:center ">
                <form method="POST" action="{{ route(' user.payments') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full max-w-xs mx-auto bg-buttonColor0 hover:bg-buttonColor1 focus:bg-buttonColor1 text-white rounded-lg p-1 font-semibold"><i
                            class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
                </form>
            </div>
        </div>

    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const type1 = document.getElementById("type1");
            const type2 = document.getElementById("type2");
            const inputForm = document.getElementById("inputForm");
            const cashOnDelivery = document.getElementById('cashOnDelivery');
            type1.addEventListener("change", function() {
                inputForm.style.display = "block"; // Show the input form when not selected
                cashOnDelivery.style.display = "none";
            });

            type2.addEventListener("change", function() {
                inputForm.style.display = "none"; // Hide the input form when selected
                cashOnDelivery.style.display = "block";
            });

        });
    </script>
@endsection
