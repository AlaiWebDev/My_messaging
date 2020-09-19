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

/*function scroll(arrowclic) {
    const el = document.querySelector('.user-list');
    let arrow = arrowclic.target.id;
    switch (arrow) {
        case "arrow-top":
            el.scroll(0, -20);
            break;
        case "arrow-bot":
            el.scroll(0, 20);
            break;
    }
}*/
/*function myAjax() {
    $.ajax({
         type: "POST",
         url: './ajax.php',
         data:{action:'call_this'},
         success:function(html) {
           alert(html);
         }

    });
}*/


