<html>

<head>

    <?php
        $fName=$mName=$lName=$dob=$gender=$mStatus=$address=$email=$moNo=$alternatemoNo=$adhaarNo=$panNo=$accNo=$brName=$ifsc="";
        $nomineeName=$nomineedob=$nomineeRelation=$passbook=$chequebook=$debitcard=$pBanking=$iBanking="";
        $fNameErr=$lNameErr=$genderErr=$mStatusErr=$addressErr=$moNoErr=$adhaarNoErr="";
        $panNoErr=$accNoErr=$brNameErr=$ifscErr=$nomineeNameErr=$nomineedobErr=$nomineeRelationErr=$checkboxErr=$dobErr="";
        $flag="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $fName=$_POST['fName'];
            $mName=$_POST['mName'];
            $lName=$_POST['lName'];
            $dob=$_POST['dob'];
            //imp
            if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
            }
            if(isset($_POST['mStatus'])){
            $mStatus=$_POST['mStatus'];
            }
            $address=$_POST['address'];
            $email=$_POST['email'];
            $moNo=$_POST['moNo'];
            $alternatemoNo=$_POST['alternatemoNo'];
            $adhaarNo=$_POST['adhaarNo'];
            $panNo=$_POST['panNo'];
            $accNo=$_POST['accNo'];
            $brName=$_POST['brName'];
            $ifsc=$_POST['ifsc'];
            $nomineeName=$_POST['nomineeName'];
            $nomineedob=$_POST['nomineedob'];
            $nomineeRelation=$_POST['nomineeRelation'];
            if(isset($_POST['passbook'])){
            $passbook=$_POST['passbook'];
            }
            if(isset($_POST['chequebook'])){
            $chequebook=$_POST['chequebook'];
            }
            if(isset($_POST['debitcard'])){
            $debitcard=$_POST['debitcard'];
            }
            if(isset($_POST['pBanking'])){
            $pBanking=$_POST['pBanking'];
            }
            if(isset($_POST['iBanking'])){
            $iBanking=$_POST['iBanking'];
            }

            //test input
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            



            //fname validation
            if(empty($fName)){
                $fNameErr="*required";
                $flag="";
            }
            else if(!preg_match('/^[a-zA-Z]*$/',$fName)) {
                $fNameErr="*Only alphabets without space";
                $flag="";
            }
            else{
                $fName = test_input($fName);
                $flag=1;
            }
            //lname validation
            if(empty($lName)){
                $lNameErr="*required";
                $flag="";
            }
            else if(!preg_match('/^[a-zA-Z]*$/',$lName)) {
                $lNameErr="*Only alphabets without space";
                $flag="";
            }
            else{
                $lName = test_input($lName);
                $flag=1;
            }
            //dob                        
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            if($diff->format('%y')<18){    
                $dobErr="*Age should be more than 18 years";
                $flag="";
            }

            //radio button validation
            if(empty($gender)){
                $genderErr="*required";
                $flag="";
            }
            if(empty($mStatus)){
                $mStatusErr="*required";
                $flag="";
            }
            //address validation
            if(empty($address)){
                $addressErr="*required";
                $flag="";
            }
            else{
                $address=test_input($address);
                $flag=1;
             }
            //mob validation
            if(empty($moNo)){
                $moNoErr="*required";
                $flag="";
            }
            else if(!preg_match('/^[1-9]{1}[0-9]{9}$/',$moNo)) {
                $moNoErr="*10digits required";
                $flag="";
            }
            else{
                $flag=1;
                $moNo = test_input($moNo);
            }
            //adhaar validation
            if(empty($adhaarNo)){
                $adhaarNoErr="*required";
                $flag="";
            }//200000000000
            else if(!preg_match('/^[2-9]{1}[0-9]{11}$/',$adhaarNo)) {
                $adhaarNoErr="*12digits required";
                $flag="";
            }
            else{
                $adhaarNo = test_input($adhaarNo);
                $flag=1;
            }
            // $sub=$substr($lName,0,1);
            // $firstChar = mb_substr($lName, 0, 1, "UTF-8");
            //pan no validation
             if(empty($panNo)){
                 $panNoErr="*required";
                 $flag="";
                } //aaaPM2222a
             else if(!preg_match('/^[a-zA-Z]{3}[P,F,C,H.A,T]{1}[0-9]{4}[a-zA-Z]{1}$/',$panNo)) {
                 $panNoErr="*10digits required in proper format";
                 $flag="";
                }
             else{
                 $panNo = test_input($panNo);
                 $flag=1;
                }
             //account validation
            if(empty($accNo)){
                $accNoErr="*required";
                $flag="";
            }
            else if(!preg_match('/^[0-9]{12}$/',$accNo)) {
                $accNoErr="*12digits required";
                $flag="";
            }
            else{
                $accNo = test_input($accNo);
                $flag=1;
            }   
            //branch name validation
            if(empty($branch)){
                $branchErr="*required";
                $flag="";
            }
            else if(!preg_match('/^[a-zA-Z ]*$/',$branch)) {
                $branchErr="*Only alphabets";
                $flag="";
            }
            else{
                $branch = test_input($branch);
                $flag=1;
            }
            //ifsc code validation
            if(empty($ifsc)){
                $ifscErr="*required";
                $flag="";
            }//aaaa0666666
            else if(!preg_match('/^[a-zA-Z]{4}[0]{1}[0-9]{6}$/',$ifsc)) {
                $ifscErr="*Please enter in correct format XXXX0xxxxxx";
                $flag="";
            }
            else{
                $ifsc = test_input($ifsc);
                $flag=1;
            }
            //nomineename validation
            if(empty($nomineeName)){
                $nomineeNameErr="*required";
                $flag="";
            }
            else{
                $nomineeName = test_input($nomineeName);
                $flag=1;
            }
            //nominee dob validation
            if(empty($nomineedob)){
                $nomineedobErr="*required";
                $flag="";
            }
            //nominee relation validation
            if(empty($nomineeRelation)){
                $nomineeRelationErr="*requierd";
                $flag="";
            }
            else{
                $nomineeRelation = test_input($nomineeRelation);
                $flag=1;
            }
            //check box validation
            if(empty($passbook) && empty($chequebook) && empty($debitcard) && empty($iBanking) &&  empty($pBanking)){
                $checkboxErr="*required";
                $flag="";
            }

            if($flag==1){
            $id=1;
            require_once "pdo.php";
            $stmt = $pdo->prepare('INSERT INTO details
                                              (id, fName, mName,lName,dob,gender,mStatus,address,email,moNo,alternatemoNo,adhaarNo,panNo,accNo,brName,ifsc,nomineeName,nomineedob,nomineeRelation,passbook,chequebook,debitcard,pBanking,iBanking) 
                                              VALUES ( :id, :fName, :mName, :lName, :dob, :gender, :mStatus, :address, :email, :moNo, :alternatemoNo, :adhaarNo, :panNo, :accNo, :brName, :ifsc, :nomineeName, :nomineedob, :nomineeRelation, :passbook, :chequebook, :debitcard, :pBanking, :iBanking )');
            $stmt->execute(array(
                        ':id' => $id,
                        ':fName' => $fName,
                        ':mName' =>$mName,
                        ':lName' =>$lName,
                        ':dob'   =>$dob,
                        ':gender'=>$gender,
                        ':mStatus'=>$mStatus,
                        ':address'=>$address,
                        ':email' =>$email,
                        ':moNo'  =>$moNo,
                        ':alternatemoNo'=>$alternatemoNo,
                        ':adhaarNo'=>$adhaarNo,
                        ':panNo'=>$panNo,
                        ':accNo'=>$accNo,
                        ':brName'=>$brName,
                        ':ifsc'=>$ifsc,
                        ':nomineeName'=>$nomineeName,
                        ':nomineedob'=>$nomineedob,
                        ':nomineeRelation'=>$nomineeRelation,
                        ':passbook'=>$passbook,
                        ':chequebook'=>$chequebook,
                        ':debitcard'=>$debitcard,
                        ':pBanking'=>$pBanking,
                        ':iBanking'=>$iBanking,
                    ));
                    header("Location: index.php");
                    return;
            
                }
                
        }
        
         
        


    ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Bank Validation Form</title>
</head>

<body>
    <form method="POST">
        <fieldset class="outer">
            <legend>Bank Form Verfication</legend>
            <pre>
    <b>First Name:</b>  <input type="text" name="fName" ><span style="color: red"><?php  echo $fNameErr;   ?></span><br>
    <b>Middle Name:</b> <input type="text" name="mName" ><br>
    <b>Last Name:</b>   <input type="text" name="lName" ><span style="color: red"><?php  echo $lNameErr;   ?></span><br>
    <b>DOB:</b>         <input type="date" name="dob"   ><span style="color: red"><?php  echo $dobErr;   ?></span><br>   
    <b>Gender:</b>       <input type="radio"name="gender" value="male">Male    <input type="radio"name="gender" value="male">Female<span style="color: red"><?php  echo $genderErr;   ?></span><br>
    <b>Marital S:</b>    <input type="radio"name="mStatus" value="married">Married <input type="radio"name="mStatus" value="notmarried">Not Married<span style="color: red"><?php  echo $mStatusErr;   ?></span><br>
    <b>Address:</b>     
    <textarea rows="4" cols="50" name="address"></textarea><span style="color: red"><?php  echo $addressErr;   ?></span>
    <b>Email:</b>       <input type="text" name="email"><br>
    <b>Mobile No:</b>   <input type="text" name="moNo" ><span style="color: red"><?php  echo $moNoErr;   ?></span><br>   
    <b>Alternate No:</b><input type="text" name="alternatemoNo" ><br>
    <b>Adhaar No:</b>   <input type="text" name="adhaarNo" ><span style="color: red"><?php  echo $adhaarNoErr;   ?></span><br>
    <b>PAN No:    </b>  <input type="text" name="panNo" ><span style="color: red"><?php  echo $panNoErr;   ?></span><br>
    <b>Account No:</b>  <input type="text" name="accNo" ><span style="color: red"><?php  echo $accNoErr;   ?></span><br>
    <b>Branch Name:</b> <input type="text" name="brName" ><span style="color: red"><?php  echo $brNameErr;   ?></span><br>
    <b>IFSC Code:</b>   <input type="text" name="ifsc" ><span style="color: red"><?php  echo $ifscErr;   ?></span><br>

    <fieldset class="inner">
        <legend>Nominee Details</legend>
        <b>Name:</b>    <input type="text" name="nomineeName" ><span style="color: red"><?php  echo $nomineeNameErr;   ?></span><br>
        <b>DOB:</b>     <input type="date" name="nomineedob" ><span style="color: red"><?php  echo $nomineedobErr;   ?></span><br>
        <b>Relation:</b><input type="text" name="nomineeRelation"><span style="color: red"><?php  echo $nomineeRelationErr;  ?></span><br>
    </fieldset>
        
        <b>Facilities:</b>      <input type="checkbox" name="passbook" value="yes">Passbook               <input type="checkbox" name="chequebook" value="yes">Checkbook           <input type="checkbox" name="debitcard" value="yes">DebitCard       
                         <input type="checkbox" name="iBanking" value="yes">Internet Banking       <input type="checkbox" name="pBanking" value="yes">Phone Banking
        <span style="color: red"><?php  echo $checkboxErr;   ?></span>                   
        <button class="button button5" name="submit">Submit</button>                   
            </pre>
        </fieldset>     
    </form>

<!--     check
            echo $fName."<br>";
            echo $mName."<br>";
            echo $lName."<br>";
            echo $dob."<br>";
            echo $gender."<br>";
            echo $mStatus."<br>";
            echo $address."<br>";
            echo $email."<br>";
            echo $moNo."<br>";
            echo $alternatemoNo."<br>";
            echo $adhaarNo."<br>";
            echo $panNo."<br>";
            echo $accNo."<br>";
            echo $brName."<br>";
            echo $ifsc."<br>";            
            echo $nomineeName."<br>";
            echo $nomineeRelation."<br>";
            echo $nomineedob."<br>";
            echo $passbook."<br>";
            echo $chequebook."<br>";
            echo $debitcard."<br>";
            echo $pBanking."<br>";
            echo $iBanking."<br>";
         -->
</body>

</html>