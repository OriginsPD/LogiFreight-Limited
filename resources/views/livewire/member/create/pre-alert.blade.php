<div>

    <x-form wire:submit.prevent="createAlert" grid="2">
        <x-slot name="title">

        </x-slot>

        <x-input.label colspan="col-span-full">

            <x-slot name="label">

                <i class="fas fa-user-circle"></i> Member #

            </x-slot>

            <x-input.text class="py-2" name="memberNum" value="{{ $memberInfo->member_num }}"
                          readonly />

        </x-input.label>


            <x-input.label for="package.tracking_no">

                <x-slot name="label">

                    <i class="fas fa-signal-stream"></i> Tracking #

                </x-slot>

                <x-input.text class="py-2" wire:model="package.tracking_no"
                              :error="$errors->first('package.tracking_no')"/>

            </x-input.label>

        <x-input.label for="package.packagetype_id">

            <x-slot name="label">

                <i class="fab fa-pied-piper-square"></i> Description

            </x-slot>

            <x-input.select class="py-2" wire:model.debounce.300ms="package.packagetype_id"
                            :option="$description" field="type"
                          :error="$errors->first('package.packagetype_id')"/>

        </x-input.label>

        <x-input.label for="package.shipper_id">

            <x-slot name="label">

                <i class="fab fa-shopware"></i> Merchant

            </x-slot>

            <x-input.select class="py-2" wire:model.debounce.300ms="package.shipper_id"
                            :option="$merchants" field="name"
                          :error="$errors->first('package.shipper_id')"/>

        </x-input.label>

        <x-input.label for="package.expected_date">

            <x-slot name="label">

                <i class="far fa-calendar-alt"></i> Expected Arrival Date

            </x-slot>

            <x-input.text type="date"  wire:model="package.expected_date"
                          :error="$errors->first('package.expected_date')"/>

        </x-input.label>

        <x-input.label for="package.weight">

            <x-slot name="label">

                <i class="fas fa-balance-scale-right"></i> Weight

            </x-slot>

            <x-input.text type="number" step="00.01" class="py-2" value="0" aria-valuemin="0" wire:model.debounce.300ms="package.weight"
                          :error="$errors->first('package.weight')"/>

        </x-input.label>

        <x-input.label for="package.estimated_cost">

            <x-slot name="label">

                <i class="far fa-money-check-edit-alt"></i> Cost ($JMD)

            </x-slot>

            <x-input.text class="py-2" wire:model.debounce.300ms="package.estimated_cost"
                          :error="$errors->first('package.estimated_cost')"/>

        </x-input.label>

            <x-input.label colspan="-mb-10" label="Upload Package Invoice">

                    <div class=" h-20 w-20 m-5 flex top-0 overflow-hidden bg-gray-100">

                        @if($upload)

                            <img src="{{ $upload->temporaryUrl() }}"
                                 class="h-full w-full object-fill" alt="avatar">

                        @else

                            <img src="{{ $package->invoiceUrl() }}" class="h-full w-full" alt="avatar">

                        @endif

                    </div>

                    <div x-data="{ focus: false }">

                        <x-input.text class="sr-only" id="file"
                                      @focus="focus = true" @blur="focus=false"
                                      type="file"
                                      wire:model="upload"/>

                        @if($errors->first('upload'))

                            <span class="text-red-500 text-xs italic  m-1">

                                * {{ $errors->first('upload') }}

                            </span>

                        @endif

                    </div>

            </x-input.label>


        <x-input.submit class="bg-blue-500">

            <span wire:loading.delay wire:loading.class="animate-spin"
                  class="transform transition duration-300">

                <i class="fad fa-spinner-third"></i>

            </span>

            Create Alert

        </x-input.submit>


    </x-form>


</div>
