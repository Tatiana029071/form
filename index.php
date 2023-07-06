<!DOCTYPE html>
<html>
<head>
    <title>Форма</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- <script src="jquery.maskedinput.min.js"></script> -->
    <style type="text/css">
        body {
            font-family: calibri;
        }
        .box {
            margin-bottom: 10px;
        }
        .box label {
            display: inline-block;
            width: 80px;
            text-align: right;
            margin-right: 10px;
        }
        .box input, .box textarea {
            border-radius: 3px;
            border: 1px solid #ddd;
            padding: 5px 10px;
        }
        .btn-submit {
            margin-left: 90px;
        }
    </style>
</head>
<body>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <h2>Заполните форму обратной связи</h2>
    <script src="https://unpkg.com/imask"></script>
    <form id="form" action="/feedback/" method="post" onsubmit="return (ValidMail()&&ValidPhone())">
        <div class="box">
            <label>Name:</label><input type="text" name="Name" id="Name" placeholder='Татьяна' data-reg="[A-Za-zА-Яа-яЁё]{2,30}"/>
        </div>
        <div class="box">
            <label>phone:</label><input type="text" name="phone" id="phone" placeholder='89188933533' data-reg="^((\+7|7|8)+([0-9]){10})$"/>
        </div>
        <div class="box">
            <label>Email:</label>
            <input type="email" name="email" id="email" placeholder='ta.kalinina@mail.ru' data-reg="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$"/>
            </div>
        <input id="button" type="button" class="btn-submit"  value="Отправить" />


</form>
    <script>
        $(document).ready(function() {
 
            $("#button").click(function() {
 
                let Name = $("#Name").val();
                let phone = $("#phone").val();
                let email = $("#email").val();
 
                if(Name==''||phone==''||email=='') {
                    alert("Пожалуйста, заполните все поля.");
                    return false;
                }
    //             if (phone!=('/^\d+$/;')) {
    // alert("Введите правильный адрес электронной почты");
    // return false;
    //             }

                $.ajax({
                    type: "POST",
                    url: "store.php",
                    data: {
                        Name: Name,
                        phone: phone,
                        email: email   
                    },
                    cache: false,
                    success: function(data) {
                        alert(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
                 
            });
        });
 //валидация
const form = document.forms["form"];
const formArr = Array.from(form);
const validFormArr = [];
const button = form.elements["button"];

formArr.forEach((el) => {
  if (el.hasAttribute("data-reg")) {
    el.setAttribute("is-valid", "0");
    validFormArr.push(el);
  }
});

form.addEventListener("input", inputHandler);
button.addEventListener("click", buttonHandler);

function inputHandler({ target }) {
  if (target.hasAttribute("data-reg")) {
    inputCheck(target);
  }
}

function inputCheck(el) {
  const inputValue = el.value;
  const inputReg = el.getAttribute("data-reg");
  const reg = new RegExp(inputReg);
  if (reg.test(inputValue)) {
    el.setAttribute("is-valid", "1");
    el.style.border = "2px solid rgb(0, 196, 0)";
  } else {
    el.setAttribute("is-valid", "0");
    el.style.border = "2px solid rgb(255, 0, 0)";
  }
}

function buttonHandler(e) {
  const allValid = [];
  validFormArr.forEach((el) => {
    allValid.push(el.getAttribute("is-valid"));
  });
  const isAllValid = allValid.reduce((acc, current) => {
    return acc && current;
  });

  if (!Boolean(Number(isAllValid))) {
    e.preventDefault();
  }
}

//mask

button.addEventListener("click", (e)=>e.target.parentNode.style.display = "none");
    </script>


</body>
</html>