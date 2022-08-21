<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewComponent extends Component
{
    public string $name = '';
    public string $email  = '';
    public string $text  = '';
    public int $rating  = 0;
    public int $offer_id = 0;
    public int $article_id  = 0;

    public $success = false;

    protected array $rules = [
        'name' => 'required|string|min:2|max:255',
        'email' => 'required|email:rfc,dns|max:255',
        'text' => 'required|string|min:3|max:700',
        'rating' => 'numeric',
        'offer_id' => 'numeric',
        'article_id' => 'numeric',
    ];

    protected array $messages = [
        'name.required' => 'Поле не заполнено',
        'name.*' => 'Поле заполнено неверно',
        'email.required' => 'Поле не заполнено',
        'email.*' => 'Поле заполнено неверно',
        'text.required' => 'Поле не заполнено',
        'text.*' => 'Поле заполнено неверно',
        'rating.*' => 'Поле заполнено неверно',
        'offer_id.*' => 'Поле заполнено неверно',
        'article_id.*' => 'Поле заполнено неверно',
    ];

    protected array $validationAttributes = [
        'name' => 'Имя',
        'email' => 'Электронная почта',
        'text' => 'Текст отзыва',
        'rating' => 'Рейтинг',
        'offer_id' => 'Id товара',
        'article_id' => 'Id статьи',
    ];

    public function submit()
    {
        $validated = $this->validate();
        $validated['offer_id'] = $validated['offer_id'] ? $validated['offer_id'] : null;
        $validated['article_id'] = $validated['article_id'] ? $validated['article_id'] : null;
        Review::create($validated);
        $this->reset(['name', 'email', 'text', 'rating']);
        $this->success = true;
    }

    public function render()
    {
        return view('forms.review.index');
    }
}
