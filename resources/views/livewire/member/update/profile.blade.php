<div @click.away="isProfile = false"
    class="w-11/12">

    <x-form wire:submit.prevent="{{ ($changepass) ? 'changePassword' : 'alterUser' }}" class="p-5">

        <x-slot name="title">

            <h1 class="italic font-semibold text-lg"> Profile Information </h1>

        </x-slot>

        @if($changepass === false)

            <x-input.label for="user.username" label="Username">

                <x-input.text wire:model.debounce.300ms="user.username"
                              :error="$errors->first('user.username')" />

            </x-input.label>

            <x-input.label for="member.trn" label="Trn">

                <x-input.text wire:model.debounce.300ms="member.trn"
                              :error="$errors->first('member.trn')" />

            </x-input.label>

            <x-input.label colspan="col-span-full" for="user.email" label="Email">

                <x-input.text type="email" wire:model.debounce.300ms="user.email"
                              :error="$errors->first('user.email')" />

            </x-input.label>

            <x-input.label colspan="col-span-full" for="member.address" label="Address">

                <x-input.textarea wire:model.debounce.300ms="member.address"
                                  :error="$errors->first('member.address')" />

            </x-input.label>

            <x-input.label colspan="col-span-full" for="member.mailaddress" label="Mail Address">

                <x-input.textarea wire:model.defer="member.mailaddress"
                                  :error="$errors->first('member.mailaddress')" />

            </x-input.label>

        @else

            <div class="col-span-full grid grid-cols-2 gap-4">

                <x-input.label colspan="col-span-full" for="password_current" label="Current Password">

                    <x-input.text type="password" wire:model.debounce.300ms="password_current"
                                  :error="$errors->first('password_current')" />

                </x-input.label>

                @if(Hash::check($password_current,auth()->user()->password))

                    <x-input.label for="password" label="Password">

                        <x-input.text type="password" wire:model.debounce.300ms="password"
                                      :error="$errors->first('password')" />

                    </x-input.label>

                    <x-input.label for="password_confirmation" label="Password Confirmation">

                        <x-input.text type="password" wire:model.debounce.300ms="password_confirmation"
                                      :error="$errors->first('password_confirmation')" />

                    </x-input.label>


                @endif

            </div>

        @endif

        <x-input.label label="Change Password">

            <input type="checkbox" wire:model="changepass" class="form-checkbox border border-gray-400" />

        </x-input.label>

        <x-input.submit>

            Update Profile

        </x-input.submit>




    </x-form>


</div>
