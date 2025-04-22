$('#js-ajax-send').click(() => {
    const date = new Date();
    const formattedDate =  date.toISOString().replace('T', ' ').split('.')[0];

    let data = {'date':  formattedDate};
    $('.send').each(function() {
        data[$(this).attr('id')] = $(this).val();
    });
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {
            action: 'addReviews',
            params: data
        },
        success: function (msg) {
            addReviewsToPage(data);
        },
        error: function(xhr, status, error) {
            alert('Произошла ошибка при отправке: ' + error);
        }
    })
});

$(document).ready(function() {
    loadReviews();
});

function addReviewsToPage (review)
{
    console.log(review.review)

    review.review = review.review.replaceAll('/n','<br>')
    console.log(review.review)
    const $reviewsList = $('#reviewsList');
        $reviewsList.prepend(`
            <div class="review">
                <div class="review-header">
                    <span>${review.name}</span>
                    <span class="review-date">${review.date}</span>
                </div>
                <div class="review-text"><pre>${review.review}</pre></div>
            </div>
        `);
}
function displayReviews(reviews) {
    const $reviewsList = $('#reviewsList');
    if (!Object.keys(reviews).length) {
        $reviewsList.html('<p>Пока нет отзывов.</p>');
        return;
    }
    $.each(reviews, function(_, review) {
    addReviewsToPage (review)
    });
}
