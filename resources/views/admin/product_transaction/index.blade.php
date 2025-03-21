<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row w-full justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Auth::user()->hasRole('owner') ? __('Apotek Order') : __('My Transactions') }}
            </h2>
            <a href="{{ route('admin.products.create') }}"
                class=" font-bold py-3 px-5 rounded-full text-white bg-indigo-700">Add Product</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:pt-6 lg:px-8">
            <div class=" bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @forelse($product_transactions as $transaction)
                    <div class="item-card flex flex-row justify-between item-center">
                        <div class="flex flex-row items-center gap-x-3">

                            <div>
                                <p class="text-base text-slate-500">
                                    Total Transaksi
                                </p>
                                <h3 class="text-xl font-bold text-indigo-950">
                                    Rp {{ $transaction->total_amount }}
                                </h3>
                            </div>
                        </div>
                        <div>
                            <p class="text-base text-slate-500">
                                Date </p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $transaction->created_at }}
                            </h3>
                        </div>
                        @if ($transaction->is_paid)
                            <span class="py-3 px-5 rounded-full bg-orange-500">
                                <p class="text-white font-bold text-sm ">
                                    Success
                                </p>
                            </span>
                        @else
                            <span class="py-3 px-5 rounded-full bg-orange-500">
                                <p class="text-white font-bold text-sm ">
                                    Pending
                                </p>
                            </span>
                        @endif
                        <div class="flex flex-row item-center gap-x-3">
                            <a href="{{ route('product_transactions.show', 1) }}"
                                class="font-bold py-3 px-5 rounded-full text-white bg-indigo-700">view
                                detail
                            </a>
                        </div>
                    </div>
                    <hr class="my-3">
                @empty
                    <p>Belom Tersedia Transaksi</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
