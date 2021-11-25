<div x-data="{ isSeeMore: true, isPackage: false,
               isAll: false, isRecent: true,
               invoicePre: @entangle('invoicePre'),
                invoiceAct: @entangle('invoiceAct')}"
     x-on:hide-see-more.window="isSeeMore = false"
     @click.prevent="isSlide = false" >

    <x-alerts :message="session('success')" />

    <div class="text-white py-4 bg-gradient-to-bl from-blue-500 via-pink-600 to-pink-700">

        <div class="px-4 py-20 mx-auto max-w-screen-xl sm:px-6 lg:px-8">

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

                <x-input.label label="Search Package Via">

                    <x-input.text wire:model="search" placeholder="Search"/>

                </x-input.label>

            </x-slot>

            <x-slot name="head">

                <x-table.head> Tracking # </x-table.head>

                <x-table.head> Username </x-table.head>

                <x-table.head> Email </x-table.head>

                <x-table.head> Shipper </x-table.head>

                <x-table.head> Package Type </x-table.head>

                <x-table.head> Weight (lb) </x-table.head>

                <x-table.head> Status </x-table.head>

                <x-table.head> Estimated Cost </x-table.head>

                <x-table.head> Internal Tracking # </x-table.head>

                <x-table.head> Invoice </x-table.head>

            </x-slot>

            @forelse($recents as $recent)

                <x-table.row>

                    <x-table.cell> {{ $recent->tracking_no }} </x-table.cell>

                    <x-table.cell> {{ $recent->member->user->email }} </x-table.cell>

                    <x-table.cell> {{ $recent->shipper->name }} </x-table.cell>

                    <x-table.cell> {{ $recent->shipper->name }} </x-table.cell>

                    <x-table.cell> {{ $recent->packagetype->type }} </x-table.cell>

                    <x-table.cell> {{ $recent->weight }} </x-table.cell>

                    <x-table.cell> {{ $recent->status }} </x-table.cell>

                    <x-table.cell> $ {{ $recent->estimated_cost }} </x-table.cell>

                    <x-table.cell> {{ $recent->internal_tracking }} </x-table.cell>

                    <x-table.cell class="text-center">

                        <div class="flex space-x-2">

                            <i wire:click.prevent="invoicePreview({{ $recent }})" class="fas fa-file-invoice cursor-pointer text-blue-700 text-lg"></i>

                            <i wire:click.prevent="invoiceAction({{ $recent }})" class="fas fa-hand-holding-box cursor-pointer text-red-700 text-lg"></i>


                        </div>

                    </x-table.cell>

                </x-table.row>

            @empty

                <x-table.row>

                    <x-table.cell colspan="10" class="text-center"> No Recent Order Made </x-table.cell>

                </x-table.row>

            @endforelse

            <x-table.row x-show="isSeeMore">

                <x-table.cell wire:click.prevent="seeMore" colspan="10" class="text-center cursor-pointer text-blue-600">

                    See More

                </x-table.cell>

            </x-table.row>

        </x-table>

    </div>

    <div x-show="isAll"
         x-transition.duration.300ms
         x-transition.out.duration.300ms.opacity.0
         class="px-4 mt-12 transform transition duration-300 w-11/12 mx-auto p-5">

        <x-table title="Packages History">

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

                <x-table.head class="cursor-pointer">

                    Username

                </x-table.head>

                <x-table.head class="cursor-pointer">

                    Email

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

                <x-table.head class="cursor-pointer" wire:click.prevent="filter('status')">

                    Status <i class="fad fa-sort-up pl-1"></i>

                </x-table.head>

                <x-table.head class="cursor-pointer" wire:click.prevent="filter('estimated_cost')">

                    Estimated Cost <i class="fad fa-sort-up pl-1"></i>

                </x-table.head>

                <x-table.head class="cursor-pointer" wire:click.prevent="filter('internal_tracking')">

                    Internal Tracking # <i class="fad fa-sort-up pl-1"></i>

                </x-table.head>

                <x-table.head class="cursor-pointer" >

                    Invoice

                </x-table.head>

            </x-slot>

            @forelse($allpackages as $allpackage)

                <x-table.row>

                    <x-table.cell> {{ $allpackage->tracking_no }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->member->user->username }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->member->user->email }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->shipper->name }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->packagetype->type }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->weight }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->status }} </x-table.cell>

                    <x-table.cell> $ {{ $allpackage->estimated_cost }} </x-table.cell>

                    <x-table.cell> {{ $allpackage->internal_tracking }} </x-table.cell>

                    <x-table.cell class="text-center">

                        <i wire:click.prevent="invoicePreview({{ $allpackage }})" class="fas fa-file-invoice cursor-pointer text-blue-700 text-lg"></i>

                    </x-table.cell>

                </x-table.row>

            @empty

                <x-table.row>

                    <x-table.cell colspan="8    " class="text-center"> No Recent Order Made </x-table.cell>

                </x-table.row>

            @endforelse

            <x-table.row x-show="isSeeMore">

                <x-table.cell wire:click.prevent="seeMore" colspan="8   " class="text-center cursor-pointer text-blue-600">

                    See More

                </x-table.cell>

            </x-table.row>

        </x-table>


    </div>

    <x-modal alpName="invoicePre" class="flex bg-gray-800 bg-opacity-90">

        <div @click.away="invoicePre = false" class="h-10/12 w-11/12">

            <img src="{{ $url }}" class="object-fill h-full w-full" alt="">

        </div>


    </x-modal>

    <x-modal alpName="invoiceAct" class=" flex bg-gray-800">

        <div class="w-11/12">

            <x-form wire:submit.prevent="packageUpdate" grid="2">

                <x-slot name="title">
                </x-slot>

                <x-input.label colspan="col-span-full">

                    <x-slot name="label">

                        <i class="fas fa-user-circle"></i> Member #

                    </x-slot>

                    <x-input.text class="py-2" name="memberNum" value="{{ $memberInfo }}"
                                  readonly />

                </x-input.label>

                <x-input.label for="packageEdit.tracking_no">

                    <x-slot name="label">

                        <i class="fas fa-signal-stream"></i> Tracking #

                    </x-slot>

                    <x-input.text class="py-2" readonly wire:model="packageEdit.tracking_no"
                                  :error="$errors->first('packageEdit.tracking_no')"/>

                </x-input.label>

                <x-input.label for="packageEdit.internal_tracking">

                    <x-slot name="label">

                        <i class="fas fa-signal-stream"></i> Internal Tracking #

                    </x-slot>

                    <x-input.text class="py-2" readonly wire:model="packageEdit.internal_tracking"
                                  :error="$errors->first('packageEdit.internal_tracking')"/>

                </x-input.label>

                <x-input.label for="packageEdit.packagetype_id">

                    <x-slot name="label">

                        <i class="fab fa-pied-piper-square"></i> Description

                    </x-slot>

                    <x-input.select class="py-2" wire:model.debounce.300ms="packageEdit.packagetype_id"
                                    :option="$description" field="type"
                                    :error="$errors->first('packageEdit.packagetype_id')"/>

                </x-input.label>

                <x-input.label for="packageEdit.shipper_id">

                    <x-slot name="label">

                        <i class="fab fa-shopware"></i> Merchant

                    </x-slot>

                    <x-input.select class="py-2" wire:model.debounce.300ms="packageEdit.shipper_id"
                                    :option="$merchants" field="name"
                                    :error="$errors->first('packageEdit.shipper_id')"/>

                </x-input.label>

                <x-input.label for="packageEdit.arrival_date">

                    <x-slot name="label">

                        <i class="far fa-calendar-alt"></i> Arrival Date

                    </x-slot>

                    

                </x-input.label>

                <x-input.label for="packageEdit.weight">

                    <x-slot name="label">

                        <i class="fas fa-balance-scale-right"></i> Weight

                    </x-slot>

                    <x-input.text wire:change.debounce="packageFee" type="number" step="00.01" class="py-2" value="0"
                                  aria-valuemin="0" wire:model.debounce.300ms="packageEdit.weight"
                                  :error="$errors->first('packageEdit.weight')"/>

                </x-input.label>

                <x-input.label for="packageEdit.actually_cost">

                    <x-slot name="label">

                        <i class="far fa-money-check-edit-alt"></i> Actually Cost ($JMD)

                    </x-slot>

                    <x-input.text class="py-2" readonly value="{{ number_format($packageEdit->actually_cost,'2') }}"
                                  :error="$errors->first('packageEdit.actually_cost')"/>

                </x-input.label>

                <x-input.submit class="bg-blue-500">

                <i wire:loading.delay wire:loading.class="animate-spin" class="fad fa-spinner-third transform transition duration-300 "></i>

                    Update Package

                </x-input.submit>


            </x-form>


        </div>

    </x-modal>

</div>
