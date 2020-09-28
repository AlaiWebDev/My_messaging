$(document).ready(function() {
    $("#arrow-bot").click(function() {
        $('#user-liste').animate({
            scrollTop: $("#user-liste").offset().top
        }, 1000);
    });
    $("#arrow-top").click(function() {    
        $("#user-liste").animate({ scrollTop: 10 }, 1000);
    });
});
/*var salt = 'Hack THIS!';
var hashedPass = '99c0c3ea5c83f8608f488100a1f42e6478fdb2042d24dee0f1c997c75d65efad';
function loadpage() {
    if (SHA256(salt+document.passwort.pswd.value) !== hashedPass){
        document.location.href='passwort_falsch_en.html';
    } else {
        document.location.href='chirurgie/'+document.passwort.pswd.value+'.html';
    }
}*/
const text = 'An obscure body in the S-K System, your majesty. The inhabitants refer to it as the planet Earth.';

async function digestMessage(message) {
  const encoder = new TextEncoder();
  const data = encoder.encode(message);
  const hash = await crypto.subtle.digest('SHA-256', data);
  return hash;
}

const digestBuffer = await digestMessage(text);
console.log(digestBuffer.byteLength);
    