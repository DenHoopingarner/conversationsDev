window.addEventListener('load', ()=>{
     const form = document.getElementById('form');
     const email = document.getElementById('email');
     const password = document.getElementById('password');
     const errorMsg = document.getElementById('errorMsg');
     const errors = {email: "Email address invalid", password: "That password isn't valid"};
     // const cancelBtn = document.getElementById('cancelBtn');
     const submitBtn = document.getElementById('submitBtn');

     // Show input error message
     function showError(input, message){
          console.log(input)
          const formControl = input.parentElement;
          formControl.className = 'form-control error';
          const small = formControl.querySelector('small');
          small.innerText = message
          // small.innerText = errors[input.id];
     }
     //Show Success outline
     function showSuccess(input){
          const formControl = input.parentElement;
          formControl.className = 'form-control success';
     }

     // Validate Email
     function checkEmail(input){
          let emailOK = false;
          const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          //return re.test(String(email).toLowerCase());
          if(re.test(input.value.trim())){
               showSuccess(input);
               emailOK = true;
          } else {
               showError(input, 'email appears to be invalid');
          }
     }


     function checkRequired(inputArr){
          inputArr.forEach(function(input){
              if(input.value.trim() === ''){
                    //showError(input, '`${getFieldName(input)} error here`')
                    showError(input, 'please enter your account password.')
              } else {
                    showSuccess(input);
              }
          });
     }

     function getFieldName(input){
          return input.id.charAt(0).toUpperCase() + input.id.slice(1)
     }

     function checkReadyToSubmit(){
          let OK = true;
          const myEls = [email];
          myEls.forEach(function(el){
               if(el.parentElement.classList.contains('success') == false){
                    OK = false;
                    // console.log(el)
               }
          })
          if(OK == true){
               // submit the form
               doLogin();
          }
     }

     async function doLogin(){
          var data = new FormData();
          data.append('email', email.value);

          const q = await fetch('util/doForgotPW.php', {
               method: 'post',
               body: data,
          });
          const myres = await q.json();
          // console.log(myres.msg);
          if(myres.res == 'success'){
               // user ID
          } else {
               if(myres.res == 'errEmail') showError(email, myres.msg);
               if(myres.res == 'db error') showError(email, myres.msg);
               // console.log(myres.res);
          }
     }

     //Event Listeners
     submitBtn.addEventListener('click', ()=>{
          checkRequired([email]);
          checkEmail(email);
          checkReadyToSubmit();
     });
     

     // cancelBtn.addEventListener('click', ()=>{
     //      console.log('cancel')
     //      document.location.href='./'
     // })


})