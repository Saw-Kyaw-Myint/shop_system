<?php

namespace App\Http\Livewire;

use App\Models\Comment as ModelsComment;
use App\Models\Product;
use Livewire\Component;

class Comment extends Component
{

    public $commentProduct;
    public $comment;
    public $productName;
    public $comments;
    public $commentCount;

    public function mount($product)
    {
        $this->commentProduct = $product;
    }

    public function render()
    {
        $product= Product::find($this->commentProduct);
        $this->productName=$product->title;
        $this->comments=$product->comments;
        $this->commentCount=count($this->comments);
        // dd($this->commentCount);
        return view('livewire.comment');
    }

    public function addComment()
    {
        if (!(auth()->user())) {
            $this->comment=" ";
            return redirect()->route('login.create');
        }

        $data = [
            'comment' => trim($this->comment),
            'user_id' => auth()->user()->id,
        ];
        $product = Product::find($this->commentProduct);
         $product->comments()->create($data);
        $this->comment=" ";
        // $this->emit('updateReviewCount'); 
        
    }

    public  function deleteComment($id){
            ModelsComment::where('id', $id)->delete();
    }
}
