<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Document</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500;600&family=Sarabun:ital,wght@0,100;0,200;0,300;1,200&display=swap');

/* Reset some default styles */
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

/* Styles for the container */
.container {
    height: 100vh;
    width: 100%;
}

.menu {
    display: flex;
    width: 100%;
    height: 100vh;
}

/* Styles for the left side menu */
.menu-left {
    width: 50%;
    background: #1E7EEA;
    padding: 20px;
    padding-top: 60px
}

.logo {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 0.5rem;
}

.logo img {
    width: 200px;
    flex-shrink: 0;
}

.menu-content {
    gap: 14px;
}

.menu-content h1 {
    color: #FFF;
    font-family: 'Poppins', sans-serif;
    font-size: 22px;
    font-weight: 500;
    text-align: center;
    margin-bottom: 0.5rem;
}

.menu-content p {
    color: #FFF;
    padding-bottom: 25px;
    text-align: center;
    font-family: 'Sarabun', sans-serif;
    font-size: 15px;
    font-weight: 500;
    line-height: 170%;
    width: 420px;
    text-align: center;
    margin: auto;
}

.form-input {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 2rem;
}

.input-container {
    position: relative;
}

.icon {
    position: absolute;
    top: 50%;
    left: 30px;
    transform: translateY(-50%);
    color: #FFF;
    opacity: 0.9;
}

input[type="text"],
input[type="password"] {
    background: transparent;
    width: 400px;
    height: 50px;
    flex-shrink: 0;
    border-radius: 32px;
    border: 2px solid #FFF;
    color: #FFF;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 170%;
    opacity: 0.6;
    padding-left: 50px;
}

input::placeholder {
    color: whitesmoke;
}

.icon {
    width: 21px;
    height: 21px;
}

.show-password-icon {
    position: absolute;
    right: 10px;
    top: 20px;
    color: white;
    opacity: 0.8;
}

.btn {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 0.5rem;
}

.btn button {
    width: 400px;
    height: 50px;
    flex-shrink: 0;
    border-radius: 32px;
    background: #ffffff;
    color: #020202;
    margin-top: 16px;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 17px;
    font-weight: 600;
    line-height: 170%;
    border: 1px solid rgb(6, 61, 133);
}

.btn button:hover {
    transition: all ease 0.3s;
    background-color: #e8f8ff;
}

.query {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.query p {
    color: #3a3737;
    text-align: center;
    font-family: 'Sarabun', sans-serif;
    font-size: 14px;
    font-weight: 500;
    line-height: 170%;
}

.query p span {
    color: #FFF;
    font-family: 'Sarabun', sans-serif;
    font-size: 17px;
    font-weight: 600;
    line-height: 170%;
}

.text {
    margin-top: 0.5rem;
    text-align: center;
}

.text p {
    color: #FFF;
    text-align: center;
    font-family: 'Sarabun', sans-serif;
    font-size: 16px;
    font-weight: 500;
    line-height: 170%;
}

.line {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}

.line p {
    width: 125px;
    height: 1px;
    background: #FFF;
}

.line h3 {
    color: #FFF;
    text-align: center;
    font-family: 'Sarabun', sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 170%;
}

/* Styles for the right side image */
.menu-right {
    background: #F8F8FF;
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.menu-right img {
   width: 100%;
    height: 100vh;
}

/* Responsive CSS (You can add your responsive styles here) */

/* Media queries for various screen sizes */
@media screen and (max-width: 900px) {
    /* Add your responsive styles for 900px and below here */
}

@media screen and (max-width: 700px) {
    /* Add your responsive styles for 700px and below here */
}

@media screen and (max-width: 500px) {
    /* Add your responsive styles for 500px and below here */
}

@media screen and (max-width: 400px) {
    /* Add your responsive styles for 400px and below here */
}

    </style>
  </head>
  <body>

    <div class="container">
      <div class="menu">
        <div class="menu-left">
          <div class="menu-content">
            <div class="logo">
              <img
                src="{{ "./frontend/images/HOSTELLAR-white-logo.png" }}"
                alt=""
              />
            </div>
            <h1>Welcome to</h1>
            <p>
              Log in to get in the moment updates on the things.
            </p>
          </div>

          <div class="alert">
            @if(@session('message'))
            {{ @session('message') }}
            @endif
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-input">
              <div class="input-container">
                <i class="icon fas fa-user"></i>
                <input
                  type="text"
                  placeholder="Enter Email"  name="email"
                />
              </div>
              <div class="input-container">
                <i class="icon fas fa-lock"></i>
                <input
                  type="password"
                  placeholder="Password"
                  id="passwordInput" name="password"
                />
                <i
                  class="show-password-icon fas fa-eye-slash"
                  id="togglePassword"
                ></i>
              </div>
            </div>
            <div class="btn">
              <button>SIGN IN</button>
            </div>
            <div class="query">
              <p>Don't have an account? <span><a href="" style="text-decoration: none; color: #fff;">Sign Up Now</a></span> </p>
            </div>
          </form>
        </div>

        <div class="menu-right">
          <img src="{{ "./frontend/images/form-right.png" }}" alt="Your Image" />
        </div>

      </div>
    </div>
  </body>
</html>



  <script>

const form = document.querySelector("form");
eField = form.querySelector(".email"),
eInput = eField.querySelector("input"),
pField = form.querySelector(".password"),
pInput = pField.querySelector("input");

form.onsubmit = (e)=>{
  e.preventDefault(); //preventing from form submitting
  //if email and password is blank then add shake class in it else call specified function
  (eInput.value == "") ? eField.classList.add("shake", "error") : checkEmail();
  (pInput.value == "") ? pField.classList.add("shake", "error") : checkPass();

  setTimeout(()=>{ //remove shake class after 500ms
    eField.classList.remove("shake");
    pField.classList.remove("shake");
  }, 500);

  eInput.onkeyup = ()=>{checkEmail();} //calling checkEmail function on email input keyup
  pInput.onkeyup = ()=>{checkPass();} //calling checkPassword function on pass input keyup

  function checkEmail(){ //checkEmail function
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; //pattern for validate email
    if(!eInput.value.match(pattern)){ //if pattern not matched then add error and remove valid class
      eField.classList.add("error");
      eField.classList.remove("valid");
      let errorTxt = eField.querySelector(".error-txt");
      //if email value is not empty then show please enter valid email else show Email can't be blank
      (eInput.value != "") ? errorTxt.innerText = "Enter a valid email address" : errorTxt.innerText = "Email can't be blank";
    }else{ //if pattern matched then remove error and add valid class
      eField.classList.remove("error");
      eField.classList.add("valid");
    }
  }

  function checkPass(){ //checkPass function
    if(pInput.value == ""){ //if pass is empty then add error and remove valid class
      pField.classList.add("error");
      pField.classList.remove("valid");
    }else{ //if pass is empty then remove error and add valid class
      pField.classList.remove("error");
      pField.classList.add("valid");
    }
  }

  //if eField and pField doesn't contains error class that mean user filled details properly
  if(!eField.classList.contains("error") && !pField.classList.contains("error")){
    window.location.href = form.getAttribute("action"); //redirecting user to the specified url which is inside action attribute of form tag
  }
}
  </script>



</body>
</html>
