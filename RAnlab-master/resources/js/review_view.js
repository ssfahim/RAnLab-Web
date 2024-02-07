export default () => {
    $('#decline-button').on('click', declineReview);
    $('#amend-button').on('click', amendReview);
    $('#approve-button').on('click', approveReview);

    function declineReview(e)
    {
        let reviewId = $('#review_id').val();

        $.ajax({
            url: "/review/" + reviewId,
            type:"DELETE",
            data:{

            },
            success:function(response){
                alert("Review Declined");
            },
            error: function(response) {
                alert("Unable to Decline Review");
            },
        });
    }

    function amendReview(e)
    {
        let reviewId = $('#review_id').val();

        window.location='/review/' + reviewId + '/edit';
    }

    function approveReview(e)
    {
        let reviewId = $('#review_id').val();

        $.ajax({
            url: "/review/" + reviewId,
            type:"PUT",
            data:{

            },
            success:function(response){
                alert("Review Approved");
            },
            error: function(response) {
                alert("Unable to Approve Review");
            },
        });
    }
}
