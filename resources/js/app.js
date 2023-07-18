import './bootstrap';
// import {createApp} from 'vue';
// import App from './App.vue';
// const message_el = document.getElementById('messages');
// const username_input = document.getElementById('username');
// const message_input = document.getElementById('message_input');
// const message_from = document.getElementById('message_form');
// message_from.addEventListener('submit', function(e) {
//     e.preventDefault();

//     let has_error = false;
//     if (username_input.value == "") {
//         alert('enter');
//         has_error = true;
//     }
//     if (message_input.value == "") {
//         alert('enter');
//         has_error = true;
//     }
//     if (has_error) {
//         return;
//     }
//     const options = {
//         method: 'post',
//         url: '/send-message',
//         data: {
//             username: username_input.value,
//             message: message_input.value,
//         }
//     }
//     message_input.value = "";
//     axios(options);
// });
// window.Echo.channel('messages.1')
//     .listen('message', (e) => {
//         console.log( e.message );
//         message_el.innerHTML += '<div class="message"><strong>'+ ':</strong> ' + e.message + '</div>';
//         // message_el.innerHTML += '<div class="message"><strong>' + e.user + ':</strong> ' + e.message + '</div>';

//     }).notification((notification)=>{
//         console.log(notification.type);
//     });


// window.Echo.channel('chat').listen('.message', function(data) {
//   alert(JSON.stringify(data));
// });
window.Echo.channel("chat").listen(".message",(event)=>{

    console.log(event);
});


// createApp(App).mount("#app");
