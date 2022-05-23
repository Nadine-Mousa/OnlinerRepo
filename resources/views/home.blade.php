@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <style>
        /* exam key  */
            .containerExamKey {
            position: fixed;
            top: 3;
            right: 0;
            width: 30%;
            height: 10%;
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
            }

            .subscription {
            position: relative;
            width: 100%;
            height: 100%;
            }

            .subscription .add-email{
            position: absolute;
            top: 0;
            left: 0;
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

@section('content')
<body>







<!-- exam key  -->
<div class="containerExamKey">
        <div class="content" >
            <form class="subscription" metod="GET" action="{{route('exams.quiz')}}">
              @csrf
            <input name="exam_key" class="add-email" type="text" placeholder="Enter an exam key ....">
            <button class="submit-email" type="submit">
                <span class="before-submit">Take exam</span>
                <span class="after-submit">Go kill it!</span>
            </button>
            </form>
        </div>
  </div>

  

  

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
        document.querySelector('.submit-email').addEventListener('mousedown', (e) => {
        e.preventDefault();
        document.querySelector('.subscription').classList.add('done');
        });
</script>


  
</body>

@endsection('content')
</html>