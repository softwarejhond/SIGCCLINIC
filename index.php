<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';
?>
<body>
<div id="wrapper">
      <div id="left">
        <div id="signin">
          <div class="logo">
            <img src="https://image.ibb.co/hW1YHq/login-logo.png" alt="Sluralpright" />
          </div>
          <form>
            <div>
              <label>Email or username</label>
              <input type="text" class="text-input" />
            </div>
            <div>
              <label>Password</label>
              <input type="password" class="text-input" />
            </div>
            <button type="submit" class="primary-btn">Sign In</button>
          </form>
          <div class="links">
            <a href="#">Forgot Password</a>
            <a href="#">Sign in with company or school</a>
          </div>
          <div class="or">
            <hr class="bar" />
            <span>OR</span>
            <hr class="bar" />
          </div>
          <a href="#" class="secondary-btn">Create an account</a>
        </div>
        <footer id="main-footer">
          <p>Copyright &copy; 2018, Sluralpright All Rights Reserved</p>
          <div>
            <a href="#">terms of use</a> | <a href="#">Privacy Policy</a>
          </div>
        </footer>
      </div>
      <div id="right">
        <div id="showcase">
          <div class="showcase-content">
            <h1 class="showcase-text">
              Let's create the future <strong>together</strong>
            </h1>
            <a href="#" class="secondary-btn">Start a FREE 10-day trial</a>
          </div>
        </div>
      </div>
    </div>
</body>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:300');

* {
  box-sizing: border-box;
}

body {
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
  background: #181818;
  color: #fff;
  overflow: hidden;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-weight: 300;
}

#wrapper {
  display: flex;
  flex-direction: row;
}

#left {
  display: flex;
  flex-direction: column;
  flex: 1;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

#right {
  flex: 1;
}

/* Sign In */
#signin {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 80%;
  padding-bottom: 1rem;
}

#signin form {
  width: 80%;
  padding-bottom: 3rem;
}

#signin .logo {
  margin-bottom: 8vh;
}

#signin .logo img {
  width: 300px;
}

#signin label {
  font-size: 0.9rem;
  line-height: 2rem;
  font-weight: 500;
}

#signin .text-input {
  margin-bottom: 1.3rem;
  width: 100%;
  border-radius: 2px;
  background: #181818;
  border: 1px solid #555;
  color: #ccc;
  padding: 0.5rem 1rem;
  line-height: 1.3rem;
}

#signin .primary-btn {
  width: 100%;
}

#signin .secondary-btn,
.or,
.links {
  width: 60%;
}

#signin .links a {
  display: block;
  color: #fff;
  text-decoration: none;
  margin-bottom: 1rem;
  text-align: center;
  font-size: 0.9rem;
}

#signin .or {
  display: flex;
  flex-direction: row;
  margin-bottom: 1.2rem;
  align-items: center;
}

#signin .or .bar {
  flex: auto;
  border: none;
  height: 1px;
  background: #aaa;
}

#signin .or span {
  color: #ccc;
  padding: 0 0.8rem;
}

/* Showcase */
#showcase {
  display: flex;
  justify-content: center;
  align-items: center;
  background: url('https://image.ibb.co/cO9Lxq/login-bg.jpg') no-repeat center center / cover;
  height: 100vh;
  text-align: center;
}

#showcase .showcase-text {
  font-size: 3rem;
  width: 100%;
  color: #fff;
  margin-bottom: 1.5rem;
}

#showcase .secondary-btn {
  width: 60%;
  margin: auto;
}

/* Footer */
#main-footer {
  color: #ccc;
  text-align: center;
  font-size: 0.8rem;
  max-width: 80%;
  padding-top: 5rem;
}

#main-footer a {
  color: #f96816;
  text-decoration: underline;
}

/* Button */
.primary-btn {
  padding: 0.7rem 1rem;
  height: 2.7rem;
  display: block;
  border: 0;
  border-radius: 2px;
  font-weight: 500;
  background: #f96816;
  color: #fff;
  text-decoration: none;
  cursor: pointer;
  text-align: center;
  transition: all 0.5s;
}

.primary-btn:hover {
  background-color: #ff7b39;
}

.secondary-btn {
  padding: 0.7rem 1rem;
  height: 2.7rem;
  display: block;
  border: 1px solid #f4f4f4;
  border-radius: 2px;
  font-weight: 500;
  background: none;
  color: #fff;
  text-decoration: none;
  cursor: pointer;
  text-align: center;
  transition: all 0.5s;
}

.secondary-btn:hover {
  border-color: #ff7b39;
  color: #ff7b39;
}

/* Media Queries */
@media (min-width: 1200px) {
  #left {
    flex: 4;
  }

  #right {
    flex: 6;
  }
}

@media (max-width: 768px) {
  body {
    overflow: auto;
  }

  #right {
    display: none;
  }

  #left {
    justify-content: start;
    margin-top: 4vh;
  }

  #signin .logo {
    margin-bottom: 2vh;
  }

  #signin .text-input {
    margin-bottom: 0.7rem;
  }

  #main-footer {
    padding-top: 1rem;
  }
}

</style>
</html>