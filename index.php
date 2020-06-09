<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login2</title>
</head>
<body>
<form action="" method="get">
<h1 style="text-align: center"><strong>NAVER</strong></h1><br>
<div align="center">
<strong>아이디</strong>
<br><br>
<input type="text" width="300" height="30" id="id_id" name="p_id" placeholder="아이디 입력(10자 이하)"><br>
</div>
<br>

<div align="center"><strong>비밀번호</strong>
<br><br>
<input type="text" width="300" height="30" id="id_pw1" name="nm_pw1" placeholder="비밀번호 입력(4자리 이하)"><br>
</div>
<br>

<div align="center"><strong>비밀번호 재확인</strong>
<br><br>
<input type="text" width="300" height="30" id="id_pw2" name="nm_pw2" placeholder="비밀번호 재입력"><br>
</div>
<br>

<div align="center"><strong>이름</strong>
<br><br>
<input type="text" width="300" height="30" id="id_name" name="nm_name" placeholder="이름 입력"><br>
</div>
<br>

<p align="center">
<strong>생년월일</strong><br><br>
      	  <select name="nm_year">
      	    <option value="0" selected>년</option>
      	    <option value="2014">2014</option>
      	    <option value="2013">2013</option>
      	    <option value="2012">2012</option>
      	    <option value="2011">2011</option>
      	    <option value="2010">2010</option>
      	    <option value="2009">2009</option>
      	    <option value="2008">2008</option>
      	    <option value="2007">2007</option>
      	    <option value="2006">2006</option>
      	    <option value="2005">2005</option>
      	    <option value="2004">2004</option>
      	    <option value="2003">2003</option>
      	    <option value="2002">2002</option>
      	    <option value="2001">2001</option>
      	    <option value="2000">2000</option>
      	    <option value="1999">1999</option>
      	    <option value="1998">1998</option>
      	    <option value="1997">1997</option>
      	    <option value="1996">1996</option>
      	    <option value="1995">1995</option>
      	    <option value="1994">1994</option>
      	    <option value="1993">1993</option>
      	    <option value="1992">1992</option>
      	    <option value="1991">1991</option>
   	      </select>
          
          <select name="nm_month">
      	    <option value="0" selected>월</option>
      	    <option value="1">1</option>
      	    <option value="2">2</option>
      	    <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
   	      </select>
          
          <select name="nm_day">
      	    <option value="0" selected>일</option>
      	    <option value="1">1</option>
      	    <option value="2">2</option>
      	    <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
   	      </select>
</p>
<br>

<div align="center"><strong>성별</strong><br>
<input type="radio" id="id_gender1" name="s_gender" value="남자" checked>남자
<input type="radio" id="id_gender2" name="s_gender" value="여자">여자<br>
</div>
<br>

<p align="center">
<strong>본인 확인 이메일</strong><br><br>
<input type="text" width="200" height="30" id="id_mail" name="nm_mail" placeholder="이름 입력">
@
<select name="nm_mail2">
      <option value="0" selected>이메일 선택</option>
      <option value="1">naver.com</option>
      <option value="2">daum.net</option>
      <option value="3">google.com</option>
      <option value="4">yahoo.com</option>
      <option value="5">nate.com</option>
</select>
<br><br>

<input type="submit" value="가입하기" onClick="return check()">
</p>
<br>
</form>

<script>
	function  check(){
		let password1 = document.getElementById('id_pw1').value;
		let password2 = document.getElementById('id_pw2').value;
		let id = document.getElementById('id_id').value;
		
		let name = document.getElementById('id_name').value;
		let mail = document.getElementById('id_mail').value;
		
		if(id.length >= 10){
			alert("아이디가 길어요. 10자리로 다시 입력하세요.");
			document.getElementById('id_pw1').focus();
			return false;
		}
		
		if(password1.length <= 1 || password2.length <= 1){
			alert("비밀번호를 입력하세요.");
			document.getElementById('id_name').selected = true;
			return false;
		}
		
		if(password1.length >= 5 || password2.length >= 5){
			alert("비밀번호가 길어요. 4자리로 다시 입력하세요.");
			document.getElementById('id_pw1').focus();
			return false;
		}
		
		if(password1 != password2){
			alert("비밀번호가 틀립니다. 다시 입력 바랍니다.");
			document.getElementById('id_pw1').focus();
		}
		if(name.length <= 1){
			alert("이름을 정확히 입력하세요.");
			document.getElementById('id_name').selected = true;
			return false;
		}
		
		if(mail.length <= 1){
			alert("이메일을 정확히 입력하세요.");
			document.getElementById('id_name').selected = true;
			return false;
		}
		return true;
	}
</script>
</body>
</html>
