const createPasswordInput = document.querySelector('#createPassword');
const confirmPasswordInput = document.querySelector('#confirmPassword');
const registerForm = document.querySelector('#registerForm');
const passwordError = document.querySelector('#passwordError');

registerForm.addEventListener('submit', e => {
  const createPassword = createPasswordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  if (createPassword !== confirmPassword) {
    e.preventDefault();
    passwordError.style.display = 'block';
  }
});
