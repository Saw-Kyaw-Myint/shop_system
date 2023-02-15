<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Comment extends Component
{

    public $commentProduct;
    public $comment;

    public function mount($product)
    {
        $this->commentProduct = $product;
    }

    public function render()
    {
        return view('livewire.comment');
    }

    public function addComment()
    {
        // $comment = new Comment(['comment'=>trim($this->comment),'user_id'=>auth()->user()->id, ]);

        $data = [
            'comment' => trim($this->comment),
            'user_id' => auth()->user()->id,
        ];
        $comment = new Comment($data);
        $product = Product::find($this->commentProduct);
        $comment->commentable_type = get_class($product);
        $comment->commentable_id = $product->id;
        $comment->save();
    }
}
