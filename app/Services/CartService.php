<?php

namespace App\Services;

use App\Interfaces\CartInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CartService implements CartInterface
{
    /**
     * @return int
     */
    public function getTotal(): int
    {
        return array_reduce($this->get(), fn($total, $item) => $total += $item->price, 0);
    }

    /**
     * @return mixed
     */
    public function get(): mixed
    {
        try {
            if (session()->has('cart')) {
                return session()->get('cart');
            }

            return [];
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            return [];
        }
    }

    /**
     * @return void
     */
    public function clear(): void
    {
        session()->pull('cart', []);
    }

    /**
     * @param Product $product
     * @return void
     */
    public function add(Product $product): void
    {
        session()->push('cart', $product);
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function remove(Product $product): bool
    {
        if (!in_array($product, $this->get())) {
            return false;
        }

        $items = array_filter($this->get(), fn($element) => $element->id !== $product->id);

        $this->set($items);

        return true;
    }

    private function set(array $items): void
    {
        session(['cart' => $items]);
    }

    /**
     * @param Product $product
     * @return void
     */
    public function update(Product $product): void
    {
        // TODO: Implement update() method.
    }

    public function isEmpty(): bool
    {
        if (count($this->get()) > 0) return false;

        return true;
    }
}
