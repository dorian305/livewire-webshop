<div class="mx-auto px-4 py-8">
	<h1 class="text-3xl font-bold text-gray-900 mb-2">Your Order History</h1>
	<p class="text-gray-600 mb-6">
		Here you can check the history of your orders, along with the details of each order.
	</p>

	<div class="space-y-6">
		@foreach ($orders as $order)
			<div class="border border-gray-300 bg-white shadow-sm">
				<div class="flex justify-between items-center border-b border-gray-200 px-4 py-3 bg-gray-50">
					<span class="text-sm text-gray-700">
						Status: <strong>{{ App\Enums\OrderStatus::tryFrom($order->order_status)->name }}</strong>
					</span>
					<div class="text-sm text-gray-600 text-right">
						<div>Ordered on: <strong>{{ $order->created_at }}</strong></div>
						<div>Order ID: <strong>{{ $order->id }}</strong></div>
					</div>
				</div>

				<div class="px-4 py-4">
					<h3 class="text-lg font-semibold text-gray-800 mb-4">Items:</h3>

					<div class="space-y-4">
						@foreach ($order->getProducts() as $product)
							<div class="p-4 flex items-start justify-between border-b border-gray-200 pb-4 hover:bg-gray-50"
								wire:key="cart-product-{{ $product->id }}">
								<div class="flex items-start">
									<img src="{{ asset($product->image_url) }}" alt="{{ $product->title }}"
										class="h-16 w-16 object-cover">
									<div class="ml-4">
										<h4 class="text-md font-medium text-gray-900 mb-1">
											<a href="{{ route('view-product', ['product' => $product->id]) }}"
												class="hover:underline">
												{{ $product->title }}
											</a>
										</h4>
										<p class="text-sm text-gray-600">
											{{ $product->description }}
										</p>
									</div>
								</div>
								<div class="text-right">
									<span class="block font-semibold text-gray-800">
										Price: €{{ number_format($product->pivot->quantity * $product->unit_price, 2) }}
									</span>
									<span class="text-sm text-gray-600">x {{ $product->pivot->quantity }}</span>
								</div>
							</div>
						@endforeach
					</div>

					<div class="text-right mt-6">
						<h3 class="text-lg font-semibold text-gray-900">
							Total: €{{ number_format($order->getOrderTotal(), 2) }}
						</h3>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>