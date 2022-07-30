<form action="#" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <input type="text" placeholder="Your name here..." name="name" />
        </div>
        <div class="col-md-6">
            <input type="text" placeholder="Your email here..." name="email" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <textarea class="custom-textarea" name="message" placeholder="Your review here..." ></textarea>
            <button type="submit" data-text="submit review" class="button-one submit-button mt-20">submit review</button>
        </div>
    </div>
</form>
