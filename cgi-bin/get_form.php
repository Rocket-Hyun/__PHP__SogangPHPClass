

<html>

<SCRIPT Language="JavaScript">


      function CheckSIN(SIN_Number, Email_Value){
      if ((SIN_Number.length != 9) || !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Email_Value))) {
         alert("You have not entered a nine character string or valid email");
         return false;}
      else { return true;}
      }

</SCRIPT>
<body>

<form action="welcome_get.php" method="get" onSubmit="return CheckSIN(this.SIN.value, this.email.value)"></p>
Enter your <br>
<item>
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Social Insurance Number: <input NAME="SIN" VALUE="123456789"><br>
</item>
<input TYPE="SUBMIT"> <input TYPE="RESET">
</form>

</body>
</html>

