function deleteItem(itemType, itemID) {
    let form = document.createElement('form');
    form.method = 'post';
    form.action = 'dashboard/deleteitem';
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'type';
    input.value = itemType;
    let input2 = document.createElement('input');
    input2.type = 'hidden';
    input2.name = 'id';
    input2.value = itemID;
    form.appendChild(input);
    form.appendChild(input2);
    document.body.appendChild(form);
    form.submit();
}