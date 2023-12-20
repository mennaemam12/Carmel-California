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

function addToOrder(item, category, max, price) {
    var summary = document.getElementById(category + 'choices');
    var totalfield = document.getElementById('total');
    if (order['base'] === "" && category !== 'base') {
        document.getElementById('baseerror').innerHTML = "Choose a base first";
        return;
    }

    document.getElementById('baseerror').innerHTML = "";
    if (max == 1) {
        order[category] = `${item}`;
        summary.innerHTML = `${item}`;
    } else if (order[category] === '') {
        order[category] = `${item}`;
        summary.innerHTML = `${item}`;
    } else if (!order[category].includes(item)) {
        var items = order[category].split(',');
        if (items.length < max) {
            order[category] += `,${item}`;
            summary.innerHTML += `,${item}`;
        }
    }

    getSaladTotal(order);
}

function removeFromOrder(item, category, max, price) {
    var summary = document.getElementById(category + 'choices');
    var totalfield = document.getElementById('total');
    var total = parseInt(totalfield.innerHTML);
    if (max == 1) {
        order[category] = '';
        summary.innerHTML = '';
    } else if (max != 1 && !order[category].includes(',')) {
        var text = order[category];
        text = text.replace(`${item}`, '');
        order[category] = text;
        summary.innerHTML = text;
    } else {
        var text = order[category];
        text = text.replace(`,${item}`, '');
        console.log(text);
        order[category] = text;
        summary.innerHTML = text;
    }
    getSaladTotal(order);
}