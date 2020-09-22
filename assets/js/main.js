function userCreated() {
    document.getElementById("linkModal").click();
}
nbDest = 0;
function selectDest(){
    sender = event.target;
    sender.classList.toggle('dest-selected');
    listClass = sender.classList;
    result = listClass.contains("dest-selected");
    if (result === true) {
        sender.name += "OK[]";
    } else {
        sender.name = "recipients";
    };
}
function newMessage() {
    document.getElementById('user-account').innerText = "Nouveau message";
    document.getElementById('user-account').classList.add("blink2");
}



