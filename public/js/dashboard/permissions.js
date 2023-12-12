document.addEventListener('DOMContentLoaded', function () {
    // Handle double click on an option in the "All Permissions" select
    document.getElementById('permissions').addEventListener('click', function (event) {
        if (event.target.tagName === 'OPTION') {
            // Move the selected option to the "Selected Permissions" select
            document.getElementById('selectedPermissions').appendChild(event.target);
        }
    });

    // Handle double click on an option in the "Selected Permissions" select
    document.getElementById('selectedPermissions').addEventListener('click', function (event) {
        if (event.target.tagName === 'OPTION') {
            // Move the selected option back to the "All Permissions" select
            document.getElementById('permissions').appendChild(event.target);
        }
    });
});