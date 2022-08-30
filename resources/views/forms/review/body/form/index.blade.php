<form action="" class="js_form-review" method="POST" wire:submit.prevent="submit">
    @csrf
    <input type="hidden" name="rating" class="js_hidden-rating-review" wire:model="rating">
    <input type="hidden" id="offer_id_input" name="offer_id" value="{{ $offer_id ?? null }}" wire:model.defer="offer_id">
    <input type="hidden" id="article_id_input" name="article_id" value="{{ $article_id ?? null }}" wire:model.defer="article_id">
    <div class="row">
        <div class="col-md-6 @error('name') error @enderror">
            @error('name')
            <span class="form-message error">{{ $message }}</span> @enderror
            <input type="text" placeholder="Имя" name="name" wire:model.debounce.300ms="name" />
        </div>
        <div class="col-md-6  @error('email') error @enderror">
            @error('email')
            <span class="form-message error">{{ $message }}</span> @enderror
            <input type="text" placeholder="E-mail" name="email" wire:model.debounce.300ms="email" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @error('text')
            <span class="form-message error">{{ $message }}</span> @enderror
            <textarea class="custom-textarea @error('name') error @enderror" name="text" placeholder="Текст отзыва" wire:model.debounce.300ms="text"></textarea>
            <button type="submit" data-text="submit review" class="button-one submit-button mt-20">Отправить</button>
        </div>
    </div>
</form>
