class FormClass {
  constructor(form) {
    this.form = form;
    this.noErr = true;
    this.error = document.createElement("div");
  }
  initialize() {
    console.log("Logging in user JS");
    this.validateFields();
    if (!this.noErr) {
      this.error.classList.add("form-message", "form-message-red");
      document.getElementById("form-message-div").appendChild(this.error);
    } else {
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
      fields[i].value = fields[i].value.trim();
      if (fields[i].value === "") {
        if (fields[i].id == "Email") this.error.innerHTML = "Email is required";
        else if (fields[i].id == "Password")
          this.error.innerHTML = "Password is required";
        this.noErr = false;
      } else {
        switch (fields[i].id) {
          case "Password":
          // if (fields[i].value.length < 8) {
          //   this.error.innerHTML =
          //     fields[i].id + " must be more than 8 characters";
          //   this.noErr = false;
          // }
          // break;
          case "Email":
            let mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (!fields[0].value.match(mailformat)) {
              this.error.innerHTML = "Invalid Email";
              this.noErr = false;
            }
            break;
        }
      }
    }
  }
}

const validator = new FormClass(document.getElementById("login-form"));
