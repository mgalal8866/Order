<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat APP</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div class="app">
        <header>
            <h1>Chat APP</h1>
            <input type="text" name="username" id="username" placeholder="User Name" value="ADMIN">
        </header>
        <div id="messages"></div>
        <form id="message_form">
            <input type="text" name="message" id="message_input" placeholder="Message">
            <button type="submit" id="message_send">Send</button>
        </form>
    </div>

<script>

  const message_el = document.getElementById('messages');
const username_input = document.getElementById('username');
const message_input = document.getElementById('message_input');
const message_from = document.getElementById('message_form');
message_from.addEventListener('submit',function(e){
e.preventDefault();

let has_error = false;
if(username_input.value == ""){
alert('enter');
has_error = true;
}
if(message_input.value == ""){
alert('enter');
has_error = true;
}
if(has_error){
return;
}
const options ={
method: 'post',
url: '/send-message',
data:{
username: username_input.value,
message: message_input.value,
}
}
axios(options);
});
window.Echo.channel('chat')
.listen('.message',(e)=>{
message_el.innerHTML += '<div class="message"><strong>'+ e.username +':</strong> ' + e.message + '</div>';
})
</script>
</body>

</html>
