let optionsInput = document.querySelectorAll('.optionSelect');
let optionSelectElement = document.querySelectorAll('.optionSelect-element');
function addOptionForm(options) {
    // console.log(arr);

    let optionsValueInput = document.querySelectorAll('.optionValue');

    let optionFormContainer = document.querySelector('#add-options-form-conatiner');




    if (optionsInput.length === 0) {
        addOptions();
    } else {
        if (checkOptionsError() === false) {
            addOptions();
        }
    }

    function addOptions() {
        // console.log(1111);
        let addOptionForm = document.createElement("div");
        addOptionForm.classList.add('option-item')
        optionFormContainer.appendChild(addOptionForm);

        let selectOption = document.createElement('select');
        addOptionForm.appendChild(selectOption);
        selectOption.classList.add('form-control', 'optionSelect');

        let option = document.createElement("option");
        option.innerText = 'Параметр';
        option.setAttribute('selected', '');
        option.setAttribute('value', 0);

        option.classList.add('optionSelect-element');


        selectOption.appendChild(option);

        for (const optionId in options) {
            // console.log(optionId, options[optionId]);
            let option = document.createElement("option");
            option.innerText = options[optionId];
            option.setAttribute('value', optionId);
            option.classList.add('optionSelect-element');
            selectOption.appendChild(option);
        }

        let optionValue = document.createElement("input");
        optionValue.classList.add('optionValue');
        optionValue.setAttribute('placeholder', 'Значення');
        addOptionForm.appendChild(optionValue);
    }

    function checkOptionsError() {
        let isEmptyOptionField = false;
        let isEmptyOptionValueField = false;
        for (let i = 0; i < optionsInput.length; i++) {
            if (optionsInput[i].value == 0) {
                optionsInput[i].style.borderColor = "red";
                isEmptyOptionField = true;
            } else {
                optionsInput[i].style.borderColor = "#ced4da";
            }
        }
        for (let i = 0; i < optionsValueInput.length; i++) {
            if (optionsValueInput[i].value == '') {
                optionsValueInput[i].style.borderColor = "red";
                isEmptyOptionValueField = true;
            } else {
                optionsValueInput[i].style.borderColor = "#ced4da";
            }
        }

        if (isEmptyOptionField || isEmptyOptionValueField) {
            return true;
        } else {
            return false;
        }
    }
    optionsInput = document.querySelectorAll('.optionSelect');
    optionSelectElement = document.querySelectorAll('.optionSelect-element');
    // addListenersForOptionSelect(optionSelectElement);
    for (let i = 0; i < optionSelectElement.length; i++) {
        console.log(optionSelectElement[i]);
        optionSelectElement[i].onclick = function () {
            console.log(123);
        }
        // console.log(optionSelectElement[i].onclick);
    }
}



function getOptionsValues() {
    let optionInputs = document.querySelectorAll('.optionSelect');
    let getOptionsValues = [];
    for (let i = 0; i < optionInputs.length; i++) {
        getOptionsValues.push(optionInputs[i].value);
    }
    return getOptionsValues;
}

function chekOptionsDublicat(option, options) {
    for (let i = 0; i < options.langth; i++) {
        if (option === options[i]) {
            return true;
        } else {
            return false;
        }
    }
}


function addListenersForOptionSelect(optionSelectElement) {
    for (let i = 0; i < optionSelectElement.length; i++) {
        optionSelectElement[i].onclick = function () {
            console.log(1);
        };
        // console.log(optionSelectElement[i]);
    };
    // console.log(optionSelectElement);
}


