class FormClass {
    constructor(form) {
        this.form = form;
        this.noErr = true;
        this.error = document.createElement("div");
    }

    initialize() {
        this.validateFields();
        if (!this.noErr) {
            this.error.classList.add("form-message", "form-message-red");
            document.getElementById("form-message-div").appendChild(this.error);
        } else {
            let input = document.createElement("input");
            input.type = "hidden";
            input.name = "review-message";
            input.value = document.getElementsByClassName("review-form-input")[0].value;
            document.getElementById('review-form').appendChild(input);
            document.getElementById('addReview').type = "submit";
            document.getElementById('addReview').click();
        }
    }

    resetErrors() {
        this.error.innerHTML = "";
        this.noErr = true;
    }

    validateFields() {
        this.resetErrors();
        let fields = document.getElementsByClassName("review-form-input");
        for (let i = 0; i < fields.length; i++) {
            fields[i].value = fields[i].value.trim();
            if (fields[i].value === "") {
                this.error.innerHTML = "Review cannot be empty"
                this.noErr = false;
                break;
            }
        }
    }
}

const validator = new FormClass(document.getElementById("review-form"));
