<div>
    <div class="row">
        <div class="col-md-6">
            <h4 class="mb-4">{{ $commentCount }} review for <span class="text-info"> "{{ $productName }}"</span></h4>
            @foreach ($comments as $comment)
            <div class="media mb-3 border rounded p-2 position-relative">
                <img src="{{ asset('img/person.jpg') }}" alt="Image"
                    class="img-fluid mr-3 mt-1" style="width: 45px;"  onerror="this.onerror=null;this.src='{{ asset('img/person.jpg') }}';">
                <div class="media-body ">
                    <div class=" d-flex  align-items-center justify-content-between">
                        <h6>{{ $comment->user->name }}<small> - <i>{{ $comment->created_at->diffForHumans() }}</i></small> </h6>
                        @if (auth()->user() && auth()->user()->id==$comment->user->id)
                        <button wire:click="deleteComment({{ $comment->id }})" class=" border-0 bg-transparent position-absolute text-danger" style="top: -2px ; right:5px">x</button>
                        @endif
                    </div>
                   
                    <p class="m-0">{{ $comment->comment }}</p>
                </div>
            </div>
            @endforeach
         
        </div>
        <div class="col-md-6">
            <h4 class="mb-4">Leave a review</h4>
            <small>Your email address will not be published. Required fields are marked
                *</small>
            <form wire:submit.prevent="addComment()">
                <div class="form-group">
                    <label for="message">Your Review *</label>
                    <textarea id="message" cols="30" wire:model='comment' rows="3" class="form-control"></textarea>
                </div>
                {{-- </div> --}}

                {{-- <div class="form-group">
                    <label for="name">Your Name *</label>
                    <input type="text" class="form-control" id="name">
                </div> --}}
                {{-- <div class="form-group">
                    <label for="email">Your Email *</label>
                    <input type="email" class="form-control" id="email">
                </div> --}}
                <div class="form-group mb-0">
                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                </div>
            </form>
        </div>
    </div>
</div>
