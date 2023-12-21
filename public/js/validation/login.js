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
            this.ajaxLogin();
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
                if (fields[i].id === "Name/Email") {
                    this.error.innerHTML = "UserName or Email is required";
                    this.noErr = false;
                    break;
                }

                this.error.innerHTML = "Password is required";
                this.noErr = false;
            }
        }
    }

    ajaxLogin() {
        const formData = $(this.form).serialize();
        const self = this;

        $.ajax({
            url: "login",
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

const validator = new FormClass(document.getElementById("login-form"));

let form_holders = document.getElementsByClassName("form-holder");
for (let i = 0; i < form_holders.length; i++) {
    form_holders[i].addEventListener("click", () => {
        for (let j = 0; j < form_holders.length; j++)
            form_holders[j].classList.remove("active");
        form_holders[i].classList.add("active");
    });
}


