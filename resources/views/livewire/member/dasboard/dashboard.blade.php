<div x-data="{ isSeeMore: true, isPackage: false, isAll: false, isRecent: true }"
     x-on:hide-see-more.window="isSeeMore = false">

    <x-alerts :message="session('success')" />

    <div class="text-white bg-gradient-to-bl from-blue-200 via-blue-600 to-indigo-700">

        <div class="px-4 py-20 mx-auto max-w-screen-xl sm:px-6 lg:px-8">

            <div class="w-10/12 p-8 ">

                <h2 class="text-4xl font-extrabold italic sm:text-7xl">
                    Track Your Shipment
                </h2>

                <p class="mt-4 sm:text-xl">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic tempore beatae facilis dignissimos rem praesentium
                    officia obcaecati quisquam iure recusandae!
                </p>

            </div>

            <!---===================== FIRST ROW CONTAINING THE  STATS CARD STARTS HERE =============================-->
            <div class="grid lg:grid-cols-4 gap-4 grid-cols-2 ">
                <!---== First Stats Container ====--->
                <div class="container mx-auto pr-4">

                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl
                                transition duration-500 transform hover:scale-105 cursor-pointer">

                        <div class="h-20 bg-red-500 flex items-center justify-between">

                            <p class="mr-0 text-white text-xl font-bold pl-5"> <i class="fad fa-box-check text-3xl pr-2">

                                </i> Ready For Pickup </p>

                        </div>

                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">

                            <p>TOTAL</p>

                        </div>

                        <p class="py-4 text-3xl text-black ml-5">{{ number_format($readyCount) }}</p>
                        <!-- <hr > -->
                    </div>

                </div>
                <!---== First Stats Container ====--->

                <!---== Second Stats Container ====--->
                <div class="container mx-auto pr-4">

                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl
                                transition duration-500 transform hover:scale-105 cursor-pointer">

                        <div class="h-20 bg-blue-500 flex items-center justify-between">

                            <p class="mr-0 text-white text-xl text-center font-bold pl-5">

                                <i class="fal fa-calendar-alt text-3xl pr-2"></i>

                                Packages This Year

                            </p>

                        </div>

                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">

                            <p>TOTAL</p>

                        </div>

                        <p class="py-4 text-3xl text-black ml-5">{{ number_format($recentCount) }}</p>
                        <!-- <hr > -->
                    </div>

                </div>
                <!---== Second Stats Container ====--->

                <!---== Third Stats Container ====--->
                <div class="container mx-auto pr-4">

                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">

                        <div class="h-20 bg-yellow-400 flex items-center justify-between">

                            <p class="mr-0 text-white text-xl text-center font-bold pl-5">

                                <i class="fas fa-shipping-fast text-3xl pr-2"></i>

                                Packages Delivered

                            </p>

                        </div>

                        <div class="flex justify-between pt-6 px-5 mb-2 text-sm text-gray-600">

                            <p>TOTAL</p>

                        </div>

                        <p class="py-4 text-3xl text-black ml-5">{{ number_format($deliveryCount) }}</p>
                        <!-- <hr > -->
                    </div>

                </div>
                <!---== Third Stats Container ====--->

                <!---== Fourth Stats Container ====--->
                <div class="container mx-auto">

                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl
                                transition duration-500 transform hover:scale-105 cursor-pointer">

                        <div class="h-20 bg-purple-900 flex items-center justify-between">

                            <p class="mr-0 text-white text-xl text-center font-bold pl-5">

                                <i class="far fa-sync text-3xl pr-2"></i>

                                Packages In-Transit

                            </p>

                        </div>

                        <div class="flex justify-between pt-6 px-5 mb-2 text-sm text-gray-600">

                            <p>TOTAL</p>

                        </div>

                        <p class="py-4 text-3xl text-black ml-5">{{ number_format($transitCount) }}</p>
                        <!-- <hr > -->
                    </div>

                </div>
                <!---== Fourth Stats Container ====--->
            </div>
            <!---===================== FIRST ROW CONTAINING THE  STATS CARD ENDS HERE =============================-->

        </div>

    </div>

    <div class="relative flex items-center justify-center h-12 px-3 bg-blue-800">
        <p class="text-sm font-medium text-gray-100">
            Keep Updated On This Latest Packages
        </p>

        <a href="" class="absolute inset-y-0 right-0 items-center hidden px-8 bg-gray-300 lg:inline-flex">

            <i class="fas fa-phone-alt flex-shrink-0 w-4 h-4 text-orange-600"></i>

            <span class="ml-3 text-sm font-medium tracking-widest uppercase"> (876) 519-7029 </span>

        </a>

    </div>


    <div @click.prevent="isRecent = !isRecent; isAll = !isAll"
        class="flex w-58 cursor-pointer absolute right-0 transform translate-x-30 transition mt-16 z-20 max-w-sm mx-auto overflow-hidden
                bg-white rounded-l-xl shadow-md dark:bg-gray-800">

        <div class="flex items-center justify-center w-8 px-7 bg-green-500">

            <i class="fal fa-table absolute z-20 text-white text-2xl"></i>

            <div class="text-white mt-12 p-4"> Switch </div>

        </div>


    </div>


    <div x-show="isRecent"
         x-transition.duration.300ms
         x-transition.out.duration.300ms.opacity.0
        class="mt-12 w-11/12 mx-auto p-5">

        <x-table title="Recent Packages This Year">

            <x-slot name="headerBtn">

                <x-table.button.top>
                    Search
                </x-table.button.top>

            </x-slot>

            <x-slot name="head">

                <x-table.head> Tracking # </x-table.head>

                <x-table.head> Username </x-table.head>

                <x-table.head> Email </x-table.head>

                <x-table.head> Shipper </x-table.head>

                <x-table.head> Package Type </x-table.head>

                <x-table.head> Weight (lb) </x-table.head>

                <x-table.head> Estimated Cost </x-table.head>

                <x-table.head> Internal Tracking # </x-table.head>

            </x-slot>

            @forelse($recents as $recent)

                <x-table.row>

                    <x-table.cell> {{ $recent->tracking_no }} </x-table.cell>

                    <x-table.cell> {{ $recent->member->user->username }} </x-table.cell>

                    <x-table.cell> {{ $recent->member->user->email }} </x-table.cell>

                    <x-table.cell> {{ $recent->shipper->name }} </x-table.cell>

                    <x-table.cell> {{ $recent->packagetype->type }} </x-table.cell>

                    <x-table.cell> {{ $recent->weight }} </x-table.cell>

                    <x-table.cell> $ {{ $recent->estimated_cost }} </x-table.cell>

                    <x-table.cell> {{ $recent->internal_tracking }} </x-table.cell>

                </x-table.row>

            @empty

                <x-table.row>

                    <x-table.cell colspan="8" class="text-center"> No Recent Order Made </x-table.cell>

                </x-table.row>

            @endforelse

            <x-table.row>

                <x-table.cell colspan="8" class="text-center text-blue-600"><a href="#"> See More </a> </x-table.cell>

            </x-table.row>

        </x-table>

    </div>

    <div x-show="isAll"
         x-transition.duration.300ms
         x-transition.out.duration.300ms.opacity.0
        class="px-4 mt-12 transform transition duration-300 w-11/12 mx-auto p-5">

        <x-table title="Recent Packages This Year">

            <x-slot name="headerBtn">

                <x-input.label label="Sort By:">

                    <x-input.select wire:model.lazy="status" field="Filter By">

                        <option value="" > All </option>

                        <option value="In-Transit" > In-Transit </option>

                        <option value="On-Their-Way-To-Jamaica" > On-Their-Way-To-Jamaica </option>

                        <option value="delivered" > Delivered </option>

                        <option value="warehouse" > Warehouse </option>

                    </x-input.select>

                </x-input.label>

            </x-slot>

            <x-slot name="head">

                <x-table.head class="cursor-pointer" wire:click.prevent="filter('tracking_no')">

                    Tracking # <i class="fad fa-sort-up pl-1"></i>

                </x-table.head>

                <x-table.head class="cursor-pointer" wire:click.prevent="filter('shipper_id')">

                    Shipper <i class="fad fa-sort-up pl-1"></i>

                </x-table.head>

                <x-table.head class="cursor-pointer" wire:click.prevent="filter('packagetype_id')">

                    Package Type <i class="fad fa-sort-up pl-1"
                    ></i>

                </x-table.head>

                <x-table.head class="cursor-pointer" wire:click.prevent="filter('weight')">

                    Weight (lb) <i class="fad fa-sort-up pl-1"></i>

                </x-table.head>

                <x-table.head class="cursor-pointer" wire:click.prevent="filter('estimated_cost')">

                    Estimated Cost <i class="fad fa-sort-up pl-1"></i>

                </x-table.head>

                <x-table.head class="cursor-pointer" wire:click.prevent="filter('internal_tracking')">

                    Internal Tracking # <i class="fad fa-sort-up pl-1"></i>

                </x-table.head>

            </x-slot>

            @forelse($allpackages as $allpackage)

                <x-table.row>

                    <x-table.cell> {{ $allpackage->tracking_no }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->shipper->name }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->packagetype->type }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->weight }} </x-table.cell>

                    <x-table.cell> $ {{ $allpackage->estimated_cost }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->internal_tracking }} </x-table.cell>

                </x-table.row>

            @empty

                <x-table.row>

                    <x-table.cell colspan="8" class="text-center"> No Recent Order Made </x-table.cell>

                </x-table.row>

            @endforelse

            <x-table.row x-show="isSeeMore">

                <x-table.cell wire:click.prevent="seeMore" colspan="8" class="text-center cursor-pointer text-blue-600">

                    See More

                </x-table.cell>

            </x-table.row>

        </x-table>


    </div>

</div>
