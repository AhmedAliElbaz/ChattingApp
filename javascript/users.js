// This code it for Users Search to find Any users In chat With Search 

const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
UsersList = document.querySelector(".users .users-list");




searchBtn.onclick = ()=> {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");

    // code below prevent The Input From Keeping the Value after searching... And the one below it to remove the custom class {activeSearch} to make setInterval Work Again
    searchBar.classList.remove("activeSearch");
    searchBar.value = "";

    console.log("shoud be exeuted");


    
}

// Here will Make The Search Bar to find Users Work
searchBar.onkeyup = () => {

    let searchTerm = searchBar.value;

    // What Next ,  will check if the user is searching or not , because if the user is searching , 
    // i will stop the setInterval Down There , To Make Everything clean  , 
    // it's not good to use Two Ajax Requests At The Same Time on the same element which's the {searchBar}
    // So will add/remove (activeSearch) class for the {searchBar} in css , 
    // and that when the class {activeSearch is Added} To {searchBar}
    // the setInterval will detect That the {.activeSearch} is added to the class of {searchBar} so it will stop the Ajax Requeste Until The Added class (.activeSearch) is removed 
    // by stoping search .... ,it  will remove the (.activeSearch class)
    
    if (searchTerm != "" || searchTerm != " ") {
        searchBar.classList.add("activeSearch");
    } else {
        searchBar.classList.remove("activeSearch");
    }
    


    // Next will make a Php Page to make The Search Bar Select The Wanted Users When Search
    let xhr = new XMLHttpRequest(); // this is XML obj

    xhr.open("POST" , "php/search.php", true); // this code could Look the Same As One In Login.js /signup.js , But Actually This code Is Only GET , so it's not sending anything to the dataBase it's just Getting the Data from it


    xhr.onload = () => {
        // Next code will check if the requste loaded then after checking will check the statue of the Request if it's 200 that means it's all good
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                UsersList.innerHTML = data;

            }
        }
        

    }
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // This Is to Encode The Data
    xhr.send("searchTerm="+ searchTerm); // Here sending the input Of The User In The Search Bar To The search.php file to hide the Users That Thier name don't include the Name The User Searched

}




// This code  Is to GET The Users List from The DataBase Then Send It To HTML code inside {users.php} file , but not the one that in php folder , the global One That contains HTML CODE



setInterval(()=>{
    // Now The GET Starting Request


    let xhr = new XMLHttpRequest(); // this is XML obj

    xhr.open("GET" , "php/users.php", true); // this code could Look the Same As One In Login.js /signup.js , But Actually This code Is Only GET , so it's not sending anything to the dataBase it's just Getting the Data from it


    xhr.onload = () => {
        // Next code will check if the requste loaded then after checking will check the statue of the Request if it's 200 that means it's all good
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response; // here after checking storing the Request data in varaible called data
                
                if (!searchBar.classList.contains("activeSearch")) {

                    // Finally Here Will Set UsersList = Data , which's The HTML data but edited With Php to insert All Users Data In it
                    UsersList.innerHTML = data;
                }
            }
        }
        

    }

    xhr.send();
},500);






