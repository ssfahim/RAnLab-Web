export default () => {
    $('#submit_review').on('click', submitreview);
    $('.save-button').on('click', saveBusiness);

    function saveBusiness(event)
    {
        var editId = event.target.id.substring(4);

        if(editId === '0')
        {
            createBusiness();
        }
        else
        {
            updateBusiness(editId);
        }
    }

    function updateBusiness(businessId)
    {
        let municipality = $('#municipality' + businessId).val();
        let year = $('#year' + businessId).val();
        let industry = $('#industry' + businessId).val();
        let name = $('#name' + businessId).val();
        let employment = $('#employment' + businessId).val();
        let location = $('#location' + businessId).val();

        $.ajax({
            url: "/business/" + businessId,
            type:"PUT",
            data:{
                id:businessId,
                last_action:"Edited",
                municipality:municipality,
                year:year,
                industry:industry,
                name:name,
                employment:employment,
                location:location,
            },
            success:function(response){
                alert("Successfully updated new Business");
            },
            error: function(response) {
                alert("Error updated new Business");
            },
        });
    }

    function submitreview()
    {
        let reviewId = $('#review_id').val();

        $.ajax({
            url: "/review/amend/" + reviewId,
            type:"POST",
            data:{},
            success:function(response){
                if(confirm("Review Amended"))
                {
                    window.location='/review';
                }
                else
                {
                    window.location='/business';
                }
            },
            error: function(response) {
                alert("Error Amending Review");
            },
        });
    }
}
