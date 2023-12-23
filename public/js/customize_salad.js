function restriction(input, type, max) {
    document.getElementById(type + 'serror').innerHTML = "";
    var inputs = document.querySelectorAll("input[type='number'][id*=" + type + "]");
    var chosen = Array.from(inputs).filter(function (input) {
        return input.value > 0;
    })
    if (chosen.length > max) {
        document.getElementById(type + 'serror').innerHTML = `You can only choose up to ${max} ${type}s`;
        document.getElementById(type + 'serror').style.display = 'block';
        input.value = 0;
    }
}

var order = {
    base: '',
    topping: '',
    protein: '',
    dressing: '',
}

function updateOrder(id, icon) {

    if (icon.classList.contains('icon-plus'))
        addToOrderAjax(id, icon);

    else
        removeFromOrderAjax(id, icon);
}

function addToOrderAjax(id, icon) {
    $.ajax({
        url: "menu?action=getsaladiteminfo",
        method: "POST",
        contentType: 'application/json',
        data: JSON.stringify(id),
        success: function (response) {
            if (!response.includes('error')) {
                try {
                    let item = JSON.parse(response);
                    __addToOrder(item, icon);
                } catch (e) {
                    console.error("Error caught:", e);
                }
            } else {
                console.error("Error with the request. Status code:", xhr.status);
            }
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error("Error with the request. Status code:", xhr.status);
        }
    });
}

function __addToOrder(item, icon) {

    let chosenItems = document.querySelector("#" + item.category + " .category-name .chosen-item ul");
    let priceField = document.querySelector("#" + item.category + " .category-total-field");
    let currentPrice = parseInt(priceField.innerHTML);
    let errorField = document.querySelector('.error-msg');

    let chosenItem = document.createElement('li');

    if (order[item.category].includes(item.name)) {
        errorField.innerHTML = "You already chose this item";
        return;
    }

    let items = order[item.category].split(',');
    if (items.length >= item.max && item.max !== 1) {
        errorField.innerHTML = "You can only choose up to " + item.max + " " + item.category + "s";
        return;
    }

    if (order['base'] === "" && item.category !== 'base') {
        document.querySelector('.error-msg').innerHTML = "Choose a base first";
        return;
    }

    if (item.max === 1) {
        order[item.category] = `${item.name}`;
        chosenItems.innerHTML = "";
        priceField.innerHTML = item.price;
    }
    else if (order[item.category] === '') {
        order[item.category] = `${item.name}`;
        chosenItem.innerHTML = item.name;
        priceField.innerHTML = currentPrice + item.price;
    }
    else {
        order[item.category] += `,${item.name}`;
        priceField.innerHTML = currentPrice + item.price;
    }

    if (item.max === 1) {
        let categoryIcons = document.querySelectorAll(`#${item.category}-ingredients .icon`);
        categoryIcons.forEach(function (iconn) {
            iconn.classList.remove('icon-minus');
            iconn.classList.add('icon-plus');
        })
    }
    else {
        icon.classList.remove('icon-plus');
        icon.classList.add('icon-minus');
    }

    chosenItem.innerHTML = item.name;
    chosenItems.appendChild(chosenItem);
    getSaladTotal(order);
}

function removeFromOrderAjax(id, icon) {
    $.ajax({
        url: "menu?action=getsaladiteminfo",
        method: "POST",
        contentType: 'application/json',
        data: JSON.stringify(id),
        success: function (response) {
            if (!response.includes('error')) {
                try {
                    let item = JSON.parse(response);
                    __removeFromOrder(item, icon);
                } catch (e) {
                    console.error("Error caught:", e);
                }
            } else {
                console.error("Error with the request. Status code:", xhr.status);
            }
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error("Error with the request. Status code:", xhr.status);
        }
    });

}
function __removeFromOrder(item, icon) {
    let chosenItems = document.querySelector("#" + item.category + " .category-name .chosen-item ul");
    let priceField = document.querySelector("#" + item.category + " .category-total-field");
    let currentPrice = parseInt(priceField.innerHTML);

    if (item.max === 1)
        return;

    if (!order[item.category].includes(item.name) || order[item.category] === '') {
        icon.classList.remove('icon-minus');
        icon.classList.add('icon-plus');
        return;
    }

    if (order[item.category] === item.name) {
        order[item.category] = '';
        chosenItems.innerHTML = "";
    }
    else {
        let text = order[item.category];
        text = text.replace(`,${item.name}`, '');
        order[item.category] = text;
        let items = text.split(',');
        chosenItems.innerHTML = "";
        items.forEach(function (item) {
            let chosenItem = document.createElement('li');
            chosenItem.innerHTML = item;
            chosenItems.appendChild(chosenItem);
        })
    }

    priceField.innerHTML = currentPrice - item.price;
    icon.classList.remove('icon-minus');
    icon.classList.add('icon-plus');

    getSaladTotal(order);
}

function getSaladTotal(order) {
    // Use the $.ajax function
    $.ajax({
        url: "menu?action=getsaladtotal",
        method: "POST",
        contentType: 'application/json',
        data: JSON.stringify(order),
        success: function (response) {
            document.querySelector(".total-field").innerHTML = response;
            document.querySelector('.error-msg').innerHTML = "";
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error("Error with the request. Status code:", xhr.status);
        }
    });
}
let categoryIngredients = document.querySelectorAll('.ingredient-options');
document.addEventListener('DOMContentLoaded', function () {
    let categoryHeadings = document.querySelectorAll('.category-heading');
    for (let i = 0; i < categoryHeadings.length; i++) {
        categoryIngredients[i].style.maxHeight = '0px';
        categoryHeadings[i].addEventListener('click', function () {
            toggleSaladCategory(categoryIngredients[i]);
        })
    }

});

function toggleSaladCategory(div) {
    for (let i = 0; i < categoryIngredients.length; i++)
        if (categoryIngredients[i] !== div)
            categoryIngredients[i].style.maxHeight = '0px';

    if (div.style.maxHeight === '1000px')
        div.style.maxHeight = '0px';
    else
        div.style.maxHeight = '1000px';
}