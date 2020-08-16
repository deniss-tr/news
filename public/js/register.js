const login = document.querySelector('#login');
const validation = document.querySelector('.ajax-validation');
const btn = document.querySelector('#register-btn');

login.addEventListener('keyup', (e) => {
    
    let text = e.target.value;
    fetch(`/ajax`, {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify({text: text})
      })
      .then(result => result.json())
      .then(result => {
        if(result == true && text.length >= 3) {
            validation.style = 'color: red';
            validation.textContent = 'This Login name already exists';
            btn.disabled= true;
            btn.classList.add("disabled");
        } else if(result == false && text.length >= 3) {
            validation.style = 'color: green';
            validation.textContent = 'Login name is free';
            btn.disabled= false;
            btn.classList.remove("disabled");
        } else {
            validation.textContent = '';
            btn.disabled= true;
            btn.classList.add("disabled");
        }
      })

});
