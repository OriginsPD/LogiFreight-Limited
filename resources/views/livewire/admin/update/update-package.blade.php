<div class="w-11/12">

    <x-form wire:submit.prevent="alterPackage" grid="2">
        <x-slot name="title">
        </x-slot>

        <x-input.label colspan="col-span-full">

            <x-slot name="label">

                <i class="fas fa-user-circle"></i> Member #

            </x-slot>

            <x-input.text class="py-2" name="memberNum" value="{{ $memberInfo }}"
                          readonly />

        </x-input.label>

        <x-input.label for="package.tracking_no">

            <x-slot name="label">

                <i class="fas fa-signal-stream"></i> Tracking #

            </x-slot>

            <x-input.text class="py-2" readonly wire:model="package.tracking_no"
                          :error="$errors->first('package.tracking_no')"/>

        </x-input.label>

        <x-input.label for="package.internal_tracking">

            <x-slot name="label">

                <i class="fas fa-signal-stream"></i> Internal Tracking #

            </x-slot>

            <x-input.text class="py-2" readonly wire:model="package.internal_tracking"/>

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

        <x-input.label for="package.arrival_date">

            <x-slot name="label">

                <i class="far fa-calendar-alt"></i> Expected Arrival Date

            </x-slot>

            <x-input.text type="date"  wire:model="package.arrival_date"
                          :error="$errors->first('package.arrival_date')"/>

        </x-input.label>

        <x-input.label for="package.weight">

            <x-slot name="label">

                <i class="fas fa-balance-scale-right"></i> Weight

            </x-slot>

            <x-input.text wire:change.debounce="packageFee" type="number" step="00.01" class="py-2" value="0"
                          aria-valuemin="0" wire:model.debounce.300ms="package.weight"
                          :error="$errors->first('package.weight')"/>

        </x-input.label>

        <x-input.label for="package.actually_cost">

            <x-slot name="label">

                <i class="far fa-money-check-edit-alt"></i> Actually Cost ($JMD)

            </x-slot>

            <x-input.text class="py-2" readonly value="{{ number_format($package->actually_cost,'2') }}"/>

        </x-input.label>

        <x-input.submit wire:click.prevent="alterPackage" class="bg-blue-500">

            <i wire:loading.delay wire:loading.class="animate-spin" class="fad fa-spinner-third transform transition duration-300 "></i>

            Update Package

        </x-input.submit>

    </x-form>

</div>
