function handleVote(buttonId) {
    let votebuttons = document.querySelectorAll('.b');
    let blinkButtons = document.querySelectorAll('.blink');
    for (let i = 0; i < votebuttons.length; i++) {
        if (votebuttons[i].id != buttonId) {
            votebuttons[i].disabled = true;           
        } else {
            blinkButtons[i].style.backgroundColor = '#8CE44C';
            votebuttons[i].textContent = 'Voted';
        }
    }
}