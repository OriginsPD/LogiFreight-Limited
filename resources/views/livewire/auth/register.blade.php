<div @click.away="isMember = false" class="w-10/12 p-4">

    <x-form wire:submit.prevent="createMember" grid="2">

        <x-slot name="title">

            <h1 class="text-4xl font-extrabold w-full text-center text-blue-700">

                Join Us Today

            </h1>

        </x-slot>

        <x-input.label for="username" label="Enter Your Name">

            <x-input.text wire:model.debounce.300ms="username" type="text"
                          :error="$errors->first('username')"/>

        </x-input.label>

        <x-input.label for="email" label="Enter Your Email">

            <x-input.text wire:model.debounce.300ms="email" type="email"
                          :error="$errors->first('email')"/>

        </x-input.label>

        <x-input.label for="member.trn" label="Enter Your TRN">

            <x-input.text wire:model.debounce.300ms="member.trn" type="number"
                          :error="$errors->first('member.trn')"/>

        </x-input.label>


        <x-input.label for="password" label="Password">

            <x-input.text wire:model.debounce.300ms="password" type="password"
                          :error="$errors->first('password')"/>

        </x-input.label>

        <x-input.label for="password_confirmation" label="Confirmation Password">

            <x-input.text wire:model.debounce.300ms="password_confirmation" type="password"
                          :error="$errors->first('password_confirmation')"/>

        </x-input.label>


        <x-input.label colspan="col-span-full" for="member.address" label="Enter Address">

            <x-input.textarea wire:model.debounce="member.address"/>

        </x-input.label>

        <x-input.submit>

            Create Member

        </x-input.submit>


    </x-form>

</div>
