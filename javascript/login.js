const form = document.querySelector(".login form"); // Getting the form inside a vaiable to get datafrom it
const continueBtn = form.querySelector(".submitB input"); // Getting btn
const errorText = form.querySelector(".error-txt"); //  Access The Error Message To Contorl

// Now the Login code

form.onsubmit = (e) => {
    e.preventDefault(); // To prevent The Form , From submitting refresh

}

continueBtn.onclick = () => {

    // Now Starting Request

    let xhr = new XMLHttpRequest(); // this is XML obj
    // next handle the requste
    xhr.open("POST" , "php/login.php", true);


    xhr.onload = () => {
        // Next code will check if the requste loaded then after checking will check the statue of the Request if it's 200 that means it's all good
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response; // here after checking storing the Request data in varaible called data
                if(data == "success") {
                    location.href = ("users.php")
                }else {
                    // so here if the data coming from Php Is !== Success It will display :block; (MAKE ERROR MESSAGE APPEAR , with the error in it)
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
        

    }

    // Now The Next step is sending the data from the Login Page Form to {login.php} to PHP DataBase to Check if this account is already signed or Not
    let formData = new FormData(form); // creating new formData Obj
    xhr.send(formData); // this line is sending the Form data to php file




    
}

