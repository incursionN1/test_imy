<div class="form-container">
    <h1>Оставьте отзыв</h1>
    <div id="reviewForm">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" class="send" required>
        </div>
        <div class="form-group">
            <label for="review">Отзыв:</label>
            <textarea id="review" name="review" class="send" required></textarea>
        </div>
        <button id="js-ajax-send" >Отправить</button>
    </div>
</div>

<div class="reviews-container">
    <h1>Отзывы</h1>
    <div id="reviewsList"></div>
</div>
<script>
    function loadReviews() {
        const reviews = JSON.parse('<?= addslashes(json_encode($reviews, JSON_UNESCAPED_UNICODE | JSON_HEX_APOS | JSON_HEX_QUOT)) ?>')
        displayReviews(reviews);
    }
</script>