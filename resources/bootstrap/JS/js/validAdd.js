// $(function () {
//     // здесь код функции.
//     const submit = document.getElementById("add");
//     const update = document.getElementById("del");
//     const form = document.getElementsByTagName("form");
//
//     console.log(submit);
//
//     submit.addEventListener('click', function (even) {
//         even.preventDefault();
//
//         const id_name = document.getElementById("name").value;
//         const id_password = document.getElementById('password').value;
//         const id_email = document.getElementById("email").value;
//
//         //проверка name
//         if (id_name.length == 0) {
//             alert('Имя:\nполе обязательно для заполнения');
//             console.log("Имя: поле обязательно для заполнения");
//         } else if (id_name.length > 50) {
//             alert('Имя:\nполе превышает лимит символов для заполнения');
//             console.log("Имя: поле превышает лимит символов для заполнения " + id_name.length);
//             alert('Имя:\nполе =' + id_name);
//         } else {
//             console.log("name: " + id_name);
//             // alert(id_password);
//         }
//
//         //проверка password
//         if (id_password.length == 0) {
//             alert('Пароль:\nполе обязательно для заполнения');
//             console.log("Пароль: поле обязательно для заполнения");
//             // console.log(id_password);
//         } else if (id_password.length > 50) {
//             alert('Пароль:\nполе превышает лимит символов для заполнения');
//             console.log("Пароль: поле превышает лимит символов для заполнения " + id_password.length);
//         } else {
//             console.log("password: " + id_password);
//             // alert(id_password);
//         }
//
//         //проверка e-mail
//         if (id_email.length == 0) {
//             alert('E-mail:\nданное поле обязательно для заполнения');
//             // return false;
//         }
//         var patern = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
//         var result = patern.test(id_email);
//         if (!result) {
//             // alert('email введен не верно');
//             console.log("email введен не верно");
//             // return true;
//         } else {
//             console.log("email: " + id_email);
//             // alert(id_password);
//         }
//         // console.log(form);
//         alert("Submit");
//
//     });
//     //dell
//     update.addEventListener('click', function (even) {
//         window.location.reload();
//     });
//
//
//     submit.addEventListener('submit', function (even) {
//         even.preventDefault();
//         console.log("Submit");
//         var form_data = $(this).serialize();
//         $.ajax({
//                 type: "POST",
//                 url: "../controller/Ajax.php",
//                 data: form_data,
//                 sanitize: function () {
//                     alert("Ваше сообщение отправлено!");
//                 }
//
//             }
//         )
//     });
//
// });