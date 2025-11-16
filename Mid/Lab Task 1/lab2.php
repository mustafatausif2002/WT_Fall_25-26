<!DOCTYPE html>
<html>
<head>
    <title>Participant Registration</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f0f8ff;
        }
 
    h2 {
      text-align: center;
    }

    form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    button {
      background-color: #1f75caff;
      color: white;
      cursor: pointer;
      margin: 10px 0 0 0;
    }

    input{
      width: 100%;
      padding: 8px;
      margin-top: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    #output {
      margin-top: 20px;
      text-align: center;
      font-size: 16px;
      color: #076a19ff;
    }
 
    #error {
      margin-top: 10px;
      color: red;
      text-align: center;
    }

    </style>
</head>
<body>


    <form onsubmit="return handleSubmit()">

    <h2>Participant Registration</h2>

    Full Name:<br>
    <input type="text" id="name" /> <br>

    Email: <br>
    <input type="text" id="email"/> <br>

    Phone Number: <br>
    <input type="number" id="phone"/> <br>

    Password: <br>
    <input type="password" id="password"/> <br>

    Confirm Password: <br>
    <input type="password" id="confirmpassword"/> <br>

    <button type="submit">Register</button>
      <div id="error"></div>
  <div id="output"></div>
    </form>


    <script>
    function handleSubmit() {
 
      var name = document.getElementById("name").value.trim();
      var email = document.getElementById("email").value.trim();
      var phone = document.getElementById("phone").value.trim();
      var password = document.getElementById("password").value;
      var confirmpassword = document.getElementById("confirmpassword").value;
 
      var errorDiv = document.getElementById("error");
      var outputDiv = document.getElementById("output");
 

      errorDiv.innerHTML = "";
      outputDiv.innerHTML = "";
 

      if (name === "" || email === "" || phone === "" || password === "" || confirmpassword === "") {
        errorDiv.innerHTML = "Please fill in all fields.";
        return false;
      }
 
      if (!email.includes('@')) {
        errorDiv.innerHTML = " Email must be @";
        return false;
      }

      if (isNaN(phonenumber)) {
        errorDiv.innerHTML = " Phone Numbe must be digit";
        return false;
      }
      if (password !=== confirmpassword) {
        errorDiv.innerHTML = " Password do not match";
        return false;
      }


 
 
      outputDiv.innerHTML = `
        <strong>Registration Successful!</strong><br><br>
        Name: ${name}<br>
        Email: ${email}<br>
        Phone: ${phone}<br>
      `;
 
      return false;
    }
  </script>

</body>
</html>


