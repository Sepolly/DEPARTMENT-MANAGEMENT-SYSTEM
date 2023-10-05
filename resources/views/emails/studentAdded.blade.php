<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
        <title>welcome</title>
        <style>
            *{
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }
            body{
                display: flex;
                max-width: 100%;
                max-height: 100%;
                justify-content: center;
                align-items: center;
            }

            .wrapper{
                position: relative;
                width: 60%;
                height: 90%;
                background-color: white;
                position: relative;
                border-radius: 8px;
                padding: 2rem;
                box-shadow: 0px 0px 24px rgba(0,0,0,0.3);
            }

            button{
                padding: .8rem 2rem ;
                margin-left: 1rem;
                color: white;
                border: none;
                border-radius: 2px;
                cursor: pointer;
                background: rgba(0,0,0);
                opacity: 0.6;
                transition: opacity 200ms;
            }

            p{
                color: rgba(0,0,0,0.8);
                padding: 1rem;
                font-weight: 100;
                line-height: 2rem;
            }
            
            footer{
                display: flex;
                justify-content: center;
                align-items: center;
                position: absolute;
                width: 100%;
                bottom: 1rem;
                color: gray;
                font-weight: 400;

            }

            footer div{

            }

            button:hover{
                opacity: 0.7; 
            }

            @media(max-width: 1024px){
                .wrapper{
                    width: 100%;
                    height: 100vh;

                }
            }
        </style>
    </head>
    <body>
        <div class = "wrapper">
            <h2>welcome<i class="fa-solid fa-hand"></i>, 
                {{$student->first_name . " "}} {{$student->last_name}}
            </h2>
            <p>
                You have being added to this fabulous system which is catered to provide cutting-edge
                learning platform for both lecturers and students of the <br> ELECTRICAL AND ELECTRONICS DEPARTMENT.
            </p>
            <p>
                The login link is shown below which when clicked, will take you to the students login page.
                You will be required to enter both your registration number and your password.
                By default, your password will be your registration number; Nontheless, this can 
                be changed in the settings after you must have logged in.
            </p>
            <a href = {{url('/student')}}>
                <button>login</button>
            </a>
            <footer>
                <div>
                    &copy; <?php echo Date("Y"); ?>
                    Electrical and Electronics Department Management System
                </div>
            </footer>
        </div>
    </body>
</html>