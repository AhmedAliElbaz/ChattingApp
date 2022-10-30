
// First Access the Password Input and Store it in Variable 
const passwordField = document.querySelector(".formHolder .field input[type='password']")
// Access the Hiding - showing Password Icon 
const toggleBtn = document.querySelector(".formHolder .field i")

// Next Create A function onClick to hide and show password
toggleBtn.onclick = ()=> {
    if (passwordField.value.length !== 0) {
        if (passwordField.type == "password") {
            passwordField.type = "text"
            toggleBtn.classList.add("active") // Here to activate the style

        } else {
            passwordField.type = "password"
            toggleBtn.classList.remove("active") // Here to remove activation style of the button

        }
    }

}


