function userCreated() {
  document.getElementById("linkModal").click();
}
nbDest = 0;
function selectDest() {
  sender = event.target;
    sender.classList.toggle("dest-selected");
    listClass = sender.classList;
    result = listClass.contains("dest-selected");
    if (result === true) {
      sender.name += "OK[]";
    } else {
      sender.name = "recipients";
    };
  }
function newMessage() {
  document.getElementById("user-account").innerText = "Nouveau message";
  document.getElementById("user-account").classList.add("blink2");
}
function digestMessage(message) {
  const encoder = new TextEncoder();
  const data = encoder.encode(message);
  createpwdCookie(data);
  return data;
}
function createpwdCookie(data) {
  document.cookie = 'motdepasse=' + data + '; path=/; max-age=3600';
}
function showForm() {
  document.getElementById('pwdconfirm').classList.replace('none', 'flex');
  /*event = event || window.event;
  e.preventDefault();*/
  return false;
}
function promptDeleteUser() {
  let answer = prompt("Entrer votre mot de passe Administrateur pour confirmer la suppression du compte");
  const encoder2 = new TextEncoder();
  const data2 = encoder2.encode(answer);
  //const hash = crypto.subtle.digest('SHA-256', data);
  mycookie = getCookie('motdepasse');
  console.log(answer);

  /* Requete AJAX
  /*let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    console.log(this);
  }
  let data = new FormData();
  data.append('answer', answer);
  xhr.open('POST', './admin.php', true);
  xhr.send(data);*/
  console.log(mycookie);
  console.log(data2);
  return false;
}
  /*var promise = new Promise((resolve, reject) => {
    chrome.cookies.getAll({"url":"http://localhost"}, function (cookies) {
        var found = false;
        for(var i = 0; i < cookies.length; i++){
            var name = cookies[i].name
            // console.log(name)
            if (name === 'motdepasse') {
                console.log(name) // line 13
                cookiepwd = cookies[i].value
              found = true;
            }
        }
        if (found) resolve("Cookies Found");
        else reject("no cookies found");
    });
  })
}*/

function getCookie(cname){                                                                      
  var name = cname + "=";                                                         
  var carray = document.cookie.split(";");                                        
  for(var j = 0; j < carray.length; j++){                                            
          var cookie = carray[j];                                                 
          while(cookie.charAt(0) === " "){                                           
              cookie = cookie.substring(1);                                       
          }
          if (cookie.indexOf(name) === 0){                                         
              return mycookie = cookie.substring(name.length,cookie.length); //returns the value of the cookie, in my case it is always "solved"
          }
  }
  return "";  //if there is no cookie with the given name, it returns an empty string                                                                 
}
