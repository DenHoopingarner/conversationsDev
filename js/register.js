window.addEventListener('load', () => {
  const form = document.getElementById('form');
  const username = document.getElementById('username');
  const email = document.getElementById('email');
  const password1 = document.getElementById('password');
  const password2 = document.getElementById('pw2');
  const errors = {
    username: 'Pleaser enter your name',
    email: 'Email address invalid',
    password: "That password isn't valid",
    pw2: "passwords don't match",
  };
  const cancelBtn = document.getElementById('cancelBtn');
  const submitBtn = document.getElementById('submitBtn');
  const wait = document.getElementById('wait');

  // Show input error message
  function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
    // small.innerText = errors[input.id];
  }
  //Show Success outline
  function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
  }

  // Validate Email
  function checkEmail(input) {
    emailOK = false;
    const re =
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //return re.test(String(email).toLowerCase());
    if (re.test(input.value.trim())) {
      showSuccess(input);
      emailOK = true;
    } else {
      showError(input, 'email appears to be invalid');
    }
  }

  //Check for length of string
  function checkLength(input, min, max) {
    if (input.value.length < min) {
      showError(
        input,
        `${getFieldName(input)} must be at least ${min} characters`
      );
    } else if (input.value.length > max) {
      showError(
        input,
        `${getFieldName(input)} can't be more than ${max} characters`
      );
    } else {
      showSuccess(input);
      if (input === 'username') nameOK = true;
    }
  }

  function checkPasswordsMatch(input1, input2) {
    pwOK = false;
    if (input1.value !== input2.value) {
      showError(input2, "Passwords don't match");
    } else {
      pwOK = true;
    }
    return pwOK;
  }

  function checkRequired(inputArr) {
    inputArr.forEach(function (input) {
      if (input.value.trim() === '') {
        //showError(input, '`${getFieldName(input)} error here`')
        showError(input, 'ng');
      } else {
        showSuccess(input);
      }
    });
  }

  function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
  }

  function checkReadyToSubmit() {
    let OK = true;
    const myEls = [username, email, password1, password2];
    myEls.forEach(function (el) {
      if (el.parentElement.classList.contains('success') == false) {
        OK = false;
      }
    });
    if (OK == true) {
      // submit the form
      doRegister();
    }
  }

  async function doRegister() {
    // console.log(`${username.value}, ${email.value}, ${password1.value}`)

    // show the wait screen
    wait.style.display = 'block';
    //

    var data = new FormData();
    data.append('fullname', username.value);
    data.append('email', email.value);
    data.append('password', password1.value);

    const q = await fetch('/util/doRegister.php', {
      method: 'post',
      body: data,
    });
    const myres = await q.json();
    // console.log(myres.msg);
    if (myres.res == 'success') {
      // user ID
      // console.log(myres.userID);
      // document.location.href = 'verifyRegister.php';
      document.location.href = '/account/account/registerComplete';
    } else {
      wait.style.display = 'none';
      if (myres.res == 'errEmail') {
        showError(email, myres.msg);
      }
      if (myres.res == 'errEmailSend') {
        console.log('can not send the email');
      }
    }
  }

  //Event Listeners
  /*     
     form.addEventListener('submit', function(e){
          e.preventDefault();
          checkRequired([username, email, password, pw2]);
          checkLength(username, 3, 255);
          checkLength(password, 6, 255);
          checkEmail(email);
          checkPasswordsMatch(password, pw2)
          checkReadyToSubmit();
     });

     cancelBtn.addEventListener('click', ()=>{
          document.location.href='./'
     })
     */

  //Event Listeners
  submitBtn.addEventListener('click', () => {
    if (checkPasswordsMatch(password1, password2) == true) {
      checkRequired([username, email, password1, password2]);
      checkEmail(email);
      checkReadyToSubmit();
    }
  });

  cancelBtn.addEventListener('click', () => {
    // console.log('cancel')
    document.location.href = '../../';
  });
});
