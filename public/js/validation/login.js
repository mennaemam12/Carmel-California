class FormClass {
    constructor(form) {
        this.form = form;
        this.noErr = true;
        this.error = document.createElement("div");
    }

    initialize() {
        console.log("Logging in user JS");
        this.validateFields();
        if (!this.noErr)
            document.getElementById("form-message-div").appendChild(this.error);
        else {
            this.form.querySelector(".button").type = "submit";
            this.form.querySelector(".button").click();
        }
    }

    resetErrors() {
        this.error.innerHTML = "";
        this.noErr = true;
    }

    validateFields() {
        this.resetErrors();
        let fields = document.getElementsByClassName("form-control");
        for (let i = 0; i < fields.length; i++) {
            console.log(fields[i].id)
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
