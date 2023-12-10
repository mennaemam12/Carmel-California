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
        this.error.innerHTML = "Please fill all the fields";
        this.noErr = false;
      } else {
        // if doesnt match with confirm pass
        if (fields[4].value.length < 8) {
          this.error.innerHTML =
            fields[4].placeholder + " must be more than 8 characters";
          this.noErr = false;
          return;
        }
        if (fields[4].value !== fields[5].value) {
          this.error.innerHTML = "Passwords do not match";
          this.noErr = false;
          return;
        }
        let mailformat =
          /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (!fields[2].value.match(mailformat)) {
          this.error.innerHTML = "Invalid Email";
          this.noErr = false;
        }
      }
    }
  }
}

const validator = new FormClass(document.getElementById("signup-form"));
