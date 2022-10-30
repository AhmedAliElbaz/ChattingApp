const form = document.querySelector('.typing-area'),
inputField = form.querySelector('.input-field'),
sendBtn = form.querySelector('button'),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); // To prevent The Form , From submitting refresh

} 

// Next two functions to check if the user got the mouse on the chatbox to scroll it Up, 
// will stop auto Going To Bottom Function , As it give a class {.active}  To ChatBox
// that the function that make the chat go to the bottom Auto detect this class
// then it stops the scrolling until this class is removed when the user "remove the mouse out of the chatbox" that means he won't scroll ,
// so it will remove the class , when the Auto Scroll function Detects it it will work again.....

chatBox.onmouseenter = () => {
    chatBox.classList.add(".active")
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove(".active")
}



sendBtn.onclick = () => {
     // Now Starting Request

     let xhr = new XMLHttpRequest(); // this is XML obj
     // next handle the requste
     xhr.open("POST" , "php/insert-chat.php", true);
 
 
     xhr.onload = () => {
         // Next code will check if the requste loaded then after checking will check the statue of the Request if it's 200 that means it's all good
         if(xhr.readyState === XMLHttpRequest.DONE) {
             if (xhr.status === 200) {
                 // Next Here if We reached this condtion and passed it it means that the requests is working and the ,messgaes will be sent 
                 inputField.value = "";
                 if (!chatBox.classList.contains(".active")) {
                    // if the class (.active) is added to the Class List Of The ChatBox As A custom Class to control the function of (auto scrolling to down) 
                    // If the Mouse Is On the ChatBox It will Get the Class {.active} Added , but if mouse left the Chat Box , it will Auto Scroll to the down
                    scrollToBottom()
                }
             }
         }
         
 
     }
 
     let formData = new FormData(form); // creating new formData Obj
     xhr.send(formData); // this line is sending the Form data to php file
}





// Next very important code .... This code will Send Ajax Request to the dataBase to Make the user Able to send messages , then
// this messgaes will be stored in the dataBase
// then By Ajax it will make a setInterval , that will Generate The sent Masseages from Two Sides (the Sender - the receiver) from the dataBase Dirctly To The Chat Page


setInterval(()=>{
    // Now The GET Starting Request


    let xhr = new XMLHttpRequest(); // this is XML obj

    xhr.open("POST" , "php/get-chat.php", true); // this code could Look the Same As One In Login.js /signup.js , But Actually This code Is Only GET , so it's not sending anything to the dataBase it's just Getting the Data from it


    xhr.onload = () => {
        // Next code will check if the requste loaded then after checking will check the statue of the Request if it's 200 that means it's all good
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response; // here after checking storing the Request data in varaible called data
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains(".active")) {
                    // if the class (.active) is added to the Class List Of The ChatBox As A custom Class to control the function of (auto scrolling to down) 
                    // If the Mouse Is On the ChatBox It will Get the Class {.active} Added , but if mouse left the Chat Box , it will Auto Scroll to the down
                    scrollToBottom()
                }

                
            }
        }
        

    }
    let formData = new FormData(form); // creating new formData Obj
    xhr.send(formData); // this line is sending the Form data to php file
},500);


function scrollToBottom() {
    console.log("function is being exetuted");
    chatBox.scrollTop = chatBox.scrollHeight;
    chatBox.scroll
}