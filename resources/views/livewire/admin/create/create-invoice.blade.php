<div class="flex items-center justify-center min-h-screen ">

    @forelse($invoiceInfos as $invoiceInfo)

    <div class="w-4/5 bg-white shadow-lg">
        <div class="flex justify-between p-4">
            <div>
                <h1 class="text-3xl italic font-extrabold tracking-widest text-pink-500">{{ config('app.name') }}</h1>
                <p class="text-base">If account is not paid within 7 days the credits details supplied as
                    confirmation.</p>
            </div>
            <div class="p-2">
                <ul class="flex">
                    <li class="flex flex-col items-center p-2 border-l-2 border-indigo-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-600" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                        <span class="text-sm">
                                    www.LogiFreight.com
                                </span>

                    </li>
                    <li class="flex flex-col p-2 border-l-2 border-indigo-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-600" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm">
                                    Krajcik Run Lucienneburgh, MT 89914
                                </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-0.5 bg-indigo-500"></div>
        <div class="flex justify-between p-4">
            <div class="flex flex-col space-y-1">
                <h6 class="font-bold">Order Date : <span class="text-sm font-medium"> 12/12/2022</span></h6>
                <h6 class="font-bold">Tracking # : <span class="text-sm font-medium"> 12/12/2022</span></h6>
                <h6 class="font-bold">Internal Tracking # : <span class="text-sm font-medium"> 12/12/2022</span>
                </h6>
            </div>
            <div class="w-40">
                <address class="text-sm">
                    <span class="font-bold"> Billed To : </span>
                    {{ $invoiceInfo->member->user->username }}
                    {{ $invoiceInfo->member->address }}
                </address>
            </div>
            <div class="w-40">
                <address class="text-sm">
                    <span class="font-bold">Ship To :</span>
                    {{ config('app.name') }}
                    {{ $invoiceInfo->member->mailaddress }}
                </address>
            </div>
            <div></div>
        </div>
        <div class="flex justify-center mx-auto w-11/12 p-4">
            <div class="border-b border-gray-200 w-full shadow">
                <table class="w-full">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            #
                        </th>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Description
                        </th>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Shipper
                        </th>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Weight
                        </th>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Subtotal
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white py-2">


                    <tr class="border-b-2 whitespace-nowrap">
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $invoiceInfo->id }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $invoiceInfo->packagetype->type }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">1</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $invoiceInfo->weight }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ number_format($invoiceInfo->estimated_cost,'2') }}
                        </td>
                    </tr>

                    <tr class="mt-2 space-x-2">
                        <td colspan="3"></td>
                        <td class="text-sm font-bold">Base Rate:</td>
                        <td class="text-sm font-bold tracking-wider"><b> 15% </b></td>
                    </tr>

                    <tr class="">
                        <td colspan="3"></td>
                        <td class="text-sm font-bold">Customs Fee:</td>
                        <td class="text-sm font-bold tracking-wider"><b> {{ ($invoiceInfo->weight >= 3.5 ) ? '$600' : '$0.00'  }} </b></td>
                    </tr>
                    <!--end tr-->
                    <tr>
                        <th colspan="3"></th>
                        <td class="text-sm font-bold"><b>Handling Fee:</b></td>
                        <td class="text-sm font-bold tracking-wider"><b> ={{ ($invoiceInfo->weight >= 8.5 ) ? '$600' : '$0.00'  }} </b></td>
                    </tr>
                    <!--end tr-->
                    <tr class="text-white bg-gray-800">
                        <th colspan="3"></th>
                        <td class="text-sm font-bold"><b>Total</b></td>
                        <td class="text-sm font-bold"><b> {{ $invoiceInfo->actually_cost }} </b></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-between p-4">
            <div>
                <h3 class="text-xl">Terms And Condition :</h3>
                <ul class="text-xs list-disc list-inside">
                    <li>All accounts are to be paid within 7 days from receipt of invoice.</li>
                    <li>To be paid by cheque or credit card or direct payment online.</li>
                    <li>If account is not paid within 7 days the credits details supplied.</li>
                </ul>
            </div>
            <div class="p-4">
                <h3>Signature</h3>
                <div class="text-4xl italic text-indigo-500">_______________</div>
            </div>
        </div>
        <div class="w-full h-0.5 bg-indigo-500"></div>

        <div class="p-4">
            <div class="flex items-center justify-center">
                Thank you very much for doing business with us.
            </div>
            <div class="flex items-end justify-end space-x-3">
                <button class="px-4 py-2 text-sm text-green-600 bg-green-100">Print</button>
                <button class="px-4 py-2 text-sm text-blue-600 bg-blue-100">Save</button>
                <button class="px-4 py-2 text-sm text-red-600 bg-red-100">Cancel</button>
            </div>
        </div>

    </div>
    @empty
    <!--end tr-->

    @endforelse
</div>
