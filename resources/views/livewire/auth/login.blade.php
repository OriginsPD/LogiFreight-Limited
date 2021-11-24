<div @click.away="isLogin = false" class="w-8/12">

    <x-form wire:submit.prevent="authUser" grid="1">

        <x-slot name="title">

            <h1 class="text-4xl font-extrabold w-full text-center text-blue-700">

                Login

            </h1>

        </x-slot>

        <x-input.label for="user.email" label="Email">

            <x-input.text wire:model.debounce.300ms="user.email" type="email"
                          :error="$errors->first('user.email')"/>

        </x-input.label>

        <x-input.label for="password" label="Password">

            <x-input.text wire:model.debounce.300ms="password" type="password"
                          :error="$errors->first('password')"/>

        </x-input.label>

        <x-input.submit class="bg-blue-600 font-semibold">

            Login

        </x-input.submit>

    </x-form>



</div>
