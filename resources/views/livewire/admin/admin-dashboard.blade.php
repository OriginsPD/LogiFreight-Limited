<div @click.prevent="isSlide = false"
    class=" flex flex-col bg-gray-400 h-auto inset-0">

    <x-alerts alpName="isAlert" status="0" message="Just Testing the length it may reach"/>


    <div class="text-gray-600 bg-gray-400 fixed z-20 mb-10 body-font w-screen">

        <div class="container px-5 py-4 mx-auto">

            <div class="flex flex-wrap -m-4 text-center">

                <div class="p-4 sm:w-1/4 w-1/2">

                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">2.7K</h2>

                    <p class="leading-relaxed">Users</p>

                </div>

                <div class="p-4 sm:w-1/4 w-1/2">

                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">1.8K</h2>

                    <p class="leading-relaxed">Subscribes</p>

                </div>

                <div class="p-4 sm:w-1/4 w-1/2">

                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">35</h2>

                    <p class="leading-relaxed">Downloads</p>

                </div>

                <div class="p-4 sm:w-1/4 w-1/2">

                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">4</h2>

                    <p class="leading-relaxed">Products</p>

                </div>

            </div>

        </div>

    </div>

 <div class="mt-32 w-11/12 mx-auto p-5">

     <x-table>

         <x-slot name="headerBtn">

             <x-table.button.top>
                 Search
             </x-table.button.top>

         </x-slot>

         <x-slot name="head">

             <x-table.head> Username </x-table.head>

             <x-table.head> Email </x-table.head>

             <x-table.head> Shipper </x-table.head>

             <x-table.head> Package Type </x-table.head>

             <x-table.head> Weight (lb) </x-table.head>

             <x-table.head> Estimated Cost </x-table.head>

             <x-table.head> Tracking # </x-table.head>

         </x-slot>

         @forelse($recents as $recent)

             <x-table.row>

                 <x-table.cell> {{ $recent->member->user->username }} </x-table.cell>

                 <x-table.cell> {{ $recent->member->user->email }} </x-table.cell>

                 <x-table.cell> {{ $recent->shipper->name }} </x-table.cell>

                 <x-table.cell> {{ $recent->packagetype->type }} </x-table.cell>

                 <x-table.cell> {{ $recent->weight }} </x-table.cell>

                 <x-table.cell> {{ $recent->estimated_cost }} </x-table.cell>

                 <x-table.cell> {{ $recent->internal_tracking }} </x-table.cell>

             </x-table.row>

         @empty

             <x-table.row>

                 <x-table.cell colspan="7"> No Recent Order Made </x-table.cell>

             </x-table.row>

         @endforelse

     </x-table>

     <div>

         {{ $recents->links() }}

     </div>


 </div>


</div>
