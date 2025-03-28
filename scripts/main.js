// Base html file for index.html
// Contains a typing animation
const getTitle = document.getElementById("title-text");
const getSubtitle = document.getElementById("subtitle-text");
const getRatingTitle = document.getElementById("rate-title");
// callback = call another animation afterwards to prevent two typing animations to occur simultaneously
function createTypingAnimation(tag, content, delay=100, callback=null){
    let i=0;
    // Encountered bug: remove tag when getTitle does not exist
    if (!tag) return;

    //Clear text first
    tag.innerHTML = "";

    //Then add typing animation
    let interval = setInterval(()=>{
        if (i<=content.length){
            tag.innerHTML += content.charAt(i);
            i++;
        } else{
            // stop typing if it reaches the end
            clearInterval(interval);
            if (callback){
                setTimeout(callback, 100);
            }
        }
    }, delay)
}

// Create the typing animation for the main title first, then the subtitle afterwards
createTypingAnimation(getTitle, "Make Your Choice", 100, () => {createTypingAnimation(getSubtitle, "Find your new phone for an affordable price!", 50, null)});
createTypingAnimation(getRatingTitle, "Rate Our Service Here!", 100, null);