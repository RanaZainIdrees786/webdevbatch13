<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

        {{-- Tailwind CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        input[type="submit"] {
            border: none;
            color: white;
            padding: 8px;
            border-radius: 6px;
            margin-top: 18px;
        }

        .form-input {
            padding: 8px 0px;
        }

        .form-input label {
            display: block;
            margin-bottom: 3px;
        }

        form {
            border: 1px solid black;
            width: 400px;
            border-radius: 18px;
            padding: 25px;
        }

        input {
            width: 100%;
            height: 32px;
            border-radius: 4px;
            border: 0.3px solid black;
        }

        input:focus {
            outline: 1px solid red;
            box-shadow: 1px 1px 5px rgb(48, 141, 223);
        }

        /* input:active {
        background-color: blue;
      } */
        .logo img {
            width: 100%;
            border-radius: 12px;
        }

        input[type="file"] {
            border: none;
            padding: 6px;
        }

        .form-input select {
            width: 100%;
            height: 30px;
        }

        input[type="checkbox"],
        input[type="radio"] {
            width: initial;
            height: initial;
        }
    </style>


</head>

<body class='bg-red-500'
    style="
      margin: 0px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      gap: 10px;
      justify-content: center;
      align-items: center;
    ">
    <a href="/home">Home Page</a>
    <form action="/login" method="POST" class='bg-white border-0'>
        @csrf
        <div class="logo">
            <img src="{{ asset('formimg.png') }}" alt="" />
        </div>
        <div class="form-input">
            <label for="" style="font-family: Arial, Helvetica, sans-serif">Name</label>
            <input type="text" name="username" value="zain" />
        </div>

        <div class="form-input">
            <label for="">Email</label>
            <input name='email' required type="email" value="def@gmail.com" />
        </div>
        <div class="form-input">
            <label for="">Password</label>
            <input name='password' required value='pak12345' type="password"
                placeholder="must contain at least 8 character" minlength="8" maxlength="15" />
        </div>

        <div class="form-input">
            <label for="">Date of Registration</label>
            <input name='registration_date' type="date" />
        </div>

        <div class="form-input">
            <label for="">Date and Time of Registration</label>
            <input name='registration' type="datetime-local" />
        </div>

        <div class="form-input">
            <label for="">Upload your CNIC</label>
            <input name='file' type="file" />
        </div>

        <div class="form-input">
            <label for="">Choose your City</label>
            <select name="city" id="">
                <option value="">Select an Option</option>
                <option value="LHR">Lahore</option>
                <option value="KHI">Karachi</option>
                <option value="ISB">Islamabad</option>
            </select>
        </div>

        <div class="form-input">
            <label for="">Select one or multiple? </label>
            <input type="checkbox" name="entertainment" id="" />Entertainment
            <input type="checkbox" name="history" id="" />History
            <input type="checkbox" name="drama" id="" />Drama
        </div>

        <div>
            <label for="">Which one is your favourite cartoon show?</label>
            <br />
            <div><input type="radio" name="fav-cartoon" id="tandj" value='tomandjerry' />Tom and Jerry</div>
            <div><input type="radio" name="fav-cartoon" id="pink_pather" value='pink_panther' />Pink Panther</div>
            <div><input type="radio" name="fav-cartoon" id="oggy" value='oggy' />Oggy Cockroaches</div>
        </div>

        <input type="submit" value="Submit" class='bg-orange-500'  />
    </form>
</body>

</html>
