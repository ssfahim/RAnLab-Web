import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var pathArray = window.location.pathname.split('/');

if (location.pathname === '/business/1/edit') {
    import('./edit_table')
        .then(module => module.default());
    import('./edit_table_business')
        .then(module => module.default());
}

if (location.pathname === '/review') {
    import('./table_review')
        .then(module => module.default());
}

if (pathArray[1] === 'review' && pathArray.length === 3) {
    import('./review_view')
        .then(module => module.default());
}

if (pathArray[1] === 'review' && pathArray.length === 4 && pathArray[3] === 'edit') {
    import('./edit_table')
        .then(module => module.default());
    import('./review_amend')
        .then(module => module.default());
}

$('#regionSelect').on('change', setRegion);

function setRegion(event)
{
    var regionId = event.target.value;

    $.ajax({
        url: "/selectRegion/" + regionId,
        type:"POST",
        success:function(response){
            window.location.reload();
        },
        error: function(response) {
            alert("Error selecting Region");
        },
    });
}
