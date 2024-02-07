export default () => {
    $('.data-row').on('click', viewReview);

    function viewReview(e)
    {
        var editId = e.currentTarget.id.substring(3);
        window.location='/review/' + editId;
    }
}
