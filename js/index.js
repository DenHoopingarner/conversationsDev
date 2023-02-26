window.addEventListener('load', () => {
  const loginBox = document.getElementById('loginBox');
  const registerBox = document.getElementById('registerBox');

  loginBox.addEventListener('click', () => {
    window.location.href = 'account/account/login';
  });
  registerBox.addEventListener('click', () => {
    window.location.href = 'account/account/register';
  });
});
