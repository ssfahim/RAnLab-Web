export default () => {
    $('.edit-button').on('click', toggleRowEdit);

    function toggleRowEdit(e)
    {
        var editId = e.target.id.substring(4);
        $('.toggle-edit-' + editId).slideToggle();
    }
}
