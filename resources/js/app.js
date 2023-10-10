require('./bootstrap');

const form = document.getElementById('form');
const inputMessage = document.getElementById('input-message');
const listMessage = document.getElementById('list-messages');

console.log('list message',listMessage);
form.addEventListener('submit',function(event){
    event.preventDefault();
    const userInput = inputMessage.value;
    //console.log(userInput);

    axios.post('/chat-message',{
        message:userInput
    })
});

function getCookie(name){
    const value = `; ${document.cookie}`;
    console.log('getCookie',value);
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) {
        return parts.pop().split(';').shift();
    }
    console.log('getCookie',parts.pop().split(';').shift());
}

function request(url, options){
    // get cookie
    const csrfToken = getCookie('XSRF-TOKEN');
    return fetch(url, {
        headers: {
            'content-type': 'application/json',
            'accept': 'application/json',
            'X-XSRF-TOKEN': decodeURIComponent(csrfToken),
        },
        credentials: 'include',
        ...options,
    })
}

function logout(){
    return request('/logout', {
        method: 'POST'
    });
}

function login(){
    return request('/login', {
        method: "POST",
        body: JSON.stringify({
            email: 'winpapathu328014@gmail.com',
            password: 'password'
        })
    })
}

fetch('/sanctum/csrf-cookie', {
    headers: {
        'content-type': 'application/json',
        'accept': 'application/json'
    },
    credentials: 'include'
}).then(() => logout())
.then(() => {
    return login();
})
.then(() => {
const channel = Echo.private('private.chat.1');

channel.subscribed(()=>{
    console.log('subscribed');
})
/*.listen('.chat-message',(event)=>{
    console.log('event',event);
    const message = event.message;
    const user = event.user.name;
    const li = document.createElement('li');
    //li.textContent =  message;
    li.classList.add('d-flex', 'flex-col');
    console.log('li',li);
    const span = document.createElement('span')
    span.classList.add('message-author');
    span.textContent = user;
    console.log('span',span);
    const messageSpan = document.createElement('span');
    messageSpan.textContent = message;
    messageSpan.style.color = 'black';
    console.log('messageSpan',messageSpan);
    li.append(span, messageSpan);
    console.log('li2',li);
    
    listMessage?.append(li);
    console.log('listMessage',listMessage);

});
})*/
  .listen('.chat-message', (event) => {
            console.log('event',event);
            const message = event.message;
            const user = event.user.name;

            addChatMessage(user, message);
        });
})
function addChatMessage(name, message, color="black"){
     console.log('name',name);
     console.log('message',message);
    const li = document.createElement('li');

    li.classList.add('d-flex', 'flex-col');

    const span = document.createElement('span')
    span.classList.add('message-author');
    span.textContent = name;
    console.log('span',span);
    const messageSpan = document.createElement('span');
    messageSpan.textContent = message;

    messageSpan.style.color = color;

    li.append(span, messageSpan);
    console.log('li',li);
    listMessage?.append(li);
}
