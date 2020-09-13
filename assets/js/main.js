function userCreated() {
    document.getElementById("linkModal").click();
}
function selectDest(){
    sender = event.target;
    sender.classList.toggle('dest-selected');
    listClass = sender.classList;
    result = listClass.contains("'dest-selected");
    sender.name += "OK[]";
}
