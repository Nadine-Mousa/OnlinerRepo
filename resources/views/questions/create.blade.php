<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		@import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");
body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 180vh;
  background: linear-gradient(45deg, greenyellow, dodgerblue);
  font-family: "Sansita Swashed", cursive;
}
.center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
}
.center .inputbox {
  position: relative;
  width: 450px;
  height: 50px;
  margin-bottom: 30px;
}
.center .inputbox input, select {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
}
.center .inputbox:last-child , select{
  margin-bottom: 0;
}
.center .inputbox span {
  position: absolute;
  top: 14px;
  left: 20px;
  font-size: 1em;
  transition: 0.6s;
  font-family: sans-serif;
}
.center .inputbox input:focus ~ span,
.center .inputbox input:valid ~ span {
  transform: translateX(-13px) translateY(-35px);
  font-size: 1em;
}
.center .inputbox [type="submit"] {
  width: 34%;
  height: 40px;
  background: dodgerblue;
  font-size: 1.25em;
  
  border-radius: 8px;
  color: #fff;
  border: #fff;
}
.center .inputbox:hover [type="submit"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}
	</style>
</head>
<body>
	<div class="center">
		<h1>Create Question</h1>
		<form  method="POST" action= "{{route('questions.store',['user' => $user->id, 'subject' => $subject])}}" >
			@csrf
		  <div class="inputbox">
			<input type="text" required="required" name="title">
			<span>Title</span>
		  </div>
		  <div class="inputbox">
			<input type="text" required="required" name="id">
			<span>ID</span>
		  </div>
		  <div class="inputbox">
			<input type="text" required="required"  name="option_one" >
			<span>Option one</span>
		  </div>
		  <div class="inputbox">
			<input type="text" required="required" name="option_two">
			<span>Option two</span>
		  </div>
		  <div class="inputbox">
			<input type="text" required="required" name="option_three">
			<span>Option three</span>
		  </div>
		  <div class="inputbox">
			<input type="text" required="required" name="option_four">
			<span>Option four</span>
		  </div>
		  <div class="inputbox">
			<input type="text" required="required" name="answer">
			<span>Answer</span>
		  </div>
		  <div class="inputbox">
			<input type="text" required="required" name="difficulty">
			<span>Difficulty</span>
		  </div>


		<!--  <div class="inputbox">
			<select class="form-select" aria-label="Default select example">
				<option selected name="difficulty">Difiiculty</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
			  </select>
		  </div> -->

		  <div class="inputbox">
			<input type="text" required="required" name="question_type">
			<span>Question Type</span>
		  </div>
		  <div class="inputbox">
			<input type="text" required="required" name="chapter_number">
			<span>Chapter Number</span>
		  </div>
		  <div class="inputbox">
			<input type="text" required="required" name="marks" >
			<span>Marks</span>
		  </div>
		  <div class="inputbox">
		<!--	<input type="button" value="submit"> -->
			<button type="submit" value="submit">submit</button>
		  </div>
		</form>
	  </div>
</body>

</html>




new line at 159 from master
{{-- this is added form master  --}}
new branch edit in line 159

this line from nadine

this line from howaida


