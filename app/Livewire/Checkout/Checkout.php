<?php

namespace App\Livewire\Checkout;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Checkout extends Component
{
    #[Validate('required|string')]
    public string $name;
    #[Validate('required|string')]
    public string $surname;
    #[Validate('required|string|email')]
    public string $email;
    #[Validate('required|string')]
    public string $phoneNumber;
    #[Validate('required|string')]
    public string $street;
    #[Validate('required|int')]
    public string $streetNumber;
    #[Validate('required|string')]
    public string $city;
    #[Validate('required|string')]
    public string $country;
    #[Validate('required|string')]
    public string $paymentMethod;

    public int $firstStep = 1;
    public int $lastStep = 4;
    public int $currentStep = 1;
    public array $validationBySteps = [
        1 => [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|email',
            'phoneNumber' => 'required|string',
        ],
        2 => [
            'street' => 'required|string',
            'streetNumber' => 'required|int',
            'city' => 'required|string',
            'country' => 'required|string',
        ],
        3 => [
            'paymentMethod' => 'required|string',
        ],
    ];

    #[Title('Checkout')]
    public function render()
    {
        return view('livewire.checkout.checkout', [
            'cart' => auth()->user()?->cart,
        ]);
    }

    public function mount(): void
    {
        if (!auth()->user()->cart || auth()->user()->cart->products->isEmpty()) {
            $this->redirect(route('view-cart'));
        }
    }

    public function goToNextStep(): void
    {
        if ($this->currentStep < 4) {
            $this->validate($this->validationBySteps[$this->currentStep]);
        }

        $this->currentStep++;

        if ($this->currentStep > $this->lastStep) {
            $this->currentStep = $this->lastStep;
        }
    }

    public function goToPreviousStep(): void
    {
        $this->currentStep--;

        if ($this->currentStep < $this->firstStep) {
            $this->currentStep = $this->firstStep;
        }
    }

    public function placeOrder(): void
    {
        $this->validate();
        
        $user = auth()->user();
        $order = Order::create([
            'user_id' => $user->id,
            'cart_id' => $user->cart->id,
            'customer_name' => "{$this->name} {$this->surname}",
            'contact_email' => $this->email,
            'contact_phone_number' => $this->phoneNumber,
            'contact_address' => "{$this->street} {$this->streetNumber}, {$this->city}, {$this->country}",
            'shipping_address' => "{$this->street} {$this->streetNumber}, {$this->city}, {$this->country}",
            'order_status' => OrderStatus::CREATED->value,
            'total_amount' => $user->cart->products->sum(fn (Product $product): float =>
                $product->pivot->quantity * $product->unit_price
            ),
            'payment_method' => $this->paymentMethod,
        ]);

        $user->cart->update([
            'is_processed' => true,
        ]);

        $this->redirect(route('checkout-completed'));
    }
}
