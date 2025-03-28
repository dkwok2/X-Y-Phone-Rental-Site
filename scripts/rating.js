// Scrpt file for rateus.html
// Includes a star evaluation and a check completion method
var stars = document.querySelectorAll(".rating i");
var commentBox = document.getElementById("comment");
var emailInput = document.getElementById("email");
var nameInput = document.getElementById("name");
var form = document.querySelector(".eval-form");
let ratingValue = 0;

// Function to count stars inputted by users
function countstars(){
    for (let i = 0; i < stars.length; i++) {
        // Create a function clickstars where the user clicks the star image
        stars[i].onclick = function clickstars() {
            ratingValue = i + 1;
            updateStars(ratingValue);
        };
    }
}

// Function to color stars based on the input
function updateStars(rating) {
    for (let i = 0; i < stars.length; i++) {
        if (i < rating) {
            stars[i].style.color = "#002266";
        } else {
            stars[i].style.color = "#ccc";
        }
    }
}

function verifyCompletion(input){
    // Check to see if contents are empty
    if (nameInput.value.trim() == "" || emailInput.value.trim() == ""|| ratingValue === 0) {
        alert("Please fill in all fields and select a rating.");
        return;
    }
}

function sendCompletion(){
    let totalWords = commentBox.value.trim().split(/\s+/).length
    alert(`Thank you for ${totalWords} words of feedback!`);
}

function resetValues(){
    nameInput.value = "";
    emailInput.value = "";
    commentBox.value = "";
    ratingValue = 0;
    updateStars(ratingValue);
}


// Javascipt main method

countstars();

form.addEventListener("submit", function(event){
    verifyCompletion();
    sendCompletion();
    resetValues();
});