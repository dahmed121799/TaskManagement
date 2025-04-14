
const form = document.getElementById('loginForm');

form.addEventListener('submit', function(e) {
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  if (!email || !email.includes('@')) {
    alert("Please enter a valid email address.");
    e.preventDefault();
    return;
  }

  if (!password || password.length < 6) {
    alert("Password must be at least 6 characters long.");
    e.preventDefault();
    return;
  }
});
