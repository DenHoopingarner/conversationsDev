window.addEventListener('load', ()=>{
     const loginBox = document.getElementById('loginBox');
     const registerBox = document.getElementById('registerBox');


     loginBox.addEventListener('click', ()=>{
          window.location.href = 'login.php';
     })
     registerBox.addEventListener('click', ()=>{
          window.location.href = 'register.php';
     })
})