class FormClass {
    constructor(form) {
        this.form = form;
        this.noErr = true;
        this.error = document.createElement("div");
    }

    initialize() {
        this.validateFields();
        if (!this.noErr) {
            $("#form-message-div").empty();
            document.getElementById("form-message-div").appendChild(this.error);
        }
        else
            this.ajaxRegister();
    }

    resetErrors() {
        this.error.innerHTML = "";
        this.noErr = true;
    }

    validateFields() {
        this.resetErrors();
        let fields = document.getElementsByClassName("form-control");
        for (let i = 0; i < fields.length; i++) {
            fields[i].value = fields[i].value.trim();
            if (fields[i].value === "") {
                this.error.innerHTML = "Please fill all the fields";
                this.noErr = false;
                return;
            }
        }
        for (let i = 0; i < fields.length; i++) {
            switch (fields[i].id) {
                case 'name':
                    if (!fields[i].value.match(/^[a-zA-Z\s]+$/)) {
                        this.error.innerHTML = "Name must contain only alphabets";
                        this.noErr = false;
                    }
                    break;
                case 'email':
                    let mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                    if (!fields[i].value.match(mailFormat)) {
                        this.error.innerHTML = "Email must contain only alphabets, numbers and @";
                        this.noErr = false;
                    }
                    break;
                case 'phoneNumber':
                    if (!fields[i].value.match(/^[0-9]+$/)) {
                        this.error.innerHTML = "Phone Number must contain only numbers";
                        this.noErr = false;
                    }
                    break;
                case 'password':
                    if (fields[i].value.length < 8) {
                        this.error.innerHTML = "Password must be more than 8 characters";
                        this.noErr = false;
                    }
                    break;
                case 'confirmPassword':
                    if (fields[i].value.length < 8) {
                        this.error.innerHTML = "Password must be more than 8 characters";
                        this.noErr = false;
                    }
                    if (fields[i].value !== fields[i - 1].value) {
                        this.error.innerHTML = "Passwords do not match";
                        this.noErr = false;
                    }
                    break;
            }
        }
    }

    ajaxRegister() {
        const formData = $(this.form).serialize();
        const self = this;

        $.ajax({
            url: "signup",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.msg === "success") {
                    window.location.href = "index";
                    return;
                }

                self.error = $('<div>').html(response.msg);
                $("#form-message-div").empty().append(self.error);
            },
            error: function (err) {
                console.log(err);
            },
        });
    }
}

const validator = new FormClass(document.getElementById("signup-form"));

let form_holders = document.getElementsByClassName("form-holder");
for (let i = 0; i < form_holders.length; i++) {
    form_holders[i].addEventListener("click", () => {
        for (let j = 0; j < form_holders.length; j++)
            form_holders[j].classList.remove("active");
        form_holders[i].classList.add("active");
    });
}
