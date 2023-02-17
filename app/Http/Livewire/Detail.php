<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Product;
use Livewire\Component;

class Detail extends Component
{
    public $productId;
    public $product;
    public $relatedProduct;
    public $comment;
    public $reviewCount;
    protected $listeners = ['updateReviewCount' => 'reviewCount'];


    public function mount($productId)
    {
        $this->productId=$productId;
        $this->product = Product::find($productId);
        $this->reviewCount();
        $this->relatedProduct = Product::Related($this->product->category_id, $this->product->id)->get();
    }

    public function render()
    {

        return view('livewire.detail');
    }

    public function reviewCount()
    {
        $this->reviewCount=Comment::where('commentable_id','=',$this->productId)->count();
    }
}
