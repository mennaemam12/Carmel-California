function deleteUserType(id) {
    let form = document.createElement('form');
    form.method = 'POST';
    form.action = 'dashboard/users?action=deleteusertype';
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'id';
    input.value = id;
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
}