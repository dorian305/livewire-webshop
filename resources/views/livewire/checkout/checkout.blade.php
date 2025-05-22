<div class="container mx-auto p-4">
    <!-- Checkout Form -->
    <h2 class="text-3xl font-extrabold text-gray-900 mb-6 px-4">Checkout</h2>

    <div class="p-4">
        <div>
            <!-- Form Card -->
            <div class="w-full bg-white p-6 shadow-md border border-gray-300">
                <!-- Progress Indicator -->
                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700">Step {{ $currentStep }} of {{ $lastStep }}</span>
                    </div>
                    <div class="w-full bg-gray-200 h-2">
                        <div class="bg-blue-600 h-2" style="width: {{ ($currentStep / $lastStep) * 100 }}%;"></div>
                    </div>
                </div>
                
                <form class="max-w-full" wire:submit.prevent="review">
                    @if ($currentStep === 1)
                        <!-- Customer Information -->
                        <fieldset 
                            class="border border-gray-300 p-4 my-4"
                            wire:key="step-1"
                        >
                            <legend class="text-2xl font-bold text-gray-800">Customer Information</legend>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="w-full">
                                    <input
                                        type="text"
                                        placeholder="Name"
                                        class="mt-2 w-full h-12 p-2 border border-gray-300"
                                        wire:model.live="name"
                                    >
                                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full">
                                    <input
                                        type="text"
                                        placeholder="Surname"
                                        class="mt-2 w-full h-12 p-2 border border-gray-300"
                                        wire:model.live="surname"
                                    >
                                    @error('surname') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full">
                                    <input
                                        type="email"
                                        placeholder="Email"
                                        class="mt-2 w-full h-12 p-2 border border-gray-300"
                                        wire:model.live="email"
                                    >
                                    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full">
                                    <input
                                        type="tel"
                                        placeholder="Phone number"
                                        class="mt-2 w-full h-12 p-2 border border-gray-300"
                                        wire:model.live="phoneNumber"
                                    >
                                    @error('phoneNumber') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </fieldset>
                    @endif

                    @if ($currentStep === 2)
                        <!-- Customer Address -->
                        <fieldset
                            class="border border-gray-300 p-4 my-4"
                            wire:key="step-2"
                        >
                            <legend class="text-2xl font-bold text-gray-800">Address</legend>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="w-full">
                                    <input
                                        type="text"
                                        placeholder="Street"
                                        class="mt-2 w-full h-12 p-2 border border-gray-300"
                                        wire:model.live="street"
                                    >
                                    @error('street') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full">
                                    <input
                                        type="text"
                                        placeholder="Street number"
                                        class="mt-2 w-full h-12 p-2 border border-gray-300"
                                        wire:model.live="streetNumber"
                                    >
                                    @error('streetNumber') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <div class="w-full">
                                    <input
                                        type="text"
                                        placeholder="City"
                                        class="mt-2 w-full h-12 p-2 border border-gray-300"
                                        wire:model.live="city"
                                    >
                                    @error('city') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full">
                                    <input
                                        type="text"
                                        placeholder="Country"
                                        class="mt-2 w-full h-12 p-2 border border-gray-300"
                                        wire:model.live="country"
                                    >
                                    @error('country') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </fieldset>
                    @endif

                    @if ($currentStep === 3)
                        <!-- Payment -->
                        <fieldset
                            class="border border-gray-300 p-4 my-4"
                            wire:key="step-3"
                        >
                            <legend class="text-2xl font-bold text-gray-800">Choose Payment Method</legend>
                            <select
                                class="mt-2 w-full p-2 border border-gray-300"
                                wire:model.live="paymentMethod"
                            >
                                <option value="">Select a payment method</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                            @error('paymentMethod') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </fieldset>
                    @endif

                    @if ($currentStep === 4)
                        <!-- Review -->
                        <fieldset
                            class="border border-gray-300 p-4 my-4"
                            wire:key="step-4"
                        >
                            <legend class="text-2xl font-bold text-gray-800">Review</legend>
                            <p class="mb-1">Customer's name: {{ $name }} {{ $surname }}</p>
                            <p class="mb-1">Contact email: {{ $email }}</p>
                            <p class="mb-1">Contact phone number: {{ $phoneNumber }}</p>
                            <p class="mb-1">Ship order to: {{ $street }} {{ $streetNumber }}, {{ $city }}, {{ $country }}</p>
                            @php
                                $paymentMethodAssoc = [
                                    '' => '',
                                    'credit_card' => 'Credit Card',
                                    'paypal' => 'PayPal',
                                    'bank_transfer' => 'Bank Transfer',
                                ];
                            @endphp
                            <p>Payment method: {{ $paymentMethodAssoc[$paymentMethod] }}</p>
                        </fieldset>
                    @endif

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between">
                        @if ($currentStep <= $lastStep && $currentStep > $firstStep)
                            <button
                                type="button"
                                wire:click="goToPreviousStep"
                                class="py-2 px-4 border border-gray-300 text-gray-700 hover:bg-gray-100"
                            >
                                Back
                            </button>
                        @else
                            <div></div>
                        @endif
                        @if ($currentStep < $lastStep)
                            <button
                                type="button"
                                wire:click="goToNextStep"
                                class="py-2 px-4 border text-white bg-blue-500 hover:bg-blue-600"
                            >
                                Next
                            </button>
                        @endif
                        @if ($currentStep === $lastStep)
                            <button
                                type="button"
                                wire:click="placeOrder"
                                class="py-2 px-4 border text-white bg-blue-500 hover:bg-blue-600"
                            >
                                Place Order
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
