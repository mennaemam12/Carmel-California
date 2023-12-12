document.addEventListener('DOMContentLoaded', function () {
    // Handle double click on an option in the "All Permissions" select
    document.getElementById('permissions').addEventListener('click', function (event) {
        if (event.target.tagName === 'OPTION') {
            setSelected(true);
            // Move the selected option to the "Selected Permissions" select
            document.getElementById('selectedPermissions').appendChild(event.target);
        }
    });

    // Handle double click on an option in the "Selected Permissions" select
    document.getElementById('selectedPermissions').addEventListener('click', function (event) {
        if (event.target.tagName === 'OPTION') {
            setSelected(true);
            // Move the selected option back to the "All Permissions" select
            document.getElementById('permissions').appendChild(event.target);
        }
    });
});
let selectedPermissions = document.getElementById('selectedPermissions');
function setSelected(bool) {
    let options = selectedPermissions.querySelectorAll('option');

    for (let i = 0; i < options.length; i++)
        options[i].selected = bool;
}

document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('.forms-sample');

    form.addEventListener('submit', function () {
        var selectedPermissionsSelect = document.getElementById('selectedPermissions');

        // Mark all options as selected
        for (var i = 0; i < selectedPermissionsSelect.options.length; i++) {
            selectedPermissionsSelect.options[i].selected = true;
        }
    });
});