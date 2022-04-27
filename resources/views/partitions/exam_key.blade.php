@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* exam key  */
            .container {
            position: absolute;
            /* top: 0;
            left: 0;
            width: 100%;
            height: 100%; */
            display: flex;
            align-items: center;
            justify-content: center;
            }

            .content {
            width: 360px;
            height: 40px;
            box-shadow: 2px 4px 10px rgba(0, 0, 0, .2);
            border-radius: 60px;
            overflow: hidden;
            position: fixed;
            bottom: 0,
            right: 0;

            }

            .subscription {
            position: relative;
            width: 100%;
            height: 100%;
            }

            .subscription .add-email{
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            padding: 0 20px;
            }

            .subscription .submit-email {
            position: absolute;
            top: 0;
            right: 0;
            height: calc(100% - 2px);
            width: 100px;
            border: none;
            border-radius: 60px;
            outline: none;
            margin: 1px;
            padding: 0 20px;
            cursor: pointer;
            background: #4ABEBB;
            color: #FFFFFF;
            transition: width .35s ease-in-out,
                background .35s ease-in-out;
            }

            .subscription.done .submit-email {
            width: calc(100% - 2px);
            /* background: #C0E02E; */
            background: #4ABEBB;

            }

            .subscription .submit-email .before-submit,
            .subscription .submit-email .after-submit {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 38px;
            transition: visibility .35s ease-in-out,
                opacity .35s ease-in-out;
            }

            .subscription.done .submit-email .before-submit,
            .subscription:not(.done) .submit-email .after-submit {
            visibility: hidden;
            opacity: 0;
            }

            .subscription .submit-email .after-submit {
            transition-delay: .35s;
            }

            .subscription:not(.done) .submit-email .before-submit,
            .subscription.done .submit-email .after-submit {
            visibility: visible;
            opacity: 1;
            }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <form class="subscription">
            <input class="add-email" type="email" placeholder="Enter an exam key ....">
            <button class="submit-email" type="button">
                <span class="before-submit">Take exam</span>
                <span class="after-submit">Go kill it!</span>
            </button>
            </form>
        </div>
    </div>

    <script>
        document.querySelector('.submit-email').addEventListener('mousedown', (e) => {
        e.preventDefault();
        document.querySelector('.subscription').classList.add('done');
        });
    </script>

</body>

</html>